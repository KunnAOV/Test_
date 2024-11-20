function clearPage() {
	$(window).unbind('resize', centralizeContent);
	$('#page').remove();
}

function centralizeContent() {
	var div = $('.content');
	var top = ($(window).height() - div.height()) / 2;
	var header = $('#header');
	if (header.size() > 0) {
		top -= header.height() / 2;
	}
	top = top / 5 * 4 - 50;
	if (top < 0) {
		top = 0;
	}
	div.css('top', top.toString() + 'px');
}

function showContent(content, mode, showBanner) {
	showBanner = (typeof showBanner === "undefined") ? false : showBanner;
	clearPage();
	var title = content.find('h2').text();
	if (title != null) {
		$('title').val(title);
	}
	var page = $('<div/>').attr('id', 'page');
	if (getRequestParam('display') != 'embedded') {
		var header = $('<div/>').attr('id', 'header').addClass('header').appendTo(page);
		if (mode == 'pc') {
			var langWrapper = $('<div/>').addClass('langWrapper').addClass('fr').appendTo(header);
			var langSelect = $('<select/>').addClass('lang').appendTo(langWrapper);
			for (i in LOCALE_LIST) {
				var option = $('<option/>', {
					'value': getLocale(LOCALE_LIST[i].code, LOCALE_LIST[i].region), 'text': LOCALE_LIST[i].lname
				}).appendTo(langSelect);
			}
			$('<span/>').addClass('icon-earth').appendTo(langWrapper);
			langSelect.change(function () {
				var locale = langSelect.val();
				var params = getRequestParams();
				params['locale'] = locale;
				redirect(getCurrentBaseUrl(), params);
			});
			langSelect.val(getLocale(SETTINGS.language, SETTINGS.country));
		}
		var topLink = $('<h1/>');
		var link = $('<a/>').addClass('logo').appendTo(topLink);

		link.attr({ 'href': _('garena_homepage'), 'target': '_blank' });
		if (!SETTINGS.iframe) {
			$('<img/>', { 'src': SETTINGS['static_root'] + 'Assets_Garena/images/img_garena_logo.png', 'height': 35 }).appendTo(link);
		} else {
			$('<span/>', { 'id': 'iframe_title' }).appendTo(topLink);
		}
		$('<div/>').addClass('topBarGarena').appendTo(header);

		$('<div/>').addClass('topBar').appendTo(header);
		topLink.appendTo(header);
	}

	var mainPanel = $('<div/>').attr('id', 'main-panel').appendTo(page);
	if (mode == 'mobile') {
		mainPanel.addClass('mobile');
	}
	content.addClass('content');
	// var footer = $('<div/>').attr('id', 'footer').text(_('footer_text')).addClass('footer').appendTo(mainPanel);
	// if (SETTINGS.test && SETTINGS.language=='vi' && /android/i.test(navigator.userAgent)){
	// 	footer.text('');
	// }
	if (SETTINGS['gas_download'] && showBanner) {
		var gas = $('<div/>').attr('id', 'gas').addClass('banner').appendTo(content);
		$('<img/>', { 'src': SETTINGS['static_root'] + 'Assets_Garena/images/garena_banner.png' }).appendTo(gas);
		$('<span/>').addClass('bannerText').text(_('gas_intro')).appendTo(gas);
		var btnDownload = $('<a/>', { 'href': 'javascript:;' }).addClass('download').appendTo(gas);
		$('<span/>').addClass('icon-phone').appendTo(btnDownload);
		$('<span/>').text(_('gas_dl_btn_text')).appendTo(btnDownload);

		btnDownload.click(function () {
			if (/android/i.test(navigator.userAgent)) {
				var iframe = document.createElement("iframe");
				iframe.id = 'frame_' + (new Date()).getTime();
				iframe.style.border = "none";
				iframe.style.width = "1px";
				iframe.style.height = "1px";
				document.body.appendChild(iframe);
				var r = document.getElementById(iframe.id);
				var loaded = false;
				r.onload = function () {
					window.location = GAS_ANDROID;
					loaded = true;
				};
				window.addEventListener("pagehide", function () {
					loaded = true;
				}, false);
				if (r === null) {
					window.location = GAS_ANDROID;
				} else {
					r.src = GAS_APP_URL;
				}
				setTimeout(function () {
					if (!loaded) {
						window.location = GAS_ANDROID;
					}
				}, 1000);
			} else {
				setTimeout(function () {
					window.location = GAS_IOS;
				}, 100);
				window.location = GAS_APP_URL;
			}
		});
	}
	mainPanel.prepend(content);

	$('body').append(page);
	centralizeContent();
	$(window).bind('resize', centralizeContent);
}

