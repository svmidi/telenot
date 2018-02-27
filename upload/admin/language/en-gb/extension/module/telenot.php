<?php
$_['heading_title']            = 'Telenot - Telegram notifications';
$_['button_save']              = 'Save';
$_['button_cancel']            = 'Cancel';
$_['button_send']              = 'Send';
$_['button_name']              = 'First name';
$_['button_lastname']          = 'Last name';
$_['button_address']           = 'Address';
$_['button_city']              = 'City';
$_['button_phone']             = 'Phone';
$_['button_comment']           = 'Comment';
$_['button_storename']         = 'Store name';
$_['button_orderid']           = 'Order ID';
$_['button_total']             = 'Total';

$_['tab_help']                 = 'Help';
$_['tab_settings']             = 'Settings';

$_['entry_chat_id']            = 'Chat ID';
$_['entry_chat_name']          = 'Name';
$_['entry_check_api']          = 'Check API and set WebHook';
$_['entry_enabled']            = 'Enable:';
$_['entry_message']            = 'Message template:';
$_['entry_api_key']            = 'API key:';
$_['entry_botname']            = 'Bot name:';

$_['text_enable']              = 'enabled';
$_['text_disable']             = 'disabled';
$_['text_description']         = 'Telenot (1.0) - Telegram notifications';
$_['text_module']              = 'Modules';

$_['help_botname']             = 'Here you will see the name of your bot after entering the token';
$_['help_message']             = 'In the message template, you can add an order number ({OrderID}), a total amount ({Total}), etc.';
$_['help_api']                 = 'Here, enter the token that you gave @BotFather after registering your bot, then click the button on the right. The code will be checked and registered by Webhook for your bot. Details on the Help tab';
$_['help_registration']        = 'Register bot on @BotFather.';
$_['help_registration']        = '<h3>Briefly:</h3>
<ol>
<li>Registering a bot in Telegram and getting a token</li>
<li>Saving a token in the module settings</li>
<li>Getting the Chat ID (the recipient of notifications) from your bot to Telegram</li>
<li>Specifying the Chat ID in the module settings</li>
</ol>

<h3>Details:</h3>
<ol>
<li>
<p>To start the module, it is necessary to register the bot (which will send notifications) and get its unique identifier, which is also a token. To do this, Telegram has a special bot - <a href="https://telegram.me/botfather" target="_blank"> @BotFather </a>.</p>

<p>Find @BotFather in Telegram and write to it <strong>/start</strong>, it will return a list of all available commands in response.</p>
<p>Write a <strong>/newbot</strong> to the bot, in response, it will ask you to enter the name of your future bot. You can specify any bot name, such as the name of your store or abracadabra, remember that the name must end with a "bot", for example, superpuper_bot. If the name is not used and BotFather is satisfied with everything, the bot token will come back.
The token looks like this: <i>530903176: AAHJQu11Ehq5X0buh069GVFWlHmAohWA12M</i></p>
</li>
<li>
<p>The received token must be copied to the module settings in the <strong>API key</strong> field and click the button on the right <button class="btn btn-default" type="button"> <i class="fa fa-save "></i></button>. After clicking, the token will be checked and the webhook of the bot registered in Telegram.</p>
<p>Webhook is needed in order for the bot to be able to communicate the identifier of your chat with your bot, for its work it is necessary to have SSL.</p>
<p>If everything went well, after you click on <button class="btn btn-default" type="button"><i class="fa fa-save"></i></button> the name of your bot and the webhook address will be indicated.</p>
</li>
<li>
<p>Since the bot can not start the dialog first, you need to find <strong> your bot </strong> by name in Telegram and write to it <strong> /start </strong> In response, it will write your chat ID with it you must also specify in the module settings by clicking the button <button type="button" class="btn btn-primary"> <i class="fa fa-plus-circle"> </i> </button>.</p>
</li>
<li>
<p>After pressing the <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>, two fields appear in the the first one is the Chat ID that your bot told you, and in the second you can specify the name or position of the person to whom this Chat ID belongs. If you need to send messages to several people, they also need to find your bot in Telegram and write to it <strong>/start</strong>, it will return their Chat ID, which you will enter (by pressing <button type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>) in the module settings.</p>
</li>
</ol>
<p> Now it's time to enable notifications, create a template for the message to be sent and test it.</p>';
?>