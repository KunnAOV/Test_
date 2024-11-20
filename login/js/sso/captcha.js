function showCaptcha() {
	var sso_captcha = $('.sso_captcha');
	if (!sso_captcha.is(":visible")) {
		sso_captcha.show();
	}
	refreshCaptcha();
}

function getCookie(name) {
	var cookieValue = null;
	if(document.cookie && document.cookie != '') {
		var cookies = document.cookie.split(';');
		for(var i = 0; i < cookies.length; i++) {
			var cookie = jQuery.trim(cookies[i]);
			if(cookie.substring(0, name.length + 1) == (name + '=')) {
				cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
				break;
			}
		}
	}
	return cookieValue;
}

function uuid() {
	return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
		var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
		return v.toString(16);
	});
}

function refreshCaptcha() {
	var captcha_service_url = CAPTCHA_SERVICE
	if (SETTINGS.test) {
		captcha_service_url = CAPTCHA_SERVICE_TEST
	}
	captcha_key = uuid().replace(/-/g, '');
	var sso_captcha = $('#sso_captcha_image');
	if (sso_captcha.is(":visible")) {
		$(sso_captcha).find('img').attr('src', captcha_service_url + '?key=' + captcha_key);
	}
}

function hideCaptcha() {
	var sso_captcha = $('.sso_captcha');
	if (sso_captcha.is(":visible")) {
		sso_captcha.hide();
		sso_captcha.find('input').val("");
	}
}

var ReCaptchaWidgetIDMap = {};
function renderRecaptcha(wrapper_id, verifyCallback) {
	if (wrapper_id in ReCaptchaWidgetIDMap) {
		grecaptcha.reset(ReCaptchaWidgetIDMap[wrapper_id]);
	} else {
		var widget_id = grecaptcha.render(wrapper_id, {
			'sitekey' :  SETTINGS.recaptcha_site_key,
			'callback' : verifyCallback
		});
		ReCaptchaWidgetIDMap[wrapper_id] = widget_id;
	}
}

function getRecaptchaWrapperID(id) {
	return "recaptcha_wrapper_" + id;
}

function getGacaptchaWrapperID(id) {
	return "gacaptcha_wrapper_" + id;
}

function getShopeeCaptchaWrapperID(id) {
	return "shopeecaptcha_wrapper_" + id;
}

function centralizeCaptchaDialog(dialog) {
	var ssoDialog = dialog.find('.sso_dialog');
	var top = ($(window).height() - ssoDialog.height()) / 2;
	if(top < 0)	{
		top = (ssoDialog.height() - $(window).height() ) / 2;
	}
	ssoDialog.css('top', top.toString() + 'px');
}

function initCaptchaDialog(id, formObj) {
	var container = $('<div/>', {'class': 'sso_captcha_dialog_container', 'id': 'sso_captcha_dialog_container_' + id}).appendTo(formObj);
	$('<div/>').addClass('sso_dialog_background').appendTo(container);
	var dialog = $('<div/>', {'class': 'sso_dialog'}).appendTo(container);

	var recaptcha_wrapper_id = getRecaptchaWrapperID(id);
	var recaptchaWrapper = $('<div/>', { 'class': 'recaptcha-wrapper', 'id': recaptcha_wrapper_id }).appendTo(dialog);

	var gacaptcha_wrapper_id = getGacaptchaWrapperID(id);
	var gacaptchaWrapper = $('<div/>', {'class': 'gacaptcha-wrapper', 'id': gacaptcha_wrapper_id}).appendTo(dialog);
	var captchaInputLine = $('<div/>', {'class': 'line clearfix'}).appendTo(gacaptchaWrapper);
	var rowCaptcha1 = $('<div/>', { 'id': 'line-captcha', 'class': 'sso_captcha' }).appendTo(captchaInputLine);
	$('<input/>', {
		'id': 'input-captcha', 'name': 'captcha', 'type': 'text', 'placeholder': _('login_form_captcha_prompt'), 'autocorrect': 'off', 'autocapitalize': 'off'
	}).appendTo(rowCaptcha1);
	var rowCaptcha2 = $('<div/>', { 'id': 'sso_captcha_image', 'class': 'clearfix sso_captcha' }).appendTo(captchaInputLine);
	$('<img/>').appendTo($('<span/>', { 'class': 'code fl' }).appendTo(rowCaptcha2));
	var refresh_captcha = $('<a/>', { 'href': 'javascript:;', 'class': 'refresh fl' }).text(_('refresh_captcha')).appendTo(rowCaptcha2);
	refresh_captcha.click(refreshCaptcha);
	var gacaptchaButtonLine = $('<div/>', {'class': 'line clearfix'}).appendTo(gacaptchaWrapper);
	$('<div/>', {
		'text': _('btn_captcha_verify'), 'class': 'btn', 'id': 'proceed-gacaptcha'
	}).val(0).appendTo(gacaptchaButtonLine);

	var shopeecaptcha_wrapper_id = getShopeeCaptchaWrapperID(id);
	var shopeeWrapper = $('<div/>', {'class': 'shopeecaptcha-wrapper', 'id': shopeecaptcha_wrapper_id}).appendTo(dialog)

	return container;
}

function hideAllCaptchaWrapper(dialog) {
	var id = dialog.attr('id').substr('sso_captcha_dialog_container_'.length);
	$('#' + getRecaptchaWrapperID(id)).hide();
	$('#' + getGacaptchaWrapperID(id)).hide();

	var shopeeCaptchaComponent = $('#' + getShopeeCaptchaWrapperID(id));
	window.captchaMobileVanilla && window.captchaMobileVanilla.unmountComponentAtNode(shopeeCaptchaComponent[0]);
	shopeeCaptchaComponent.hide();
}