function appendClearDiv(container) {
	container.append($('<div/>', { 'class': 'clear' }));
}

function clearMessage(parent) {
	$(parent + ' #msg').remove();
	$(parent + ' input.error').removeClass('error');
}

function showMessage(msg, type, parent, clear_others, mode) {
	mode = (typeof mode === "undefined") ? "text" : mode;
	if (clear_others) {
		$('span[id="msg"]').remove();
	} else {
		parent.find('span.errorMsg,span.successMsg').remove();
	}
	var panel = $('<span/>', { 'id': 'msg', 'class': type + 'Msg' });
	if (mode == 'html') {
		panel.html('<em></em>' + msg);
	} else {
		panel.text(msg);
		panel.prepend($('<em/>'));
	}
	parent.append(panel);
}

function showMobileRegisterAlert(msg) {
	var wrapper = $('<div/>').addClass('alertWrapper');
	var container = $('<div/>').addClass('alertContainer').appendTo(wrapper);
	var alert = $('<div/>').addClass('alert').appendTo(container);
	$('<span/>').addClass('icon-alert').appendTo(alert);
	$('<p/>').text(msg).appendTo(alert);
	$('<p/>').text(_('register_redirect_on_error')).appendTo(alert);
	var btnOK = $('<a/>', { 'href': 'javascript:;', 'class': 'btn-ok' }).text(_('btn_ok')).appendTo(container);

	wrapper.appendTo($('body'));

	btnOK.click(function () {
		showRegisterPage('mobile');
		wrapper.remove();
	})
}

function showSuccess(msg, after, clear_others, mode) {
	showMessage(msg, 'success', after, clear_others, mode);
}

function showError(msg, after, clear_others, mode) {
	if (after === undefined) { after = $('#line-btn'); }
	after.find('span.icon-right').remove();
	clear_others = (typeof clear_others === "undefined") ? true : clear_others;
	if (clear_others) {
		$('input.error').removeClass('error');
	}
	showMessage(msg, 'error', after, clear_others, mode);
	after.find('input').addClass('error');
}

function centralizeDialog() {
	$('.sso_dialog').each(function () {
		var dialog = $(this);
		var top = ($(window).height() - dialog.height()) / 2;
		if (top < 0) {
			top = 0;
		}
		dialog.css('top', top.toString() + 'px');
	});
}

function removeDialog() {
	$(window).unbind('resize', centralizeDialog);
	$('.sso_dialog_container').remove();
}

function showDialog(content, id, title, onCloseCallback) {
	removeDialog();
	var container = $('<div/>').addClass('sso_dialog_container').css('display', 'none');
	var background = $('<div/>').addClass('sso_dialog_background').appendTo(container);
	var dialog = $('<div/>').addClass('sso_dialog').appendTo(container);
	if (id != null) {
		dialog.attr('id', id);
	}
	if (title == null) {
	    title = '';
	}
    $('<div/>').addClass('sso_dialog_title').text(title).appendTo(dialog);
    var btnClose = $('<div/>', { 'title': _('dialog_close_tip') }).html('&times;').addClass('sso_dialog_close').appendTo(dialog);
    var onClose = function () {
        $(window).unbind('resize', centralizeDialog);
        container.fadeOut(500, onCloseCallback);
    };
    btnClose.click(onClose);

	$('<div/>').addClass('sso_dialog_content').append(content).appendTo(dialog);
	$('body').append(container);
	var top = ($(window).height() - dialog.height()) / 2;
	if (top < 0) {
		top = 0;
	}
	dialog.css('top', top.toString() + 'px');
	$(window).bind('resize', centralizeDialog);
	container.fadeIn(500, function () { $(this).focus() });
	background.click(onClose);
}

function showPageDialog(url, id, title, onCloseDialog) {
	var iframe = $('<iframe/>', { 'class': 'sso_dialog_frame', 'src': url, 'frameborder': 0, 'scrolling': 'no' }).load(function () {
		setTimeout(function () {
			try {
				$(iframe).height($(iframe).contents().height());
			} catch (ex) {
				// sink exception for cross-origin iframe
			}
		}, 100);
	});
	showDialog(iframe, id, title, onCloseDialog);
}
