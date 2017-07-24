<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script>
// 复制内容
function dr_copy_content(id) {
    art.dialog.confirm("<?php echo fc_lang('您确定要这样操作吗？'); ?>", function(){
        // 将表单数据ajax提交验证
        $.ajax({type: "POST",dataType:"json", url: "<?php echo dr_url('urlrule/copy/'); ?>&id="+id,success: function(data) {
            if (data.status == 1) {
                dr_tips(data.code, 3, 1);
                setTimeout('window.location.reload(true)', 3000); // 刷新页
            } else {
                dr_tips(data.code);
            }
        },
            error: function(HttpRequest, ajaxOptions, thrownError) {
                alert(HttpRequest.responseText);
            }
        });
        return true;
    });
}
</script>

<div class="page-bar">
	<ul class="page-breadcrumb mylink">
		<?php echo $menu['link']; ?>

	</ul>
	<ul class="page-breadcrumb myname">
		<?php echo $menu['name']; ?>
	</ul>
	<div class="page-toolbar">
		<div class="btn-group pull-right">
			<button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-hover="dropdown"> <?php echo fc_lang('操作菜单'); ?>
				<i class="fa fa-angle-down"></i>
			</button>
			<ul class="dropdown-menu pull-right" role="menu">
				<?php if (is_array($menu['quick'])) { $count=count($menu['quick']);foreach ($menu['quick'] as $t) { ?>
				<li>
					<a href="<?php echo $t['url']; ?>"><?php echo $t['icon'];  echo $t['name']; ?></a>
				</li>
				<?php } } ?>
				<li class="divider"> </li>
				<li>
					<a href="javascript:window.location.reload();">
						<i class="icon-refresh"></i> <?php echo fc_lang('刷新页面'); ?></a>
				</li>
			</ul>
		</div>
	</div>
</div>
<h3 class="page-title">
	<small><?php echo fc_lang('通过URL规则可以对URL地址进行个性化设置！'); ?></small>
</h3>

<form action="" method="post" name="myform" id="myform">
	<div class="portlet mylistbody">
		<div class="portlet-body">
			<div class="table-scrollable">

				<table class="mytable table table-striped table-bordered table-hover table-checkable dataTable">

		<thead>
		<tr>
			<th width="20"></th>
			<th><?php echo fc_lang('名称'); ?></th>
			<th><?php echo fc_lang('类型'); ?></th>
			<th class="dr_option"><?php echo fc_lang('操作'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
		<tr>
			<td><input name="ids[]" type="checkbox" class="dr_select toggle md-check" value="<?php echo $t['id']; ?>" /></td>
			<td><?php if ($this->ci->is_auth('admin/urlrule/edit')) { ?><a href="<?php echo dr_url('urlrule/edit',array('id'=>$t['id'])); ?>"><?php echo $t['name']; ?></a><?php } else {  echo $t['name'];  } ?></td>
			<td><span class="badge badge-<?php echo $color[$t['type']]; ?>"> <?php echo $type[$t['type']]; ?> </span></td>
			<td class="dr_option">
			<?php if ($this->ci->is_auth('admin/urlrule/edit')) { ?><a class="aedit" href="<?php echo dr_url('urlrule/edit',array('id'=>$t['id'])); ?>"><i class="fa fa-edit"></i> <?php echo fc_lang('修改'); ?></a><?php }  if ($this->ci->is_auth('admin/urlrule/edit')) { ?><a class="ago" onclick="dr_copy_content(<?php echo $t['id']; ?>)" href="javascript:;"><i class="fa fa-copy"></i> 复制</a><?php } ?>
			</td>
		</tr>
		<?php } } ?>
		<tr class="mtable_bottom">
			<th><input name="dr_select" id="dr_select" class="toggle md-check" type="checkbox" onClick="dr_selected()" /></th>
			<td colspan="5" >
			<?php if ($this->ci->is_auth('admin/urlrule/del')) { ?>
				<button type="button" class="btn red btn-sm" name="option" onClick="dr_confirm_set_all('<?php echo fc_lang('<font color=red><b>删除之后它的URL规则将会失效，您确定要删除吗？</b></font>'); ?>')"><i class="fa fa-trash"></i> <?php echo fc_lang('删除'); ?></button>
			<?php } ?>
			</td>
		</tr>
		</tbody>
		</table>
		</div>
	</div>
</div>

</form>
<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>