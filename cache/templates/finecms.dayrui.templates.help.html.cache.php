<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>

<form class="form-horizontal" action="http://www.dayrui.com/index.php" target="_blank" method="get" id="myform" name="myform">
	<input name="s" type="hidden" value="bbs">
	<input name="c" type="hidden" value="search" />
	<input name="catid" type="hidden" value="48" />
	<div class="page-bar">
		<ul class="page-breadcrumb mylink">
			<?php echo $menu['link']; ?>
			<li> <a href="http://www.dayrui.com/index.php?s=member&app=bbs&c=home&m=add&catid=48" target="_blank"><i class="fa fa-plus"></i> 我要提问</a>  </li>
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
		<small><a href="http://help.finecms.net" target="_blank"><?php echo fc_lang('帮助手册地址：help.finecms.net'); ?></a></small>
	</h3>
	<div class="portlet light bordered myfbody">

		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject font-green sbold uppercase"><?php echo fc_lang('搜索帮助'); ?></span>
			</div>
		</div>
		<div class="portlet-body">

			<div class="row">
				<div class="portlet-body form">

					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo fc_lang('关键词'); ?>：</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="keyword" style="width:300px;">
						</div>
					</div>
					<div class="form-group dvalue">
						<label class="col-md-2 control-label">&nbsp;</label>
						<div class="col-md-9" style="padding-top:8px;">
							<label><button type="submit" class="btn green noloading"> <i class="fa fa-search"></i> <?php echo fc_lang('在线搜索'); ?></button></label>
							<label><a href="http://www.dayrui.com/index.php?s=member&app=bbs&c=home&m=add&catid=48" target="_blank" class="btn  red "> <i class="fa fa-plus"></i> <?php echo fc_lang('我要提问'); ?></a></label>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</form>
<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>