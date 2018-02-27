<?php
class ControllerExtensionModuleTelenot extends Controller {

	public function onCheckout($order = 0) {

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
		$order_info = $this->model_checkout_order->getOrder($order_id);

		$this->load->model('setting/setting');
		$setting = $this->model_setting_setting->getSetting('telenot');

		if (isset($setting) && ($setting['telenot-enabled']) && (!empty($setting['telenot-apikey']))) {
			$total = $this->currency->convert($order_info['total'], $order_info['currency_code'], $order_info['currency_code']);
			if (is_array($setting['telenot-chats'])) {
				$original = array("{StoreName}","{OrderID}", "{Total}", "{LastName}", "{FirstName}", "{Phone}", "{City}", "{Address}", "{Comment}");
				$replace = array($this->config->get('config_name'), $order_id, $total, $order_info['lastname'], $order_info['firstname'], $order_info['telephone'], $order_info['shipping_city'], $order_info['shipping_address_1'], $order_info['comment']);

				$message = str_replace($original, $replace, $setting['telenot-message']);

				foreach ($setting['telenot-chats'] as $chat) {
					@file_get_contents('https://api.telegram.org/bot' . $setting['telenot-apikey'] . '/sendMessage?chat_id=' . $chat['id'] . '&text=' . urlencode($message));
				}
			}
		}
	}

}