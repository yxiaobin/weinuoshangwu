/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "http://s0.gongsibao.com/js/local/local/local/local/local/local/local/local/local/local/local/";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by shenshen on 16/1/28.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    document.domain = "gongsibao.com";
	    //发送crm数据请求
	    function getProxyData(url, action, data) {
	        if ($("#proxyFrame").length > 0) $("#proxyFrame").remove();
	        var iframe = document.createElement('iframe');
	        iframe.id = "proxyFrame";
	        iframe.name = "proxyFrame";
	        iframe.style.display = "none";
	        iframe.src = crmUrl + "/proxy.html";
	        document.body.appendChild(iframe);

	        $("#proxyFrame").load(function () {
	            $("#proxyFrame")[0].contentWindow.getData(url, action, data);
	        });
	    }
	    window.crmUrl = "http://crm.gongsibao.com";
	    window.getProxyData = getProxyData;
	    //接收数据
	    function backProxyData(data) {
	        var json = JSON.stringify(data.data);
	        eval(data.action + "Back({data:'" + json + "',status:'" + data.status + "',action:'" + data.action + "'})");
	    }

	    window.backProxyData = backProxyData;

	    var pagejob = __webpack_require__(1);
	    var jobs = __webpack_require__(2);
	    jobs.push(__webpack_require__(16)); //首页导航下拉

	    jobs.push(__webpack_require__(27));

	    jobs.push(__webpack_require__(28)); //地址选择
	    jobs.push(__webpack_require__(29)); // 行业特点
	    jobs.push(__webpack_require__(30)); // 供应商
	    jobs.push(__webpack_require__(34)); // 服务产品
	    jobs.push(__webpack_require__(35)); // 数量
	    jobs.push(__webpack_require__(36)); // 价钱
	    jobs.push(__webpack_require__(37)); // 数量 && 购买

	    // jobs.push(require("../units/item/comment")); // 评论
	    // jobs.push(require("../units/item/scope")); // 行业特点 经营范围



	    for (var i = 0; i < jobs.length; i++) {
	        var job = jobs[i];
	        pagejob.add(job);
	    }
	    pagejob.start();

	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by shenshen on 15/9/21.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var jobs = [];

	    var initJobs = [];

	    var execJobs = [];
	    var checkErrorJobs = [];
	    var initErrorJobs = [];

	    return {
	        add: function (job) {
	            if (job._jobName) {
	                jobs.push(job);
	            } else {
	                return null;
	            }
	        },
	        start: function () {
	            // check job
	            for (var i = 0; i < jobs.length; i++) {
	                var job = jobs[i];
	                try {
	                    var passed = job.check();
	                    if (passed) {
	                        initJobs.push(job);
	                    } else {
	                        //console.log(job._jobName + "check is  false,not exec ");
	                    }
	                } catch (e) {
	                    checkErrorJobs.push(job);
	                    throw new Error(job._jobName + ':job check error');
	                }
	            }
	            //job init start
	            for (var i = 0; i < initJobs.length; i++) {
	                var job = initJobs[i];
	                if (job.init) {
	                    //try {
	                        job.init();
	                        execJobs.push(job);
	/*                    } catch (e) {
	                        initErrorJobs.push(job);
	                        throw new Error(job._jobName + ':job init error');
	                    }*/
	                } else {
	                    execJobs.push(job);
	                    //console.log(job._jobName + "don't have init function");
	                }

	            }
	            //job exec start
	            for (var i = 0; i < execJobs.length; i++) {
	                var job = execJobs[i];
	                if (job.exec) {
	                    try {
	                        job.exec();
	                    } catch (e) {
	                        throw new Error(job._jobName + ':job exec error');
	                    }
	                }
	            }
	        }
	    }
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by jockey on 15/11/7.
	 * 公用组件集合
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    return [
	        __webpack_require__(3),                 //tab组件初始化
	        __webpack_require__(5),        //头部购物车数量
	        __webpack_require__(6),       //头部登录状态
	        __webpack_require__(10),    //登录注册弹窗
	        __webpack_require__(11),         //头部导航
	        __webpack_require__(12),         //返回顶部
	        __webpack_require__(13), // 悬浮的搜索导航
	        __webpack_require__(14),         //客服
	        __webpack_require__(15)
	        //require("./xiaoNeng")         //小能客服
	    ];
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by shenshen on 15/9/17.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var Tab = __webpack_require__(4);
	    var count = 5;
	    return {
	        _jobName: "tab",
	        check: function () {
	            return true;
	        },
	        init: function () {
	            function init(el) {
	                new Tab({
	                    el: el,
	                    tabName: el.attr("data-tab-name"),
	                    selectedcls: el.attr("data-tab-selcls"),
	                    focus: el.attr("data-tab-focus"),
	                    hoverChange: !!el.attr("data-tab-hoverchange")
	                });
	            }

	            G.customEvent.on("addNewTab", function (data) {
	                if (data.element) {
	                    init(data.element);
	                }
	            });
	            for (var i = 0; i < count; i++) {
	                var el = $("#data-tab-" + i);
	                if (el.length) {
	                    init(el);
	                }
	            }
	        },
	        exec: function () {

	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;!(__WEBPACK_AMD_DEFINE_RESULT__ = function (require, exports, module) {
	    var tabs = {};
	    var TabModel = Backbone.Model.extend({
	        defaults: {
	            focus: 0,
	            selectedcls: 'selected'
	        }
	    });
	    var TabView = Backbone.View.extend({
	        //el: '#widget-tab',
	        initialize: function (opt) {
	            if (opt.el) {
	                this.$el = opt.el;
	                this.tabName = opt.tabName || "";
	                if (this.tabName) {
	                    tabs[this.tabName] = this;
	                }
	            }
	            this._hoverChange = opt.hoverChange;

	            this._model = new TabModel();
	            this.listenTo(this._model, 'change', this.render);
	            if (opt.selectedcls) {
	                this._model.set({
	                    selectedcls: opt.selectedcls,
	                    focus: opt.focus || 0
	                });
	            }
	            var self = this;
	            this.events = {};
	            this.events["click .js-tab-title-" + this.tabName] = "changeTab";
	            if (this._hoverChange) {
	                this.events["mouseenter .js-tab-title-" + this.tabName] = "changeTab";
	            }
	            this.delegateEvents();
	        },
	        changeTab: function (e) {
	            var index = parseInt($(e.currentTarget || e.target).attr('data-index'));
	            this.select(index, true);

	        },
	        select: function (index, isUserClick) {
	            this._model.set({focus: index});
	            this.switchTab(isUserClick);
	            this.trigger("tabChanged", {
	                data: this._model.get()
	            })
	        },
	        render: function () {
	            //this.switchTab();
	        },
	        switchTab: function () {
	            var query = "";
	            if (this.tabName) {
	                query = "-" + this.tabName;
	            }
	            var index = this._model.get('focus');
	            var selectedcls = this._model.get("selectedcls");
	            this.$('.js-tab-title' + query).removeClass(selectedcls);
	            this.$('.js-tab-title' + query + '[data-index=' + index + ']').addClass(selectedcls);
	            this.$('.js-tab-body' + query).hide();
	            this.$('.js-tab-body' + query + ':eq(' + index + ')').show();
	        }
	    });
	    TabView.getTab = function (name) {
	        return tabs[name] || null;
	    };
	    module.exports = TabView;
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by liliy_000 on 2016/3/15.
	 */
	/*
	 $.ajax({
	 url: '/?m=content&c=index&a=get_cart_nums',
	 type: 'get',
	 dataType: 'json',
	 success: function (data) {
	 $('.topbar .cart em').text(data.data);
	 }
	 });
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var cartNumberElement = $("#cartNumber") || $('.topbar .cart em');
	    return {
	        _jobName: "topCart", // 头部购物车数量
	        check: function () {
	            return !!cartNumberElement.length;
	        },
	        init: function () {
	        },
	        exec: function () {
	            G.customEvent.on("login",function () {
	                getTopCartNum();
	            });
	            function getTopCartNum () {
	                $.ajax({
	                    url: '/?m=content&c=index&a=get_cart_nums',
	                    type: 'get',
	                    dataType: 'json',
	                    success: function (data) {
	                        cartNumberElement.text(data.data);
	                    }
	                });
	            }
	            getTopCartNum();
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by liliy_000 on 2016/3/16.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var userInfo = __webpack_require__(7);
	    var dom = $(".js-topState-userName");

	    function getTopState() {
	        userInfo.getInfo(function (data) {
	            G.cookie.set('isMobileCorrect', data.isMobileCorrect)
	            if (data.mobilePhone) {
	                dom.html(data.mobilePhone)
	            }
	        });
	    }

	    return {
	        _jobName: "topState",
	        check: function () {
	            return !!dom.length;
	        },
	        init: function () {
	            G.customEvent.on("login", function () {
	                getTopState();
	            });
	            G.customEvent.on("logout", function () {
	                dom.html("");
	            })
	        },
	        exec: function () {
	            getTopState();
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by shenshen on 15/10/9.
	 */

	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var loginAction = __webpack_require__(8);
	    var userInfo = null;
	    return {
	        isLogin: function () {
	             return !!G.cookie.get("COOKIE_ACCOUNT_LOGIN_TICKET");
	        },
	        getInfo: function (cb) {
	            if (userInfo) {
	                cb(userInfo);
	            } else {
	                $.get("/gongsibao-web/web/account/accountinfo", function (data) {
	                    cb(data.data);
	                })
	            }
	        },
	        reset: function (obj) {
	            userInfo = null;
	        },
	        needLogin: function (callback) {
	            if (!G._.isFunction(callback)) {
	                //todo return custom error
	                return null;
	            }
	            if (this.isLogin()) {
	                callback();
	            } else {

	                //run callback after login success
	                G.customEvent.once("login", callback);

	                //remove callback after loginPanel hide();
	                var loginLayerIndex = loginAction.open(0, {
	                    end: function () {
	                        G.customEvent.unbind("login", callback);
	                    }
	                });
	            }
	        },
	        isMobileCorrect: function (callback) {
	            if (!G._.isFunction(callback)) {
	                //todo return custom error
	                return null;
	            }
	            G.customEvent.once("login", callback);

	            //remove callback after loginPanel hide();
	            var loginLayerIndex = loginAction.open(2, {
	                end: function () {
	                    G.customEvent.unbind("login", callback);
	                }
	            });
	        }
	    }
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by liliy_000 on 2015/11/24.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    __webpack_require__(9);
	    var Tab = __webpack_require__(4);
	    var loginLayerIndex = null;
	    var randomKey = "";
	    if ($("#js-register-main").length > 0) {
	        reloadValidatePic();
	    }
	    function open(index, opt) {
	        if ( index*1 != 2 ) {
	            opt = G._.extend({
	                type: 1,
	                title: false,
	                closeBtn: true,
	                shadeClose: true,
	                area: '410px',
	                content: $('#js_loginPopup'),
	                success: function () {
	                    //初始化登录注册切换按钮
	                    reloadValidatePic();
	                    var loginRegTab = Tab.getTab("loginRegTab");
	                    if (!loginRegTab) {
	                        G.customEvent.trigger("addNewTab", {
	                            element: $("#login-popup-tab")
	                        });
	                    }
	                    loginRegTab = Tab.getTab("loginRegTab");
	                    loginRegTab.select(index);
	                }
	            }, opt);
	            return loginLayerIndex = layer.open(opt);
	        } else {
	            opt = G._.extend({
	                type: 1,
	                title: false,
	                closeBtn: true,
	                shadeClose: true,
	                area: '410px',
	                content: $('#js_bindMobile'),
	                success: function () {
	                    reloadValidatePic();
	                }
	            }, opt);
	            return loginLayerIndex = layer.open(opt);
	        }
	    }

	    //登录
	    $("#loginForm").on("submit", function () {
	        $.ajax({
	            url: "/gongsibao-web/web/account/accountlogin",
	            type: "post",
	            data: {
	                loginname: $("#loginForm [name='username']").val(),
	                passwd : $("#loginForm [name='password']").val(),
	                captcha: $("#loginForm [name='mobile-img-code']").val(),
	                randomkey: randomKey
	            },
	            success: function (data) {
	                if (data.code == 200) {
	                    /*var redirect = G.util.getUrlParam("redirect");
	                    if (redirect) {
	                        return location.href = decodeURIComponent(redirect);
	                    } else {
	                        return location.href = "/";
	                    }*/
	                    // 必须先触发login事件，最后关闭layer;
	                    G.customEvent.trigger("login");
	                    setTimeout(function () {
	                        $("#loginImgCode").hide();
	                        layer.close(loginLayerIndex);
	                    }, 0);
	                } else if (data.code == -2) {
	                    //需要验证码
	                    $("#loginImgCode").show();
	                    reloadValidatePic();
	                    layer.alert("登录失败：" + data.msg, {icon: 5});
	                } else {
	                    layer.alert("登录失败：" + data.msg, {icon: 5});
	                }
	            }
	        });
	        return false;
	    });
	    //注册
	    $("#registForm").on("submit", function () {
	        var _this = $(this);
	        var mobile = _this.find('input[name=mobile]').val();
	        var password = _this.find('input[name=password]').val();
	        var password1 = _this.find('input[name=password1]').val();
	        var mobileCode = _this.find('input[name=mobile-code]').val();

	        var protocol = _this.find('input[name=protocol]');

	        if (!protocol.is(':checked')) {
	            layer.alert("请同意《公司宝服务协议》", {icon: 5});
	            return;
	        }

	        if (!G.validate.isMobilePhone17(mobile)) {
	            layer.alert("手机号格式不正确", {icon: 5});
	            return;
	        }

	        if (password != password1) {
	            layer.alert("密码和确认密码不一致", {icon: 5});
	            return;
	        }

	        //if (!isPassword(password)) {
	        //    layer.alert("密码格式不正确,请输入6-26个字符,并至少包含一个字母", {icon: 5});
	        //    return;
	        //}

	        if (mobileCode.length != 6) {
	            layer.alert("手机验证码格式不正确", {icon: 5});
	            return;
	        }

	        $.ajax({
	            url: '/gongsibao-web/web/account/register',
	            type: 'get',
	            dataType: 'json',
	            data: {
	                loginname: mobile,
	                passwd: password,
	                passwdconfirm: password1,
	                randomkey: randomKey,
	                verifycode: mobileCode
	            },
	            success: function (data) {
	                if (data.code == 200) {
	                    layer.confirm("注册成功", {
	                        btn: "确定"
	                    }, function () {
	                        window.location.reload();
	                    }, function () {
	                        layer.closeAll();
	                    }, {icon: 1});
	                } else {
	                    layer.alert("注册失败：" + data.msg, {icon: 5});
	                }
	            }
	        });
	    });

	    // 绑定手机号
	    $("#bindMobileForm").on("submit", function () {
	        $.ajax({
	            url: '/gongsibao-web/web/account/bindMobile',
	            type: 'get',
	            dataType: 'json',
	            data: {
	                mobile: $("#bindMobileForm [name='mobile']").val(),
	                verifycode: $("#bindMobileForm [name='mobile-code']").val()
	            },
	            success: function (data) {
	                if (data.code == 200) {
	                    G.customEvent.trigger("login");
	                    setTimeout(function () {
	                        layer.close(loginLayerIndex);
	                    }, 0);
	                } else {
	                    layer.alert("绑定失败：" + data.msg, {icon: 5});
	                    $("#bindMobileGetPhoneCode").removeClass('btn-gray').attr('v', '0');
	                    $("#bindMobileGetPhoneCode").text('获取验证码');
	                    wait = 0
	                }
	            }
	        });
	    })

	    G.customEvent.on("loginHtmlDown", function () {
	        reloadValidatePic()
	    });
	    //图片验证码
	    function reloadValidatePic() {
	        if (!randomKey) {
	            $.get("/gongsibao-sys/captcha/randomkey", function (data) {
	                randomKey = data.data;
	                $(".js-reloadcode").attr("src", "/gongsibao-sys/captcha?randomKey=" + randomKey + "&_t=" + new Date().getTime());
	            });
	        } else {
	            $(".js-reloadcode").attr("src", "/gongsibao-sys/captcha?randomKey=" + randomKey + "&_t=" + new Date().getTime());
	        }
	    }

	    $(".js-reloadcode").on("click", function () {
	        reloadValidatePic();
	    });
	    G.customEvent.on("findPassword", function () {
	        reloadValidatePic();
	    });

	    //验证码输入正确后才可发送短信验证码
	    $("#registForm").find("input[name=mobile-img-code]").on('keyup', function () {
	        if ($(this).val().length == 4) {
	            $("#registGetPhoneCode").removeClass('btn-gray').attr('v', '0');
	        }
	        else {
	            $("#registGetPhoneCode").addClass('btn-gray').attr('v', '1');
	        }
	    });
	    $("#bindMobileForm").find("input[name=mobile-img-code]").on('keyup', function () {
	        if ($(this).val().length == 4) {
	            $("#bindMobileGetPhoneCode").removeClass('btn-gray').attr('v', '0');
	        }
	        else {
	            $("#bindMobileGetPhoneCode").addClass('btn-gray').attr('v', '1');
	        }
	    });

	    //点击发送手机验证码
	    $("#registGetPhoneCode").on("click", function () {
	        sendcode("#registForm", $(this))
	    });
	    $("#bindMobileGetPhoneCode").on("click", function () {
	        sendcode("#bindMobileForm", $(this))
	    });
	    function sendcode (form, obj) {
	        if (obj.attr("v") == 0) {
	            var mobilePhone = $(form + " input[name=mobile]").val();
	            var imgCode = $(form + ' input[name=mobile-img-code]').val() || '';
	            if (G.validate.isMobilePhone17(mobilePhone)) {
	                time(form, obj);
	                $.ajax({
	                    type: 'get',
	                    url: "/gongsibao-web/web/account/sendcode",
	                    data: {
	                        mobilephone: mobilePhone,
	                        randomkey: randomKey,
	                        captcha: imgCode
	                    },
	                    dataType: 'json',
	                    success: function (data) {
	                        if (data.code == 200) {
	                            layer.alert("验证码发送成功", {icon: 6});
	                        } else {
	                            layer.alert("短信发送失败：" + data.msg, {icon: 5});
	                            reloadValidatePic();
	                            clearTimeout(sendMobile);
	                            var o = $('#registGetPhoneCode');
	                            obj.removeClass('btn-gray').attr('v', '0');
	                            obj.text('获取验证码');
	                        }
	                    }
	                });
	            } else {
	                layer.alert("短信发送失败：手机号格式不正确", {icon: 5});
	                return false;
	            }
	        }
	    }
	    //倒计时效果
	    var wait = 60, sendMobile;

	    function time(form, obj) {
	        var btn = $('#registGetPhoneCode');
	        if (wait == 0) {
	            obj.removeClass('btn-gray').attr('v', '0');
	            obj.text('获取验证码');
	            wait = 60;
	        } else {
	            obj.addClass('btn-gray').attr('v', '1');
	            obj.text(wait + '秒后可重发');
	            wait--;
	            sendMobile = setTimeout(function () {
	                time(form, obj);
	            },
	            1000);
	        }
	    }

	    return {
	        open: open
	    }
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 9 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/*
	!layer - v1
	.9
	.3
	http://layer.layui.com/ */
	    ;
	!function (a, b) {
	    "use strict";
	    var c, d, e = {
	        getPath: function () {
	            var a = document.scripts, b = a[a.length - 1], c = b.src;
	            if (!b.getAttribute("merge"))return c.substring(0, c.lastIndexOf("/") + 1)
	        }(),
	        config: {},
	        end: {},
	        btn: ["&#x786E;&#x5B9A;", "&#x53D6;&#x6D88;"],
	        type: ["dialog", "page", "iframe", "loading", "tips"]
	    };
	    a.layer = {
	        v: "1.9.3",
	        ie6: !!a.ActiveXObject && !a.XMLHttpRequest,
	        index: 0,
	        path: e.getPath,
	        config: function (a, b) {
	            var d = 0;
	            return a = a || {}, layer.cache = e.config = c.extend(e.config, a), layer.path = e.config.path || layer.path, "string" == typeof a.extend && (a.extend = [a.extend]), layer.use("skin/layer.css", a.extend && a.extend.length > 0 ? function f() {
	                var c = a.extend;
	                layer.use(c[c[d] ? d : d - 1], d < c.length ? function () {
	                    return ++d, f
	                }() : b)
	            }() : b), this
	        },
	        use: function (a, b, d) {
	            var e = c("head")[0], a = a.replace(/\s/g, ""), f = /\.css$/.test(a), g = document.createElement(f ? "link" : "script"), h = "layui_layer_" + a.replace(/\.|\//g, "");
	            return layer.path ? (f && (g.rel = "stylesheet"), g[f ? "href" : "src"] = /^http:\/\//.test(a) ? a : layer.path + a, g.id = h, c("#" + h)[0] || e.appendChild(g), function i() {
	                (f ? 1989 === parseInt(c("#" + h).css("width")) : layer[d || h]) ? function () {
	                    b && b();
	                    try {
	                        f || e.removeChild(g)
	                    } catch (a) {
	                    }
	                }() : setTimeout(i, 100)
	            }(), this) : void 0
	        },
	        ready: function (a, b) {
	            var d = "function" == typeof a;
	            return d && (b = a), layer.config(c.extend(e.config, function () {
	                return d ? {} : {path: a}
	            }()), b), this
	        },
	        alert: function (a, b, d) {
	            var e = "function" == typeof b;
	            return e && (d = b), layer.open(c.extend({content: a, yes: d}, e ? {} : b))
	        },
	        confirm: function (a, b, d, f) {
	            var g = "function" == typeof b;
	            return g && (f = d, d = b), layer.open(c.extend({content: a, btn: e.btn, yes: d, cancel: f}, g ? {} : b))
	        },
	        msg: function (a, d, f) {
	            var h = "function" == typeof d, i = e.config.skin, j = (i ? i + " " + i + "-msg" : "") || "layui-layer-msg", k = g.anim.length - 1;
	            return h && (f = d), layer.open(c.extend({
	                content: a,
	                time: 3e3,
	                shade: !1,
	                skin: j,
	                title: !1,
	                closeBtn: !1,
	                btn: !1,
	                end: f
	            }, h && !e.config.skin ? {skin: j + " layui-layer-hui", shift: k} : function () {
	                return d = d || {}, (-1 === d.icon || d.icon === b && !e.config.skin) && (d.skin = j + " " + (d.skin || "layui-layer-hui")), d
	            }()))
	        },
	        load: function (a, b) {
	            return layer.open(c.extend({type: 3, icon: a || 0, shade: .01}, b))
	        },
	        tips: function (a, b, d) {
	            return layer.open(c.extend({type: 4, content: [a, b], closeBtn: !1, time: 3e3, maxWidth: 210}, d))
	        }
	    };
	    var f = function (a) {
	        var b = this;
	        b.index = ++layer.index, b.config = c.extend({}, b.config, e.config, a), b.creat()
	    };
	    f.pt = f.prototype;
	    var g = ["layui-layer", ".layui-layer-title", ".layui-layer-main", ".layui-layer-dialog", "layui-layer-iframe", "layui-layer-content", "layui-layer-btn", "layui-layer-close"];
	    g.anim = ["layui-anim", "layui-anim-01", "layui-anim-02", "layui-anim-03", "layui-anim-04", "layui-anim-05", "layui-anim-06"], f.pt.config = {
	        type: 0,
	        shade: .3,
	        fix: !0,
	        move: g[1],
	        title: "&#x4FE1;&#x606F;",
	        offset: "auto",
	        area: "auto",
	        closeBtn: 1,
	        time: 0,
	        zIndex: 19891014,
	        maxWidth: 400,
	        shift: 0,
	        icon: -1,
	        scrollbar: !0,
	        tips: 2
	    }, f.pt.vessel = function (a, b) {
	        var c = this, d = c.index, f = c.config, h = f.zIndex + d, i = "object" == typeof f.title, j = f.maxmin && (1 === f.type || 2 === f.type), k = f.title ? '<div class="layui-layer-title" style="' + (i ? f.title[1] : "") + '">' + (i ? f.title[0] : f.title) + "</div>" : "";
	        return f.zIndex = h, b([f.shade ? '<div class="layui-layer-shade" id="layui-layer-shade' + d + '" times="' + d + '" style="' + ("z-index:" + (h - 1) + "; background-color:" + (f.shade[1] || "#000") + "; opacity:" + (f.shade[0] || f.shade) + "; filter:alpha(opacity=" + (100 * f.shade[0] || 100 * f.shade) + ");") + '"></div>' : "", '<div class="' + g[0] + " " + (g.anim[f.shift] || "") + (" layui-layer-" + e.type[f.type]) + (0 != f.type && 2 != f.type || f.shade ? "" : " layui-layer-border") + " " + (f.skin || "") + '" id="' + g[0] + d + '" type="' + e.type[f.type] + '" times="' + d + '" showtime="' + f.time + '" conType="' + (a ? "object" : "string") + '" style="z-index: ' + h + "; width:" + f.area[0] + ";height:" + f.area[1] + (f.fix ? "" : ";position:absolute;") + '">' + (a && 2 != f.type ? "" : k) + '<div class="layui-layer-content' + (0 == f.type && -1 !== f.icon ? " layui-layer-padding" : "") + (3 == f.type ? " layui-layer-loading" + f.icon : "") + '">' + (0 == f.type && -1 !== f.icon ? '<i class="layui-layer-ico layui-layer-ico' + f.icon + '"></i>' : "") + (1 == f.type && a ? "" : f.content || "") + '</div><span class="layui-layer-setwin">' + function () {
	            var a = j ? '<a class="layui-layer-min" href="javascript:;"><cite></cite></a><a class="layui-layer-ico layui-layer-max" href="javascript:;"></a>' : "";
	            return f.closeBtn && (a += '<a class="layui-layer-ico ' + g[7] + " " + g[7] + (f.title ? f.closeBtn : 4 == f.type ? "1" : "2") + '" href="javascript:;"></a>'), a
	        }() + "</span>" + (f.btn ? function () {
	            var a = "";
	            "string" == typeof f.btn && (f.btn = [f.btn]);
	            for (var b = 0, c = f.btn.length; c > b; b++)a += '<a class="' + g[6] + b + '">' + f.btn[b] + "</a>";
	            return '<div class="' + g[6] + '">' + a + "</div>"
	        }() : "") + "</div>"], k), c
	    }, f.pt.creat = function () {
	        var a = this, b = a.config, f = a.index, h = b.content, i = "object" == typeof h;
	        switch ("string" == typeof b.area && (b.area = "auto" === b.area ? ["", ""] : [b.area, ""]), b.type) {
	            case 0:
	                b.btn = "btn" in b ? b.btn : e.btn[0], layer.closeAll("dialog");
	                break;
	            case 2:
	                var h = b.content = i ? b.content : [b.content || "http://sentsin.com?from=layer", "auto"];
	                b.content = '<iframe scrolling="' + (b.content[1] || "auto") + '" allowtransparency="true" id="' + g[4] + f + '" name="' + g[4] + f + '" onload="this.className=\'\';" class="layui-layer-load" frameborder="0" src="' + b.content[0] + '"></iframe>';
	                break;
	            case 3:
	                b.title = !1, b.closeBtn = !1, -1 === b.icon && 0 === b.icon, layer.closeAll("loading");
	                break;
	            case 4:
	                i || (b.content = [b.content, "body"]), b.follow = b.content[1], b.content = b.content[0] + '<i class="layui-layer-TipsG"></i>', b.title = !1, b.shade = !1, b.fix = !1, b.tips = "object" == typeof b.tips ? b.tips : [b.tips, !0], b.tipsMore || layer.closeAll("tips")
	        }
	        a.vessel(i, function (d, e) {
	            c("body").append(d[0]), i ? function () {
	                2 == b.type || 4 == b.type ? function () {
	                    c("body").append(d[1])
	                }() : function () {
	                    h.parents("." + g[0])[0] || (h.show().addClass("layui-layer-wrap").wrap(d[1]), c("#" + g[0] + f).find("." + g[5]).before(e))
	                }()
	            }() : c("body").append(d[1]), a.layero = c("#" + g[0] + f), b.scrollbar || g.html.css("overflow", "hidden").attr("layer-full", f)
	        }).auto(f), 2 == b.type && layer.ie6 && a.layero.find("iframe").attr("src", h[0]), 4 == b.type ? a.tips() : a.offset(), b.fix && d.on("resize", function () {
	            a.offset(), (/^\d+%$/.test(b.area[0]) || /^\d+%$/.test(b.area[1])) && a.auto(f), 4 == b.type && a.tips()
	        }), b.time <= 0 || setTimeout(function () {
	            layer.close(a.index)
	        }, b.time), a.move().callback()
	    }, f.pt.auto = function (a) {
	        function b(a) {
	            a = h.find(a), a.height(i[1] - j - k - 2 * (0 | parseFloat(a.css("padding"))))
	        }

	        var e = this, f = e.config, h = c("#" + g[0] + a);
	        "" === f.area[0] && f.maxWidth > 0 && (/MSIE 7/.test(navigator.userAgent) && f.btn && h.width(h.innerWidth()), h.outerWidth() > f.maxWidth && h.width(f.maxWidth));
	        var i = [h.innerWidth(), h.innerHeight()], j = h.find(g[1]).outerHeight() || 0, k = h.find("." + g[6]).outerHeight() || 0;
	        switch (f.type) {
	            case 2:
	                b("iframe");
	                break;
	            default:
	                "" === f.area[1] ? f.fix && i[1] > d.height() && (i[1] = d.height(), b("." + g[5])) : b("." + g[5])
	        }
	        return e
	    }, f.pt.offset = function () {
	        var a = this, b = a.config, c = a.layero, e = [c.outerWidth(), c.outerHeight()], f = "object" == typeof b.offset;
	        a.offsetTop = (d.height() - e[1]) / 2, a.offsetLeft = (d.width() - e[0]) / 2, f ? (a.offsetTop = b.offset[0], a.offsetLeft = b.offset[1] || a.offsetLeft) : "auto" !== b.offset && (a.offsetTop = b.offset, "rb" === b.offset && (a.offsetTop = d.height() - e[1], a.offsetLeft = d.width() - e[0])), b.fix || (a.offsetTop = /%$/.test(a.offsetTop) ? d.height() * parseFloat(a.offsetTop) / 100 : parseFloat(a.offsetTop), a.offsetLeft = /%$/.test(a.offsetLeft) ? d.width() * parseFloat(a.offsetLeft) / 100 : parseFloat(a.offsetLeft), a.offsetTop += d.scrollTop(), a.offsetLeft += d.scrollLeft()), c.css({
	            top: a.offsetTop,
	            left: a.offsetLeft
	        })
	    }, f.pt.tips = function () {
	        var a = this, b = a.config, e = a.layero, f = [e.outerWidth(), e.outerHeight()], h = c(b.follow);
	        h[0] || (h = c("body"));
	        var i = {
	            width: h.outerWidth(),
	            height: h.outerHeight(),
	            top: h.offset().top,
	            left: h.offset().left
	        }, j = e.find(".layui-layer-TipsG"), k = b.tips[0];
	        b.tips[1] || j.remove(), i.autoLeft = function () {
	            i.left + f[0] - d.width() > 0 ? (i.tipLeft = i.left + i.width - f[0], j.css({
	                right: 12,
	                left: "auto"
	            })) : i.tipLeft = i.left
	        }, i.where = [function () {
	            i.autoLeft(), i.tipTop = i.top - f[1] - 10, j.removeClass("layui-layer-TipsB").addClass("layui-layer-TipsT").css("border-right-color", b.tips[1])
	        }, function () {
	            i.tipLeft = i.left + i.width + 10, i.tipTop = i.top, j.removeClass("layui-layer-TipsL").addClass("layui-layer-TipsR").css("border-bottom-color", b.tips[1])
	        }, function () {
	            i.autoLeft(), i.tipTop = i.top + i.height + 10, j.removeClass("layui-layer-TipsT").addClass("layui-layer-TipsB").css("border-right-color", b.tips[1])
	        }, function () {
	            i.tipLeft = i.left - f[0] - 10, i.tipTop = i.top, j.removeClass("layui-layer-TipsR").addClass("layui-layer-TipsL").css("border-bottom-color", b.tips[1])
	        }], i.where[k - 1](), 1 === k ? i.top - (d.scrollTop() + f[1] + 16) < 0 && i.where[2]() : 2 === k ? d.width() - (i.left + i.width + f[0] + 16) > 0 || i.where[3]() : 3 === k ? i.top - d.scrollTop() + i.height + f[1] + 16 - d.height() > 0 && i.where[0]() : 4 === k && f[0] + 16 - i.left > 0 && i.where[1](), e.find("." + g[5]).css({
	            "background-color": b.tips[1],
	            "padding-right": b.closeBtn ? "30px" : ""
	        }), e.css({left: i.tipLeft, top: i.tipTop})
	    }, f.pt.move = function () {
	        var a = this, b = a.config, e = {
	            setY: 0, moveLayer: function () {
	                var a = e.layero, b = parseInt(a.css("margin-left")), c = parseInt(e.move.css("left"));
	                0 === b || (c -= b), "fixed" !== a.css("position") && (c -= a.parent().offset().left, e.setY = 0), a.css({
	                    left: c,
	                    top: parseInt(e.move.css("top")) - e.setY
	                })
	            }
	        }, f = a.layero.find(b.move);
	        return b.move && f.attr("move", "ok"), f.css({cursor: b.move ? "move" : "auto"}), c(b.move).on("mousedown", function (a) {
	            if (a.preventDefault(), "ok" === c(this).attr("move")) {
	                e.ismove = !0, e.layero = c(this).parents("." + g[0]);
	                var f = e.layero.offset().left, h = e.layero.offset().top, i = e.layero.outerWidth() - 6, j = e.layero.outerHeight() - 6;
	                c("#layui-layer-moves")[0] || c("body").append('<div id="layui-layer-moves" class="layui-layer-moves" style="left:' + f + "px; top:" + h + "px; width:" + i + "px; height:" + j + 'px; z-index:2147483584"></div>'), e.move = c("#layui-layer-moves"), b.moveType && e.move.css({visibility: "hidden"}), e.moveX = a.pageX - e.move.position().left, e.moveY = a.pageY - e.move.position().top, "fixed" !== e.layero.css("position") || (e.setY = d.scrollTop())
	            }
	        }), c(document).mousemove(function (a) {
	            if (e.ismove) {
	                var c = a.pageX - e.moveX, f = a.pageY - e.moveY;
	                if (a.preventDefault(), !b.moveOut) {
	                    e.setY = d.scrollTop();
	                    var g = d.width() - e.move.outerWidth(), h = e.setY;
	                    0 > c && (c = 0), c > g && (c = g), h > f && (f = h), f > d.height() - e.move.outerHeight() + e.setY && (f = d.height() - e.move.outerHeight() + e.setY)
	                }
	                e.move.css({left: c, top: f}), b.moveType && e.moveLayer(), c = f = g = h = null
	            }
	        }).mouseup(function () {
	            try {
	                e.ismove && (e.moveLayer(), e.move.remove()), e.ismove = !1
	            } catch (a) {
	                e.ismove = !1
	            }
	            b.moveEnd && b.moveEnd()
	        }), a
	    }, f.pt.callback = function () {
	        function a() {
	            var a = f.cancel && f.cancel(b.index);
	            a === !1 || layer.close(b.index)
	        }

	        var b = this, d = b.layero, f = b.config;
	        b.openLayer(), f.success && (2 == f.type ? d.find("iframe")[0].onload = function () {
	            this.className = "", f.success(d, b.index)
	        } : f.success(d, b.index)), layer.ie6 && b.IE6(d), d.find("." + g[6]).children("a").on("click", function () {
	            var e = c(this).index();
	            0 === e ? f.yes ? f.yes(b.index, d) : layer.close(b.index) : 1 === e ? a() : f["btn" + (e + 1)] ? f["btn" + (e + 1)](b.index, d) : layer.close(b.index)
	        }), d.find("." + g[7]).on("click", a), f.shadeClose && c("#layui-layer-shade" + b.index).on("click", function () {
	            layer.close(b.index)
	        }), d.find(".layui-layer-min").on("click", function () {
	            layer.min(b.index, f), f.min && f.min(d)
	        }), d.find(".layui-layer-max").on("click", function () {
	            c(this).hasClass("layui-layer-maxmin") ? (layer.restore(b.index), f.restore && f.restore(d)) : (layer.full(b.index, f), f.full && f.full(d))
	        }), f.end && (e.end[b.index] = f.end)
	    }, e.reselect = function () {
	        c.each(c("select"), function (a, b) {
	            var d = c(this);
	            d.parents("." + g[0])[0] || 1 == d.attr("layer") && c("." + g[0]).length < 1 && d.removeAttr("layer").show(), d = null
	        })
	    }, f.pt.IE6 = function (a) {
	        function b() {
	            a.css({top: f + (e.config.fix ? d.scrollTop() : 0)})
	        }

	        var e = this, f = a.offset().top;
	        b(), d.scroll(b), c("select").each(function (a, b) {
	            var d = c(this);
	            d.parents("." + g[0])[0] || "none" === d.css("display") || d.attr({layer: "1"}).hide(), d = null
	        })
	    }, f.pt.openLayer = function () {
	        var a = this;
	        layer.zIndex = a.config.zIndex, layer.setTop = function (a) {
	            var b = function () {
	                layer.zIndex++, a.css("z-index", layer.zIndex + 1)
	            };
	            return layer.zIndex = parseInt(a[0].style.zIndex), a.on("mousedown", b), layer.zIndex
	        }
	    }, e.record = function (a) {
	        var b = [a.outerWidth(), a.outerHeight(), a.position().top, a.position().left + parseFloat(a.css("margin-left"))];
	        a.find(".layui-layer-max").addClass("layui-layer-maxmin"), a.attr({area: b})
	    }, e.rescollbar = function (a) {
	        g.html.attr("layer-full") == a && (g.html[0].style.removeProperty ? g.html[0].style.removeProperty("overflow") : g.html[0].style.removeAttribute("overflow"), g.html.removeAttr("layer-full"))
	    }, layer.getChildFrame = function (a, b) {
	        return b = b || c("." + g[4]).attr("times"), c("#" + g[0] + b).find("iframe").contents().find(a)
	    }, layer.getFrameIndex = function (a) {
	        return c("#" + a).parents("." + g[4]).attr("times")
	    }, layer.iframeAuto = function (a) {
	        if (a) {
	            var b = layer.getChildFrame("body", a).outerHeight(), d = c("#" + g[0] + a), e = d.find(g[1]).outerHeight() || 0, f = d.find("." + g[6]).outerHeight() || 0;
	            d.css({height: b + e + f}), d.find("iframe").css({height: b})
	        }
	    }, layer.iframeSrc = function (a, b) {
	        c("#" + g[0] + a).find("iframe").attr("src", b)
	    }, layer.style = function (a, b) {
	        var d = c("#" + g[0] + a), f = d.attr("type"), h = d.find(g[1]).outerHeight() || 0, i = d.find("." + g[6]).outerHeight() || 0;
	        (f === e.type[1] || f === e.type[2]) && (d.css(b), f === e.type[2] && d.find("iframe").css({height: parseFloat(b.height) - h - i}))
	    }, layer.min = function (a, b) {
	        var d = c("#" + g[0] + a), f = d.find(g[1]).outerHeight() || 0;
	        e.record(d), layer.style(a, {
	            width: 180,
	            height: f,
	            overflow: "hidden"
	        }), d.find(".layui-layer-min").hide(), "page" === d.attr("type") && d.find(g[4]).hide(), e.rescollbar(a)
	    }, layer.restore = function (a) {
	        var b = c("#" + g[0] + a), d = b.attr("area").split(",");
	        b.attr("type");
	        layer.style(a, {
	            width: parseFloat(d[0]),
	            height: parseFloat(d[1]),
	            top: parseFloat(d[2]),
	            left: parseFloat(d[3]),
	            overflow: "visible"
	        }), b.find(".layui-layer-max").removeClass("layui-layer-maxmin"), b.find(".layui-layer-min").show(), "page" === b.attr("type") && b.find(g[4]).show(), e.rescollbar(a)
	    }, layer.full = function (a) {
	        var b, f = c("#" + g[0] + a);
	        e.record(f), g.html.attr("layer-full") || g.html.css("overflow", "hidden").attr("layer-full", a), clearTimeout(b), b = setTimeout(function () {
	            var b = "fixed" === f.css("position");
	            layer.style(a, {
	                top: b ? 0 : d.scrollTop(),
	                left: b ? 0 : d.scrollLeft(),
	                width: d.width(),
	                height: d.height()
	            }), f.find(".layui-layer-min").hide()
	        }, 100)
	    }, layer.title = function (a, b) {
	        var d = c("#" + g[0] + (b || layer.index)).find(g[1]);
	        d.html(a)
	    }, layer.close = function (a) {
	        var b = c("#" + g[0] + a), d = b.attr("type");
	        if (b[0]) {
	            if (d === e.type[1] && "object" === b.attr("conType")) {
	                b.children(":not(." + g[5] + ")").remove();
	                for (var f = 0; 2 > f; f++)b.find(".layui-layer-wrap").unwrap().hide()
	            } else {
	                if (d === e.type[2])try {
	                    var h = c("#" + g[4] + a)[0];
	                    h.contentWindow.document.write(""), h.contentWindow.close(), b.find("." + g[5])[0].removeChild(h)
	                } catch (i) {
	                }
	                b[0].innerHTML = "", b.remove()
	            }
	            c("#layui-layer-moves, #layui-layer-shade" + a).remove(), layer.ie6 && e.reselect(), e.rescollbar(a), "function" == typeof e.end[a] && e.end[a](), delete e.end[a]
	        }
	    }, layer.closeAll = function (a) {
	        c.each(c("." + g[0]), function () {
	            var b = c(this), d = a ? b.attr("type") === a : 1;
	            d && layer.close(b.attr("times")), d = null
	        })
	    }, e.run = function () {
	        c = jQuery, d = c(a), g.html = c("html"), layer.open = function (a) {
	            var b = new f(a);
	            return b.index
	        }
	    },  true ? !(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	        return e.run(), layer
	    }.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : function () {
	        e.run()
	        /*layer.use("skin/layer.css")*/
	    }()
	}(window);

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by liliy_000 on 2015/11/24.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var loginLayer = __webpack_require__(8);
	    var userInfo = __webpack_require__(7);
	    return {
	        _jobName: "login-popup",
	        check: function () {
	            return true;
	        },
	        init: function () {

	            G.customEvent.on("login", function () {
	                $(".js-already-login").show();
	                $(".js-no-login").hide();
	            });
	            G.customEvent.on("logout", function () {
	                G.cookie.remove('isMobileCorrect')
	                $(".js-already-login").hide();
	                $(".js-no-login").show();
	            });
	            //登录注册弹出层
	            var doc = $(document);
	            doc.on("click", ".js-registPopup", function () {
	                loginLayer.open(1);
	            });
	            doc.on("click", ".js-loginPopup", function () {
	                loginLayer.open(0);
	            });
	            doc.on("click", ".js-logout", function () {
	                $.get("/gongsibao-web/web/account/accountloginout", function () {
	                    G.customEvent.trigger("logout");
	                });
	            });
	        },
	        exec: function () {
	            if (userInfo.isLogin()) {
	                $(".js-already-login").show();
	                $(".js-no-login").hide();
	            }

	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    return {
	        _jobName: "header/nav",
	        check: function () {
	            return $("#navfouce").length > 0;
	        },
	        init: function () {
	            $.ajax({
	                url:"/cmsapi/channel/list.jspx?siteId=3&parentId=123",
	                success:function(data){
	                    if ( data.length > 0 ) {
	                        var navHtml = "<li><a href='/' target='_blank'>首页</a></li>";
	                        $.each(data, function (i,e) {
	                            navHtml += "<li><a href='" + e.url + "' target='_blank'>" + e.name + "</a></li>"
	                        });
	                        $("#navfouce").html(navHtml);
	                    }
	                }
	            });
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by liliy_000 on 2015/11/24.
	 */
	var gototop = $("#gototop");
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    return {
	        _jobName: "gototop",
	        check: function () {
	            if ( $("[data-toggle='gototop']").length > 0 ) return true;
	        },
	        init: function () {
	            $(window).scroll(function(){
	                if ( $(window).scrollTop() > 0 ) {
	                    gototop.removeClass("hide");
	                } else {
	                    gototop.addClass("hide");
	                }
	            });
	            gototop.click(function(){
	                $("html,body").animate({ scrollTop : 0 },1000);
	            });
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    return {
	        _jobName: "searchHeader",
	        check: function () {
	            return $("#searchHeader").length > 0;
	        },
	        init: function () {
	            var topH = 75;
	            if ( $("#navlist").length > 0 ) {
	                topH = 170;
	            }
	            $(window).scroll(function(){
	                if ( $(window).scrollTop() > topH ) {
	                    $("#searchHeader").stop().animate({"opacity":"1","top":"0"},300);
	                } else {
	                    $("#searchHeader").stop().animate({"opacity":"0","top":"-56px"},300);
	                }
	            });
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 14 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;var $openchat = $(".js-openchat");
	var noXiaoneng = $("#noXiaoneng");
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    return {
	        _jobName: "xiaozhi",
	        check: function () {
	            return !noXiaoneng.length;
	            //return true
	        },
	        init: function () {
	            document.write("<script language=javascript>"
	                            + "var LiveAutoInvite0='您好，来自%IP%的朋友';"
	                            + "var LiveAutoInvite1='来自公司宝的对话';"
	                            + "var LiveAutoInvite2='公司宝-一站式企业服务平台<br><strong>如果您有任何问题请接受此邀请以开始即时沟通</strong>';"
	                            + "</script>"
	                            + "<script language='javascript' src='http://swt.gongsibao.com/JS/LsJS.aspx?siteid=MGF22027130&float=1&lng=cn'></script>");

	            G.customEvent.on("xiaozhiOpen" , function () {
	                window.open("http://swt.gongsibao.com/LR/Chatpre.aspx?id=MGF22027130&lng=cn");
	            });
	            G.customEvent.on("xiaozhiClose" , function () {
	                window.open("http://swt.gongsibao.com/LR/Chatpre.aspx?id=MGF22027130&lng=cn");
	            });
	            $openchat.on("click" , function () {
	                G.customEvent.trigger("xiaozhiOpen");
	            });
	        },
	        exec: function () {

	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 15 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    return {
	        _jobName: "ga",
	        check: function () {
	            return true;
	        },
	        init: function () {
	            document.write("<script language=javascript>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-94112410-1', 'auto');ga('send', 'pageview');</script>");
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 16 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var list = $("#navlist");
	    var box = $("#navbox");
	    return {
	        _jobName: "index-new-nav",
	        check: function () {
	            return !!(list.length && box.length);
	        },
	        init: function () {
	        },
	        exec: function () {
	            var time = null;
	            var lista = list.find("a");
	            var box_show = function (hei) {
	                box.stop().animate({
	                    height: hei,
	                    opacity: 1
	                }, 400)
	            };
	            var box_hide = function () {
	                box.stop().animate({
	                    height: 0,
	                    opacity: 0
	                }, 400)
	            };
	            lista.hover(function () {
	                lista.removeClass("now");
	                $(this).addClass("now");
	                clearTimeout(time);
	                var index = list.find("a").index($(this));
	                box.find(".cont").hide().eq(index).show();
	                var _height = box.find(".cont").eq(index).height() + 54;
	                box_show(_height)
	            }, function () {
	                time = setTimeout(function () {
	                    box.find(".cont").hide();
	                    box_hide()
	                }, 50);
	                lista.removeClass("now");
	            });
	            box.find(".cont").hover(function () {
	                var _index = box.find(".cont").index($(this));
	                lista.removeClass("now");
	                lista.eq(_index).addClass("now");
	                clearTimeout(time);
	                $(this).show();
	                var _height = $(this).height() + 54;
	                box_show(_height)
	            }, function () {
	                time = setTimeout(function () {
	                    $(this).hide();
	                    box_hide()
	                }, 50);
	                lista.removeClass("now");
	            });
	        }
	    };

	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 17 */,
/* 18 */,
/* 19 */
/***/ (function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function(setImmediate) {/**
	 * Created by shenshen on 15/12/2.
	 */
	/*
	 * jQuery FlexSlider v2.6.0
	 * Copyright 2012 WooThemes
	 * Contributing Author: Tyler Smith
	 */
	;
	(function ($) {

	    var focused = true;

	    //FlexSlider: Object Instance
	    $.flexslider = function(el, options) {
	        var slider = $(el);

	        // making variables public
	        slider.vars = $.extend({}, $.flexslider.defaults, options);

	        var namespace = slider.vars.namespace,
	            msGesture = window.navigator && window.navigator.msPointerEnabled && window.MSGesture,
	            touch = (( "ontouchstart" in window ) || msGesture || window.DocumentTouch && document instanceof DocumentTouch) && slider.vars.touch,
	        // depricating this idea, as devices are being released with both of these events
	            eventType = "click touchend MSPointerUp keyup",
	            watchedEvent = "",
	            watchedEventClearTimer,
	            vertical = slider.vars.direction === "vertical",
	            reverse = slider.vars.reverse,
	            carousel = (slider.vars.itemWidth > 0),
	            fade = slider.vars.animation === "fade",
	            asNav = slider.vars.asNavFor !== "",
	            methods = {};

	        // Store a reference to the slider object
	        $.data(el, "flexslider", slider);

	        // Private slider methods
	        methods = {
	            init: function() {
	                slider.animating = false;
	                // Get current slide and make sure it is a number
	                slider.currentSlide = parseInt( ( slider.vars.startAt ? slider.vars.startAt : 0), 10 );
	                if ( isNaN( slider.currentSlide ) ) { slider.currentSlide = 0; }
	                slider.animatingTo = slider.currentSlide;
	                slider.atEnd = (slider.currentSlide === 0 || slider.currentSlide === slider.last);
	                slider.containerSelector = slider.vars.selector.substr(0,slider.vars.selector.search(' '));
	                slider.slides = $(slider.vars.selector, slider);
	                slider.container = $(slider.containerSelector, slider);
	                slider.count = slider.slides.length;
	                // SYNC:
	                slider.syncExists = $(slider.vars.sync).length > 0;
	                // SLIDE:
	                if (slider.vars.animation === "slide") { slider.vars.animation = "swing"; }
	                slider.prop = (vertical) ? "top" : "marginLeft";
	                slider.args = {};
	                // SLIDESHOW:
	                slider.manualPause = false;
	                slider.stopped = false;
	                //PAUSE WHEN INVISIBLE
	                slider.started = false;
	                slider.startTimeout = null;
	                // TOUCH/USECSS:
	                slider.transitions = !slider.vars.video && !fade && slider.vars.useCSS && (function() {
	                        var obj = document.createElement('div'),
	                            props = ['perspectiveProperty', 'WebkitPerspective', 'MozPerspective', 'OPerspective', 'msPerspective'];
	                        for (var i in props) {
	                            if ( obj.style[ props[i] ] !== undefined ) {
	                                slider.pfx = props[i].replace('Perspective','').toLowerCase();
	                                slider.prop = "-" + slider.pfx + "-transform";
	                                return true;
	                            }
	                        }
	                        return false;
	                    }());
	                slider.ensureAnimationEnd = '';
	                // CONTROLSCONTAINER:
	                if (slider.vars.controlsContainer !== "") slider.controlsContainer = $(slider.vars.controlsContainer).length > 0 && $(slider.vars.controlsContainer);
	                // MANUAL:
	                if (slider.vars.manualControls !== "") slider.manualControls = $(slider.vars.manualControls).length > 0 && $(slider.vars.manualControls);

	                // CUSTOM DIRECTION NAV:
	                if (slider.vars.customDirectionNav !== "") slider.customDirectionNav = $(slider.vars.customDirectionNav).length === 2 && $(slider.vars.customDirectionNav);

	                // RANDOMIZE:
	                if (slider.vars.randomize) {
	                    slider.slides.sort(function() { return (Math.round(Math.random())-0.5); });
	                    slider.container.empty().append(slider.slides);
	                }

	                slider.doMath();

	                // INIT
	                slider.setup("init");

	                // CONTROLNAV:
	                if (slider.vars.controlNav) { methods.controlNav.setup(); }

	                // DIRECTIONNAV:
	                if (slider.vars.directionNav) { methods.directionNav.setup(); }

	                // KEYBOARD:
	                if (slider.vars.keyboard && ($(slider.containerSelector).length === 1 || slider.vars.multipleKeyboard)) {
	                    $(document).bind('keyup', function(event) {
	                        var keycode = event.keyCode;
	                        if (!slider.animating && (keycode === 39 || keycode === 37)) {
	                            var target = (keycode === 39) ? slider.getTarget('next') :
	                                (keycode === 37) ? slider.getTarget('prev') : false;
	                            slider.flexAnimate(target, slider.vars.pauseOnAction);
	                        }
	                    });
	                }
	                // MOUSEWHEEL:
	                if (slider.vars.mousewheel) {
	                    slider.bind('mousewheel', function(event, delta, deltaX, deltaY) {
	                        event.preventDefault();
	                        var target = (delta < 0) ? slider.getTarget('next') : slider.getTarget('prev');
	                        slider.flexAnimate(target, slider.vars.pauseOnAction);
	                    });
	                }

	                // PAUSEPLAY
	                if (slider.vars.pausePlay) { methods.pausePlay.setup(); }

	                //PAUSE WHEN INVISIBLE
	                if (slider.vars.slideshow && slider.vars.pauseInvisible) { methods.pauseInvisible.init(); }

	                // SLIDSESHOW
	                if (slider.vars.slideshow) {
	                    if (slider.vars.pauseOnHover) {
	                        slider.hover(function() {
	                            if (!slider.manualPlay && !slider.manualPause) { slider.pause(); }
	                        }, function() {
	                            if (!slider.manualPause && !slider.manualPlay && !slider.stopped) { slider.play(); }
	                        });
	                    }
	                    // initialize animation
	                    //If we're visible, or we don't use PageVisibility API
	                    if(!slider.vars.pauseInvisible || !methods.pauseInvisible.isHidden()) {
	                        (slider.vars.initDelay > 0) ? slider.startTimeout = setTimeout(slider.play, slider.vars.initDelay) : slider.play();
	                    }
	                }

	                // ASNAV:
	                if (asNav) { methods.asNav.setup(); }

	                // TOUCH
	                if (touch && slider.vars.touch) { methods.touch(); }

	                // FADE&&SMOOTHHEIGHT || SLIDE:
	                if (!fade || (fade && slider.vars.smoothHeight)) { $(window).bind("resize orientationchange focus", methods.resize); }

	                slider.find("img").attr("draggable", "false");

	                // API: start() Callback
	                setTimeout(function(){
	                    slider.vars.start(slider);
	                }, 200);
	            },
	            asNav: {
	                setup: function() {
	                    slider.asNav = true;
	                    slider.animatingTo = Math.floor(slider.currentSlide/slider.move);
	                    slider.currentItem = slider.currentSlide;
	                    slider.slides.removeClass(namespace + "active-slide").eq(slider.currentItem).addClass(namespace + "active-slide");
	                    if(!msGesture){
	                        slider.slides.on(eventType, function(e){
	                            e.preventDefault();
	                            var $slide = $(this),
	                                target = $slide.index();
	                            var posFromLeft = $slide.offset().left - $(slider).scrollLeft(); // Find position of slide relative to left of slider container
	                            if( posFromLeft <= 0 && $slide.hasClass( namespace + 'active-slide' ) ) {
	                                slider.flexAnimate(slider.getTarget("prev"), true);
	                            } else if (!$(slider.vars.asNavFor).data('flexslider').animating && !$slide.hasClass(namespace + "active-slide")) {
	                                slider.direction = (slider.currentItem < target) ? "next" : "prev";
	                                slider.flexAnimate(target, slider.vars.pauseOnAction, false, true, true);
	                            }
	                        });
	                    }else{
	                        el._slider = slider;
	                        slider.slides.each(function (){
	                            var that = this;
	                            that._gesture = new MSGesture();
	                            that._gesture.target = that;
	                            that.addEventListener("MSPointerDown", function (e){
	                                e.preventDefault();
	                                if(e.currentTarget._gesture) {
	                                    e.currentTarget._gesture.addPointer(e.pointerId);
	                                }
	                            }, false);
	                            that.addEventListener("MSGestureTap", function (e){
	                                e.preventDefault();
	                                var $slide = $(this),
	                                    target = $slide.index();
	                                if (!$(slider.vars.asNavFor).data('flexslider').animating && !$slide.hasClass('active')) {
	                                    slider.direction = (slider.currentItem < target) ? "next" : "prev";
	                                    slider.flexAnimate(target, slider.vars.pauseOnAction, false, true, true);
	                                }
	                            });
	                        });
	                    }
	                }
	            },
	            controlNav: {
	                setup: function() {
	                    if (!slider.manualControls) {
	                        methods.controlNav.setupPaging();
	                    } else { // MANUALCONTROLS:
	                        methods.controlNav.setupManual();
	                    }
	                },
	                setupPaging: function() {
	                    var type = (slider.vars.controlNav === "thumbnails") ? 'control-thumbs' : 'control-paging',
	                        j = 1,
	                        item,
	                        slide;

	                    slider.controlNavScaffold = $('<ol class="'+ namespace + 'control-nav ' + namespace + type + '"></ol>');

	                    if (slider.pagingCount > 1) {
	                        for (var i = 0; i < slider.pagingCount; i++) {
	                            slide = slider.slides.eq(i);
	                            if ( undefined === slide.attr( 'data-thumb-alt' ) ) { slide.attr( 'data-thumb-alt', '' ); }
	                            altText = ( '' !== slide.attr( 'data-thumb-alt' ) ) ? altText = ' alt="' + slide.attr( 'data-thumb-alt' ) + '"' : '';
	                            item = (slider.vars.controlNav === "thumbnails") ? '<img src="' + slide.attr( 'data-thumb' ) + '"' + altText + '/>' : '<a href="#">' + j + '</a>';
	                            if ( 'thumbnails' === slider.vars.controlNav && true === slider.vars.thumbCaptions ) {
	                                var captn = slide.attr( 'data-thumbcaption' );
	                                if ( '' !== captn && undefined !== captn ) { item += '<span class="' + namespace + 'caption">' + captn + '</span>'; }
	                            }
	                            slider.controlNavScaffold.append('<li>' + item + '</li>');
	                            j++;
	                        }
	                    }

	                    // CONTROLSCONTAINER:
	                    (slider.controlsContainer) ? $(slider.controlsContainer).append(slider.controlNavScaffold) : slider.append(slider.controlNavScaffold);
	                    methods.controlNav.set();

	                    methods.controlNav.active();

	                    slider.controlNavScaffold.delegate('a, img', eventType, function(event) {
	                        event.preventDefault();

	                        if (watchedEvent === "" || watchedEvent === event.type) {
	                            var $this = $(this),
	                                target = slider.controlNav.index($this);

	                            if (!$this.hasClass(namespace + 'active')) {
	                                slider.direction = (target > slider.currentSlide) ? "next" : "prev";
	                                slider.flexAnimate(target, slider.vars.pauseOnAction);
	                            }
	                        }

	                        // setup flags to prevent event duplication
	                        if (watchedEvent === "") {
	                            watchedEvent = event.type;
	                        }
	                        methods.setToClearWatchedEvent();

	                    });
	                },
	                setupManual: function() {
	                    slider.controlNav = slider.manualControls;
	                    methods.controlNav.active();

	                    slider.controlNav.bind(eventType, function(event) {
	                        event.preventDefault();

	                        if (watchedEvent === "" || watchedEvent === event.type) {
	                            var $this = $(this),
	                                target = slider.controlNav.index($this);

	                            if (!$this.hasClass(namespace + 'active')) {
	                                (target > slider.currentSlide) ? slider.direction = "next" : slider.direction = "prev";
	                                slider.flexAnimate(target, slider.vars.pauseOnAction);
	                            }
	                        }

	                        // setup flags to prevent event duplication
	                        if (watchedEvent === "") {
	                            watchedEvent = event.type;
	                        }
	                        methods.setToClearWatchedEvent();
	                    });
	                },
	                set: function() {
	                    var selector = (slider.vars.controlNav === "thumbnails") ? 'img' : 'a';
	                    slider.controlNav = $('.' + namespace + 'control-nav li ' + selector, (slider.controlsContainer) ? slider.controlsContainer : slider);
	                },
	                active: function() {
	                    slider.controlNav.removeClass(namespace + "active").eq(slider.animatingTo).addClass(namespace + "active");
	                },
	                update: function(action, pos) {
	                    if (slider.pagingCount > 1 && action === "add") {
	                        slider.controlNavScaffold.append($('<li><a href="#">' + slider.count + '</a></li>'));
	                    } else if (slider.pagingCount === 1) {
	                        slider.controlNavScaffold.find('li').remove();
	                    } else {
	                        slider.controlNav.eq(pos).closest('li').remove();
	                    }
	                    methods.controlNav.set();
	                    (slider.pagingCount > 1 && slider.pagingCount !== slider.controlNav.length) ? slider.update(pos, action) : methods.controlNav.active();
	                }
	            },
	            directionNav: {
	                setup: function() {
	                    var directionNavScaffold = $('<ul class="' + namespace + 'direction-nav"><li class="' + namespace + 'nav-prev"><a class="' + namespace + 'prev" href="#">' + slider.vars.prevText + '</a></li><li class="' + namespace + 'nav-next"><a class="' + namespace + 'next" href="#">' + slider.vars.nextText + '</a></li></ul>');

	                    // CUSTOM DIRECTION NAV:
	                    if (slider.customDirectionNav) {
	                        slider.directionNav = slider.customDirectionNav;
	                        // CONTROLSCONTAINER:
	                    } else if (slider.controlsContainer) {
	                        $(slider.controlsContainer).append(directionNavScaffold);
	                        slider.directionNav = $('.' + namespace + 'direction-nav li a', slider.controlsContainer);
	                    } else {
	                        slider.append(directionNavScaffold);
	                        slider.directionNav = $('.' + namespace + 'direction-nav li a', slider);
	                    }

	                    methods.directionNav.update();

	                    slider.directionNav.bind(eventType, function(event) {
	                        event.preventDefault();
	                        var target;

	                        if (watchedEvent === "" || watchedEvent === event.type) {
	                            target = ($(this).hasClass(namespace + 'next')) ? slider.getTarget('next') : slider.getTarget('prev');
	                            slider.flexAnimate(target, slider.vars.pauseOnAction);
	                        }

	                        // setup flags to prevent event duplication
	                        if (watchedEvent === "") {
	                            watchedEvent = event.type;
	                        }
	                        methods.setToClearWatchedEvent();
	                    });
	                },
	                update: function() {
	                    var disabledClass = namespace + 'disabled';
	                    if (slider.pagingCount === 1) {
	                        slider.directionNav.addClass(disabledClass).attr('tabindex', '-1');
	                    } else if (!slider.vars.animationLoop) {
	                        if (slider.animatingTo === 0) {
	                            slider.directionNav.removeClass(disabledClass).filter('.' + namespace + "prev").addClass(disabledClass).attr('tabindex', '-1');
	                        } else if (slider.animatingTo === slider.last) {
	                            slider.directionNav.removeClass(disabledClass).filter('.' + namespace + "next").addClass(disabledClass).attr('tabindex', '-1');
	                        } else {
	                            slider.directionNav.removeClass(disabledClass).removeAttr('tabindex');
	                        }
	                    } else {
	                        slider.directionNav.removeClass(disabledClass).removeAttr('tabindex');
	                    }
	                }
	            },
	            pausePlay: {
	                setup: function() {
	                    var pausePlayScaffold = $('<div class="' + namespace + 'pauseplay"><a href="#"></a></div>');

	                    // CONTROLSCONTAINER:
	                    if (slider.controlsContainer) {
	                        slider.controlsContainer.append(pausePlayScaffold);
	                        slider.pausePlay = $('.' + namespace + 'pauseplay a', slider.controlsContainer);
	                    } else {
	                        slider.append(pausePlayScaffold);
	                        slider.pausePlay = $('.' + namespace + 'pauseplay a', slider);
	                    }

	                    methods.pausePlay.update((slider.vars.slideshow) ? namespace + 'pause' : namespace + 'play');

	                    slider.pausePlay.bind(eventType, function(event) {
	                        event.preventDefault();

	                        if (watchedEvent === "" || watchedEvent === event.type) {
	                            if ($(this).hasClass(namespace + 'pause')) {
	                                slider.manualPause = true;
	                                slider.manualPlay = false;
	                                slider.pause();
	                            } else {
	                                slider.manualPause = false;
	                                slider.manualPlay = true;
	                                slider.play();
	                            }
	                        }

	                        // setup flags to prevent event duplication
	                        if (watchedEvent === "") {
	                            watchedEvent = event.type;
	                        }
	                        methods.setToClearWatchedEvent();
	                    });
	                },
	                update: function(state) {
	                    (state === "play") ? slider.pausePlay.removeClass(namespace + 'pause').addClass(namespace + 'play').html(slider.vars.playText) : slider.pausePlay.removeClass(namespace + 'play').addClass(namespace + 'pause').html(slider.vars.pauseText);
	                }
	            },
	            touch: function() {
	                var startX,
	                    startY,
	                    offset,
	                    cwidth,
	                    dx,
	                    startT,
	                    onTouchStart,
	                    onTouchMove,
	                    onTouchEnd,
	                    scrolling = false,
	                    localX = 0,
	                    localY = 0,
	                    accDx = 0;

	                if(!msGesture){
	                    onTouchStart = function(e) {
	                        if (slider.animating) {
	                            e.preventDefault();
	                        } else if ( ( window.navigator.msPointerEnabled ) || e.touches.length === 1 ) {
	                            slider.pause();
	                            // CAROUSEL:
	                            cwidth = (vertical) ? slider.h : slider. w;
	                            startT = Number(new Date());
	                            // CAROUSEL:

	                            // Local vars for X and Y points.
	                            localX = e.touches[0].pageX;
	                            localY = e.touches[0].pageY;

	                            offset = (carousel && reverse && slider.animatingTo === slider.last) ? 0 :
	                                (carousel && reverse) ? slider.limit - (((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.animatingTo) :
	                                    (carousel && slider.currentSlide === slider.last) ? slider.limit :
	                                        (carousel) ? ((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.currentSlide :
	                                            (reverse) ? (slider.last - slider.currentSlide + slider.cloneOffset) * cwidth : (slider.currentSlide + slider.cloneOffset) * cwidth;
	                            startX = (vertical) ? localY : localX;
	                            startY = (vertical) ? localX : localY;

	                            el.addEventListener('touchmove', onTouchMove, false);
	                            el.addEventListener('touchend', onTouchEnd, false);
	                        }
	                    };

	                    onTouchMove = function(e) {
	                        // Local vars for X and Y points.

	                        localX = e.touches[0].pageX;
	                        localY = e.touches[0].pageY;

	                        dx = (vertical) ? startX - localY : startX - localX;
	                        scrolling = (vertical) ? (Math.abs(dx) < Math.abs(localX - startY)) : (Math.abs(dx) < Math.abs(localY - startY));

	                        var fxms = 500;

	                        if ( ! scrolling || Number( new Date() ) - startT > fxms ) {
	                            e.preventDefault();
	                            if (!fade && slider.transitions) {
	                                if (!slider.vars.animationLoop) {
	                                    dx = dx/((slider.currentSlide === 0 && dx < 0 || slider.currentSlide === slider.last && dx > 0) ? (Math.abs(dx)/cwidth+2) : 1);
	                                }
	                                slider.setProps(offset + dx, "setTouch");
	                            }
	                        }
	                    };

	                    onTouchEnd = function(e) {
	                        // finish the touch by undoing the touch session
	                        el.removeEventListener('touchmove', onTouchMove, false);

	                        if (slider.animatingTo === slider.currentSlide && !scrolling && !(dx === null)) {
	                            var updateDx = (reverse) ? -dx : dx,
	                                target = (updateDx > 0) ? slider.getTarget('next') : slider.getTarget('prev');

	                            if (slider.canAdvance(target) && (Number(new Date()) - startT < 550 && Math.abs(updateDx) > 50 || Math.abs(updateDx) > cwidth/2)) {
	                                slider.flexAnimate(target, slider.vars.pauseOnAction);
	                            } else {
	                                if (!fade) { slider.flexAnimate(slider.currentSlide, slider.vars.pauseOnAction, true); }
	                            }
	                        }
	                        el.removeEventListener('touchend', onTouchEnd, false);

	                        startX = null;
	                        startY = null;
	                        dx = null;
	                        offset = null;
	                    };

	                    el.addEventListener('touchstart', onTouchStart, false);
	                }else{
	                    el.style.msTouchAction = "none";
	                    el._gesture = new MSGesture();
	                    el._gesture.target = el;
	                    el.addEventListener("MSPointerDown", onMSPointerDown, false);
	                    el._slider = slider;
	                    el.addEventListener("MSGestureChange", onMSGestureChange, false);
	                    el.addEventListener("MSGestureEnd", onMSGestureEnd, false);

	                    function onMSPointerDown(e){
	                        e.stopPropagation();
	                        if (slider.animating) {
	                            e.preventDefault();
	                        }else{
	                            slider.pause();
	                            el._gesture.addPointer(e.pointerId);
	                            accDx = 0;
	                            cwidth = (vertical) ? slider.h : slider. w;
	                            startT = Number(new Date());
	                            // CAROUSEL:

	                            offset = (carousel && reverse && slider.animatingTo === slider.last) ? 0 :
	                                (carousel && reverse) ? slider.limit - (((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.animatingTo) :
	                                    (carousel && slider.currentSlide === slider.last) ? slider.limit :
	                                        (carousel) ? ((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.currentSlide :
	                                            (reverse) ? (slider.last - slider.currentSlide + slider.cloneOffset) * cwidth : (slider.currentSlide + slider.cloneOffset) * cwidth;
	                        }
	                    }

	                    function onMSGestureChange(e) {
	                        e.stopPropagation();
	                        var slider = e.target._slider;
	                        if(!slider){
	                            return;
	                        }
	                        var transX = -e.translationX,
	                            transY = -e.translationY;

	                        //Accumulate translations.
	                        accDx = accDx + ((vertical) ? transY : transX);
	                        dx = accDx;
	                        scrolling = (vertical) ? (Math.abs(accDx) < Math.abs(-transX)) : (Math.abs(accDx) < Math.abs(-transY));

	                        if(e.detail === e.MSGESTURE_FLAG_INERTIA){
	                            setImmediate(function (){
	                                el._gesture.stop();
	                            });

	                            return;
	                        }

	                        if (!scrolling || Number(new Date()) - startT > 500) {
	                            e.preventDefault();
	                            if (!fade && slider.transitions) {
	                                if (!slider.vars.animationLoop) {
	                                    dx = accDx / ((slider.currentSlide === 0 && accDx < 0 || slider.currentSlide === slider.last && accDx > 0) ? (Math.abs(accDx) / cwidth + 2) : 1);
	                                }
	                                slider.setProps(offset + dx, "setTouch");
	                            }
	                        }
	                    }

	                    function onMSGestureEnd(e) {
	                        e.stopPropagation();
	                        var slider = e.target._slider;
	                        if(!slider){
	                            return;
	                        }
	                        if (slider.animatingTo === slider.currentSlide && !scrolling && !(dx === null)) {
	                            var updateDx = (reverse) ? -dx : dx,
	                                target = (updateDx > 0) ? slider.getTarget('next') : slider.getTarget('prev');

	                            if (slider.canAdvance(target) && (Number(new Date()) - startT < 550 && Math.abs(updateDx) > 50 || Math.abs(updateDx) > cwidth/2)) {
	                                slider.flexAnimate(target, slider.vars.pauseOnAction);
	                            } else {
	                                if (!fade) { slider.flexAnimate(slider.currentSlide, slider.vars.pauseOnAction, true); }
	                            }
	                        }

	                        startX = null;
	                        startY = null;
	                        dx = null;
	                        offset = null;
	                        accDx = 0;
	                    }
	                }
	            },
	            resize: function() {
	                if (!slider.animating && slider.is(':visible')) {
	                    if (!carousel) { slider.doMath(); }

	                    if (fade) {
	                        // SMOOTH HEIGHT:
	                        methods.smoothHeight();
	                    } else if (carousel) { //CAROUSEL:
	                        slider.slides.width(slider.computedW);
	                        slider.update(slider.pagingCount);
	                        slider.setProps();
	                    }
	                    else if (vertical) { //VERTICAL:
	                        slider.viewport.height(slider.h);
	                        slider.setProps(slider.h, "setTotal");
	                    } else {
	                        // SMOOTH HEIGHT:
	                        if (slider.vars.smoothHeight) { methods.smoothHeight(); }
	                        slider.newSlides.width(slider.computedW);
	                        slider.setProps(slider.computedW, "setTotal");
	                    }
	                }
	            },
	            smoothHeight: function(dur) {
	                if (!vertical || fade) {
	                    var $obj = (fade) ? slider : slider.viewport;
	                    (dur) ? $obj.animate({"height": slider.slides.eq(slider.animatingTo).height()}, dur) : $obj.height(slider.slides.eq(slider.animatingTo).height());
	                }
	            },
	            sync: function(action) {
	                var $obj = $(slider.vars.sync).data("flexslider"),
	                    target = slider.animatingTo;

	                switch (action) {
	                    case "animate": $obj.flexAnimate(target, slider.vars.pauseOnAction, false, true); break;
	                    case "play": if (!$obj.playing && !$obj.asNav) { $obj.play(); } break;
	                    case "pause": $obj.pause(); break;
	                }
	            },
	            uniqueID: function($clone) {
	                // Append _clone to current level and children elements with id attributes
	                $clone.filter( '[id]' ).add($clone.find( '[id]' )).each(function() {
	                    var $this = $(this);
	                    $this.attr( 'id', $this.attr( 'id' ) + '_clone' );
	                });
	                return $clone;
	            },
	            pauseInvisible: {
	                visProp: null,
	                init: function() {
	                    var visProp = methods.pauseInvisible.getHiddenProp();
	                    if (visProp) {
	                        var evtname = visProp.replace(/[H|h]idden/,'') + 'visibilitychange';
	                        document.addEventListener(evtname, function() {
	                            if (methods.pauseInvisible.isHidden()) {
	                                if(slider.startTimeout) {
	                                    clearTimeout(slider.startTimeout); //If clock is ticking, stop timer and prevent from starting while invisible
	                                } else {
	                                    slider.pause(); //Or just pause
	                                }
	                            }
	                            else {
	                                if(slider.started) {
	                                    slider.play(); //Initiated before, just play
	                                } else {
	                                    if (slider.vars.initDelay > 0) {
	                                        setTimeout(slider.play, slider.vars.initDelay);
	                                    } else {
	                                        slider.play(); //Didn't init before: simply init or wait for it
	                                    }
	                                }
	                            }
	                        });
	                    }
	                },
	                isHidden: function() {
	                    var prop = methods.pauseInvisible.getHiddenProp();
	                    if (!prop) {
	                        return false;
	                    }
	                    return document[prop];
	                },
	                getHiddenProp: function() {
	                    var prefixes = ['webkit','moz','ms','o'];
	                    // if 'hidden' is natively supported just return it
	                    if ('hidden' in document) {
	                        return 'hidden';
	                    }
	                    // otherwise loop over all the known prefixes until we find one
	                    for ( var i = 0; i < prefixes.length; i++ ) {
	                        if ((prefixes[i] + 'Hidden') in document) {
	                            return prefixes[i] + 'Hidden';
	                        }
	                    }
	                    // otherwise it's not supported
	                    return null;
	                }
	            },
	            setToClearWatchedEvent: function() {
	                clearTimeout(watchedEventClearTimer);
	                watchedEventClearTimer = setTimeout(function() {
	                    watchedEvent = "";
	                }, 3000);
	            }
	        };

	        // public methods
	        slider.flexAnimate = function(target, pause, override, withSync, fromNav) {
	            if (!slider.vars.animationLoop && target !== slider.currentSlide) {
	                slider.direction = (target > slider.currentSlide) ? "next" : "prev";
	            }

	            if (asNav && slider.pagingCount === 1) slider.direction = (slider.currentItem < target) ? "next" : "prev";

	            if (!slider.animating && (slider.canAdvance(target, fromNav) || override) && slider.is(":visible")) {
	                if (asNav && withSync) {
	                    var master = $(slider.vars.asNavFor).data('flexslider');
	                    slider.atEnd = target === 0 || target === slider.count - 1;
	                    master.flexAnimate(target, true, false, true, fromNav);
	                    slider.direction = (slider.currentItem < target) ? "next" : "prev";
	                    master.direction = slider.direction;

	                    if (Math.ceil((target + 1)/slider.visible) - 1 !== slider.currentSlide && target !== 0) {
	                        slider.currentItem = target;
	                        slider.slides.removeClass(namespace + "active-slide").eq(target).addClass(namespace + "active-slide");
	                        target = Math.floor(target/slider.visible);
	                    } else {
	                        slider.currentItem = target;
	                        slider.slides.removeClass(namespace + "active-slide").eq(target).addClass(namespace + "active-slide");
	                        return false;
	                    }
	                }

	                slider.animating = true;
	                slider.animatingTo = target;

	                // SLIDESHOW:
	                if (pause) { slider.pause(); }

	                // API: before() animation Callback
	                slider.vars.before(slider);

	                // SYNC:
	                if (slider.syncExists && !fromNav) { methods.sync("animate"); }

	                // CONTROLNAV
	                if (slider.vars.controlNav) { methods.controlNav.active(); }

	                // !CAROUSEL:
	                // CANDIDATE: slide active class (for add/remove slide)
	                if (!carousel) { slider.slides.removeClass(namespace + 'active-slide').eq(target).addClass(namespace + 'active-slide'); }

	                // INFINITE LOOP:
	                // CANDIDATE: atEnd
	                slider.atEnd = target === 0 || target === slider.last;

	                // DIRECTIONNAV:
	                if (slider.vars.directionNav) { methods.directionNav.update(); }

	                if (target === slider.last) {
	                    // API: end() of cycle Callback
	                    slider.vars.end(slider);
	                    // SLIDESHOW && !INFINITE LOOP:
	                    if (!slider.vars.animationLoop) { slider.pause(); }
	                }

	                // SLIDE:
	                if (!fade) {
	                    var dimension = (vertical) ? slider.slides.filter(':first').height() : slider.computedW,
	                        margin, slideString, calcNext;

	                    // INFINITE LOOP / REVERSE:
	                    if (carousel) {
	                        margin = slider.vars.itemMargin;
	                        calcNext = ((slider.itemW + margin) * slider.move) * slider.animatingTo;
	                        slideString = (calcNext > slider.limit && slider.visible !== 1) ? slider.limit : calcNext;
	                    } else if (slider.currentSlide === 0 && target === slider.count - 1 && slider.vars.animationLoop && slider.direction !== "next") {
	                        slideString = (reverse) ? (slider.count + slider.cloneOffset) * dimension : 0;
	                    } else if (slider.currentSlide === slider.last && target === 0 && slider.vars.animationLoop && slider.direction !== "prev") {
	                        slideString = (reverse) ? 0 : (slider.count + 1) * dimension;
	                    } else {
	                        slideString = (reverse) ? ((slider.count - 1) - target + slider.cloneOffset) * dimension : (target + slider.cloneOffset) * dimension;
	                    }
	                    slider.setProps(slideString, "", slider.vars.animationSpeed);
	                    if (slider.transitions) {
	                        if (!slider.vars.animationLoop || !slider.atEnd) {
	                            slider.animating = false;
	                            slider.currentSlide = slider.animatingTo;
	                        }

	                        // Unbind previous transitionEnd events and re-bind new transitionEnd event
	                        slider.container.unbind("webkitTransitionEnd transitionend");
	                        slider.container.bind("webkitTransitionEnd transitionend", function() {
	                            clearTimeout(slider.ensureAnimationEnd);
	                            slider.wrapup(dimension);
	                        });

	                        // Insurance for the ever-so-fickle transitionEnd event
	                        clearTimeout(slider.ensureAnimationEnd);
	                        slider.ensureAnimationEnd = setTimeout(function() {
	                            slider.wrapup(dimension);
	                        }, slider.vars.animationSpeed + 100);

	                    } else {
	                        slider.container.animate(slider.args, slider.vars.animationSpeed, slider.vars.easing, function(){
	                            slider.wrapup(dimension);
	                        });
	                    }
	                } else { // FADE:
	                    if (!touch) {
	                        //slider.slides.eq(slider.currentSlide).fadeOut(slider.vars.animationSpeed, slider.vars.easing);
	                        //slider.slides.eq(target).fadeIn(slider.vars.animationSpeed, slider.vars.easing, slider.wrapup);

	                        slider.slides.eq(slider.currentSlide).css({"zIndex": 1}).animate({"opacity": 0}, slider.vars.animationSpeed, slider.vars.easing);
	                        slider.slides.eq(target).css({"zIndex": 2}).animate({"opacity": 1}, slider.vars.animationSpeed, slider.vars.easing, slider.wrapup);

	                    } else {
	                        slider.slides.eq(slider.currentSlide).css({ "opacity": 0, "zIndex": 1 });
	                        slider.slides.eq(target).css({ "opacity": 1, "zIndex": 2 });
	                        slider.wrapup(dimension);
	                    }
	                }
	                // SMOOTH HEIGHT:
	                if (slider.vars.smoothHeight) { methods.smoothHeight(slider.vars.animationSpeed); }
	            }
	        };
	        slider.wrapup = function(dimension) {
	            // SLIDE:
	            if (!fade && !carousel) {
	                if (slider.currentSlide === 0 && slider.animatingTo === slider.last && slider.vars.animationLoop) {
	                    slider.setProps(dimension, "jumpEnd");
	                } else if (slider.currentSlide === slider.last && slider.animatingTo === 0 && slider.vars.animationLoop) {
	                    slider.setProps(dimension, "jumpStart");
	                }
	            }
	            slider.animating = false;
	            slider.currentSlide = slider.animatingTo;
	            // API: after() animation Callback
	            slider.vars.after(slider);
	        };

	        // SLIDESHOW:
	        slider.animateSlides = function() {
	            if (!slider.animating && focused ) { slider.flexAnimate(slider.getTarget("next")); }
	        };
	        // SLIDESHOW:
	        slider.pause = function() {
	            clearInterval(slider.animatedSlides);
	            slider.animatedSlides = null;
	            slider.playing = false;
	            // PAUSEPLAY:
	            if (slider.vars.pausePlay) { methods.pausePlay.update("play"); }
	            // SYNC:
	            if (slider.syncExists) { methods.sync("pause"); }
	        };
	        // SLIDESHOW:
	        slider.play = function() {
	            if (slider.playing) { clearInterval(slider.animatedSlides); }
	            slider.animatedSlides = slider.animatedSlides || setInterval(slider.animateSlides, slider.vars.slideshowSpeed);
	            slider.started = slider.playing = true;
	            // PAUSEPLAY:
	            if (slider.vars.pausePlay) { methods.pausePlay.update("pause"); }
	            // SYNC:
	            if (slider.syncExists) { methods.sync("play"); }
	        };
	        // STOP:
	        slider.stop = function () {
	            slider.pause();
	            slider.stopped = true;
	        };
	        slider.canAdvance = function(target, fromNav) {
	            // ASNAV:
	            var last = (asNav) ? slider.pagingCount - 1 : slider.last;
	            return (fromNav) ? true :
	                (asNav && slider.currentItem === slider.count - 1 && target === 0 && slider.direction === "prev") ? true :
	                    (asNav && slider.currentItem === 0 && target === slider.pagingCount - 1 && slider.direction !== "next") ? false :
	                        (target === slider.currentSlide && !asNav) ? false :
	                            (slider.vars.animationLoop) ? true :
	                                (slider.atEnd && slider.currentSlide === 0 && target === last && slider.direction !== "next") ? false :
	                                    (slider.atEnd && slider.currentSlide === last && target === 0 && slider.direction === "next") ? false :
	                                        true;
	        };
	        slider.getTarget = function(dir) {
	            slider.direction = dir;
	            if (dir === "next") {
	                return (slider.currentSlide === slider.last) ? 0 : slider.currentSlide + 1;
	            } else {
	                return (slider.currentSlide === 0) ? slider.last : slider.currentSlide - 1;
	            }
	        };

	        // SLIDE:
	        slider.setProps = function(pos, special, dur) {
	            var target = (function() {
	                var posCheck = (pos) ? pos : ((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.animatingTo,
	                    posCalc = (function() {
	                        if (carousel) {
	                            return (special === "setTouch") ? pos :
	                                (reverse && slider.animatingTo === slider.last) ? 0 :
	                                    (reverse) ? slider.limit - (((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.animatingTo) :
	                                        (slider.animatingTo === slider.last) ? slider.limit : posCheck;
	                        } else {
	                            switch (special) {
	                                case "setTotal": return (reverse) ? ((slider.count - 1) - slider.currentSlide + slider.cloneOffset) * pos : (slider.currentSlide + slider.cloneOffset) * pos;
	                                case "setTouch": return (reverse) ? pos : pos;
	                                case "jumpEnd": return (reverse) ? pos : slider.count * pos;
	                                case "jumpStart": return (reverse) ? slider.count * pos : pos;
	                                default: return pos;
	                            }
	                        }
	                    }());

	                return (posCalc * -1) + "px";
	            }());

	            if (slider.transitions) {
	                target = (vertical) ? "translate3d(0," + target + ",0)" : "translate3d(" + target + ",0,0)";
	                dur = (dur !== undefined) ? (dur/1000) + "s" : "0s";
	                slider.container.css("-" + slider.pfx + "-transition-duration", dur);
	                slider.container.css("transition-duration", dur);
	            }

	            slider.args[slider.prop] = target;
	            if (slider.transitions || dur === undefined) { slider.container.css(slider.args); }

	            slider.container.css('transform',target);
	        };

	        slider.setup = function(type) {
	            // SLIDE:
	            if (!fade) {
	                var sliderOffset, arr;

	                if (type === "init") {
	                    slider.viewport = $('<div class="' + namespace + 'viewport"></div>').css({"overflow": "hidden", "position": "relative"}).appendTo(slider).append(slider.container);
	                    // INFINITE LOOP:
	                    slider.cloneCount = 0;
	                    slider.cloneOffset = 0;
	                    // REVERSE:
	                    if (reverse) {
	                        arr = $.makeArray(slider.slides).reverse();
	                        slider.slides = $(arr);
	                        slider.container.empty().append(slider.slides);
	                    }
	                }
	                // INFINITE LOOP && !CAROUSEL:
	                if (slider.vars.animationLoop && !carousel) {
	                    slider.cloneCount = 2;
	                    slider.cloneOffset = 1;
	                    // clear out old clones
	                    if (type !== "init") { slider.container.find('.clone').remove(); }
	                    slider.container.append(methods.uniqueID(slider.slides.first().clone().addClass('clone')).attr('aria-hidden', 'true'))
	                        .prepend(methods.uniqueID(slider.slides.last().clone().addClass('clone')).attr('aria-hidden', 'true'));
	                }
	                slider.newSlides = $(slider.vars.selector, slider);

	                sliderOffset = (reverse) ? slider.count - 1 - slider.currentSlide + slider.cloneOffset : slider.currentSlide + slider.cloneOffset;
	                // VERTICAL:
	                if (vertical && !carousel) {
	                    slider.container.height((slider.count + slider.cloneCount) * 200 + "%").css("position", "absolute").width("100%");
	                    setTimeout(function(){
	                        slider.newSlides.css({"display": "block"});
	                        slider.doMath();
	                        slider.viewport.height(slider.h);
	                        slider.setProps(sliderOffset * slider.h, "init");
	                    }, (type === "init") ? 100 : 0);
	                } else {
	                    slider.container.width((slider.count + slider.cloneCount) * 200 + "%");
	                    slider.setProps(sliderOffset * slider.computedW, "init");
	                    setTimeout(function(){
	                        slider.doMath();
	                        slider.newSlides.css({"width": slider.computedW, "marginRight" : slider.computedM, "float": "left", "display": "block"});
	                        // SMOOTH HEIGHT:
	                        if (slider.vars.smoothHeight) { methods.smoothHeight(); }
	                    }, (type === "init") ? 100 : 0);
	                }
	            } else { // FADE:
	                slider.slides.css({"width": "100%", "float": "left", "marginRight": "-100%", "position": "relative"});
	                if (type === "init") {
	                    if (!touch) {
	                        //slider.slides.eq(slider.currentSlide).fadeIn(slider.vars.animationSpeed, slider.vars.easing);
	                        if (slider.vars.fadeFirstSlide == false) {
	                            slider.slides.css({ "opacity": 0, "display": "block", "zIndex": 1 }).eq(slider.currentSlide).css({"zIndex": 2}).css({"opacity": 1});
	                        } else {
	                            slider.slides.css({ "opacity": 0, "display": "block", "zIndex": 1 }).eq(slider.currentSlide).css({"zIndex": 2}).animate({"opacity": 1},slider.vars.animationSpeed,slider.vars.easing);
	                        }
	                    } else {
	                        slider.slides.css({ "opacity": 0, "display": "block", "webkitTransition": "opacity " + slider.vars.animationSpeed / 1000 + "s ease", "zIndex": 1 }).eq(slider.currentSlide).css({ "opacity": 1, "zIndex": 2});
	                    }
	                }
	                // SMOOTH HEIGHT:
	                if (slider.vars.smoothHeight) { methods.smoothHeight(); }
	            }
	            // !CAROUSEL:
	            // CANDIDATE: active slide
	            if (!carousel) { slider.slides.removeClass(namespace + "active-slide").eq(slider.currentSlide).addClass(namespace + "active-slide"); }

	            //FlexSlider: init() Callback
	            slider.vars.init(slider);
	        };

	        slider.doMath = function() {
	            var slide = slider.slides.first(),
	                slideMargin = slider.vars.itemMargin,
	                minItems = slider.vars.minItems,
	                maxItems = slider.vars.maxItems;

	            slider.w = (slider.viewport===undefined) ? slider.width() : slider.viewport.width();
	            slider.h = slide.height();
	            slider.boxPadding = slide.outerWidth() - slide.width();

	            // CAROUSEL:
	            if (carousel) {
	                slider.itemT = slider.vars.itemWidth + slideMargin;
	                slider.itemM = slideMargin;
	                slider.minW = (minItems) ? minItems * slider.itemT : slider.w;
	                slider.maxW = (maxItems) ? (maxItems * slider.itemT) - slideMargin : slider.w;
	                slider.itemW = (slider.minW > slider.w) ? (slider.w - (slideMargin * (minItems - 1)))/minItems :
	                    (slider.maxW < slider.w) ? (slider.w - (slideMargin * (maxItems - 1)))/maxItems :
	                        (slider.vars.itemWidth > slider.w) ? slider.w : slider.vars.itemWidth;

	                slider.visible = Math.floor(slider.w/(slider.itemW));
	                slider.move = (slider.vars.move > 0 && slider.vars.move < slider.visible ) ? slider.vars.move : slider.visible;
	                slider.pagingCount = Math.ceil(((slider.count - slider.visible)/slider.move) + 1);
	                slider.last =  slider.pagingCount - 1;
	                slider.limit = (slider.pagingCount === 1) ? 0 :
	                    (slider.vars.itemWidth > slider.w) ? (slider.itemW * (slider.count - 1)) + (slideMargin * (slider.count - 1)) : ((slider.itemW + slideMargin) * slider.count) - slider.w - slideMargin;
	            } else {
	                slider.itemW = slider.w;
	                slider.itemM = slideMargin;
	                slider.pagingCount = slider.count;
	                slider.last = slider.count - 1;
	            }
	            slider.computedW = slider.itemW - slider.boxPadding;
	            slider.computedM = slider.itemM;
	        };

	        slider.update = function(pos, action) {
	            slider.doMath();

	            // update currentSlide and slider.animatingTo if necessary
	            if (!carousel) {
	                if (pos < slider.currentSlide) {
	                    slider.currentSlide += 1;
	                } else if (pos <= slider.currentSlide && pos !== 0) {
	                    slider.currentSlide -= 1;
	                }
	                slider.animatingTo = slider.currentSlide;
	            }

	            // update controlNav
	            if (slider.vars.controlNav && !slider.manualControls) {
	                if ((action === "add" && !carousel) || slider.pagingCount > slider.controlNav.length) {
	                    methods.controlNav.update("add");
	                } else if ((action === "remove" && !carousel) || slider.pagingCount < slider.controlNav.length) {
	                    if (carousel && slider.currentSlide > slider.last) {
	                        slider.currentSlide -= 1;
	                        slider.animatingTo -= 1;
	                    }
	                    methods.controlNav.update("remove", slider.last);
	                }
	            }
	            // update directionNav
	            if (slider.vars.directionNav) { methods.directionNav.update(); }

	        };

	        slider.addSlide = function(obj, pos) {
	            var $obj = $(obj);

	            slider.count += 1;
	            slider.last = slider.count - 1;

	            // append new slide
	            if (vertical && reverse) {
	                (pos !== undefined) ? slider.slides.eq(slider.count - pos).after($obj) : slider.container.prepend($obj);
	            } else {
	                (pos !== undefined) ? slider.slides.eq(pos).before($obj) : slider.container.append($obj);
	            }

	            // update currentSlide, animatingTo, controlNav, and directionNav
	            slider.update(pos, "add");

	            // update slider.slides
	            slider.slides = $(slider.vars.selector + ':not(.clone)', slider);
	            // re-setup the slider to accomdate new slide
	            slider.setup();

	            //FlexSlider: added() Callback
	            slider.vars.added(slider);
	        };
	        slider.removeSlide = function(obj) {
	            var pos = (isNaN(obj)) ? slider.slides.index($(obj)) : obj;

	            // update count
	            slider.count -= 1;
	            slider.last = slider.count - 1;

	            // remove slide
	            if (isNaN(obj)) {
	                $(obj, slider.slides).remove();
	            } else {
	                (vertical && reverse) ? slider.slides.eq(slider.last).remove() : slider.slides.eq(obj).remove();
	            }

	            // update currentSlide, animatingTo, controlNav, and directionNav
	            slider.doMath();
	            slider.update(pos, "remove");

	            // update slider.slides
	            slider.slides = $(slider.vars.selector + ':not(.clone)', slider);
	            // re-setup the slider to accomdate new slide
	            slider.setup();

	            // FlexSlider: removed() Callback
	            slider.vars.removed(slider);
	        };

	        //FlexSlider: Initialize
	        methods.init();
	    };

	    // Ensure the slider isn't focussed if the window loses focus.
	    $( window ).blur( function ( e ) {
	        focused = false;
	    }).focus( function ( e ) {
	        focused = true;
	    });

	    //FlexSlider: Default Settings
	    $.flexslider.defaults = {
	        namespace: "flex-",             //{NEW} String: Prefix string attached to the class of every element generated by the plugin
	        selector: ".slides > li",       //{NEW} Selector: Must match a simple pattern. '{container} > {slide}' -- Ignore pattern at your own peril
	        animation: "fade",              //String: Select your animation type, "fade" or "slide"
	        easing: "swing",                //{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
	        direction: "horizontal",        //String: Select the sliding direction, "horizontal" or "vertical"
	        reverse: false,                 //{NEW} Boolean: Reverse the animation direction
	        animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
	        smoothHeight: false,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
	        startAt: 0,                     //Integer: The slide that the slider should start on. Array notation (0 = first slide)
	        slideshow: true,                //Boolean: Animate slider automatically
	        slideshowSpeed: 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
	        animationSpeed: 600,            //Integer: Set the speed of animations, in milliseconds
	        initDelay: 0,                   //{NEW} Integer: Set an initialization delay, in milliseconds
	        randomize: false,               //Boolean: Randomize slide order
	        fadeFirstSlide: true,           //Boolean: Fade in the first slide when animation type is "fade"
	        thumbCaptions: false,           //Boolean: Whether or not to put captions on thumbnails when using the "thumbnails" controlNav.

	        // Usability features
	        pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
	        pauseOnHover: false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
	        pauseInvisible: true,   		//{NEW} Boolean: Pause the slideshow when tab is invisible, resume when visible. Provides better UX, lower CPU usage.
	        useCSS: true,                   //{NEW} Boolean: Slider will use CSS3 transitions if available
	        touch: true,                    //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
	        video: false,                   //{NEW} Boolean: If using video in the slider, will prevent CSS3 3D Transforms to avoid graphical glitches

	        // Primary Controls
	        controlNav: true,               //Boolean: Create navigation for paging control of each slide? Note: Leave true for manualControls usage
	        directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
	        prevText: "Previous",           //String: Set the text for the "previous" directionNav item
	        nextText: "Next",               //String: Set the text for the "next" directionNav item

	        // Secondary Navigation
	        keyboard: true,                 //Boolean: Allow slider navigating via keyboard left/right keys
	        multipleKeyboard: false,        //{NEW} Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
	        mousewheel: false,              //{UPDATED} Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel
	        pausePlay: false,               //Boolean: Create pause/play dynamic element
	        pauseText: "Pause",             //String: Set the text for the "pause" pausePlay item
	        playText: "Play",               //String: Set the text for the "play" pausePlay item

	        // Special properties
	        controlsContainer: "",          //{UPDATED} jQuery Object/Selector: Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be $(".flexslider-container"). Property is ignored if given element is not found.
	        manualControls: "",             //{UPDATED} jQuery Object/Selector: Declare custom control navigation. Examples would be $(".flex-control-nav li") or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
	        customDirectionNav: "",         //{NEW} jQuery Object/Selector: Custom prev / next button. Must be two jQuery elements. In order to make the events work they have to have the classes "prev" and "next" (plus namespace)
	        sync: "",                       //{NEW} Selector: Mirror the actions performed on this slider with another slider. Use with care.
	        asNavFor: "",                   //{NEW} Selector: Internal property exposed for turning the slider into a thumbnail navigation for another slider

	        // Carousel Options
	        itemWidth: 0,                   //{NEW} Integer: Box-model width of individual carousel items, including horizontal borders and padding.
	        itemMargin: 0,                  //{NEW} Integer: Margin between carousel items.
	        minItems: 1,                    //{NEW} Integer: Minimum number of carousel items that should be visible. Items will resize fluidly when below this.
	        maxItems: 0,                    //{NEW} Integer: Maxmimum number of carousel items that should be visible. Items will resize fluidly when above this limit.
	        move: 0,                        //{NEW} Integer: Number of carousel items that should move on animation. If 0, slider will move all visible items.
	        allowOneSlide: true,           //{NEW} Boolean: Whether or not to allow a slider comprised of a single slide

	        // Callback API
	        start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
	        before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
	        after: function(){},            //Callback: function(slider) - Fires after each slider animation completes
	        end: function(){},              //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)
	        added: function(){},            //{NEW} Callback: function(slider) - Fires after a slide is added
	        removed: function(){},           //{NEW} Callback: function(slider) - Fires after a slide is removed
	        init: function() {}             //{NEW} Callback: function(slider) - Fires after the slider is initially setup
	    };

	    //FlexSlider: Plugin Function
	    $.fn.flexslider = function(options) {
	        if (options === undefined) { options = {}; }

	        if (typeof options === "object") {
	            return this.each(function() {
	                var $this = $(this),
	                    selector = (options.selector) ? options.selector : ".slides > li",
	                    $slides = $this.find(selector);

	                if ( ( $slides.length === 1 && options.allowOneSlide === true ) || $slides.length === 0 ) {
	                    $slides.fadeIn(400);
	                    if (options.start) { options.start($this); }
	                } else if ($this.data('flexslider') === undefined) {
	                    new $.flexslider(this, options);
	                }
	            });
	        } else {
	            // Helper strings to quickly perform functions on the slider
	            var $slider = $(this).data('flexslider');
	            switch (options) {
	                case "play": $slider.play(); break;
	                case "pause": $slider.pause(); break;
	                case "stop": $slider.stop(); break;
	                case "next": $slider.flexAnimate($slider.getTarget("next"), true); break;
	                case "prev":
	                case "previous": $slider.flexAnimate($slider.getTarget("prev"), true); break;
	                default: if (typeof options === "number") { $slider.flexAnimate(options, true); }
	            }
	        }
	    };
	})(jQuery);
	/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__(20).setImmediate))

/***/ }),
/* 20 */
/***/ (function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function(global) {var scope = (typeof global !== "undefined" && global) ||
	            (typeof self !== "undefined" && self) ||
	            window;
	var apply = Function.prototype.apply;

	// DOM APIs, for completeness

	exports.setTimeout = function() {
	  return new Timeout(apply.call(setTimeout, scope, arguments), clearTimeout);
	};
	exports.setInterval = function() {
	  return new Timeout(apply.call(setInterval, scope, arguments), clearInterval);
	};
	exports.clearTimeout =
	exports.clearInterval = function(timeout) {
	  if (timeout) {
	    timeout.close();
	  }
	};

	function Timeout(id, clearFn) {
	  this._id = id;
	  this._clearFn = clearFn;
	}
	Timeout.prototype.unref = Timeout.prototype.ref = function() {};
	Timeout.prototype.close = function() {
	  this._clearFn.call(scope, this._id);
	};

	// Does not start the time, just sets up the members needed.
	exports.enroll = function(item, msecs) {
	  clearTimeout(item._idleTimeoutId);
	  item._idleTimeout = msecs;
	};

	exports.unenroll = function(item) {
	  clearTimeout(item._idleTimeoutId);
	  item._idleTimeout = -1;
	};

	exports._unrefActive = exports.active = function(item) {
	  clearTimeout(item._idleTimeoutId);

	  var msecs = item._idleTimeout;
	  if (msecs >= 0) {
	    item._idleTimeoutId = setTimeout(function onTimeout() {
	      if (item._onTimeout)
	        item._onTimeout();
	    }, msecs);
	  }
	};

	// setimmediate attaches itself to the global object
	__webpack_require__(21);
	// On some exotic environments, it's not clear which object `setimmediate` was
	// able to install onto.  Search each possibility in the same order as the
	// `setimmediate` library.
	exports.setImmediate = (typeof self !== "undefined" && self.setImmediate) ||
	                       (typeof global !== "undefined" && global.setImmediate) ||
	                       (this && this.setImmediate);
	exports.clearImmediate = (typeof self !== "undefined" && self.clearImmediate) ||
	                         (typeof global !== "undefined" && global.clearImmediate) ||
	                         (this && this.clearImmediate);

	/* WEBPACK VAR INJECTION */}.call(exports, (function() { return this; }())))

/***/ }),
/* 21 */
/***/ (function(module, exports, __webpack_require__) {

	/* WEBPACK VAR INJECTION */(function(global, process) {(function (global, undefined) {
	    "use strict";

	    if (global.setImmediate) {
	        return;
	    }

	    var nextHandle = 1; // Spec says greater than zero
	    var tasksByHandle = {};
	    var currentlyRunningATask = false;
	    var doc = global.document;
	    var registerImmediate;

	    function setImmediate(callback) {
	      // Callback can either be a function or a string
	      if (typeof callback !== "function") {
	        callback = new Function("" + callback);
	      }
	      // Copy function arguments
	      var args = new Array(arguments.length - 1);
	      for (var i = 0; i < args.length; i++) {
	          args[i] = arguments[i + 1];
	      }
	      // Store and register the task
	      var task = { callback: callback, args: args };
	      tasksByHandle[nextHandle] = task;
	      registerImmediate(nextHandle);
	      return nextHandle++;
	    }

	    function clearImmediate(handle) {
	        delete tasksByHandle[handle];
	    }

	    function run(task) {
	        var callback = task.callback;
	        var args = task.args;
	        switch (args.length) {
	        case 0:
	            callback();
	            break;
	        case 1:
	            callback(args[0]);
	            break;
	        case 2:
	            callback(args[0], args[1]);
	            break;
	        case 3:
	            callback(args[0], args[1], args[2]);
	            break;
	        default:
	            callback.apply(undefined, args);
	            break;
	        }
	    }

	    function runIfPresent(handle) {
	        // From the spec: "Wait until any invocations of this algorithm started before this one have completed."
	        // So if we're currently running a task, we'll need to delay this invocation.
	        if (currentlyRunningATask) {
	            // Delay by doing a setTimeout. setImmediate was tried instead, but in Firefox 7 it generated a
	            // "too much recursion" error.
	            setTimeout(runIfPresent, 0, handle);
	        } else {
	            var task = tasksByHandle[handle];
	            if (task) {
	                currentlyRunningATask = true;
	                try {
	                    run(task);
	                } finally {
	                    clearImmediate(handle);
	                    currentlyRunningATask = false;
	                }
	            }
	        }
	    }

	    function installNextTickImplementation() {
	        registerImmediate = function(handle) {
	            process.nextTick(function () { runIfPresent(handle); });
	        };
	    }

	    function canUsePostMessage() {
	        // The test against `importScripts` prevents this implementation from being installed inside a web worker,
	        // where `global.postMessage` means something completely different and can't be used for this purpose.
	        if (global.postMessage && !global.importScripts) {
	            var postMessageIsAsynchronous = true;
	            var oldOnMessage = global.onmessage;
	            global.onmessage = function() {
	                postMessageIsAsynchronous = false;
	            };
	            global.postMessage("", "*");
	            global.onmessage = oldOnMessage;
	            return postMessageIsAsynchronous;
	        }
	    }

	    function installPostMessageImplementation() {
	        // Installs an event handler on `global` for the `message` event: see
	        // * https://developer.mozilla.org/en/DOM/window.postMessage
	        // * http://www.whatwg.org/specs/web-apps/current-work/multipage/comms.html#crossDocumentMessages

	        var messagePrefix = "setImmediate$" + Math.random() + "$";
	        var onGlobalMessage = function(event) {
	            if (event.source === global &&
	                typeof event.data === "string" &&
	                event.data.indexOf(messagePrefix) === 0) {
	                runIfPresent(+event.data.slice(messagePrefix.length));
	            }
	        };

	        if (global.addEventListener) {
	            global.addEventListener("message", onGlobalMessage, false);
	        } else {
	            global.attachEvent("onmessage", onGlobalMessage);
	        }

	        registerImmediate = function(handle) {
	            global.postMessage(messagePrefix + handle, "*");
	        };
	    }

	    function installMessageChannelImplementation() {
	        var channel = new MessageChannel();
	        channel.port1.onmessage = function(event) {
	            var handle = event.data;
	            runIfPresent(handle);
	        };

	        registerImmediate = function(handle) {
	            channel.port2.postMessage(handle);
	        };
	    }

	    function installReadyStateChangeImplementation() {
	        var html = doc.documentElement;
	        registerImmediate = function(handle) {
	            // Create a <script> element; its readystatechange event will be fired asynchronously once it is inserted
	            // into the document. Do so, thus queuing up the task. Remember to clean up once it's been called.
	            var script = doc.createElement("script");
	            script.onreadystatechange = function () {
	                runIfPresent(handle);
	                script.onreadystatechange = null;
	                html.removeChild(script);
	                script = null;
	            };
	            html.appendChild(script);
	        };
	    }

	    function installSetTimeoutImplementation() {
	        registerImmediate = function(handle) {
	            setTimeout(runIfPresent, 0, handle);
	        };
	    }

	    // If supported, we should attach to the prototype of global, since that is where setTimeout et al. live.
	    var attachTo = Object.getPrototypeOf && Object.getPrototypeOf(global);
	    attachTo = attachTo && attachTo.setTimeout ? attachTo : global;

	    // Don't get fooled by e.g. browserify environments.
	    if ({}.toString.call(global.process) === "[object process]") {
	        // For Node.js before 0.9
	        installNextTickImplementation();

	    } else if (canUsePostMessage()) {
	        // For non-IE10 modern browsers
	        installPostMessageImplementation();

	    } else if (global.MessageChannel) {
	        // For web workers, where supported
	        installMessageChannelImplementation();

	    } else if (doc && "onreadystatechange" in doc.createElement("script")) {
	        // For IE 6–8
	        installReadyStateChangeImplementation();

	    } else {
	        // For older browsers
	        installSetTimeoutImplementation();
	    }

	    attachTo.setImmediate = setImmediate;
	    attachTo.clearImmediate = clearImmediate;
	}(typeof self === "undefined" ? typeof global === "undefined" ? this : global : self));

	/* WEBPACK VAR INJECTION */}.call(exports, (function() { return this; }()), __webpack_require__(22)))

/***/ }),
/* 22 */
/***/ (function(module, exports) {

	// shim for using process in browser
	var process = module.exports = {};

	// cached from whatever global is present so that test runners that stub it
	// don't break things.  But we need to wrap it in a try catch in case it is
	// wrapped in strict mode code which doesn't define any globals.  It's inside a
	// function because try/catches deoptimize in certain engines.

	var cachedSetTimeout;
	var cachedClearTimeout;

	function defaultSetTimout() {
	    throw new Error('setTimeout has not been defined');
	}
	function defaultClearTimeout () {
	    throw new Error('clearTimeout has not been defined');
	}
	(function () {
	    try {
	        if (typeof setTimeout === 'function') {
	            cachedSetTimeout = setTimeout;
	        } else {
	            cachedSetTimeout = defaultSetTimout;
	        }
	    } catch (e) {
	        cachedSetTimeout = defaultSetTimout;
	    }
	    try {
	        if (typeof clearTimeout === 'function') {
	            cachedClearTimeout = clearTimeout;
	        } else {
	            cachedClearTimeout = defaultClearTimeout;
	        }
	    } catch (e) {
	        cachedClearTimeout = defaultClearTimeout;
	    }
	} ())
	function runTimeout(fun) {
	    if (cachedSetTimeout === setTimeout) {
	        //normal enviroments in sane situations
	        return setTimeout(fun, 0);
	    }
	    // if setTimeout wasn't available but was latter defined
	    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
	        cachedSetTimeout = setTimeout;
	        return setTimeout(fun, 0);
	    }
	    try {
	        // when when somebody has screwed with setTimeout but no I.E. maddness
	        return cachedSetTimeout(fun, 0);
	    } catch(e){
	        try {
	            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
	            return cachedSetTimeout.call(null, fun, 0);
	        } catch(e){
	            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
	            return cachedSetTimeout.call(this, fun, 0);
	        }
	    }


	}
	function runClearTimeout(marker) {
	    if (cachedClearTimeout === clearTimeout) {
	        //normal enviroments in sane situations
	        return clearTimeout(marker);
	    }
	    // if clearTimeout wasn't available but was latter defined
	    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
	        cachedClearTimeout = clearTimeout;
	        return clearTimeout(marker);
	    }
	    try {
	        // when when somebody has screwed with setTimeout but no I.E. maddness
	        return cachedClearTimeout(marker);
	    } catch (e){
	        try {
	            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
	            return cachedClearTimeout.call(null, marker);
	        } catch (e){
	            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
	            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
	            return cachedClearTimeout.call(this, marker);
	        }
	    }



	}
	var queue = [];
	var draining = false;
	var currentQueue;
	var queueIndex = -1;

	function cleanUpNextTick() {
	    if (!draining || !currentQueue) {
	        return;
	    }
	    draining = false;
	    if (currentQueue.length) {
	        queue = currentQueue.concat(queue);
	    } else {
	        queueIndex = -1;
	    }
	    if (queue.length) {
	        drainQueue();
	    }
	}

	function drainQueue() {
	    if (draining) {
	        return;
	    }
	    var timeout = runTimeout(cleanUpNextTick);
	    draining = true;

	    var len = queue.length;
	    while(len) {
	        currentQueue = queue;
	        queue = [];
	        while (++queueIndex < len) {
	            if (currentQueue) {
	                currentQueue[queueIndex].run();
	            }
	        }
	        queueIndex = -1;
	        len = queue.length;
	    }
	    currentQueue = null;
	    draining = false;
	    runClearTimeout(timeout);
	}

	process.nextTick = function (fun) {
	    var args = new Array(arguments.length - 1);
	    if (arguments.length > 1) {
	        for (var i = 1; i < arguments.length; i++) {
	            args[i - 1] = arguments[i];
	        }
	    }
	    queue.push(new Item(fun, args));
	    if (queue.length === 1 && !draining) {
	        runTimeout(drainQueue);
	    }
	};

	// v8 likes predictible objects
	function Item(fun, array) {
	    this.fun = fun;
	    this.array = array;
	}
	Item.prototype.run = function () {
	    this.fun.apply(null, this.array);
	};
	process.title = 'browser';
	process.browser = true;
	process.env = {};
	process.argv = [];
	process.version = ''; // empty string to avoid regexp issues
	process.versions = {};

	function noop() {}

	process.on = noop;
	process.addListener = noop;
	process.once = noop;
	process.off = noop;
	process.removeListener = noop;
	process.removeAllListeners = noop;
	process.emit = noop;
	process.prependListener = noop;
	process.prependOnceListener = noop;

	process.listeners = function (name) { return [] }

	process.binding = function (name) {
	    throw new Error('process.binding is not supported');
	};

	process.cwd = function () { return '/' };
	process.chdir = function (dir) {
	    throw new Error('process.chdir is not supported');
	};
	process.umask = function() { return 0; };


/***/ }),
/* 23 */,
/* 24 */,
/* 25 */,
/* 26 */,
/* 27 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by shenshen on 16/1/28.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var slide = __webpack_require__(19);
	    return {
	        _jobName: "item/item", // 操控室
	        check: function () {
	            return true;
	        },
	        init: function () {
	            // 公司分类
	            var comType = $(".js-ins-box");
	            if ( comType.length > 0 ) {
	                comType.on("click" , function (e) {
	                    if ( $(this).attr("data-click") == 0 ) {
	                        $(this).find(".js-ins-list").fadeIn();
	                    } else {
	                        $(this).find(".js-ins-list").fadeOut();
	                    }
	                    $(document).one("click", function(){
	                        comType.find(".js-ins-list").fadeOut();
	                    });
	                    e.stopPropagation();
	                });
	                comType.hover(function(){} , function () {
	                    //$(this).attr("data-click",0);
	                    $(this).find(".js-ins-list").fadeOut();
	                    //$(this).find(".js-ins-list").stop().animate({"opacity":"0"},300);
	                });
	            }
	            // 购买悬浮窗
	            G.customEvent.on("itemSelectPriceDone",function (itemData) {
	                var domsBuy = $("#buyFloat");

	                function popupBuy () {
	                    var buyBtn = $(".js-buy");
	                    var bodyTop = $("body").scrollTop();
	                    var buyLeft = domsBuy.find(".buy-pos-price").offset().left + domsBuy.find(".buy-pos-price").width();

	                    if ( buyBtn.parent().offset().top <= bodyTop ) {
	                        domsBuy.css({"height":"62px"});
	                        buyBtn.css({"position":"fixed","top":"12px","left":(buyLeft + 40) + "px","z-index":"1031"});
	                    } else {
	                        domsBuy.css({"height":"0"});
	                        buyBtn.css({"position":"static","margin-left":"0"});
	                    }
	                }

	                if ( domsBuy.length > 0 ) {
	                    domsBuy.find("em").text(itemData.price);
	                    popupBuy();
	                    $(window).scroll(function () {
	                        popupBuy();
	                    });
	                }
	            });
	            // 购买样式
	            function buyStyle () {
	                if ( $(".js-buy").length > 0 ) {
	                    $(".js-buy").addClass("select");
	                }
	                if ( $(".js-add-cart").length > 0 ) {
	                    $(".js-add-cart").addClass("select");
	                }
	            }
	            function comBut () {
	                if ( $("#supplier").length > 0 ) {
	                    $("#supplier").html("");
	                    $("#itemCompanyAddress").html("");
	                }
	            }
	            G.customEvent.on("itemSelectLocationDone",function () {
	                comBut();
	                buyStyle();
	            });
	            G.customEvent.on("itemSelectTypeDone",function () {
	                comBut();
	                buyStyle();
	            });
	            G.customEvent.on("itemSelectSupplierDone",function () {
	                buyStyle();
	            });
	            G.customEvent.on("itemSelectServiceDone",function () {
	                buyStyle();
	            });
	            G.customEvent.on("itemSelectPriceDone",function () {
	                buyStyle();
	            });
	        },
	        exec: function () {
	            // 焦点图
	            if ($('#product-show').length != 0) {
	                $('#product-show').flexslider({
	                    animation: "slide",
	                    directionNav: false,
	                    slideshow: true
	                });
	            }
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 28 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by shenshen on 16/1/28.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var element = $("#itemLocation");
	    var doms = {};
	    var locationRomance;
	    var itemData = {
	        "productIdStr": window.pageInfo.productIdStr,
	        "quantity": 1,
	        "packageIdStr":  "",
	        "sourceTypeIdStr": "1HR-2g~~"
	    };
	    return {
	        _jobName: "item/location",
	        check: function () {
	            return element.length != 0;
	        },
	        init: function () {

	        },
	        exec: function () {
	            var areaId = window.pageInfo.cityId;
	            var maxTab = 3;
	            var hotareaHtml = "",
	                locationHtml = ""; // 拼接的html
	            var choiceAddress = "";
	            var parentid = "";
	            var firstInfo;
	            var dlLoca = "大陆地区"; // 大陆地区id
	            doms.locationBody = $(".shore-add-list");
	            // 绑定显示事件
	            element.on("click", function () {
	                doms.locationBody.show();
	                element.css({"border-bottom": "1px #fff solid"});
	            });
	            // 关闭地址框
	            $(".shore-close").on("click", function () {
	                doms.locationBody.hide();
	                element.css({"border-bottom": "1px #ccc solid"});
	            });
	            locationRomance = function () {
	                choiceAddress = "";
	                hotareaHtml = "";
	                locationHtml = "";
	                $.ajax({
	                    type: "get",
	                    url: "/gongsibao-web/web/product/firstarealist",
	                    data: itemData, // 组织形式id
	                    success: function (res) {
	                        if (res.code == 200) {
	                            firstInfo = res.data.dictFirstAreaLists;
	                            if ( res.data.dictFirstAreaLists.length == 1 && res.data.dictFirstAreaLists[0].name == dlLoca ) {
	                                res.data.dictHotAreaLists = [];
	                            }
	                            $.each(res.data.dictHotAreaLists, function (lv1_i, tag) {
	                                hotareaHtml += "<span class='shore-list-tag pull-left'><em class='ml15 pl5 pr5 pull-left' parentid=" + tag.pkIdStr + " isnext=" + tag.next + " linkId=" + tag.pkIdStr + ">" + tag.name + "</em></span>";
	                            });
	                            $.each(res.data.dictFirstAreaLists, function (lv1_i, tag) {
	                                locationHtml += "<span class='shore-list-tag pull-left'><em class='ml15 pl5 pr5 pull-left' parentid=" + tag.pkIdStr + " isnext=" + tag.next + " linkId=" + tag.pkIdStr + ">" + tag.name + "</em></span>";
	                            });
	                            if (hotareaHtml != "") {
	                                $(".shore-list-con:eq(0) .shore-hotarea").html(hotareaHtml);
	                                $(".shore-list-con:eq(0) .shore-firstarea").html(locationHtml);
	                            } else {
	                                $(".shore-list-con:eq(0)").html("<div class='shore-firstarea'>" + locationHtml + "</div>");
	                            }
	                            if (locationHtml != "") {
	                                var lv0;
	                                if (!!areaId && areaId != "0") {
	                                    areaId = areaId.split("|");
	                                    lv0 = $(".shore-list-con:eq(0) em[parentid=" + areaId[0] + "]");
	                                } else {
	                                    lv0 = $(".shore-firstarea em:eq(0)");
	                                }
	                                lv0.addClass("select");
	                                if (locationHtml != "") {
	                                    if (lv0.attr("isnext") == "true") {
	                                        lv1(0, lv0, lv0.attr("parentid"));
	                                    } else {
	                                        $(".shore-list-tit span:eq(0)").text(lv0.text());
	                                        choiceAddress += lv0.text();
	                                        element.find("span").html(choiceAddress);
	                                        itemData.cityIdStr = lv0.attr("parentid");
	                                        G.customEvent.trigger("itemSelectLocationDone", itemData);
	                                    }
	                                } else {
	                                    element.find("span").html("请选择");
	                                    itemData.cityIdStr = "";
	                                }
	                            } else {
	                                element.find("span").html("请选择");
	                                itemData.cityIdStr = "";
	                            }
	                        }
	                    }
	                });
	            };
	            locationRomance();
	            function lv1(index, label, aId) {
	                if ( aId == "1nR72ty9EFJQ" || aId == "1nR72ty9EVJQ" ) {
	                    $("#icaTip").attr("log","1");
	                }
	                $(".shore-list-tit span:eq(" + index + ")").text(label.text());
	                choiceAddress += label.text() + "&nbsp;-&nbsp;";
	                $(".shore-list-tit li:eq(" + index + ")").removeClass("select");
	                $(".shore-list-tit li:eq(" + index + ")").next().show().addClass("select");
	                $(".shore-list-con:eq(" + index + ")").hide();
	                $(".shore-list-con:eq(" + index + ")").next().show();
	                $.get("/gongsibao-web/web/product/arealist", {
	                    "productIdStr": itemData.productIdStr, // 组织形式id
	                    "cityIdStr": aId
	                }, function (res) {
	                    if (res.code == 200) {
	                        locationHtml = "";
	                        $.each(res.data, function (lv1_i, tag) {
	                            locationHtml += "<span class='shore-list-tag pull-left'><em class='ml15 pl5 pr5 pull-left' parentid=" + tag.pkIdStr + " isnext=" + tag.next + " linkId=" + label.attr("linkId") + "|" + tag.pkIdStr + " cmsCityId='" + tag.pkId + "'>" + tag.name + "</em></span>";
	                        });
	                        $(".shore-list-con").eq(index + 1).html(locationHtml);
	                        var lv;
	                        if (!!areaId && areaId != "0") {
	                            lv = $(".shore-list-con").eq(index + 1).find("em[parentid=" + areaId[index + 1] + "]");
	                        } else {
	                            lv = $(".shore-list-con").eq(index + 1).find("em").eq(0);
	                        }
	                        lv.addClass("select");

	                        if (locationHtml != "") {
	                            if (lv.attr("isnext") == "true") {
	                                lv1(index + 1, lv, lv.attr("parentid"));
	                            } else {
	                                $(".shore-list-tit span").eq(index + 1).text(lv.text());
	                                if ( lv.text() == dlLoca ) {
	                                    if ( firstInfo.length == 1 ) {
	                                        choiceAddress = lv.text();
	                                        $(".shore-list-tit li").hide();
	                                        $(".shore-list-tit li:last").show();
	                                    } else {
	                                        choiceAddress = lv.text();
	                                    }
	                                } else {
	                                    choiceAddress += lv.text();
	                                }
	                                element.find("span").html(choiceAddress);
	                                itemData.cityIdStr = lv.attr("parentid");
	                                G.customEvent.trigger("itemSelectLocationDone", itemData);
	                            }
	                        } else {
	                            element.find("span").html("请选择");
	                            itemData.cityIdStr = "";
	                        }
	                    } else {
	                        element.find("span").html("请选择");
	                        itemData.cityIdStr = "";
	                    }
	                });
	            }

	            // 选地址
	            var bodys = $(".shore-list-con");
	            bodys.each(function (index, el) {
	                $(el).on("click", "em", function () {
	                    $(this).parents(".shore-list-con").find("em").removeClass("select");
	                    $(this).addClass("select");
	                    // 给选择的最终地址赋值
	                    var newName = choiceAddress.split("-");
	                    if (index == 0) {
	                        newName[0] = $(this).text() + "&nbsp;";
	                    } else if (index != maxTab - 1) {
	                        newName[index] = "&nbsp;" + $(this).text() + "&nbsp;";
	                    }
	                    choiceAddress = newName.join("-");

	                    //给 切换标签赋值
	                    $(".shore-list-tit span").eq(index).text($(this).text());
	                    // 获取下一级的地址签
	                    var hasNextLevel = $(this).attr("isnext");
	                    var linkId = $(this).attr("linkId");
	                    if (hasNextLevel == "true") {
	                        locationHtml = "";
	                        bodys.hide();
	                        $(".location-loading").show();
	                        $(".shore-list-tit span").eq(index).parent().removeClass("select");
	                        $(".shore-list-tit span").eq(index + 1).text("请选择").parent().show().addClass("select");
	                        if (index != maxTab - 1) {
	                            $(".shore-list-tit span:gt(" + index + 1 + ")").parent().hide();
	                        }
	                        $.get("/gongsibao-web/web/product/arealist", {
	                            "productIdStr": itemData.productIdStr, // 组织形式id
	                            "cityIdStr": $(this).attr("parentid")
	                        }, function (res) {
	                            if (res.code == 200) {
	                                $.each(res.data, function (hqIndex, tag) {
	                                    locationHtml += "<span class='shore-list-tag pull-left'><em class='ml15 pl5 pr5 pull-left' parentid=" + tag.pkIdStr + " isnext=" + tag.next + " linkId=" + linkId + "|" + tag.pkIdStr + " cmsCityId='" + tag.pkId + "'>" + tag.name + "</em></span>";
	                                });
	                                $(".location-loading").hide();
	                                bodys.eq(index + 1).show().html(locationHtml);
	                            } else {
	                                element.find("span").html("请选择");
	                                itemData.cityIdStr = "";
	                            }
	                        });
	                    } else {
	                        location.href = "/item/" + window.pageInfo.phpId + ".html?cityId=" + $(this).attr("linkId") + "&" +
	                            "cmsCityId=" + $(this).attr("cmsCityId");
	                    }
	                });
	            });

	        }
	    }
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 29 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by liliy_000 on 2016/2/25.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var getComTypeOpr;
	    var doms = {};
	    return {
	        _jobName: "item/type",
	        check: function () {
	            return true;
	        },
	        init: function () {
	            G.customEvent.on("itemSelectLocationDone",function (itemData) {
	                if ( $("#itemTypeTag").length > 0 ) {
	                    getComTypeOpr(itemData);
	                } else {
	                    G.customEvent.trigger("itemSelectTypeDone", itemData);
	                }
	            });
	        },
	        exec: function () {
	            doms.typeTag = $("#itemTypeTag");
	            getComTypeOpr = function (itemData) {
	                var tagHtml = "";
	                $.ajax({
	                    type: "get",
	                    url: "/gongsibao-web/web/product/crbusinessType",
	                    data: itemData,
	                    success: function (res) {
	                        if (res.code == 200) {
	                            $.each(res.data, function (index, type) {
	                                tagHtml += '<li data-index="' + index + '" class="js-tab-title-type posr"><a href="javascript:;" crbusinesstypeid="' + type.pkidStr + '"class="tip-item">' + type.name + '</a><em class="posa hide">' + type.remark + '</em></li>';
	                            });
	                            if ( tagHtml != "" ) {
	                                doms.typeTag.html(tagHtml);
	                                itemData.propertyIdStr = doms.typeTag.find("a:eq(0)").attr("crbusinesstypeid");
	                                doms.typeTag.find("li:eq(0)").addClass("active");
	                                G.customEvent.trigger("itemSelectTypeDone",itemData);
	                                tagClick(itemData);
	                            } else {
	                                doms.typeTag.html("");
	                                itemData.crbusinesstype_id = "";
	                            }
	                        } else {
	                            itemData.crbusinesstype_id = "";
	                        }
	                    }
	                });
	                var tagClick = function (itemData) {
	                    doms.typeTag.find("li").on("click",function () {
	                        if ( !$(this).hasClass("active") ) {
	                            itemData.propertyIdStr = $(this).find("a").attr("crbusinesstypeid");
	                            G.customEvent.trigger("itemSelectTypeDone",itemData);
	                        }
	                    });
	                    doms.typeTag.find("a").hover(function () {
	                        if ( $(this).next().text() != "" ) {
	                            $(this).next().fadeIn();
	                        }
	                    },function () {
	                        $(this).next().fadeOut();
	                    });
	                }
	            }
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 30 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by shenshen on 16/1/28.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var layer = __webpack_require__(9);
	    var slide = __webpack_require__(19);
	    var supplierRomance;
	    var doms = $("#supplier");

	    var supplierDom = __webpack_require__(31);
	    return {
	        _jobName: "item/supplier",
	        check: function () {
	            return true;
	        },
	        init: function () {
	            G.customEvent.on("itemSelectTypeDone",function (itemData) {
	                if ( doms.length > 0 ) {
	                    supplierRomance(itemData);
	                } else {
	                    G.customEvent.trigger("itemSelectSupplierDone", itemData);
	                }
	            });
	        },
	        exec: function () {
	            supplierRomance = function (itemData) {
	                // 初始化列表
	                $.ajax({
	                    type: "get",
	                    url: "/gongsibao-web/web/product/agentUserIds",
	                    data: itemData,
	                    success: function (res) {
	                        if (res.code == 200) {
	                            var supplierHtml = "";
	                            if ( res.data.length > 0 ) {
	                                $.each(res.data , function ( index , info ) {
	                                    info.addTab = $("#itemCompanyAddress").attr("data-zcdz");
	                                    supplierHtml += supplierDom(info);
	                                });
	                                doms.html(supplierHtml);
	                                writeCon(res);
	                            } else {
	                                doms.html("");
	                            }
	                        }
	                    }
	                });
	                function writeCon() {
	                    if ( doms.find("[data-tab]").length > 0 ) {
	                        var zcdzH = "";
	                        var noAddLen = doms.find("[data-tab=0]");
	                        var haveLen = doms.find("[data-tab=1]");
	                        var gsbHaveLen = doms.find("[data-tab=2]");
	                        var zcdz = 0;

	                        if ( noAddLen.length > 0 && noAddLen.length == doms.find("li[data-tab]").length ) {
	                            zcdzH += '<li class="active" data-tab="1">' +
	                                     '<a href="javascript:;" title="自有地址" class="tip-item">自有地址</a>' +
	                                     '</li>';
	                            noAddLen.removeClass("select");
	                            zcdz = 1;
	                        } else if ( gsbHaveLen.length > 0 && gsbHaveLen.length == doms.find("li[data-tab]").length ) {
	                            zcdzH += '<li class="active" data-tab="2">' +
	                                     '<a href="javascript:;" title="公司宝地址" class="tip-item">公司宝地址</a>"+' +
	                                     '</li>';
	                            if ($("#icaTip").attr("log") == "1") {
	                                $("#icaTip").show();
	                            }
	                            gsbHaveLen.removeClass("select");
	                            zcdz = 2;
	                        } else {
	                            if ( $("#itemCompanyAddress").attr("data-zcdz") == 1 ) {
	                                zcdzH += '<li data-tab="1" class="active">'+
	                                         '<a href="javascript:;" title="自有地址" class="tip-item">自有地址</a>'+
	                                         '</li><li data-tab="2">'+
	                                         '<a href="javascript:;" title="公司宝地址" class="tip-item">公司宝地址</a>'+
	                                         '</li>';
	                                zcdz = 1;
	                                haveLen.removeClass("select");
	                                noAddLen.removeClass("select");
	                            } else {
	                                zcdzH += '<li data-tab="1">'+
	                                         '<a href="javascript:;" title="自有地址" class="tip-item">自有地址</a>'+
	                                         '</li><li data-tab="2" class="active">'+
	                                         '<a href="javascript:;" title="公司宝地址" class="tip-item">公司宝地址</a>'+
	                                         '</li>';
	                                if ($("#icaTip").attr("log") == "1") {
	                                    $("#icaTip").show();
	                                }
	                                zcdz = 2;
	                                haveLen.removeClass("select");
	                                gsbHaveLen.removeClass("select");
	                            }
	                        }
	                        $("#itemCompanyAddress").attr("data-zcdz" , zcdz).html(zcdzH);
	                        G.customEvent.trigger("itemSelectSupplierDone", itemData);
	                        operation();
	                    }
	                }
	                function operation () {
	                    doms.find(".js-openchat").on("click" , function () {
	                        G.customEvent.trigger("xiaozhiOpen");
	                    });
	                    $("#itemCompanyAddress").find("li").unbind("click").on("click" , function () {
	                        if ( !$(this).hasClass("active") ) {
	                            $("#itemCompanyAddress").find("li").removeClass("active");
	                            $(this).addClass("active");
	                            $("#itemCompanyAddress").attr("data-zcdz" , $(this).attr("data-tab"));
	                            if ( $(this).attr("data-tab") == 1 ) {
	                                doms.find("[data-tab=0]").removeClass("select");
	                                doms.find("[data-tab=1]").removeClass("select");
	                                doms.find("[data-tab=2]").addClass("select");
	                                $("#icaTip").hide();

	                                $.each(doms.find("[data-val=地址费]") , function ( i,e ) {
	                                    if ( $(e).attr("data-show") == "hide" ) {
	                                        $(this).attr("log","0").hide();
	                                        var $domsP = $(this).parent().parent().find(".js-price");
	                                        var num = parseFloat($domsP.attr("data-total")) - parseFloat($(this).attr("data-price"));
	                                        $domsP.text("￥" + (num/100).toFixed(2) ).attr("data-total",num);
	                                    }
	                                });
	                            } else {
	                                doms.find("[data-tab=0]").addClass("select");
	                                doms.find("[data-tab=1]").removeClass("select");
	                                doms.find("[data-tab=2]").removeClass("select");
	                                if ($("#icaTip").attr("log") == "1") {
	                                    $("#icaTip").show();
	                                }

	                                $.each(doms.find("[data-val=地址费]") , function ( i,e ) {
	                                    if ( $(e).attr("data-show") == "hide" ) {
	                                        $(this).attr("log","1").show();
	                                        var $domsP = $(this).parent().parent().find(".js-price");
	                                        var num = parseFloat($domsP.attr("data-total")) + parseFloat($(this).attr("data-price"));
	                                        $domsP.text("￥" + (num/100).toFixed(2) ).attr("data-total",num);
	                                    }
	                                });
	                            }
	                        }
	                    });
	                    var $pTab = $(".js-supplierData");
	                    $pTab.flexslider({
	                        animation: "slide",
	                        slideshow: false,
	                        animationLoop: true, // 循环播放
	                        directionNav: true,
	                        controlNav: false
	                    });
	                    var sdIndex;
	                    $(".js-supplierData-icon").hover(function () {
	                        $(this).find(".js-supplierData").removeClass("select");
	                    },function () {
	                        $(".js-supplierData").hover(function () {
	                        } , function () {
	                            $(this).addClass("select");
	                        });
	                    });
	                }
	            }
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 31 */
/***/ (function(module, exports, __webpack_require__) {

	var jade = __webpack_require__(32);

	module.exports = function template(locals) {
	var buf = [];
	var jade_mixins = {};
	var jade_interp;
	;var locals_for_with = (locals || {});(function (abilityName, addTab, cityName, favorableRate, imgPath, orderCount, organizationName, prodPriceAuditWebRequests, qualifyFileList, responseTime, undefined, userIdStr, userName, workTime) {
	var price = 0;
	var liTab = 0; // 没有地址费 默认为自有地址
	if ( prodPriceAuditWebRequests.length > 0)
	{
	// iterate prodPriceAuditWebRequests
	;(function(){
	  var $$obj = prodPriceAuditWebRequests;
	  if ('number' == typeof $$obj.length) {

	    for (var $index = 0, $$l = $$obj.length; $index < $$l; $index++) {
	      var item = $$obj[$index];

	if ( item.type_name == '地址费')
	{
	if ( !!item.isMust)
	{
	liTab = 2; // 公司宝地址费必选 不可选自有地址
	}
	else
	{
	liTab = 1; // 公司宝地址费可选 有自有地址
	}
	}
	if ( item.type_name == '地址费' && addTab == 2 || item.type_name == '地址费' && !addTab)
	{
	price += item.price
	}
	if ( item.type_name != '地址费')
	{
	price += item.price
	}
	    }

	  } else {
	    var $$l = 0;
	    for (var $index in $$obj) {
	      $$l++;      var item = $$obj[$index];

	if ( item.type_name == '地址费')
	{
	if ( !!item.isMust)
	{
	liTab = 2; // 公司宝地址费必选 不可选自有地址
	}
	else
	{
	liTab = 1; // 公司宝地址费可选 有自有地址
	}
	}
	if ( item.type_name == '地址费' && addTab == 2 || item.type_name == '地址费' && !addTab)
	{
	price += item.price
	}
	if ( item.type_name != '地址费')
	{
	price += item.price
	}
	    }

	  }
	}).call(this);

	buf.push("<li" + (jade.attr("data-id", "" + (userIdStr) + "", true, true)) + (jade.attr("data-tab", '' + (liTab) + '', true, true)) + " class=\"select\"><div class=\"ins-img pull-left pt25\"><a class=\"pb15\"><img" + (jade.attr("src", "" + (imgPath) + "", true, true)) + "></a><span class=\"clearfix\"><i" + (jade.cls(['pull-left',"" + (abilityName == '金牌' ? 'icon0' : '') + "" + (abilityName == '银牌' ? 'icon1' : '') + "" + (abilityName == '铜牌' ? 'icon2' : '') + ""], [null,true])) + "></i>" + (jade.escape((jade_interp = abilityName) == null ? '' : jade_interp)) + "经纪人</span></div><div class=\"ins-btn pull-right pt15\"><span" + (jade.attr("data-total", "" + (price) + "", true, true)) + " class=\"ins-btn-price js-price\">" + (jade.escape((jade_interp = (price / 100).toFixed(2)) == null ? '' : jade_interp)) + "</span><span class=\"ins-btn-cost js-service\">");
	// iterate prodPriceAuditWebRequests
	;(function(){
	  var $$obj = prodPriceAuditWebRequests;
	  if ('number' == typeof $$obj.length) {

	    for (var $index = 0, $$l = $$obj.length; $index < $$l; $index++) {
	      var item = $$obj[$index];

	if ( item.type_name == '地址费' && addTab == 1)
	{
	buf.push("<em log=\"0\"" + (jade.attr("termid", "" + (item.pkidStr) + "", true, true)) + (jade.attr("data-price", "" + (item.price) + "", true, true)) + (jade.attr("data-val", "" + (item.type_name) + "", true, true)) + " data-show=\"hide\" class=\"pl10 pr10 hide\">" + (jade.escape((jade_interp = item.type_name) == null ? '' : jade_interp)) + "：￥" + (jade.escape((jade_interp = (item.price / 100).toFixed(2)) == null ? '' : jade_interp)) + "</em>");
	}
	else if ( item.type_name == '地址费' && addTab == 2 || item.type_name == '地址费' && !addTab)
	{
	buf.push("<em log=\"1\"" + (jade.attr("termid", "" + (item.pkidStr) + "", true, true)) + (jade.attr("data-price", "" + (item.price) + "", true, true)) + (jade.attr("data-val", "" + (item.type_name) + "", true, true)) + " data-show=\"hide\" class=\"pl10 pr10\">" + (jade.escape((jade_interp = item.type_name) == null ? '' : jade_interp)) + "：￥" + (jade.escape((jade_interp = (item.price / 100).toFixed(2)) == null ? '' : jade_interp)) + "</em>");
	}
	if ( item.type_name != '地址费')
	{
	buf.push("<em log=\"1\"" + (jade.attr("termid", "" + (item.pkidStr) + "", true, true)) + (jade.attr("data-price", "" + (item.price) + "", true, true)) + (jade.attr("data-val", "" + (item.type_name) + "", true, true)) + " data-show=\"show\" class=\"pl10 pr10\">" + (jade.escape((jade_interp = item.type_name) == null ? '' : jade_interp)) + "：￥" + (jade.escape((jade_interp = (item.price / 100).toFixed(2)) == null ? '' : jade_interp)) + "</em>");
	}
	    }

	  } else {
	    var $$l = 0;
	    for (var $index in $$obj) {
	      $$l++;      var item = $$obj[$index];

	if ( item.type_name == '地址费' && addTab == 1)
	{
	buf.push("<em log=\"0\"" + (jade.attr("termid", "" + (item.pkidStr) + "", true, true)) + (jade.attr("data-price", "" + (item.price) + "", true, true)) + (jade.attr("data-val", "" + (item.type_name) + "", true, true)) + " data-show=\"hide\" class=\"pl10 pr10 hide\">" + (jade.escape((jade_interp = item.type_name) == null ? '' : jade_interp)) + "：￥" + (jade.escape((jade_interp = (item.price / 100).toFixed(2)) == null ? '' : jade_interp)) + "</em>");
	}
	else if ( item.type_name == '地址费' && addTab == 2 || item.type_name == '地址费' && !addTab)
	{
	buf.push("<em log=\"1\"" + (jade.attr("termid", "" + (item.pkidStr) + "", true, true)) + (jade.attr("data-price", "" + (item.price) + "", true, true)) + (jade.attr("data-val", "" + (item.type_name) + "", true, true)) + " data-show=\"hide\" class=\"pl10 pr10\">" + (jade.escape((jade_interp = item.type_name) == null ? '' : jade_interp)) + "：￥" + (jade.escape((jade_interp = (item.price / 100).toFixed(2)) == null ? '' : jade_interp)) + "</em>");
	}
	if ( item.type_name != '地址费')
	{
	buf.push("<em log=\"1\"" + (jade.attr("termid", "" + (item.pkidStr) + "", true, true)) + (jade.attr("data-price", "" + (item.price) + "", true, true)) + (jade.attr("data-val", "" + (item.type_name) + "", true, true)) + " data-show=\"show\" class=\"pl10 pr10\">" + (jade.escape((jade_interp = item.type_name) == null ? '' : jade_interp)) + "：￥" + (jade.escape((jade_interp = (item.price / 100).toFixed(2)) == null ? '' : jade_interp)) + "</em>");
	}
	    }

	  }
	}).call(this);

	buf.push("</span><span class=\"ins-btn-buy js-new-buy select\">选Ta服务</span><a href=\"javascript:;\" class=\"js-openchat ins-btn-zixun\">免费咨询</a></div><div class=\"ins-con clearfix pt25 pb15\"><div class=\"pull-left pb15\"><a class=\"title pull-left\">" + (jade.escape((jade_interp = userName) == null ? '' : jade_interp)) + "</a><!--if isSupplier == 1--><!--   a.icon.pull-left()-->");
	if ( !!qualifyFileList && qualifyFileList.length > 0)
	{
	buf.push("<div class=\"js-supplierData-icon supplier-data-icon pull-left posr\"><div class=\"js-supplierData posa supplier-data select\"><h4>资质</h4><i class=\"posa\"></i><div class=\"clear\"></div><ul class=\"slides\">");
	// iterate qualifyFileList
	;(function(){
	  var $$obj = qualifyFileList;
	  if ('number' == typeof $$obj.length) {

	    for (var $index = 0, $$l = $$obj.length; $index < $$l; $index++) {
	      var item = $$obj[$index];

	buf.push("<li><span><img" + (jade.attr("src", "" + (item.url) + "", true, true)) + "></span></li>");
	    }

	  } else {
	    var $$l = 0;
	    for (var $index in $$obj) {
	      $$l++;      var item = $$obj[$index];

	buf.push("<li><span><img" + (jade.attr("src", "" + (item.url) + "", true, true)) + "></span></li>");
	    }

	  }
	}).call(this);

	buf.push("</ul></div></div>");
	}
	buf.push("</div><span class=\"ins-con-sp ins-con-sp1 pull-left pb20\"><i class=\"pull-left\"></i>");
	if ( !cityName && !!organizationName)
	{
	buf.push("" + (jade.escape((jade_interp = organizationName) == null ? '' : jade_interp)) + "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;");
	}
	if ( !!cityName && !!organizationName)
	{
	buf.push("" + (jade.escape((jade_interp = cityName) == null ? '' : jade_interp)) + " - " + (jade.escape((jade_interp = organizationName) == null ? '' : jade_interp)) + "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;");
	}
	if ( !!cityName && !organizationName)
	{
	buf.push("" + (jade.escape((jade_interp = cityName) == null ? '' : jade_interp)) + "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;");
	}
	buf.push("<var>" + (jade.escape((jade_interp = workTime) == null ? '' : jade_interp)) + "年从业经验</var></span><span class=\"ins-con-sp ins-con-sp2 pull-left pb20\"><i class=\"pull-left\"></i>");
	if ( !orderCount || orderCount < 5)
	{
	buf.push("新入驻&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;");
	}
	else
	{
	buf.push("累计服务客户数量：<var>" + (jade.escape((jade_interp = orderCount) == null ? '' : jade_interp)) + "</var>");
	}
	buf.push("&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;\n好评率：<var>" + (jade.escape((jade_interp = favorableRate) == null ? '' : jade_interp)) + "%</var></span><span class=\"ins-con-sp ins-con-sp3 pull-left pb20\"><i class=\"pull-left\"></i>响应时间：" + (jade.escape((jade_interp = responseTime) == null ? '' : jade_interp)) + "分钟之内</span></div></li>");
	}}.call(this,"abilityName" in locals_for_with?locals_for_with.abilityName:typeof abilityName!=="undefined"?abilityName:undefined,"addTab" in locals_for_with?locals_for_with.addTab:typeof addTab!=="undefined"?addTab:undefined,"cityName" in locals_for_with?locals_for_with.cityName:typeof cityName!=="undefined"?cityName:undefined,"favorableRate" in locals_for_with?locals_for_with.favorableRate:typeof favorableRate!=="undefined"?favorableRate:undefined,"imgPath" in locals_for_with?locals_for_with.imgPath:typeof imgPath!=="undefined"?imgPath:undefined,"orderCount" in locals_for_with?locals_for_with.orderCount:typeof orderCount!=="undefined"?orderCount:undefined,"organizationName" in locals_for_with?locals_for_with.organizationName:typeof organizationName!=="undefined"?organizationName:undefined,"prodPriceAuditWebRequests" in locals_for_with?locals_for_with.prodPriceAuditWebRequests:typeof prodPriceAuditWebRequests!=="undefined"?prodPriceAuditWebRequests:undefined,"qualifyFileList" in locals_for_with?locals_for_with.qualifyFileList:typeof qualifyFileList!=="undefined"?qualifyFileList:undefined,"responseTime" in locals_for_with?locals_for_with.responseTime:typeof responseTime!=="undefined"?responseTime:undefined,"undefined" in locals_for_with?locals_for_with.undefined: false?undefined:undefined,"userIdStr" in locals_for_with?locals_for_with.userIdStr:typeof userIdStr!=="undefined"?userIdStr:undefined,"userName" in locals_for_with?locals_for_with.userName:typeof userName!=="undefined"?userName:undefined,"workTime" in locals_for_with?locals_for_with.workTime:typeof workTime!=="undefined"?workTime:undefined));;return buf.join("");
	}

/***/ }),
/* 32 */
/***/ (function(module, exports, __webpack_require__) {

	'use strict';

	/**
	 * Merge two attribute objects giving precedence
	 * to values in object `b`. Classes are special-cased
	 * allowing for arrays and merging/joining appropriately
	 * resulting in a string.
	 *
	 * @param {Object} a
	 * @param {Object} b
	 * @return {Object} a
	 * @api private
	 */

	exports.merge = function merge(a, b) {
	  if (arguments.length === 1) {
	    var attrs = a[0];
	    for (var i = 1; i < a.length; i++) {
	      attrs = merge(attrs, a[i]);
	    }
	    return attrs;
	  }
	  var ac = a['class'];
	  var bc = b['class'];

	  if (ac || bc) {
	    ac = ac || [];
	    bc = bc || [];
	    if (!Array.isArray(ac)) ac = [ac];
	    if (!Array.isArray(bc)) bc = [bc];
	    a['class'] = ac.concat(bc).filter(nulls);
	  }

	  for (var key in b) {
	    if (key != 'class') {
	      a[key] = b[key];
	    }
	  }

	  return a;
	};

	/**
	 * Filter null `val`s.
	 *
	 * @param {*} val
	 * @return {Boolean}
	 * @api private
	 */

	function nulls(val) {
	  return val != null && val !== '';
	}

	/**
	 * join array as classes.
	 *
	 * @param {*} val
	 * @return {String}
	 */
	exports.joinClasses = joinClasses;
	function joinClasses(val) {
	  return (Array.isArray(val) ? val.map(joinClasses) :
	    (val && typeof val === 'object') ? Object.keys(val).filter(function (key) { return val[key]; }) :
	    [val]).filter(nulls).join(' ');
	}

	/**
	 * Render the given classes.
	 *
	 * @param {Array} classes
	 * @param {Array.<Boolean>} escaped
	 * @return {String}
	 */
	exports.cls = function cls(classes, escaped) {
	  var buf = [];
	  for (var i = 0; i < classes.length; i++) {
	    if (escaped && escaped[i]) {
	      buf.push(exports.escape(joinClasses([classes[i]])));
	    } else {
	      buf.push(joinClasses(classes[i]));
	    }
	  }
	  var text = joinClasses(buf);
	  if (text.length) {
	    return ' class="' + text + '"';
	  } else {
	    return '';
	  }
	};


	exports.style = function (val) {
	  if (val && typeof val === 'object') {
	    return Object.keys(val).map(function (style) {
	      return style + ':' + val[style];
	    }).join(';');
	  } else {
	    return val;
	  }
	};
	/**
	 * Render the given attribute.
	 *
	 * @param {String} key
	 * @param {String} val
	 * @param {Boolean} escaped
	 * @param {Boolean} terse
	 * @return {String}
	 */
	exports.attr = function attr(key, val, escaped, terse) {
	  if (key === 'style') {
	    val = exports.style(val);
	  }
	  if ('boolean' == typeof val || null == val) {
	    if (val) {
	      return ' ' + (terse ? key : key + '="' + key + '"');
	    } else {
	      return '';
	    }
	  } else if (0 == key.indexOf('data') && 'string' != typeof val) {
	    if (JSON.stringify(val).indexOf('&') !== -1) {
	      console.warn('Since Jade 2.0.0, ampersands (`&`) in data attributes ' +
	                   'will be escaped to `&amp;`');
	    };
	    if (val && typeof val.toISOString === 'function') {
	      console.warn('Jade will eliminate the double quotes around dates in ' +
	                   'ISO form after 2.0.0');
	    }
	    return ' ' + key + "='" + JSON.stringify(val).replace(/'/g, '&apos;') + "'";
	  } else if (escaped) {
	    if (val && typeof val.toISOString === 'function') {
	      console.warn('Jade will stringify dates in ISO form after 2.0.0');
	    }
	    return ' ' + key + '="' + exports.escape(val) + '"';
	  } else {
	    if (val && typeof val.toISOString === 'function') {
	      console.warn('Jade will stringify dates in ISO form after 2.0.0');
	    }
	    return ' ' + key + '="' + val + '"';
	  }
	};

	/**
	 * Render the given attributes object.
	 *
	 * @param {Object} obj
	 * @param {Object} escaped
	 * @return {String}
	 */
	exports.attrs = function attrs(obj, terse){
	  var buf = [];

	  var keys = Object.keys(obj);

	  if (keys.length) {
	    for (var i = 0; i < keys.length; ++i) {
	      var key = keys[i]
	        , val = obj[key];

	      if ('class' == key) {
	        if (val = joinClasses(val)) {
	          buf.push(' ' + key + '="' + val + '"');
	        }
	      } else {
	        buf.push(exports.attr(key, val, false, terse));
	      }
	    }
	  }

	  return buf.join('');
	};

	/**
	 * Escape the given string of `html`.
	 *
	 * @param {String} html
	 * @return {String}
	 * @api private
	 */

	var jade_encode_html_rules = {
	  '&': '&amp;',
	  '<': '&lt;',
	  '>': '&gt;',
	  '"': '&quot;'
	};
	var jade_match_html = /[&<>"]/g;

	function jade_encode_char(c) {
	  return jade_encode_html_rules[c] || c;
	}

	exports.escape = jade_escape;
	function jade_escape(html){
	  var result = String(html).replace(jade_match_html, jade_encode_char);
	  if (result === '' + html) return html;
	  else return result;
	};

	/**
	 * Re-throw the given `err` in context to the
	 * the jade in `filename` at the given `lineno`.
	 *
	 * @param {Error} err
	 * @param {String} filename
	 * @param {String} lineno
	 * @api private
	 */

	exports.rethrow = function rethrow(err, filename, lineno, str){
	  if (!(err instanceof Error)) throw err;
	  if ((typeof window != 'undefined' || !filename) && !str) {
	    err.message += ' on line ' + lineno;
	    throw err;
	  }
	  try {
	    str = str || __webpack_require__(33).readFileSync(filename, 'utf8')
	  } catch (ex) {
	    rethrow(err, null, lineno)
	  }
	  var context = 3
	    , lines = str.split('\n')
	    , start = Math.max(lineno - context, 0)
	    , end = Math.min(lines.length, lineno + context);

	  // Error context
	  var context = lines.slice(start, end).map(function(line, i){
	    var curr = i + start + 1;
	    return (curr == lineno ? '  > ' : '    ')
	      + curr
	      + '| '
	      + line;
	  }).join('\n');

	  // Alter exception message
	  err.path = filename;
	  err.message = (filename || 'Jade') + ':' + lineno
	    + '\n' + context + '\n\n' + err.message;
	  throw err;
	};

	exports.DebugItem = function DebugItem(lineno, filename) {
	  this.lineno = lineno;
	  this.filename = filename;
	}


/***/ }),
/* 33 */
/***/ (function(module, exports) {

	/* (ignored) */

/***/ }),
/* 34 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by liliy_000 on 2016/2/23.
	 *
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var getServiceOpr;
	    var doms = {};
	    doms.locationTag = $("#itemCompanyAddress");
	    doms.serviceList = $("#itemService");
	    doms.time = $("#itemTimeTag");
	    return {
	        _jobName: "item/service",
	        check: function () {
	            return true;
	        },
	        init: function () {
	            G.customEvent.on("itemSelectSupplierDone", function (itemData) {
	                if (  doms.serviceList.length > 0  ) {
	                    getServiceOpr(itemData);
	                } else {
	                    G.customEvent.trigger("itemSelectServiceDone", itemData);
	                }
	            });
	        },
	        exec: function () {
	            getServiceOpr = function (itemData) {
	                var html = "";
	                var timeHtml = "";
	                var sortTime = [];
	                var sortDetails = [];
	                $.ajax({
	                    type: "get",
	                    url: "/gongsibao-web/web/product/pricelist",
	                    data: itemData,
	                    success: function (res) {
	                        if (res.code == 200) {
	                            $.each(res.data, function (index, ser) {
	                                if (!!ser.isMust) {
	                                    html += "<div class='company-product-list' log='1' pkidStr=" + ser.pkidStr + "><span class='list-info'>" + ser.type_name + "（/" + ser.unitName + "）</span><span class='list-num'>¥&nbsp;<em>" + ser.price/100 + ".00</em></span></div>";
	                                } else {
	                                    if (ser.unitName.indexOf("年") >= 0 || ser.unitName.indexOf("月") >= 0 || ser.unitName.indexOf("季") >= 0) {
	                                        doms.time.parents(".form-item").show();
	                                        doms.serviceList.attr("log","2");
	                                        if (ser.unitName == "月") {
	                                            sortTime[0] = "<li><a class='tip-item' href='javascript:;' title='" + ser.unitName + "'>一个" + ser.unitName + "</a></li>";
	                                            sortDetails[0] = "<div class='company-product-list hide' log='0' pkidStr=" + ser.pkidStr + " title='" + ser.unitName + "'><span class='list-info'>" + ser.type_name + "（/" + ser.unitName + "）</span><span class='list-num'>¥&nbsp;<em>" + ser.price/100 + ".00</em></span></div>";
	                                        }
	                                        if (ser.unitName == "季度") {
	                                            sortTime[1] = "<li><a class='tip-item' href='javascript:;' title='" + ser.unitName + "'>一个" + ser.unitName + "</a></li>";
	                                            sortDetails[1] = "<div class='company-product-list hide' log='0' pkidStr=" + ser.pkidStr + " title='" + ser.unitName + "'><span class='list-info'>" + ser.type_name + "（/" + ser.unitName + "）</span><span class='list-num'>¥&nbsp;<em>" + ser.price/100 + ".00</em></span></div>";
	                                        }
	                                        if (ser.unitName == "半年") {
	                                            sortTime[2] = "<li><a class='tip-item' href='javascript:;' title='" + ser.unitName + "'>" + ser.unitName + "</a></li>";
	                                            sortDetails[2] = "<div class='company-product-list hide' log='0' pkidStr=" + ser.pkidStr + " title='" + ser.unitName + "'><span class='list-info'>" + ser.type_name + "（/" + ser.unitName + "）</span><span class='list-num'>¥&nbsp;<em>" + ser.price/100 + ".00</em></span></div>";
	                                        }
	                                        if ( ser.unitName == "年" ) {
	                                            sortTime[3] = "<li><a class='tip-item' href='javascript:;' title='" + ser.unitName + "'>一" + ser.unitName + "</a></li>";
	                                            sortDetails[3] = "<div class='company-product-list hide' log='0' pkidStr=" + ser.pkidStr + " title='" + ser.unitName + "'><span class='list-info'>" + ser.type_name + "（/" + ser.unitName + "）</span><span class='list-num'>¥&nbsp;<em>" + ser.price/100 + ".00</em></span></div>";
	                                        }
	                                        if ( ser.unitName == "二年" || ser.unitName == "两年" ) {
	                                            sortTime[4] = "<li><a class='tip-item' href='javascript:;' title='" + ser.unitName + "'>" + ser.unitName + "</a></li>";
	                                            sortDetails[4] = "<div class='company-product-list hide' log='0' pkidStr=" + ser.pkidStr + " title='" + ser.unitName + "'><span class='list-info'>" + ser.type_name + "（/" + ser.unitName + "）</span><span class='list-num'>¥&nbsp;<em>" + ser.price/100 + ".00</em></span></div>";
	                                        }
	                                        if (ser.unitName == ("三年") ) {
	                                            sortTime[5] = "<li><a class='tip-item' href='javascript:;' title='" + ser.unitName + "'>" + ser.unitName + "</a></li>";
	                                            sortDetails[5] = "<div class='company-product-list hide' log='0' pkidStr=" + ser.pkidStr + " title='" + ser.unitName + "'><span class='list-info'>" + ser.type_name + "（/" + ser.unitName + "）</span><span class='list-num'>¥&nbsp;<em>" + ser.price/100 + ".00</em></span></div>";
	                                        }
	                                        if (ser.unitName == ("五年") ) {
	                                            sortTime[6] = "<li><a class='tip-item' href='javascript:;' title='" + ser.unitName + "'>" + ser.unitName + "</a></li>";
	                                            sortDetails[6] ="<div class='company-product-list hide' log='0' pkidStr=" + ser.pkidStr + " title='" + ser.unitName + "'><span class='list-info'>" + ser.type_name + "（/" + ser.unitName + "）</span><span class='list-num'>¥&nbsp;<em>" + ser.price/100 + ".00</em></span></div>";
	                                        }
	                                        if (ser.unitName == ("十年") ) {
	                                            sortTime[7] = "<li><a class='tip-item' href='javascript:;' title='" + ser.unitName + "'>" + ser.unitName + "</a></li>";
	                                            sortDetails[7] = "<div class='company-product-list hide' log='0' pkidStr=" + ser.pkidStr + " title='" + ser.unitName + "'><span class='list-info'>" + ser.type_name + "（/" + ser.unitName + "）</span><span class='list-num'>¥&nbsp;<em>" + ser.price/100 + ".00</em></span></div>";
	                                        }
	                                    } else {
	                                        html += "<div class='company-product-list' log='0' pkidStr=" + ser.pkidStr + "><label><input type='radio' name='type' /><span class='list-info'>" + ser.type_name + "（/" + ser.unitName + "）</span><span class='list-num'>¥&nbsp;<em>" + ser.price/100 + ".00</em></span></label></div>";
	                                    }
	                                }
	                            });
	                            $.each( sortTime , function ( index , list ) {
	                                if ( !!list ) {
	                                    timeHtml += list;
	                                }
	                            });
	                            $.each( sortDetails , function ( index , list ) {
	                                if ( !!list ) {
	                                    html += list;
	                                }
	                            });
	                            if (html != "") {
	                                doms.serviceList.html(html);
	                                if (doms.serviceList.attr("log") == 2) {
	                                    doms.time.html(timeHtml);
	                                    doms.time.find("li").eq(0).addClass("active");
	                                    doms.serviceList.find("div").eq(0).attr("log", "1").show();
	                                } else {
	                                    doms.serviceList.find("div").eq(0).attr("log", "1");
	                                    doms.serviceList.find("input").eq(0).attr("checked", "checked");
	                                }
	                            } else {
	                                doms.locationTag.find("ul").html("");
	                                doms.time.html("<li class='active'><a class='tip-item' href='javascript:;'>时长</a></li>");
	                                doms.serviceList.html("");
	                                itemData.orderProdCreateWebList = [];
	                            }
	                        } else {
	                            itemData.orderProdCreateWebList = [];
	                        }
	                        changeService(itemData);
	                        changePrice(itemData);
	                    }
	                });
	            };
	            var changePrice = function (itemData) {
	                if (doms.locationTag.find("li").eq(1).hasClass("active")) {
	                    doms.locationTag.find("li").eq(0).removeClass("active");
	                }
	                // 选择可选服务项
	                doms.serviceList.find("label").on("click", function () {
	                    doms.serviceList.find("label").parent().attr("log", "0");
	                    $(this).parent().attr("log", "1");
	                    changeService(itemData);
	                });
	                // 选时长
	                doms.time.find("li").on("click", function () {
	                    if ( !$(".js-buy").hasClass("select") ) {
	                        doms.time.find("li").removeClass("active");
	                        $(this).addClass("active");
	                        doms.serviceList.find("div").attr("log", "0").hide();
	                        doms.serviceList.find("div[title='" + $(this).find("a").attr("title") + "']").attr("log", "1").show();
	                        changeService(itemData);
	                    }
	                });

	                // 注册地址
	                doms.locationTag.find("li").each(function (i, address) {
	                    $(address).on("click", function () {
	                        if ( !$(".js-buy").hasClass("select") ) {
	                            doms.locationTag.find("li").removeClass("active");
	                            $(this).addClass("active");
	                            if ($(address).find("a").text() == "自有地址") {
	                                doms.serviceList.find(".locaP").hide().attr("log", "0");
	                            } else {
	                                doms.serviceList.find(".locaP").show().attr("log", "1");
	                            }
	                            changeService(itemData);
	                        }
	                    });
	                });
	            };
	            var changeService = function (itemData) {
	                var orderProdCreateWebList = [];
	                doms.serviceList.find("div[log=1]").each(function (index, el) {
	                    orderProdCreateWebList.push({
	                        productIdStr: itemData.productIdStr,
	                        cityIdStr: itemData.cityIdStr,
	                        quantity: 1,
	                        orderProdItemCreateWebList: [{
	                            priceIdStr: $(el).attr("pkidstr")
	                        }]
	                    });
	                });
	                itemData.orderProdCreateWebList = orderProdCreateWebList;
	                itemData.userIdStr = "";
	                G.customEvent.trigger("itemSelectServiceDone", itemData);
	            }
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 35 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by liliy_000 on 2016/7/4.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var getNumber;
	    var setNumber;
	    return {
	        _jobName: "item/number",
	        check: function () {
	            return true;
	        },
	        init: function () {
	            G.customEvent.on("itemSelectServiceDone", function (itemData) {
	                G.customEvent.trigger("itemNumberDone", itemData);
	                if ( $("#comment-number").length > 0 ) {
	                    getNumber(itemData);
	                } else {
	                    itemData.quantity = 1;
	                    G.customEvent.trigger("itemNumberDone", itemData);
	                }
	            });
	        },
	        exec: function () {
	            // 购买数量
	            var comNum = 1;
	            var $num = $("#comment-number");
	            getNumber = function ( itemData ) {
	                $num.find(".amount-increase").unbind("click").on("click", function (e) {
	                    setNumber("jia",itemData);
	                });
	                $num.find(".amount-decrease").unbind("click").on("click", function (e) {
	                    setNumber("jian",itemData);
	                });
	            }
	            setNumber = function (tip,itemData) {
	                comNum = itemData.quantity;
	                var $inp = $num.find("input[type=text]");
	                if ( itemData.orderProdCreateWebList.length == 0 ) {
	                    layer.alert("至少选一项服务项", {icon: 0});
	                    comNum = 1;
	                    $num.find("input[type=text]").val(comNum);
	                } else {
	                    if ( tip == "jia" ) {
	                        if (comNum < 10) {
	                            comNum++;
	                        }
	                    }
	                    if ( tip == "jian" ) {
	                        if (comNum > 1) {
	                            comNum--;
	                        }
	                    }
	                    $inp.val(comNum);
	                    itemData.quantity = comNum;
	                    $.each( itemData.orderProdCreateWebList , function ( index , list) {
	                        list.quantity = comNum;
	                    });
	                    G.customEvent.trigger("itemNumberDone", itemData);
	                }
	            }
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 36 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by shenshen on 16/1/28.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var itemGetPrice;
	    return {
	        _jobName: "item/price", // 价钱
	        check: function () {
	            return true;
	        },
	        init: function () {
	            G.customEvent.on("itemNumberDone",function (itemData) {
	                if ( $("#com-price").length > 0 ) {
	                    itemGetPrice(itemData);
	                } else {
	                    G.customEvent.trigger("itemSelectPriceDone",itemData);
	                }
	            });
	        },
	        exec: function () {
	            itemGetPrice = function (itemData) {
	                var addPri = 0;
	                var num = itemData.quantity;
	                $(".company-product-list").each(function(index,el){
	                    if ( $(el).attr("log") == "1" ) {
	                        addPri += parseFloat($(el).find(".list-num em").text());
	                    }
	                });
	                itemData.price = (addPri * num).toFixed(2);
	                $("#com-price").text(itemData.price);
	                G.customEvent.trigger("itemSelectPriceDone",itemData);
	            }
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ }),
/* 37 */
/***/ (function(module, exports, __webpack_require__) {

	var __WEBPACK_AMD_DEFINE_RESULT__;/**
	 * Created by liliy_000 on 2016/2/19.
	 */
	!(__WEBPACK_AMD_DEFINE_RESULT__ = function () {
	    var layer = __webpack_require__(9);
	    var userInfo = __webpack_require__(7);
	    var loginAction = __webpack_require__(8);
	    var $buy = $(".js-buy");
	    var $newBuy = $("#supplier");
	    var clickBuy;
	    var newClickBuy;
	    return {
	        _jobName: "item/comBuy",// 购买 加入购物车
	        check: function () {
	            return true;
	        },
	        init: function () {
	            G.customEvent.on("itemSelectPriceDone",function (itemData) {
	                if ( $buy.length > 0 ) {
	                    clickBuy(itemData);
	                }
	                if ( $newBuy.html() != "" ) {
	                    newClickBuy(itemData);
	                }
	            });
	            G.customEvent.on("packageProductsDone",function (itemData) {
	                if ( $buy.length > 0 ) {
	                    clickBuy(itemData);
	                }
	            });
	        },
	        exec: function () {
	            // 购买键
	            var data;
	            clickBuy = function (itemData) {
	                data = itemData;
	                if(itemData.orderProdCreateWebList.length == 0 || itemData.orderProdCreateWebList[0].orderProdItemCreateWebList.length == 0){
	                    $buy.text("立即购买");
	                    $buy.addClass("select");
	                } else {
	                    $buy.text("立即购买");
	                    $buy.removeClass("select");
	                }
	                $buy.unbind("click").on("click", function () {
	                    var self = $(this);
	                    if ( !self.hasClass("select") ) {
	                        userInfo.needLogin(function () {
	                            if (itemData.orderProdCreateWebList[0].orderProdItemCreateWebList.length == 0) {
	                                layer.alert("至少选一项服务项", {icon: 0});
	                                return;
	                            } else {
	                                isMobileCorrect(self, itemData)
	                            }
	                        });
	                    }
	                });
	            };
	            newClickBuy = function (itemData) {
	                $newBuy.find(".js-new-buy").removeClass("select");
	                $newBuy.find(".js-new-buy").unbind("click").on("click" ,function () {
	                    var self = $(this);
	                    var orderProdCreateWebList = [];

	                    self.prev().find("[log=1]").each(function (index, el) {
	                        orderProdCreateWebList.push({
	                            productIdStr: itemData.productIdStr,
	                            cityIdStr: itemData.cityIdStr,
	                            quantity: itemData.quantity,
	                            orderProdItemCreateWebList: [{
	                                priceIdStr: $(el).attr("termid")
	                            }]
	                        });
	                    });
	                    itemData.orderProdCreateWebList = orderProdCreateWebList;
	                    itemData.userIdStr = self.parents("li").attr("data-id");
	                    if ( !self.hasClass("select") ) {
	                        userInfo.needLogin(function () {
	                            isMobileCorrect(self, itemData)
	                        });
	                    }
	                });
	            };
	            function isMobileCorrect(self, itemData) {
	                if ( G.cookie.get('isMobileCorrect') == 'true' ) {
	                    $buy.addClass("select");
	                    order(self,itemData);
	                } else if (G.cookie.get('isMobileCorrect') == 'false') {
	                    userInfo.isMobileCorrect(function () {
	                        order(self,itemData);
	                    })
	                } else {
	                    order(self,itemData);
	                }
	            }
	            function order (obj,itemData) {
	                $.ajax({
	                    type: 'POST',
	                    url: "/gongsibao-web/web/product/order/confirm",
	                    contentType: "application/json",
	                    data: JSON.stringify(itemData),
	                    success: function (res) {
	                        obj.removeClass("select");
	                        if (res.code == 200) {
	                            if ( !res.data ) {
	                                layer.alert(res.msg, {icon: 5});
	                            } else {
	                                location.href = "/my/order_confirm.html?key=" + res.data;
	                            }
	                        } else {
	                            layer.alert(res.msg, {icon: 5});
	                        }
	                    },
	                    error: function (res) {
	                        layer.alert(res.msg, {icon: 5});
	                    }
	                });
	            }
	            //购物车
	            //var cardHtml = $(".js-add-cart").html();
	            //var serviceList = {};
	            //$(".js-add-cart").on("click", function () {
	            //    var self = $(this);
	            //    if ( !self.hasClass("company-btn-ban") && self.text() == "加入购物车" ) {
	            //        for (var i = 0; i < data.productserverids.length; i++) {
	            //            var obj = data.productserverids[i];
	            //            serviceList[i+1] = {};
	            //            serviceList[i+1][obj.psid] = obj.quantity + "|" + obj.puid;
	            //        }
	            //        var cardData = {
	            //            product_id: data.product_id,
	            //            service_list: serviceList,
	            //            area_id: data.basedatacityarea_id,
	            //            buy_nums: data.num
	            //        };
	            //        var self = $(this);
	            //        userInfo.needLogin(function () {
	            //            if ($(".company-product-list[log=1]").length == 0) {
	            //                layer.alert("至少选一项服务项", {icon: 0});
	            //                return;
	            //            } else {
	            //                self.html(cardHtml);
	            //            }
	            //
	            //            $.ajax({
	            //                type: 'POST',
	            //                url: "/?m=content&c=index&a=add_cart",
	            //                dataType: 'json',
	            //                data: cardData,
	            //                success: function (res) {
	            //                    self.text("加入购物车");
	            //                    $("#cartNumber").text( parseInt($("#cartNumber").text()) + 1 );
	            //                    if (res.status) {
	            //                        layer.alert("购物车加入成功", {icon: 1});
	            //                    } else {
	            //                        layer.alert(res.message, {icon: 5});
	            //                    }
	            //                }
	            //            });
	            //        });
	            //    }
	            //});
	        }
	    };
	}.call(exports, __webpack_require__, exports, module), __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));


/***/ })
/******/ ]);