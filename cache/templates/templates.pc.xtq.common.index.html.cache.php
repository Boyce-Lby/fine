<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<link rel="stylesheet" type="text/css" href="<?php echo THEME_PATH; ?>xtq/css/parallax-slider/parallax-slider.css" />
<link rel="stylesheet" href="<?php echo THEME_PATH; ?>xtq/assets/owlcarousel/owl.carousel.css">
<link rel="stylesheet" href="<?php echo THEME_PATH; ?>xtq/assets/owlcarousel/owl.theme.css">
<link rel="stylesheet" href="<?php echo THEME_PATH; ?>xtq/css/flexslider.css" />
<link href="<?php echo THEME_PATH; ?>xtq/assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
<!-- 轮播开始 -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="#"><img src="<?php echo THEME_PATH; ?>xtq/img/sylb1.jpg" data-holder-rendered="true"></a>
        </div>
        <div class="item">
            <a href="#"><img src="<?php echo THEME_PATH; ?>xtq/img/sylb2.jpg" data-holder-rendered="true"></a>
        </div>
    </div>
</div>
<!-- 轮播结束 -->
<?php $rt_aa = $this->list_tag("action='form' field='title'  return=aa"); if ($rt_aa) extract($rt_aa); $count_aa=count($return_aa); if (is_array($return_aa)) { foreach ($return_aa as $key_aa=>$aa) {  echo var_dump($aa);  } } ?>
<div class="my_con">
    <!-- 新闻切换开始 -->
    <div class="container">

        <div class="row mar-b-15">
            <div class="col-lg-12">
                <!--切换标签开始-->
                <section class="tab wow fadeInLeft">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#news">
                                    <h4>热点动态</h4>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#events">
                                    <h4>新闻资讯</h4>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#notice-board">
                                    <h4>政策资讯</h4>
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content tasi-tab">
                            <div id="news" class="tab-pane fade in active">
                                <?php $rt = $this->list_tag("action=module catid=30 order=displayorder,updatetime page=1"); if ($rt) extract($rt); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                                <article class="media" style="width:100%;">
                                    <div class="media-body b-btm">
                                        <a href="<?php echo $t['url']; ?>" class=" p-head">
                                            <?php echo $t['title']; ?>
                                        </a>
                                        <p>
                                            <?php echo $t['description']; ?>
                                        </p>
                                        <i class="fa fa-time" style="float: right;"> <?php echo $t['updatetime']; ?></i>
                                    </div>

                                </article>
                                <?php } } ?>
                            </div>
                            <div id="events" class="tab-pane fade">
                                <?php $rt = $this->list_tag("action=module catid=22 order=displayorder,updatetime page=1"); if ($rt) extract($rt); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                                <article class="media" style="width:100%;">
                                    <div class="media-body b-btm">
                                        <a href="<?php echo $t['url']; ?>" class=" p-head">
                                            <?php echo $t['title']; ?>
                                        </a>
                                        <p>
                                            <?php echo $t['description']; ?>
                                        </p>
                                        <i class="fa fa-time" style="float: right;"> <?php echo $t['updatetime']; ?></i>
                                    </div>

                                </article>
                                <?php } } ?>
                            </div>
                            <div id="notice-board" class="tab-pane fade">
                                <?php $rt = $this->list_tag("action=module catid=22 order=displayorder,updatetime page=1"); if ($rt) extract($rt); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                                <article class="media" style="width:100%;">
                                    <div class="media-body b-btm">
                                        <a href="<?php echo $t['url']; ?>" class=" p-head">
                                            <?php echo $t['title']; ?>
                                        </a>
                                        <p>
                                            <?php echo $t['description']; ?>
                                        </p>
                                        <i class="fa fa-time" style="float: right;"> <?php echo $t['updatetime']; ?></i>
                                    </div>

                                </article>
                                <?php } } ?>
                            </div>
                        </div>
                    </div>
                </section>
                <!--切换标签结束-->
            </div>

        </div>
    </div>
    <!-- 新闻切换结束 -->

    <!--商品开始-->
    <div class="bg-lg">
        <div class="container mar-b-15">
            <div class="row">
                <div class="col-lg-12 recent">
                    <h3 class="recent-work">
                        热门商品
                    </h3>
                    <!-- <p>简单描述</p> -->
                    <div id="owl-demo" class="owl-carousel owl-theme wow fadeIn">

                        <div class="item view view-tenth">
                            <img src="<?php echo THEME_PATH; ?>xtq/img/works/img8.jpg" alt="work Image">
                            <div class="mask">
                                <ul class="list-unstyled price-type">
                                    <li>美的电冰箱</li>
                                    <li>价格：￥13133</li>
                                    <li><a href="#" class="btn btn-success">查看详情</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item view view-tenth">
                            <img src="<?php echo THEME_PATH; ?>xtq/img/works/img9.jpg" alt="work Image">
                            <div class="mask">
                                <ul class="list-unstyled price-type">
                                    <li>美的电冰箱</li>
                                    <li>价格：￥13133</li>
                                    <li><a href="#" class="btn btn-warning">查看详情</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item view view-tenth">
                            <img src="<?php echo THEME_PATH; ?>xtq/img/works/img10.jpg" alt="work Image">
                            <div class="mask">
                                <ul class="list-unstyled price-type">
                                    <li>美的电冰箱</li>
                                    <li>价格：￥13133</li>
                                    <li><a href="#" class="btn btn-warning">查看详情</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item view view-tenth">
                            <img src="<?php echo THEME_PATH; ?>xtq/img/works/img11.jpg" alt="work Image">
                            <div class="mask">
                                <ul class="list-unstyled price-type">
                                    <li>美的电冰箱</li>
                                    <li>价格：￥13133</li>
                                    <li><a href="#" class="btn btn-warning">查看详情</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item view view-tenth">
                            <img src="<?php echo THEME_PATH; ?>xtq/img/works/img12.jpg" alt="work Image">
                            <div class="mask">
                                <ul class="list-unstyled price-type">
                                    <li>美的电冰箱</li>
                                    <li>价格：￥13133</li>
                                    <li><a href="#" class="btn btn-warning">查看详情</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item view view-tenth">
                            <img src="<?php echo THEME_PATH; ?>xtq/img/works/img13.jpg" alt="work Image">
                            <div class="mask">
                                <ul class="list-unstyled price-type">
                                    <li>美的电冰箱</li>
                                    <li>价格：￥13133</li>
                                    <li><a href="#" class="btn btn-warning">查看详情</a></li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--商品结束-->
    </div>


    <!-- 社区生活开始 -->
    <div class="container">
        <div class="row mar-b-15">
            <div class="text-center feature-head wow fadeInDown animated" data-wow-animation-name="fadeInDown">
                <h3 class="">
                    社区生活
                </h3>

            </div>
            <div class="feature-box">
                <div class="col-md-4 col-sm-4 text-center wow fadeInUp">
                    <div class="feature-box-heading">
                        <em>
                <a href="#"><img src="<?php echo THEME_PATH; ?>xtq/img/works/img9.jpg" alt="" width="100%"></a>

                </em>
                        <h4>
                            <b>名字名字</b>
                        </h4>
                    </div>
                    <p class="text-center">
                        名字名字名字名字名字
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 text-center wow fadeInUp">
                    <div class="feature-box-heading">
                        <em>
                  <a href="#"><img src="<?php echo THEME_PATH; ?>xtq/img/works/img9.jpg" alt="" width="100%"></a>
                </em>
                        <h4>
                            <b>名字名字名字</b>
                        </h4>
                    </div>
                    <p class="text-center">
                        名字名字名字名字名字名字名字
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 text-center wow fadeInUp">
                    <div class="feature-box-heading">
                        <em>
                  <a href="#"><img src="<?php echo THEME_PATH; ?>xtq/img/works/img9.jpg" alt="" width="100%"></a>
                </em>
                        <h4>
                            <b>名字名字名字名字名字名字名字名字</b>
                        </h4>
                    </div>
                    <p class="text-center">
                        名字名字名字名字名字名字
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 text-center wow fadeInUp">
                    <div class="feature-box-heading">
                        <em>
                  <a href="#"><img src="<?php echo THEME_PATH; ?>xtq/img/works/img9.jpg" alt="" width="100%"></a>
                </em>
                        <h4>
                            <b>名字名字名字名字</b>
                        </h4>
                    </div>
                    <p class="text-center">
                        名字名字名字名字
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 text-center wow fadeInUp">
                    <div class="feature-box-heading">
                        <em>
                  <a href="#"><img src="<?php echo THEME_PATH; ?>xtq/img/works/img9.jpg" alt="" width="100%"></a>
                </em>
                        <h4>
                            <b>名字名字名字</b>
                        </h4>
                    </div>
                    <p class="text-center">
                        名字名字名字名字名字名字名字名字名字名字
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 text-center wow fadeInUp">
                    <div class="feature-box-heading">
                        <em>
                  <a href="#"><img src="<?php echo THEME_PATH; ?>xtq/img/works/img9.jpg" alt="" width="100%"></a>
                </em>
                        <h4>
                            <b>名字名字名字</b>
                        </h4>
                    </div>
                    <p class="text-center">
                        名字名字名字名字名字名字名字
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- 社区生活结束 -->


    <div class="hr"></div>
    <!-- 友情链接开始 -->
    <div class="container">
        <div class="row mar-b-15 our-clients">
            <div class="col-md-3">
                <h3>
                    友情链接
                </h3>
            </div>
            <div class="col-md-9">
                <?php echo dr_block(3); ?>
            </div>
        </div>
    </div>
    <!-- 友情链接结束 -->
