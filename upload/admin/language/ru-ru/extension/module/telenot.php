<?php
$_['heading_title']            = 'Telenot - Уведомления Telegram';
$_['button_save']              = 'Сохранить';
$_['button_cancel']            = 'Отмена';
$_['button_send']              = 'Отправить';
$_['button_name']              = 'Имя';
$_['button_lastname']          = 'Фамилия';
$_['button_address']           = 'Адрес';
$_['button_city']              = 'Город';
$_['button_phone']             = 'Телефон';
$_['button_comment']           = 'Комментарий';
$_['button_storename']         = 'Название магазина';
$_['button_orderid']           = '№ заказа';
$_['button_total']             = 'Итого';

$_['tab_help']                 = 'Помощь';
$_['tab_settings']             = 'Настройки';

$_['entry_chat_id']            = 'Chat ID';
$_['entry_chat_name']          = 'Имя';
$_['entry_check_api']          = 'Проверить и закрепить WebHook';
$_['entry_enabled']            = 'Включено:';
$_['entry_message']            = 'Шаблон сообщения:';
$_['entry_api_key']            = 'API key:';
$_['entry_botname']            = 'Имя бота:';

$_['text_enable']              = 'включено';
$_['text_disable']             = 'выключено';
$_['text_description']         = 'Telenot (1.0) - уведомления Telegram';
$_['text_module']              = 'Модули';

$_['help_botname']             = 'Здесь будет отображаться имя вашего бота после ввода токена';
$_['help_message']             = 'В шаблон сообщения вы можете добавить номер заказа ({OrderID}), общую сумму ({Total}) и т.д.';
$_['help_api']                 = 'Сюда следует ввести токен который вам выдал @BotFather после регистрации вашего бота, после чего нажать кнопку справа. Код будет проверен и зарегистрирован Webhook для вашего бота. Подробности на вкладке Помощь';

$_['help_registration']        = '<h4>Коротко:</h4>
<ol>
	<li>Регистрация бота в Telegram и получение токена</li>
	<li>Сохранение токена в настройках модуля</li>
	<li>Получение Chat ID (получатель уведомлений) от вашего бота в Telegram</li>
	<li>Указание Chat ID в настройках модуля</li>
</ol>

<h4>Подробно:</h4>
<ol>
	<li>
		<p>Для начала работы модуля, необходимо зарегистрировать бота (который будет отправлять уведомления) и получить его уникальный идентификатор, одновременно являющийся и токеном. Для этого в Telegram существует специальный бот — <a href="https://telegram.me/botfather" target="_blank">@BotFather</a>.</p>

		<p>Найдите @BotFather в Telegram и напишите ему <strong>/start</strong>, в ответ он выдаст список всех доступных команд.</p>
		<p>Напишите <strong>/newbot</strong> боту, в ответ он попросит ввести имя вашего будущего бота. Вы можете указать любое имя бота, например название вашего магазина или абракатабру, помните, что имя должно заканчиваться на «bot», например superpuper_bot. Если имя не занято и BotFather всё устраивает в ответ вам придёт токен бота.
		Выглядит токен примерно так: <i>530903176:AAHJQu11Ehq5X0buh069GVFWlHmAohWA12M</i></p>
	</li>
	<li>
		<p>Полученный токен необходимо скопировать в настройки модуля в поле <strong>API key</strong> и нажать кнопку справа <button class="btn btn-default" type="button"><i class="fa fa-save"></i></button>. После нажатия будет проверен токен и зарегистрирован webhook бота в Telegram.</p>
		<p>Webhook нужен для того, чтобы бот смог сообщить идентификатор вашего чата с вашим ботом именно для его работы обязательно иметь SSL</p>
		<p>Если всё прошло удачно, после нажатия на <button class="btn btn-default" type="button"><i class="fa fa-save"></i></button> появится сообщения в котором будет указано имя вашего бота и адрес webhook.</p>
	</li>
	<li>
		<p>Так как бот не может начать диалог первым, Вам нужно найти <strong>своего бота</strong> по имени в Telegram и написать ему <strong>/start</strong> В ответ он напишет идентификатор вашего с ним чата который нужно так же указать в настройках модуля нажав кнопку <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>.</p>
	</li>
	<li>
		<p>После нажатия на кнопку <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>, появится два поля, в первое вводится идентификатор чата (Chat ID) который сказал вам ваш бот, а во втором можете указать имя или должность человека которому принадлежит этот Chat ID. Если нужно что бы сообщения приходили нескольким людям, им нужно так же найти вашего бота в Telegram и написать ему <strong>/start</strong>, он выдаст их Chat ID, который вы впишете (нажав <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>) в настройки модуля.</p>
	</li>
</ol>
<p>Теперь осталось включить уведомления, создать шаблон отправляемого сообщения и протестировать.</p>';
?>