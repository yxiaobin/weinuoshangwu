(function () {
    // 安全退出 #logout
    // 登录 #login
    // 注册 #register
    // 登录注册弹窗 function  loginOpen(). 0: login; 1: register.
    var $doms = $("#loginStatus");
    var _body = $("body");
    var linkUrl = "http://www.gongsibao.com";
    var interfaceUrl = "http://www.gongsibao.com";
    var loginStatus;
    var register = false;
    var isMobilePhone17 = function (str) {
        // return /^(\+?0?86\-?)?((13\d|14[57]|15[^4,\D]|17\d|18\d)\d{8}|170[059]\d{7})$/.test(str);
        return true
    };
    if ($doms.length > 0) {
        function accountinfo() {
            $.ajax({
                url: interfaceUrl + "/gongsibao-web/web/account/accountinfo",
                type: "get",
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true,
                success: function (data) {
                    if (data.code == 200) {
                        $doms.html('<div class="after-landing posr">' +
                            '<a href="' + linkUrl + '/my/order_list.html">' + data.data.mobilePhone + '</a>' +
                            '<div class="personal-list-index posa">' +
                            '<i class="personal-list-top posa"></i>' +
                            '<ul class="pt10 pb10">' +
                            '<li class="pl10 pr10">' +
                            '<a class="show p0 m0" href="' + linkUrl + '/my/order_list.html" title="我的订单" target="_blank"><i class="personal-list-ico0"></i>我的订单</a>' +
                            '</li>' +
                            '<li class="pl10 pr10">' +
                            '<a class="show p0 m0" href="' + linkUrl + '/my/coupon.html" title="我的订单" target="_blank"><i class="personal-list-ico1"></i>我的优惠券</a>' +
                            '</li>' +
                            '<li class="pl10 pr10">' +
                            '<a class="show p0 m0" href="' + linkUrl + '/my/account.html" title="我的订单" target="_blank"><i class="personal-list-ico2"></i>安全设置</a>' +
                            '</li>' +
                            '<li class="pl10 pr10">' +
                            '<a id="logout" class="show p0 m0" href="javascript:;" title="安全退出"><i class="personal-list-ico3"></i>安全退出</a>' +
                            '</li>' +
                            '</ul>' +
                            '</div>' +
                            '</div>');
                    } else {
                        $doms.html('<span id="loginBtn">登录</span><em>|</em><span id="registerBtn">注册</span>');
                        $.ajax({
                            url: '/cmsapi/gethtml.api',
                            success: function (data) {
                                _body.append(data.data);
                                _body.find("#js_loginPopup").css({"top": ($(window).height() - 568) / 2 + "px"});
                                _body.find("#loginTip").css({"top": ($(window).height() - 110) / 2 + "px"});
                            }
                        });
                    }
                }
            });
        }

        accountinfo();

        $doms.unbind("click").on("click", "#logout", function () {
            $.get({
                url:interfaceUrl + "/gongsibao-web/web/account/accountloginout",
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true,
                success:function () {
                location.href = "/";
            }});
        });
        $doms.on("click", "#loginBtn", function () {
            loginOpen(0);
        });
        $doms.on("click", "#registerBtn", function () {
            loginOpen(1);
        });
        _body.on("click", ".js-tab-title-loginRegTab", function () {
            loginOpen($(this).index());
        });
        var popTab, popBody;

        function loginOpen(index) {
            popTab = _body.find(".js-tab-title-loginRegTab");
            popBody = _body.find(".js-tab-body-loginRegTab");
            _body.find("#closeLogin").fadeIn();
            _body.find("#js_loginPopup").fadeIn();
            popTab.removeClass("sp");
            popBody.hide();
            popTab.eq(index).addClass("sp");
            popBody.eq(index).show();
            reloadValidatePic();
        }

        /* 获取图片验证码 */
        var randomKey = "";

        function reloadValidatePic() {
            if (!randomKey) {
                $.get("/cmsapi/getrandomkey.api", function (data) {
                    randomKey = data.data;
                    $(".js-reloadcode").attr("src", interfaceUrl + "/gongsibao-sys/captcha?randomKey=" + randomKey + "&_t=" + new Date().getTime());
                });
            } else {
                $(".js-reloadcode").attr("src", interfaceUrl + "/gongsibao-sys/captcha?randomKey=" + randomKey + "&_t=" + new Date().getTime());
            }
        }

        _body.on("click", ".js-reloadcode", function () {
            reloadValidatePic();
        });
        /* 登录 */
        _body.on("click", "#loginSubmit", function () {
            var _this = _body.find("#loginForm");
            var loginname = _this.find("input[name='username']").val();
            var passwd = _this.find("input[name='password']").val();
            var captcha = _this.find("input[name='mobile-img-code']").val();

            if (!isMobilePhone17(loginname)) {
                tipPop("手机号格式不正确");
                return false;
            }
            if (passwd == "") {
                tipPop("请输入密码");
                return false;
            }
            $.ajax({
                url: interfaceUrl + "/gongsibao-web/web/account/accountlogin",
                type: "post",
                data: {
                    captcha: captcha,
                    randomkey: randomKey,
                    loginname: loginname,
                    passwd: passwd
                },
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true,
                success: function (data) {
                    if (data.code == 200) {
                        window.location.reload();
                    } else if (data.code == -2) {
                        //需要验证码
                        $("#loginImgCode").show();
                        reloadValidatePic();
                        tipPop(data.msg);
                    } else {
                        tipPop(data.msg);
                    }
                }
            });
            return false;
        });
        /* 注册 */
        _body.on("click", "#registerSubmit", function () {
            var _this = _body.find("#registForm");
            var mobile = _this.find('input[name=mobile]').val();
            var password = _this.find('input[name=password]').val();
            var password1 = _this.find('input[name=password1]').val();
            var mobileCode = _this.find('input[name=mobile-code]').val();
            var protocol = _this.find('input[name=protocol]');

            if (!protocol.is(':checked')) {
                tipPop("请同意《公司宝服务协议》");
                return;
            }
            if (!isMobilePhone17(mobile)) {
                tipPop("手机号格式不正确");
                return false;
            }

            if (password != password1) {
                tipPop("密码和确认密码不一致");
                return;
            }

            if (mobileCode.length != 6) {
                tipPop("手机验证码格式不正确");
                return;
            }

            $.ajax({
                url: interfaceUrl + '/gongsibao-web/web/account/register',
                type: 'get',
                dataType: 'json',
                data: {
                    loginname: mobile,
                    passwd: password,
                    passwdconfirm: password1,
                    randomkey: randomKey,
                    verifycode: mobileCode
                },
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true,
                success: function (data) {
                    if (data.code == 200) {
                        tipPop("注册成功");
                        register = true;
                    } else {
                        tipPop("注册失败：" + data.msg);
                    }
                }
            });
            return false;
        });
        // 短信验证码
        _body.on('keyup', "#registerImgCode", function () {
            if ($(this).val().length == 4) {
                _body.find("#registGetPhoneCode").removeClass('btn-gray').attr('v', '0');
            }
            else {
                _body.find("#registGetPhoneCode").addClass('btn-gray').attr('v', '1');
            }
        });
        _body.on("click", "#registGetPhoneCode", function () {
            if ($(this).attr("v") == 0) {
                var _this = _body.find("#registForm");
                var mobilePhone = _this.find("input[name=mobile]").val();
                var imgCode = _this.find('input[name=mobile-img-code]').val();
                if (isMobilePhone17(mobilePhone)) {
                    time();
                    $.ajax({
                        type: 'get',
                        url: interfaceUrl + "/gongsibao-web/web/account/sendcode",
                        data: {
                            mobilephone: mobilePhone,
                            randomkey: randomKey,
                            captcha: imgCode
                        },
                        xhrFields: {
                            withCredentials: true
                        },
                        crossDomain: true,
                        dataType: 'json',
                        success: function (data) {
                            if (data.code == 200) {
                                tipPop("验证码发送成功");
                            } else {
                                tipPop("短信发送失败：" + data.msg);
                                reloadValidatePic();
                                clearTimeout(sendMobile);
                                var o = _body.find('#registGetPhoneCode');
                                o.removeClass('btn-gray').attr('v', '0');
                                o.text('获取验证码');
                            }
                        }
                    });
                } else {
                    tipPop("短信发送失败：手机号格式不正确");
                    return false;
                }
            }
        });
        var wait = 60, sendMobile;

        function time() {
            var btn = _body.find('#registGetPhoneCode');
            if (wait == 0) {
                btn.removeClass('btn-gray').attr('v', '0');
                btn.text('获取验证码');
                wait = 60;
            } else {
                btn.addClass('btn-gray').attr('v', '1');
                btn.text(wait + '秒后可重发');
                wait--;
                sendMobile = setTimeout(function () {
                    time();
                }, 1000);
            }
        }

        /* 提示弹窗 */
        function tipPop(msg) {
            _body.find("#loginTipText").text(msg);
            _body.find("#loginTipMask").fadeIn();
            _body.find("#loginTip").fadeIn();
        }

        _body.on("click", "#loginTipMask", function () {
            popTipClose();
        });
        _body.on("click", "#loginTipClose", function () {
            popTipClose();
        });
        function popTipClose() {
            if (register) {
                window.location.reload();
            } else {
                _body.find("#loginTipMask").hide();
                _body.find("#loginTip").hide();
            }
        }

        /* 关闭弹窗 */
        _body.on("click", "#closeLogin", function () {
            popClose();
        });
        _body.on("click", ".js-loginPop-close", function () {
            popClose();
        });
        function popClose() {
            _body.find("#closeLogin").fadeOut();
            _body.find("#js_loginPopup").fadeOut();
            popTab.removeClass("sp");
            popBody.fadeOut();
        }
    }
})();