function hideCaptchaDialog(dialog) {
	dialog.hide();
	hideAllCaptchaWrapper(dialog);
}

function getCaptchaID(dialog) {
	return dialog.attr('id').substr('sso_captcha_dialog_container_'.length);
}

function showDataDomeDialog(dialog) {
	var id = getCaptchaID(dialog);
	var recaptcha_wrapper_id = getRecaptchaWrapperID(id);

	hideAllCaptchaWrapper(dialog);
	$('#' + recaptcha_wrapper_id).show();
}

var ReCaptchaVerifyCallback = function (response) {}
function showReCaptchaDialog(dialog, verifyCallback) {
	var id = getCaptchaID(dialog);
	var recaptcha_wrapper_id = getRecaptchaWrapperID(id);

	hideAllCaptchaWrapper(dialog);
	$('#' + recaptcha_wrapper_id).show();

	ReCaptchaVerifyCallback = function(response) {
		verifyCallback(response);
	};
	renderRecaptcha(recaptcha_wrapper_id, function(response) {
		ReCaptchaVerifyCallback(response);
	});

	dialog.show();
	centralizeCaptchaDialog(dialog);

}

function showGarenaCaptchaDialog(dialog, verifyCallback) {
	var id = getCaptchaID(dialog);
	var gacaptcha_wrapper_id = getGacaptchaWrapperID(id);

	hideAllCaptchaWrapper(dialog);
	$('#' + gacaptcha_wrapper_id).show();

	dialog.show();
	centralizeCaptchaDialog(dialog);

	showCaptcha();

	dialog.find('#proceed-gacaptcha').click(
		function() {
			var captcha = dialog.find('#line-captcha').find('input').val();
			verifyCallback(captcha, captcha_key);
		}
	);
}

function showShopeeCaptchaDialog(dialog, verifyCallback) {
	var id = getCaptchaID(dialog);
	var shopeecaptcha_wrapper_id = getShopeeCaptchaWrapperID(id);

	hideAllCaptchaWrapper(dialog);
	var captchaComponent = $('#' + shopeecaptcha_wrapper_id);
	captchaComponent.show();

	window.captchaMobileVanilla.renderCaptchaPopupMobile(captchaComponent[0], {
		shouldShow: true,
		loadCaptchaSdkAsync: function() { return window.captchaSdk },
		onVerifySuccess: verifyCallback,
		onLoadCaptchaSuccess: function(data) {
			// console.log('Load captcha successful', data);
		},
		appKey: isMobile() ? 'Garena.RW' : 'Garena.PC',
		scene: 'login',
		onDismiss: function() {
			window.captchaMobileVanilla.unmountComponentAtNode(captchaComponent[0]);
			hideCaptchaDialog(dialog);
		},
		text: {
			title: _('Captcha'),
			errorScreen: {
				title: _('shopee_captcha_error_title'),
				description: _('Vui lòng trượt để hoàn thành hình ảnh xác thựcs'),
				retry: _('shopee_captcha_error_retry'),
			},
			sliderCaptcha: {
				sliderDescription: _('Vui lòng trượt để hoàn thành hình ảnh xác thực'),
				loading: _('shopee_captcha_slider_loading'),
				retry: _('shopee_captcha_slider_retry'),
				refresh: _('shopee_captcha_slider_refresh'),
			},
			imageCaptcha: {
				refresh: _('shopee_captcha_image_refresh'),
				inputText: _('shopee_captcha_image_input'),
				submit: _('shopee_captcha_image_submit'),
				cancel: _('submit_captcha_image_cancel'),
				errorWrongInput: _('shopee_captcha_image_wrong'),
				errorEmptyInput: _('shopee_captcha_image_empty'),
			},
		},
		isLiveEnv: !SETTINGS.test,
	});

	dialog.show();
	centralizeCaptchaDialog(dialog);
};

function requestJsonWithCaptchaDialogProtection(url, request, verifyCallback, method, captchaDialog) {
	requestJson(url, request, function (data, status_code) {
		// show datadome recaptcha
		if (status_code == 403) {
			return;
		}
		if ('error' in data) {
			if (data['error'] == 'error_require_recaptcha_token' || data['error'] == 'error_recaptcha_token') {
				showReCaptchaDialog(captchaDialog, function(token) {
					request['recaptcha_token'] = token;
					requestJsonWithCaptchaDialogProtection(url, request, verifyCallback, method, captchaDialog);
				});
			}
			else if (data['error'] == 'error_require_captcha') {
				showGarenaCaptchaDialog(captchaDialog, function(captcha, captchaKey) {
					request['captcha'] = captcha;
					request['captcha_key'] = captcha_key;
					requestJsonWithCaptchaDialogProtection(url, request, verifyCallback, method, captchaDialog);
				});
			}
			else if (data['error'] == 'error_require_shopee_captcha_token' || data['error'] == 'error_shopee_captcha_token') {
				showShopeeCaptchaDialog(captchaDialog, function(token) {
					request['shopee_captcha_token'] = token;
					requestJsonWithCaptchaDialogProtection(url, request, verifyCallback, method, captchaDialog);
				});
			}
			else if (data['error'] == 'error_captcha') {
				showError(_('login_error_captcha'), $('#line-captcha'));
				refreshCaptcha();
			}
			else {
				hideCaptchaDialog(captchaDialog);
				verifyCallback(data);
			}

		} else {
			hideCaptchaDialog(captchaDialog);
			verifyCallback(data);
		}
	}, method);
}


