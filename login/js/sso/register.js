function checkPasswordValid(username, password) {
	if (password.length < 8 || password.length > 16) {
		return false;
	}
	if (password === username) {
		return false;
	}

	var has_small_letter = false;
	var has_capital_letter = false;
	var has_number = false;
	var has_symbol = false;
	for (var i = 0; i < password.length; i++) {
		var code = password.charCodeAt(i);
		var ch = password.charAt(i);
		if (code > 126 || code < 33) {
			return false;
		}
		if (ch >= 'a' && ch <= 'z') {
			has_small_letter = true;
		} else if (ch >= 'A' && ch <= 'Z') {
			has_capital_letter = true;
		} else if (ch >= '0' && ch <= '9') {
			has_number = true;
		} else {
			has_symbol = true;
		}
	}

	var pass_strength = 0;
	if (has_small_letter) {
		pass_strength++;
	}
	if (has_capital_letter) {
		pass_strength++;
	}
	if (has_number) {
		pass_strength++;
	}
	if (has_symbol) {
		pass_strength++;
	}
	return pass_strength >= 2;
}

function showRegisterPage(mode) {

	var panelRegister = $('<div/>');
	$('<h2/>').addClass('title').text(_('register_header')).appendTo(panelRegister);

	var formRegister = $('<form/>', { 'id': 'form-register' }).addClass('loginForm').appendTo(panelRegister);
	var txtUsername = $('<input/>', {
		'id': 'sso_register_form_account', 'type': 'text', 'placeholder': _('register_form_username_prompt'), 'autocorrect': 'off', 'autocapitalize': 'off'
	}).appendTo($('<div/>', { 'id': 'line-username' }).addClass('line').appendTo(formRegister)).val(mobile_register_request['username']);
	var txtPassword = $('<input/>', {
		'id': 'sso_register_form_password', 'type': 'password', 'placeholder': _('register_form_password_prompt')
	}).appendTo($('<div/>', { 'id': 'line-password' }).addClass('line').appendTo(formRegister)).val(mobile_register_request['password']);
	var togglePassword = $('<span/>').addClass('icon-eye icon-eye-hide fr');
	txtPassword.after($('<span/>', { 'id': 'span-toggle', 'class': 'icon clearfix' }).append(togglePassword));
	togglePassword.click(function () {
		if (togglePassword.hasClass('icon-eye-hide')) {
			togglePassword.removeClass('icon-eye-hide');
			txtPassword.attr('type', 'text');
		} else {
			togglePassword.addClass('icon-eye-hide');
			txtPassword.attr('type', 'password');
		}
	});

	if (mode == 'pc') {
		var txtPasswordConfirm = $('<input/>', {
			'id': 'sso_register_form_password_confirm', 'type': 'password', 'placeholder': _('register_form_confirm_password_prompt')
		}).appendTo($('<div/>', { 'id': 'line-password-confirm', 'class': 'line' }).appendTo(formRegister));
	}

	var lineEmail = $('<div/>', { 'id': 'line-email' }).addClass('line').appendTo(formRegister);
	var txtEmail = $('<input/>', {
		'id': 'sso_register_form_email', 'type': 'email', 'placeholder': _('register_form_email_prompt'), 'autocorrect': 'off', 'autocapitalize': 'off'
	}).appendTo(lineEmail).val(mobile_register_request['email']);
	var txtEmailReminder = $('<div/>', { 'class': 'reminder' }).text(_('register_email_reminder')).appendTo(lineEmail);

	var registerCaptchaDialogID = 'register_captcha_dialog';

	var captchaDialog = initCaptchaDialog('register_captcha_dialog', formRegister);

	var lineMobile = $('<div/>', { 'id': 'line-mobile' }).addClass('line').appendTo(formRegister);
	var selectCountryCode = $('<select/>',{
		'id': 'select-country-code',
		'name': 'country-code',
	}).addClass('country-code').appendTo(lineMobile);

	var countryPcode = '65';
	for (var i = 0; i < COUNTRY_LIST.length; i++) {
		var country = COUNTRY_LIST[i];
		$('<option/>', {
			'value': country.pcode,
			'text': country.code + ' +' + country.pcode,
		}).appendTo(selectCountryCode);

		if (country.code == SETTINGS.country) {
			countryPcode = country.pcode;
		}
	}

	selectCountryCode.html(selectCountryCode.children().sort(function(s, t) {
		return s.text < t.text ? -1 : 1;
	}));
	selectCountryCode.val(countryPcode);

	var inputMobileNumber = $('<input/>', {
		'id': 'input-mobile-number',
		'name': 'mobile-number',
		'type': 'tel',
		'placeholder': _('register_link_mobile_number'),
		'autocorrect': 'off',
		'autocapitalize': 'off',
		'maxlength': 30,
	}).addClass('mobile-number-nocc').appendTo(lineMobile);

	inputMobileNumber.keypress(function(e) {
		var charCode = e.which ? e.which : e.keyCode;
		return charCode >= 48 && charCode <= 57;
	});

	var lineOtp = $('<div/>', { 'id': 'line-otp' }).addClass('line').appendTo(formRegister);
	var inputOtp = $('<input/>', {
		'id': 'input-otp',
		'name': 'otp',
		'type': 'tel',
		'placeholder': _('register_link_mobile_verification'),
		'autocorrect': 'off',
		'autocapitalize': 'off',
		'maxlength': 10,
	}).addClass('otp').appendTo(lineOtp);
	lineOtp.hide();

	var getCodeButton = $('<div/>', {
		'text': _('register_link_mobile_get_code')
	}).addClass('resend').addClass('enabled').val(0).appendTo(lineOtp);
	if (SETTINGS.country == 'VN') $('<div/>', { 'class': 'reminder' }).text(_('register_otp_voice_instruction')).appendTo(lineOtp);

	var selectCountry = $('<select/>', {
		'id': 'sso_register_form_select_country', 'name': 'select_country'
	}).appendTo($('<div/>', { 'id': 'line-select-country' }).addClass('line').appendTo(formRegister));
	for (var i = 0; i < COUNTRY_LIST.length; i++) {
		var option = $('<option/>', { 'value': COUNTRY_LIST[i].code });
		var content = COUNTRY_LIST[i].name + " ";
		if (COUNTRY_LIST[i].hasOwnProperty("lname")) {
			content = content + "(" + COUNTRY_LIST[i].lname + "\u200e) ";
		}
		$('<p/>').text(content).appendTo(option);
		selectCountry.append(option);
	}
	selectCountry.val(SETTINGS.country).change();

	var terms_div = $('<div/>', { 'id': 'line-terms', 'class': 'terms line' });

	if (mode == 'pc') {
		var checkbox = $('<a/>', {
			'href': 'javascript:;', 'class': 'checkbox'
		}).appendTo(terms_div);
	}
	var terms_label = $('<label/>', {
		'id': 'sso_register_form_terms_label', 'for': 'sso_register_form_terms'
	}).appendTo(terms_div);
	var terms_link = $('<a/>', {
		'id': 'sso_register_terms_link', 'text': _('register_form_terms_link_text'), 'href': 'javascript:;'
	});
	var privacy_link = $('<a/>', {
		'id': 'sso_register_privacy_link', 'text': _('register_form_privacy_link_text'), 'href': 'javascript:;'
	});
	var ban_rules_link = $('<a/>', {
		'id': 'sso_register_ban_rules_link', 'text': _('register_form_ban_rules_link_text'), 'href': 'javascript:;'
	});
	if (mode == 'pc') {
		if (SETTINGS.country == 'TW') {
			terms_label.html(_('register_form_terms_label_pc',
				{ 'tos': $('<div/>').append(terms_link).html(), 'pp': $('<div/>').append(privacy_link).html(), 'br': $('<div/>').append(ban_rules_link).html() }
			));
		} else {
			terms_label.html(_('register_form_terms_label_pc',
				{ 'tos': $('<div/>').append(terms_link).html(), 'pp': $('<div/>').append(privacy_link).html() }
			));
		}
	} else {
		if (SETTINGS.country == 'TW') {
			terms_label.html(_('register_form_terms_label_mobile',
				{ 'tos': $('<div/>').append(terms_link).html(), 'pp': $('<div/>').append(privacy_link).html(), 'br': $('<div/>').append(ban_rules_link).html() }
			));
		} else {
			terms_label.html(_('register_form_terms_label_mobile',
				{ 'tos': $('<div/>').append(terms_link).html(), 'pp': $('<div/>').append(privacy_link).html() }
			));
		}
	}

	terms_div.appendTo(formRegister);

	var btnRegister = $('<input/>', {
		'id': 'confirm-btn', 'type': 'submit', 'value': _('register_form_button_register'), 'onClick': 'javascript:return false;'
	}).addClass('btn').appendTo($('<div/>', { 'id': 'line-btn' }).addClass('btnLine').appendTo(formRegister));

	showContent(panelRegister, mode);

	$('#sso_register_privacy_link').click(function () {
		var url = _('register_privacy_url');
		if (SETTINGS.country == 'PH') {
			url = 'https://contentgarena-a.akamaihd.net/legal/pp/pp_ph.html'
		} else if (SETTINGS.country == 'MY') {
			url = 'https://contentgarena-a.akamaihd.net/legal/pp/pp_my.html'
		}
		if (!url.match('^http')) {
			url = SETTINGS['static_root'] + url;
		}
		showPageDialog(url, 'sso_register_pp_dialog', _('register_privacy_dialog_title'));
		$('#sso_register_pp_dialog .sso_dialog_content').height(Math.floor($(window).height() * 0.9 - 80));
		centralizeDialog();
	});
	$('#sso_register_terms_link').click(function () {
		var url = _('register_terms_url');
		if (!url.match('^http')) {
			url = SETTINGS['static_root'] + url;
		}
		showPageDialog(url, 'sso_register_tos_dialog', _('register_terms_dialog_title'));
		$('#sso_register_tos_dialog .sso_dialog_content').height(Math.floor($(window).height() * 0.9 - 80));
		centralizeDialog();
	});
	$('#sso_register_ban_rules_link').click(function () {
		var url = _('register_ban_rules_url');
		if (!url.match('^http')) {
			url = SETTINGS['static_root'] + url;
		}
		showPageDialog(url, 'sso_register_tos_dialog', _('register_terms_dialog_title'));
		$('#sso_register_tos_dialog .sso_dialog_content').height(Math.floor($(window).height() * 0.9 - 80));
		centralizeDialog();
	});

	/* validation */
	function validateEmail(is_submit) {
		if (!txtEmail.val()) {
			clearMessage('#line-email');
			$('#line-email').find('span.icon-right').remove();
			if (is_submit === true) { return 0; }
		} else if (txtEmail.val().length > 50) {
			showError(_('register_error_email_length'), $('#line-email'), false);
		} else if (!/^[\w\-+.%]+@[\w\-.]+\.\w+$/.test(txtEmail.val())) {
			showError(_('register_error_email_invalid'), $('#line-email'), false);
		} else {
			if (is_submit === true) { return 0; }
			var params = {'email': txtEmail.val()};

			requestJsonWithCaptchaDialogProtection(SSO_URL_API_REG_CHECK, params, function(data){
				if ('error' in data) {
					if (data['error'] == 'error_email_existed') {
						showError(_('register_error_email_existed'), $('#line-email'), false);
					} else {
						showError(_('register_' + data['error']), $('#line-email'));
					}
				}
				else {
					clearMessage('#line-email');
					$('<span/>').addClass('icon-right').appendTo($('#line-email'));
				}
			}, 'GET', captchaDialog);
		}
	}
	function validateUsername(is_submit) {
		if (!txtUsername.val()) {
			showError(_('register_error_username_empty'), $('#line-username'), false);
		} else if (txtUsername.val().length < 6 || txtUsername.val().length > 15) {
			showError(_('register_error_username_length'), $('#line-username'), false);
		} else {
			if (is_submit === true) { return 0; }
			requestJsonWithCaptchaDialogProtection(SSO_URL_API_REG_CHECK, { 'username': txtUsername.val() }, function (data) {
				if ('error' in data) {
					if (data['error'] == 'error_username_deleted') {
						showError(_('register_error_username_deleted'), $('#line-username'), false);
					} else if (data['error'] == 'error_username_existed') {
						showError(_('register_error_username_existed'), $('#line-username'), false);
					} else if (data['error'] == 'error_username_invalid') {
						showError(_('register_error_username_invalid'), $('#line-username'), false);
					} else {
						showError(_('register_' + data['error']), $('#line-username'));
					}
				} else {
					clearMessage('#line-username');
					$('<span/>').addClass('icon-right').appendTo($('#line-username'));
				}
			}, 'GET', captchaDialog);
		}
	}
	function validatePassword() {
		if (mode == 'pc' && txtPassword.val() != txtPasswordConfirm.val()) {
			showError(_('register_error_password_mismatch'), $('#line-password-confirm'), false);
		}
		if (!txtPassword.val()) {
			showError(_('register_error_password_empty'), $('#line-password'), false);
		} else if (!checkPasswordValid(txtUsername.val(), txtPassword.val())) {
			showError(_('register_error_password_invalid'), $('#line-password'), false);
		} else {
			if (mode == 'mobile') {
				clearMessage('#line-password');
				$('#span-toggle .icon-right').remove();
				$('<span/>').addClass('icon-right fr').prependTo($('#span-toggle'));
			} else {
				clearMessage('#line-password');
				$('<span/>').addClass('icon-right').appendTo($('#line-password'));
			}
			return 0;
		}
	}
	function validatePasswordConfirm() {
		if (!txtPasswordConfirm.val()) {

		} else if (txtPassword.val() != txtPasswordConfirm.val()) {
			showError(_('register_error_password_mismatch'), $('#line-password-confirm'), false);
		} else {
			clearMessage('#line-password-confirm');
			$('<span/>').addClass('icon-right').appendTo($('#line-password-confirm'));
			return 0;
		}
	}
	function validateMobile(is_submit, success_callback) {
		if (!inputMobileNumber.val()) {
			clearMessage('#line-mobile');
			$('#line-mobile').find('span.icon-right').remove();
			if (is_submit === true) { return 0; }
		} else {
			if (is_submit === true) { return 0; }
			requestJsonWithCaptchaDialogProtection(SSO_URL_API_REG_CHECK, { 'mobile_no': selectCountryCode.val() + inputMobileNumber.val() }, function (data) {
				if ('error' in data) {
					if (data['error'] == 'error_mobile_bind_limit') {
						showError(_('register_error_mobile_bind_limit'), $('#line-mobile'), false);
					} else if (data['error'] == 'error_mobile_no') {
						showError(_('register_error_mobile_no'), $('#line-mobile'), false);
					} else if ((data['error'] == 'error_otp_send_limit') || (data['error'] == 'error_otp_limit_exceeded')) {
						showError(_('register_error_otp_send_limit'), $('#line-mobile'), false);
					} else {
						showError(_('register_' + data['error']), $('#line-mobile'));
					}
				} else {
					clearMessage('#line-mobile');
					$('<span/>').addClass('icon-right').appendTo($('#line-mobile'));
					if (success_callback) success_callback();
				}
			}, 'GET', captchaDialog);
		}
	}

	function validateOtp(is_submit) {
		if (!inputOtp.val()) {
			showError(_('register_link_mobile_wrong_code'), $('#line-otp'), false);
		} else {
			if (is_submit === true) { return 0; }
			clearMessage('#line-otp')
		}
	}

	txtPassword.blur(validatePassword);
	txtEmail.blur(validateEmail);
	txtUsername.blur(validateUsername);
	inputMobileNumber.blur(validateMobile);
	inputOtp.blur(validateOtp);

	inputMobileNumber.keyup(function(e) {
		if (!inputMobileNumber.val()) {
			lineOtp.hide();
		} else {
			lineOtp.show();
		}
	});

	if (mode == 'pc') {
		txtPasswordConfirm.blur(validatePasswordConfirm);
		checkbox.click(function () {
			if (checkbox.hasClass('checked')) {
				checkbox.removeClass('checked');
			} else {
				checkbox.addClass('checked');
				clearMessage('#line-terms');
			}
		});
	}
	// else {
	// 	txtMobile.blur(validateMobile)
	// }

	function onRegister() {
		if (validateMobile(true) != 0) { return; }
		var mobile = '';
		if (inputMobileNumber.val() != '') { mobile = selectCountryCode.val() + inputMobileNumber.val(); }
		var otp = inputOtp.val();
		if (validateEmail(true) != 0) { return; }
		var email = txtEmail.val();
		if (validateUsername(true) != 0) { return; }
		var username = txtUsername.val();
		if (validatePassword() != 0) { return; }
		var password = txtPassword.val();
		if (mode == 'pc' && validatePasswordConfirm() != 0) { return; }
		var locale = getRequestParam('locale');
		var request = {
			'username': username,
			'email': email,
			'password': RSA(password),
			'location': selectCountry.val(),
			'redirect_uri': getRequestParam('redirect_uri'),
			'locale': (locale ? locale : DEFAULT_LOCALE),
			'mobile_no': mobile,
			'otp': otp
		};
		if (mode == 'pc' && !checkbox.hasClass('checked')) {
			showError(_('register_error_agree_terms'), $('#line-terms'), false);
			return;
		}
		btnRegister.attr("disabled", true);
		requestJsonWithCaptchaDialogProtection(SSO_URL_API_REG, request, function (data) {
			btnRegister.attr("disabled", false);
			if ('error' in data) {
				if (data['error'] == 'error_username_deleted') {
					showError(_('register_error_username_deleted'), $('#line-username'), false);
				} else if (data['error'] == 'error_username_existed') {
					showError(_('register_error_username_existed'), $('#line-username'), false);
				} else if (data['error'] == 'error_email_existed') {
					showError(_('register_error_email_existed'), $('#line-email'), false);
				} else if (data['error'] == 'error_mobile_bind_limit') {
					showError(_('register_error_mobile_bind_limit'), $('#line-mobile'), false);
				} else if (data['error'] == 'error_mobile_no') {
					showError(_('register_error_mobile_no'), $('#line-mobile'), false);
				} else if (data['error'] == 'error_mobile_invalid') {
					showError(_('register_error_mobile_no'), $('#line-mobile'), false);
				} else if (data['error'] == 'error_otp_send_limit') {
					showError(_('register_error_otp_send_limit'), $('#line-mobile'), false);
				} else if ((data['error'] == 'verify_otp_wrong') || (data['error'] == 'verify_otp_expired')) {
					showError(_('register_link_mobile_wrong_code'), $('#line-otp'), false);
				} else if (data['error'] == 'error_otp_limit_exceeded') {
					showError(_('register_error_otp_send_limit'), $('#line-otp'), false);
				} else if (data['error'] == 'error_country_accounting') {
					showError(_('error_accounting_country'), $('#line-mobile'), false);
				} else {
					showError(_('register_' + data.error), $('#line-btn'), false);
				}
			} else {
				showRegisterFinishPage(mode);
			}
		}, 'POST', captchaDialog);
	}

	/* confirm */
	btnRegister.click(onRegister);

	getCodeButton.click(function() {
		validateMobile(false, function() { if (getCodeButton.val() <= 0) {

			var countryCode = selectCountryCode.val();
			var mobileNumber = inputMobileNumber.val();
			getCodeButton.attr("disabled", true);
			requestJsonWithCaptchaDialogProtection(SSO_URL_API_SEND_SMS_OTP, { 'mobile_no': countryCode + mobileNumber }, function (data) {
				getCodeButton.attr("disabled", false);
				if ('error' in data) {
					if (data['error'] == 'error_mobile_bind_limit') {
						showError(_('register_error_mobile_bind_limit'), $('#line-mobile'), false);
					} else if ((data['error'] == 'error_mobile_no') || (data['error'] == 'error_mobile_invalid')) {
						showError(_('register_error_mobile_no'), $('#line-mobile'), false);
					} else if ((data['error'] == 'error_otp_send_limit') || (data['error'] == 'error_otp_limit_exceeded')) {
						showError(_('register_error_otp_send_limit'), $('#line-mobile'), false);
					} else {
						showError(_('register_' + data.error), $('#line-otp'), false);
					}
				} else {
					getCodeButton.toggleClass('enabled');
					getCodeButton.val(OTP_SMS_INTERVAL);
					getCodeButton.text(_('register_link_mobile_wait', {'second': OTP_SMS_INTERVAL}));
					var timer = setInterval(function() {
						var countdown = getCodeButton.val() - 1;
						getCodeButton.val(countdown);
						getCodeButton.text(_('register_link_mobile_wait', {'second': countdown}));
						if (countdown <= 0) {
							clearInterval(timer);
							getCodeButton.toggleClass('enabled');
							getCodeButton.text(_('register_link_mobile_resend'));
						}
					}, 1000);
				}
			}, 'POST', captchaDialog);

		}});
	});
}

