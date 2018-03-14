<?php
class ControllerModuleTelenot extends Controller {

	public function onHistoryChange($order = 0) {

		if (is_array($order)) {
			$order_id = $order['order_id'];
		} elseif (($order == 0) && (isset($this->session->data['order_id']))) {
			$order_id = $this->session->data['order_id'];
		} elseif ($order) {
			$order_id = $order;
		}

		if (!is_int($order_id)) {
			return;
		}

		$this->load->model('checkout/order');
		$this->load->model('module/telenot');
		$order_info = $this->model_checkout_order->getOrder($order_id);

		if ($order_info['order_status_id'] && $this->model_module_telenot->getHistoryCount($order_id) == 1) {
			$this->load->model('setting/setting');
			$setting = $this->model_setting_setting->getSetting('module_telenot');

			if (isset($setting) && ($setting['module_telenot_status']) && (!empty($setting['module_telenot_apikey']))) {

				$total = $this->currency->convert($order_info['total'], $order_info['currency_code'], $order_info['currency_code']);
				if (is_array($setting['module_telenot_chats'])) {

					$original = array("{StoreName}","{OrderID}", "{Total}", "{LastName}", "{FirstName}", "{Phone}", "{City}", "{Address}", "{Comment}");
					$replace = array($this->config->get('config_name'), $order_id, $total, $order_info['lastname'], $order_info['firstname'], $order_info['telephone'], $order_info['shipping_city'], $order_info['shipping_address_1'], $order_info['comment']);

					$message = str_replace($original, $replace, $setting['module_telenot_message']);

					foreach ($setting['module_telenot_chats'] as $chat) {
						@file_get_contents('https://api.telegram.org/bot' . $setting['module_telenot_apikey'] . '/sendMessage?chat_id=' . $chat['id'] . '&text=' . urlencode($message));
					}
				}
			}
		}
	}

}