</div>

<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>


<script type="text/javascript" src="<?php echo THEME_PATH; ?>xtq/js/hover-dropdown.js"></script>
<script defer src="<?php echo THEME_PATH; ?>xtq/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo THEME_PATH; ?>xtq/assets/bxslider/jquery.bxslider.js"></script>

<script type="text/javascript" src="<?php echo THEME_PATH; ?>xtq/js/jquery.parallax-1.1.3.js"></script>
<script src="<?php echo THEME_PATH; ?>xtq/assets/owlcarousel/owl.carousel.js"></script>


<script src="<?php echo THEME_PATH; ?>xtq/js/jquery.easing.min.js"></script>
<script src="<?php echo THEME_PATH; ?>xtq/js/link-hover.js"></script>
<script type="text/javascript" src="<?php echo THEME_PATH; ?>xtq/js/parallax-slider/jquery.cslider.js"></script>
<script type="text/javascript" src="<?php echo THEME_PATH; ?>xtq/js/parallax-slider/modernizr.custom.28468.js"></script>





<script>
    $('a.info').tooltip();

    $(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
    // 热门产品滚动
    $(document).ready(function() {

        $("#owl-demo").owlCarousel({

            items: 4,
            autoPlay: true,
            slideSpeed: 2000,
            stopOnHover: true

        });

    });


    new WOW().init();
</script>
</body>

</html>