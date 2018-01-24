<?php
class ControllerExtensionModuleTelenot extends Controller {
	private $data = array();

	public function index() {

		$this->load->language('extension/module/telenot');

		$this->load->model('localisation/language');
		$this->load->model('setting/setting');

		$this->document->setTitle($this->language->get('heading_title'));

		if(!isset($this->request->get['store_id'])) {
			$this->request->get['store_id'] = 0;
		}

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			if (!$this->user->hasPermission('modify', 'extension/module/telenot')) {
				$this->error['warning'] = $this->language->get('error_permission');
				$this->session->data['error'] = 'You do not have permissions to edit this module!';
			} else {
				if ( is_array($this->request->post['input-chat']) ) {
					$chats = json_encode($this->request->post['input-chat']);
					$this->request->post['input-chat'] = $chats;
				}
				$this->model_setting_setting->editSetting('telenot', $this->request->post, 0);
				$this->session->data['success'] = $this->language->get('text_success');
			}
			$this->response->redirect(HTTP_SERVER.'index.php?route=extension/module/telenot&store_id='.$this->request->get['store_id'] . '&user_token=' . $this->session->data['user_token']);
		}

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		$this->data['breadcrumbs']   = array();
		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/extension', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);
		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/telenot', 'user_token=' . $this->session->data['user_token'], 'SSL'),
		);

		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_test'] = $this->language->get('button_test');
		$this->data['button_send'] = $this->language->get('button_send');
		$this->data['button_refer'] = $this->language->get('button_refer');
		$this->data['button_orderid'] = $this->language->get('button_orderid');
		$this->data['button_storename'] = $this->language->get('button_storename');
		$this->data['button_name'] = $this->language->get('button_name');
		$this->data['button_lastname'] = $this->language->get('button_lastname');
		$this->data['button_phone'] = $this->language->get('button_phone');
		$this->data['button_city'] = $this->language->get('button_city');
		$this->data['button_address'] = $this->language->get('button_address');
		$this->data['button_comment'] = $this->language->get('button_comment');
		$this->data['button_status'] = $this->language->get('button_status');
		$this->data['button_total'] = $this->language->get('button_total');

		$this->data['tab_help'] = $this->language->get('tab_help');
		$this->data['tab_settings'] = $this->language->get('tab_settings');

		$this->data['entry_chat_id'] = $this->language->get('entry_chat_id');
		$this->data['entry_chat_name'] = $this->language->get('entry_chat_name');
		$this->data['entry_bot'] = $this->language->get('entry_bot');
		$this->data['entry_enabled'] = $this->language->get('entry_enabled');
		$this->data['entry_message'] = $this->language->get('entry_message');
		$this->data['entry_api_key'] = $this->language->get('entry_api_key');

		$this->data['text_description'] = $this->language->get('text_description');
		$this->data['text_new_order'] = $this->language->get('text_new_order');
		$this->data['text_enable'] = $this->language->get('text_enable');
		$this->data['text_disable'] = $this->language->get('text_disable');

		$this->data['help_message'] = $this->language->get('help_message');
		$this->data['help_registration'] = $this->language->get('help_sure');

		$this->data['entry_text'] = $this->language->get('entry_text');

		$this->data['error_warning'] = '';
		$this->data['action'] = $this->url->link('extension/module/telenot', 'user_token=' . $this->session->data['user_token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/extension', 'user_token=' . $this->session->data['user_token'], 'SSL');

		$this->data['data'] = $this->model_setting_setting->getSetting('telenot');

		$this->data['user_token'] = $this->session->data['user_token'];

		$this->data['header'] = $this->load->controller('common/header');
		$this->data['column_left'] = $this->load->controller('common/column_left');
		$this->data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/module/telenot', $this->data));
	}

	public function install() {
		$this->load->model('setting/event');

		$this->model_setting_event->addEvent('telenot', 'catalog/controller/checkout/success/before', 'extension/module/telenot/onCheckout');

		$this->load->model('setting/setting');
		$basic=array(
		'telenot-chats' => '',
		'telenot-apikey' => '',
		'telenot-message' => 'New order #{OrderID} at the store "{StoreName}". Total {Total}',
		'telenot-enabled' => 0);
		$this->model_setting_setting->editSetting('telenot', $basic, 0);
	}

	public function uninstall() {
		$this->load->model('setting/setting');

		$this->model_setting_setting->deleteSetting('telenot_module',0);
		$this->load->model('setting/event');
		$this->model_setting_event->deleteEvent('telenot');
	}

	public function send() {
		$json = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {

			if (!$this->user->hasPermission('modify', 'extension/module/telenot')) {
				$json['error'] = 403;
				$json['text'] = 'You do not have permission to perform this action!';
			}

			if (!$this->request->post['message']) {
				$json['error'] = 404;
				$json['text'] = 'The message field should not be empty!';
			}
			if (!$json) {

				$chats = explode(",", $this->request->post['chats']);
				$api_key = trim($this->request->post['chats']);

				foreach ($chats as $value) {
					$chat = trim($value);
					if ($chat) {

						file_get_contents('https://api.telegram.org/bot' . $api_key . '/sendMessage?chat_id=' . $chat . '&text=' . urlencode($this->request->post['message']));
					}
				}
				
			}

		}

		$this->response->setOutput(json_encode($resp));
	}
}
?>