<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
	<div class="page-header">
		<div class="container-fluid">
			<div class="pull-right">
				<button type="submit" form="form-telenot" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
				<a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
			</div>
			<h1><?php echo $heading_title; ?></h1>
			<ul class="breadcrumb">
			<?php for breadcrumb in breadcrumbs  ?>
			<li><a href="<?php echo $breadcrumb.href; ?>"><?php echo $breadcrumb.text; ?></a></li>
			<?php endfor  ?>
			</ul>
		</div>
	</div>
<div class="container-fluid">
	<?php if error_warning  ?>
	<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
		<button type="button" class="close" data-dismiss="alert">&times;</button>
	</div>
	<?php endif  ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_description; ?></h3>
		</div>
		<div class="panel-body">
		<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-telenot" class="form-horizontal">

		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-settings" data-toggle="tab"><?php echo $tab_settings; ?></a></li>
			<li><a href="#tab-help" data-toggle="tab"><?php echo $tab_help; ?></a></li>
		</ul>
		<div class="tab-content">

			<div class="tab-pane fade" id="tab-help">
				<?php echo $help_registration; ?>
			</div>

			<div class="tab-pane fade active in" id="tab-settings">
				<div class="form-group">
					<label class="col-sm-2 control-label" for="input-enabled"><?php echo $entry_enabled; ?></label>
					<div class="col-sm-10">
						<select name="module_telenot_status" class="form-control">
						<?php if data['module_telenot_status'] == 0  ?>
							<option value="1"><?php echo $text_enable; ?></option>
							<option value="0" selected="selected"><?php echo $text_disable; ?></option>
						<?php else  ?>
							<option value="1" selected="selected"><?php echo $text_enable; ?></option>
							<option value="0"><?php echo $text_disable; ?></option>
						<?php endif  ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="input-message">
						<span data-toggle="tooltip" data-original-title="<?php echo $help_message; ?>"><?php echo $entry_message; ?></span>
					</label>
					<div class="col-sm-10">
						<div class="btn-group-xs btn-group" role="group">
							<button class="btn btn-default btni" type="button" data-insert="{OrderID}" data-target="input-message"><?php echo $button_orderid; ?></button>
							<button class="btn btn-default btni" type="button" data-insert="{StoreName}" data-target="input-message"><?php echo $button_storename; ?></button>
							<button class="btn btn-default btni" type="button" data-insert="{Total}" data-target="input-message"><?php echo $button_total; ?></button>
							<button class="btn btn-default btni" type="button" data-insert="{FirstName}" data-target="input-message"><?php echo $button_name; ?></button>
							<button class="btn btn-default btni" type="button" data-insert="{LastName}" data-target="input-message"><?php echo $button_lastname; ?></button>
							<button class="btn btn-default btni" type="button" data-insert="{City}" data-target="input-message"><?php echo $button_city; ?></button>
							<button class="btn btn-default btni" type="button" data-insert="{Address}" data-target="input-message"><?php echo $button_address; ?></button>
							<button class="btn btn-default btni" type="button" data-insert="{Phone}" data-target="input-message"><?php echo $button_phone; ?></button>
							<button class="btn btn-default btni" type="button" data-insert="{Comment}" data-target="input-message"><?php echo $button_comment; ?></button>
						</div>
						<textarea name="module_telenot_message" rows="5" placeholder="<?php echo $entry_message; ?>" id="input-message" class="form-control"><?php echo $data['module_telenot_message']; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label" for="input-apikey">
						<span data-toggle="tooltip" data-original-title="<?php echo $help_api; ?>"><?php echo $entry_api_key; ?></span></label>
					<div class="col-sm-10">
						<div class="input-group">
							<input type="text" class="form-control" id="input_check_api" placeholder="<?php echo $entry_api_key; ?>">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" id="checkAPI" title="<?php echo $entry_check_api; ?>"><i class="fa fa-save"></i></button>
							</span>
						</div>
						<input name="module_telenot_apikey" type="text" readonly="readonly" placeholder="<?php echo $entry_api_key; ?>" id="input-apikey" class="form-control" value="<?php echo $data['module_telenot_apikey']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label" for="input-apikey">
						<span data-toggle="tooltip" data-original-title="<?php echo $help_botname; ?>"><?php echo $entry_botname; ?></span></label>
					<div class="col-sm-10">
						<input name="module_telenot_botname" type="text" readonly="readonly" placeholder="<?php echo $entry_botname; ?>" id="input-botname" class="form-control" value="<?php echo $data['module_telenot_botname']; ?>">
					</div>
				</div>

				<table id="chats" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-left"><?php echo $entry_chat_id; ?></th>
						<th class="text-left"><?php echo $entry_chat_name; ?></th>
						<th style="width:15%"></th>
					</tr>
				</thead>
				<tbody>
					<?php set chat_row = 0  ?>
					<?php if data['module_telenot_chats']  ?>
					<?php for chat in data['module_telenot_chats']  ?>
					<tr id="chat_row<?php echo $chat_row; ?>">
						<td class="text-left">
						<input type="text" name="module_telenot_chats[<?php echo $chat_row; ?>][id]" value="<?php echo $chat.id; ?>" placeholder="<?php echo $entry_chat_id; ?>" class="form-control" />
						</td>
						<td class="text-left" >
						<input type="text" name="module_telenot_chats[<?php echo $chat_row; ?>][name]" value="<?php echo $chat.name; ?>" placeholder="<?php echo $entry_chat_name; ?>" class="form-control" />
						</td>
						<td class="text-left">
						<button type="button" onclick="$('#chat_row<?php echo $chat_row; ?>, .tooltip').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
						</td>
					</tr>
					<?php set chat_row = chat_row + 1  ?>
					<?php endfor  ?>
					<?php endif  ?>
				</tbody>
					<tfoot>
						<tr>
						<td colspan="2"></td>
						<td class="text-left"><button type="button" onclick="addChat();" data-toggle="tooltip" title="<?php echo $button_chat_add; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
						</tr>
					</tfoot>
				</table>

				<div id="result"></div>
			</div>
		</div>

		</form>

	</div>
