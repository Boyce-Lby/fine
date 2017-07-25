<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; Charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>">
    <meta name="description" content="<?php echo $meta_description; ?>">
    <link rel="shortcut icon" href="<?php echo THEME_PATH; ?>favicon.png">

    <title><?php echo $meta_title; ?></title>

    <!-- CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo THEME_PATH; ?>xtq/css/theme.css" rel="stylesheet">
    <link href="<?php echo THEME_PATH; ?>xtq/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo THEME_PATH; ?>xtq/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo THEME_PATH; ?>xtq/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_PATH; ?>xtq/css/component.css">
    <link href="<?php echo THEME_PATH; ?>xtq/css/style.css" rel="stylesheet">
    <link href="<?php echo THEME_PATH; ?>xtq/css/style-responsive.css" rel="stylesheet" />


    <script type="text/javascript">
        var memberpath = "<?php echo MEMBER_PATH; ?>";
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo THEME_PATH; ?>xtq/js/html5shiv.js">
    </script>
    <script src="<?php echo THEME_PATH; ?>xtq/js/respond.min.js">
    </script>
    <![endif]-->
</head>

<body>
    <!--头部开始-->
    <header class="head-section">
        <div class="navbar navbar-default navbar-static-top container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="/"><img src="/statics/logo2.png" /></a>
                <!-- <a class="navbar-brand" href="index.html"><img src="<?php echo THEME_PATH; ?>xtq/img/logo.png"></a> -->
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">首页</a>
                    </li>
                    <?php $rt = $this->list_tag("action=category pid=0"); if ($rt) extract($rt); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                    <li>
                        <a href="<?php echo $t['url']; ?>"><?php echo $t['name']; ?></a>
                    </li>
                    <?php } }  if ($member) { ?>
                    <li>
                        <a href="<?php echo MEMBER_URL; ?>">个人中心</a>
                    </li>
                    <li>
                        <a href="<?php echo dr_member_url('login/out'); ?>">退出</a>
                    </li>
                    <?php } else { ?>
                    <li>
                        <a href="<?php echo dr_member_url('login/index'); ?>">登录</a>
                    </li>
                    <li>
                        <a href="<?php echo dr_member_url('register/index'); ?>">注册</a>
                    </li>
                    <?php } ?>
                    <li>
                        <input class="form-control search" placeholder="搜索" type="text">
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!--头部结束-->