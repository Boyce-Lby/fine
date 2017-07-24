<?php if ($fn_include = $this->_include("mheader.html")) include($fn_include); ?>

    <!--面包屑导航开始-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <span style="font-size:30px;">哮天犬</span>忠诚·美好·生活
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="index.html">首页</a></li>
                        <li class="active">注册</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--面包屑导航结束-->

    <!--container start-->
    <div class="my_con" style="min-height:0;">
        <div class="registration-bg" style="min-height:0;">
            <div class="container">

                <form class="form-signin wow fadeInUp" id="register" action="" method="post">
                    <input type="hidden" name="back" value="<?php echo $back_url; ?>">
                    <input type="hidden" name="data[email]" value="example@xx.com" />
                    <h2 class="form-signin-heading">注册账号</h2>
                    <div class="login-wrap">
                        <div class="form-group">
                            <input type="text" name="data[username]" id="mobile" maxlength="11" class="form-control" placeholder="请输入手机号" autofocus required>
                            <span id="mobileMsg" class="help-block m-b-none"></span>
                        </div>
                        <div class="form-group">

                            <input type="text" name="mobileCode" id="code" maxlength="4" class="form-control pull-left" placeholder="请输入短信验证码" style="width: 50%;" required>
                            <a style="color:#fff;margin: 3px;" class="btn btn-success" onclick="sendMobileCode();" id="send">获取短信验证码</a>
                            <span id="codeMsg" class="help-block m-b-none"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="data[password]" id="password" maxlength="15" class="form-control" placeholder="请输入密码" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="data[password2]" id="confirmPass" maxlength="15" class="form-control" placeholder="请再次输入密码" autofocus required>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" id="agree" name="agree" value="1" required>阅读并同意《<a  data-toggle="modal" data-target="#xieyi">哮天犬注册协议</a>》《<a  data-toggle="modal" data-target="#tiaokuan">隐私条款</a>》
                            </label>
                            </div>

                        </div>

                        <button class="btn btn-lg btn-login btn-block" type="submit">注册</button>

                        <div class="registration">
                            已经有账户了 ?
                            <a class="" href="<?php echo dr_member_url('login/index'); ?>">
                            登录
                        </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--container end-->
    <!-- 协议Modal -->
    <div class="modal fade" id="xieyi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">哮天犬注册协议</h4>
                </div>
                <div class="modal-body" style="height:500px;">
                    <iframe src="xieyi.html" frameborder="0" width="100%" height="100%"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 条款Modal -->
    <div class="modal fade" id="tiaokuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">隐私条款</h4>
                </div>
                <div class="modal-body" style="height:500px;">
                    <iframe src="tiaokuan.html" frameborder="0" width="100%" height="100%"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php if ($fn_include = $this->_include("mfooter.html")) include($fn_include); ?>
    <script src="<?php echo THEME_PATH; ?>xtq/js/jquery.validate.min.js"></script>
    <script src="<?php echo THEME_PATH; ?>xtq/js/validate.messages_zh.js"></script>


    <!--common script for all pages-->
    <script src="<?php echo THEME_PATH; ?>xtq/js/common-scripts.js"></script>


    <script src="<?php echo THEME_PATH; ?>xtq/js/wow.min.js"></script>
    <script>
        wow = new WOW({
            boxClass: 'wow', // default
            animateClass: 'animated', // default
            offset: 0 // default
        })
        wow.init();
        $().ready(function() {
            $("#register").validate({
                submitHandler: function(form) {
                    // debug:true;
                    var post = $("#register").serialize();
                    $.ajax({type: "POST",dataType:"json", url: "<?php echo dr_now_url(); ?>", data: post,
                        success: function(data) {
                            if (data.status) {
                                dr_tips('注册成功，即将为您跳转....', 3, 1);
                                setTimeout('window.location.href="'+data.backurl+'"', 2000);
                                var sync_url = data.syncurl;
                                // 发送同步登录信息
                                for(var i in sync_url){
                                    $.ajax({
                                        type: "GET",
                                        async: false,
                                        url:sync_url[i],
                                        dataType: "jsonp",
                                        success: function(json){ },
                                        error: function(){ }
                                    });
                                }
                            } else {
                                dr_tips(data.code);
                            }
                        },
                        error: function(HttpRequest, ajaxOptions, thrownError) {
                            alert(HttpRequest.responseText);
                        }
                    });
                },
                rules: {
                    "data[username]": {
                        isMobile: true
                    }
                }
            });
        });
        /**
         * 发送短信验证码
         */
        function sendMobileCode() {
            // if (checkMobile()) {
            //     sendCode();
            // }
            var post = $("#register").serialize();
                    $.ajax({type: "POST",dataType:"json", url: "http://myxtq.com/index.php?s=member&c=register&m=myCheckUsername", data: post,
                        success: function(data) {
                            if (data.status) {
                                //获取短信
                                
                            } else {
                                dr_tips(data.code);
                            }
                        },
                        error: function(HttpRequest, ajaxOptions, thrownError) {
                            alert(HttpRequest.responseText);
                        }
                    });
        }
    </script>

</body>

</html>