function showRegisterFinishPage(mode) {
	var panelRegisterFinish = $('<div/>');
	$('<h2/>').addClass('title').text(_('register_finish_header')).appendTo(panelRegisterFinish);
	var issues = $('<div/>').addClass('issues').appendTo(panelRegisterFinish);

	if (mode == 'pc') {
		$('<p/>').text(_('register_finish_description')).appendTo(issues);
		var ol = $('<ol/>').appendTo(issues);
		var verifyEmail = $('<li/>').addClass('issueItem').text(_('register_finish_verify_email_pc_part1')).appendTo(ol).append($('<br/>'));
		$('<span/>', { 'style': 'color: red;' }).text(_('register_finish_verify_email_pc_part2')).appendTo(verifyEmail);
		verifyEmail.append($('<br/>'));
		$('<a/>', {
			'href': SETTINGS.test ? ACCOUNT_CENTER_TEST_URL : ACCOUNT_CENTER_URL, 'target': '_blank', 'class': 'newlineLink'
		}).text(_('register_finish_verify_email_link')).appendTo(verifyEmail);

		var country = SETTINGS.country;
		if (country == 'TW') {
			var verifyUser = $('<li/>').text(_('register_finish_verify_user')).appendTo(ol).append($('<br>'));
			$('<a/>', {
				'href': _('link_verify_user'), 'target': '_blank', 'class': 'newlineLink'
			}).text(_('register_finish_verify_user_link')).appendTo(verifyUser);
		}
		var bindMobile = $('<li/>').text(_('register_finish_bind_mobile')).appendTo(ol).append($('<br>'));
		$('<a/>', {
			'href': _('link_bind_mobile'), 'target': '_blank', 'class': 'newlineLink'
		}).text(_('register_finish_bind_mobile_link')).appendTo(bindMobile);
	} else {
		$('<p/>').addClass('issueItem').text(_('register_finish_verify_email_mobile_part1')).appendTo(issues);
		$('<p/>').addClass('issueItem').html(_('register_finish_verify_email_mobile_part2',
			{ 'tag_begin': '<a id="link-verify-email" href="' + (SETTINGS.test ? ACCOUNT_CENTER_TEST_URL : ACCOUNT_CENTER_URL) + '">', 'tag_end': '</a>' })
		).appendTo(issues);
	}

	var btn_back = $('<a/>', { 'id': 'confirm-btn', 'href': 'javascript:;', 'class': 'btn btn-login' }).text(_('btn_register_finish')).appendTo(panelRegisterFinish);
	btn_back.click(function () {
		var redirect_uri = getRequestParam('redirect_uri');
		if (redirect_uri == null) {
			redirect_uri = DEFAULT_REDIRECT_URL
		}
		redirect(redirect_uri);
	});

	showContent(panelRegisterFinish, mode, true);
}
