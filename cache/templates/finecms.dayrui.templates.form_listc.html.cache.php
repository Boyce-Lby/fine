<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
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

<div class="mytopsearch">
	<form class="row" method="post" action="" name="searchform" id="searchform">
		<input name="search" id="search" type="hidden" value="1" />
		<div class="col-md-12">
			<label>
				<select name="data[field]" class="form-control">
					<option value="id" <?php if ($param['field']=='id') { ?>selected<?php } ?>>Id</option>
					<option value="uid" <?php if ($param['field']=='uid') { ?>selected<?php } ?>>Uid</option>
					<?php if (is_array($field)) { $count=count($field);foreach ($field as $t) {  if ($t['ismain'] && $t['fieldname'] != 'inputtime') { ?>
					<option value="<?php echo $t['fieldname']; ?>" <?php if ($param['field']==$t['fieldname']) { ?>selected<?php } ?>><?php echo $t['name']; ?></option>
					<?php }  } } ?>
				</select>
			</label>
			<label><i class="fa fa-caret-right"></i></label>
			<label style="padding-right: 20px;"><input type="text" class="form-control" placeholder="<?php echo fc_lang('多个Id可以用“,”分隔'); ?>" value="<?php echo $param['keyword']; ?>" name="data[keyword]" /></label>

			<label><?php echo fc_lang('录入时间'); ?> ：</label>
			<label><?php echo dr_field_input('start', 'Date', array('option'=>array('format'=>'Y-m-d','width'=>'100')), (int)$param['start']); ?></label>
			<label><i class="fa fa-minus"></i></label>
			<label style="margin-right:10px"><?php echo dr_field_input('end', 'Date', array('option'=>array('format'=>'Y-m-d','width'=>'100')), (int)$param['end']); ?></label>
			<label><button type="submit" class="btn green btn-sm" name="submit" > <i class="fa fa-search"></i> <?php echo fc_lang('搜索'); ?></button></label>
		</div>
	</form>
</div>

<form action="" method="post" name="myform" id="myform">
	<input name="action" id="action" type="hidden" value="" />
<div class="portlet mylistbody">
	<div class="portlet-body">
		<div class="table-scrollable">

			<table class="mytable table table-striped table-bordered table-hover table-checkable dataTable">

					<thead>
					<tr>
						<th align=""></th>
						<th width="50" class="<?php echo ns_sorting('displayorder'); ?>" name="displayorder" ><?php echo fc_lang('排序'); ?></th>
						<th class="<?php echo ns_sorting('title'); ?>" name="title"><?php echo fc_lang('标题'); ?></th>
						<th width="150" class="<?php echo ns_sorting('author'); ?>" name="author"><?php echo fc_lang('录入作者'); ?></th>
						<th width="150" class="<?php echo ns_sorting('inputtime'); ?>" name="inputtime"><?php echo fc_lang('录入时间'); ?></th>
						<th align="left" class="dr_option"><?php echo fc_lang('操作'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
					<tr>
						<td><input name="ids[]" type="checkbox" class="dr_select toggle md-check" value="<?php echo $t['id']; ?>" /></td>
						<td><input class="input-text displayorder" type="text" name="data[<?php echo $t['id']; ?>][displayorder]" value="<?php echo $t['displayorder']; ?>" /></td>
						<td><a href="<?php echo dr_url('fcontent/edit',array('mid'=>$mid, 'id' => $t['id'])); ?>"><?php echo dr_keyword_highlight($t['title'], $param['keyword']); ?></a></td>
						<td><a href="javascript:;" onclick="dr_dialog_member('<?php echo $t['uid']; ?>')"><?php echo dr_strcut($t['author'], 10); ?></a></td>
						<td><?php echo dr_date($t['inputtime'], NULL, 'red'); ?></td>
						<td>
							<a class="btn green btn-xs" href="<?php echo dr_url('fcontent/edit',array('mid'=>$mid, 'id' => $t['id'])); ?>"> <i class="fa fa-edit"></i> <?php echo fc_lang('修改'); ?></a>

						</td>
					</tr>
					<?php } } ?>
					<tr class="mtable_bottom">
						<th width="20" ><input name="dr_select" class="toggle md-check" id="dr_select" type="checkbox" onClick="dr_selected()" /></th>
						<td colspan="99" align="left">
							<?php if ($this->ci->is_auth($form.'/del')) { ?><button type="button" class="btn red btn-sm" name="option" onClick="$('#action').val('del');dr_confirm_set_all('<?php echo fc_lang('您确定要这样操作吗？'); ?>')"><i class="fa fa-trash"></i> <?php echo fc_lang('删除'); ?></button><?php }  if ($this->ci->is_auth($form.'/edit')) { ?><button type="button" class="btn green btn-sm" name="option" onClick="$('#action').val('order');dr_confirm_set_all('<?php echo fc_lang('您确定要这样操作吗？'); ?>')"><i class="fa fa-edit"></i> <?php echo fc_lang('排序'); ?></button>
							<div class="onShow"><?php echo fc_lang('排序值越大越靠前'); ?></div><?php } ?>
						</td>
					</tr>
					</tbody>
				</table>
		</div>

	</div>
</div>

</form>
<div id="pages"><a><?php echo fc_lang('共%s条', $total); ?></a><?php echo $pages; ?></div>

<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>