</div>

<script type="text/javascript">
var chat_row = <?php echo $chat_row; ?>;

function addChat() {
	html  = '<tr id="chat_row' + chat_row + '">';
	html += '  <td class="text-left"><input type="text" name="module_telenot_chats[' + chat_row + '][id]" value="" placeholder="<?php echo $entry_chat_id; ?>" class="form-control" /></td>';	
	html += '  <td class="text-left"><input type="text" name="module_telenot_chats[' + chat_row + '][name]" value="" placeholder="<?php echo $entry_chat_name; ?>" class="form-control" /></td>';	
	
	html += '  <td class="text-left"><button type="button" onclick="$(\'#chat_row' + chat_row  + ', .tooltip\').remove();" data-toggle="tooltip" title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
	html += '</tr>';
	
	$('#chats tbody').append(html);
	
	chat_row++;
}
$(document).ready(function() {

	$("#checkAPI").click(function() {
		var api = $('#input_check_api').val();

		if (api.length > 44) {

			$('#arbitrary').removeClass('has-error');
			var data = "&module_telenot_apikey=" + api;
			var btn = $(this);
			btn.button('loading');
			$.ajax({
				type: "POST",
				url: "index.php?route=extension/module/telenot/check_api&store_id=0&user_token=<?php echo $user_token; ?>",
				cache: false,
				data: data,
				success: function(html){
					try {
						jsonData = $.parseJSON(html);
						if (jsonData['error'] == 0) {
							$('#result').html('<div class="alert alert-success">'+jsonData['text']+'</div>');
							$('#input-apikey').val(api);
							$('#input-botname').val(jsonData['bot_name']);
						} else {
							$('#result').html('<div class="alert alert-danger">'+jsonData['text']+'</div>');
						}
					} catch (e) {
						$('#result').html('<div class="alert alert-danger">Error</div>');
					}
				},
			});
			btn.button('reset');
		}
	});

	jQuery.fn.extend({
		insertAtCaret: function(myValue) {
		return this.each(function(i) {
			if (document.selection) {
				this.focus();
				var sel = document.selection.createRange();
				sel.text = myValue;
				this.focus();
			} else if (this.selectionStart || this.selectionStart == '0') {
				var startPos = this.selectionStart;
				var endPos = this.selectionEnd;
				var scrollTop = this.scrollTop;
				this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
				this.focus();
				this.selectionStart = startPos + myValue.length;
				this.selectionEnd = startPos + myValue.length;
				this.scrollTop = scrollTop;
			} else {
				this.value += myValue;
				this.focus();
			}
		});
		}
	});

	$('.btni').click(function() {
		var target = $(this).data('target');
		var text = $(this).data('insert');
		$('#' + target).insertAtCaret(text);
	});

});
</script>
</div>
<?php echo $footer; ?>