<?php
class ControllerApiTelenotbot extends Controller {
	public function index() {

		$this->load->model('setting/setting');
		$setting = $this->model_setting_setting->getSetting('telenot');
		$output = json_decode(file_get_contents('php://input'), TRUE);
		$chat_id = $output['message']['chat']['id'];
		$message = $output['message']['text'];

		switch($message) {

			case '/help':

				$answer = '/help - commands
				/start - start';

				file_get_contents('https://api.telegram.org/bot' . $setting['module_telenot_apikey'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($answer));

			break;

			case '/start':

				file_get_contents('https://api.telegram.org/bot' . $setting['module_telenot_apikey'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode("Chat ID: ".$chat_id));

			break;

		}
	}
}