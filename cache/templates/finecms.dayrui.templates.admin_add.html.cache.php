<script type="text/javascript">
$(function() { //防止回车提交表单
	document.onkeydown = function(e){ 
		var ev = document.all ? window.event : e;
		if (ev.keyCode==13) $("#mark").val("1"); // 标识不能提交表单
	}
	$(".table_form th").last().css('border','none');
	$(".table_form td").last().css('border','none');
});
function dr_form_check() {
	if ($("#dr_username").val() == '') {
		dr_form_tips('username', false, '<?php echo dr_lang("会员名称不能为空"); ?>');
		return false;
	} else {
		dr_form_tips('username', true, '&nbsp;');
	}
	<?php if (!$data) { ?>
	if (_check_username() == false) {
		return false;
	}
	<?php } ?>
	dr_form_tips('adminid', true, '&nbsp;');
	if ($("#mark").val() == 0) { 
		return true;
	} else {
		return false;
	}
}
function _check_username() {
	var username = $("#dr_username").val();
	if (username == '') {
		dr_form_tips('username', false, '<?php echo dr_lang("会员名称不能为空"); ?>');
		return false;
	} else {
		$.ajax({type: "POST",dataType:"json", url: "<?php echo dr_url("root/check_username"); ?>", data: {username:username},
			success: function(data) {
				//验证成功,显示注册新用户
				if (data.status == 1) {
					dr_form_tips('username', true, data.code);
					$(".reg").show();
					return true;
				} else if (data.status == 2) {
					dr_form_tips('username', false, data.code);
					return false;
				} else {
					//验证失败,隐藏注册新用户 data.id
					dr_form_tips('username', true, data.code);
					$(".reg").hide();
					return true;
				}
			},
			error: function(HttpRequest, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + HttpRequest.statusText + "\r\n" + HttpRequest.responseText);
			}
		});
	}
}
</script>
<div class="table-list" style="width:530px;max-height:400px;overflow-x:hidden;overflow-y:auto">
<form action="" method="post" id="myform" name="myform" onsubmit="return dr_form_check()">
<input name="mark" id="mark" type="hidden" value="0">
<table width="100%" class="table_form">
<tr>
    <th width="100"><font color="red">*</font>&nbsp;<?php echo fc_lang('登录账号'); ?>： </th>
    <td><?php if ($data['username']) {  echo $data['username']; ?><div class="onShow" id="dr_username_tips"><?php echo fc_lang('修改密码等资料信息请到"会员管理"去修改'); ?></div><?php } else { ?><input class="input-text" type="text" name="data[username]" id="dr_username" onblur="_check_username()" value="<?php echo $data['username']; ?>" size="20" /><div class="onShow" id="dr_username_tips"><?php echo fc_lang('可以是现存会员表中的会员账号'); ?></div><?php } ?></td>
</tr>
<tr>
    <th>&nbsp;<?php echo fc_lang('管理名称'); ?>： </th>
    <td><input class="input-text" type="text" name="data[realname]" id="dr_realname" value="<?php echo $data['realname']; ?>" size="20" /></td>
</tr>
<tr class="reg" style="display:none">
    <th><font color="red">*</font>&nbsp;<?php echo fc_lang('登录密码'); ?>： </th>
    <td><input class="input-text" type="text" name="data[password]" id="dr_password" value="<?php echo $data['password']; ?>" size="20" /><div class="onShow" id="dr_password_tips">&nbsp;</div></td>
</tr>
<tr class="reg" style="display:none">
    <th><font color="red">*</font>&nbsp;<?php echo fc_lang('安全邮箱'); ?>： </th>
    <td><input class="input-text" type="text" name="data[email]" id="dr_email" value="<?php echo $data['email']; ?>" size="30" /><div class="onShow" id="dr_email_tips">&nbsp;</div></td>
</tr>
<tr class="reg" style="display:none">
	<th><font color="red">*</font>&nbsp;<?php echo fc_lang('手机号码'); ?>： </th>
	<td><input class="input-text" type="text" name="data[phone]" id="dr_phone" value="<?php echo $data['phone']; ?>" size="25" /><div class="onShow" id="dr_phone_tips"></div></td>
</tr>
<tr>
    <th>&nbsp;<?php echo fc_lang('快捷菜单'); ?>： </th>
    <td><font color="gray" style="float:left"><?php echo fc_lang('归属于后台首页"第一个分组菜单"的下级菜单'); ?></font><a class="add" title="<?php echo fc_lang('添加'); ?>" href="javascript:;" onClick="add_menu()" style="background-repeat:no-repeat;padding-left:20px;width:auto"></a></td>
</tr>
<tr>
    <th colspan="2">
<div id="menu_body" style="width:530px; overflow:hidden">
<?php if (!empty($data['usermenu'])) {  if (is_array($data['usermenu'])) { $count=count($data['usermenu']);foreach ($data['usermenu'] as $k=>$t) { ?>
<table width="100%" class="menu-sort">
<tbody>
<tr>
    <td width="140"><?php echo fc_lang('名称'); ?>：<input class="input-text" type="text" name="data[usermenu][name][<?php echo $k; ?>]" value="<?php echo $t['name']; ?>" style="width:90px" /></td>
    <td align="left" style="width:320px">URL：<input class="input-text" type="text" name="data[usermenu][url][<?php echo $k; ?>]" value="<?php echo $t['url']; ?>" style="width:270px" /></td>
    <td align="left"><a class="del" title="<?php echo fc_lang('删除'); ?>" href="javascript:;" onClick="remove_menu(this)"></a></td>
</tr>
</tbody>
</table>
<?php } }  } ?>
</div>
  	</th>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
function add_menu() {
    var data = '<table width="100%" class="menu-sort ui-sortable"><tbody><tr><td width="140"><?php echo fc_lang('名称'); ?>：<input class="input-text" type="text" name="data[usermenu][name][]" value="" style="width:90px" /></td><td align="left" style="width:320px">URL：<input class="input-text" type="text" name="data[usermenu][url][]" style="width:270px" /></td><td align="left"><a class="del" title="<?php echo fc_lang('删除'); ?>" href="javascript:;" onClick="remove_menu(this)"></a></td></tr></tbody></table>';
	$('#menu_body').append(data);
}
function remove_menu(_this) {
	$(_this).parent().parent().parent().remove();
}
</script>