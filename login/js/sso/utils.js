function isMobile() {
	return /android|ip(hone|ad|od)/i.test(navigator.userAgent);
}

function _(key, params) {
	var language = SETTINGS['language'];
	if (!(language in SSO_SERVER_I18N) || !(key in SSO_SERVER_I18N[language])) {
		return key;
	}
	var text = SSO_SERVER_I18N[language][key];
	if (params != null) {
		for (key in params) {
			text = text.replace('%(' + key + ')', params[key].toString());
		}
	}
	return text;
}

function getLocale(language, country) {
	if (language == 'zh-TW') {
		return language
	} else {
		return language + '-' + country
	}
}

function getCurrentBaseUrl() {
	var url = window.location.href;
	var sep = url.indexOf('#');
	if (sep >= 0) {
		url = url.substring(0, sep);
	}
	sep = url.indexOf('?');
	if (sep >= 0) {
		url = url.substring(0, sep);
	}
	return url;
}

function getUrlParams (url) {
	var params = {};
	var parser = document.createElement('a');
	parser.href = url;
	var query = parser.search.substring(1);
	var vars = query.split('&');
	for (var i = 0; i < vars.length; i++) {
		var pair = vars[i].split('=');
		params[pair[0]] = decodeURIComponent(pair[1]);
	}
	return params;
};

function getRequestParams() {
	var e = window.location.search.replace(/^\?/, "").split("&"), n = 0, r, i = {}, s, o, u;
	while ((r = e[n++]) !== undefined) s = r.match(/^([^=&]*)=(.*)$/), s && (o = decodeURIComponent(s[1]), u = decodeURIComponent(s[2]), i[o] = u);
	return i;
}

function getRequestParam(key) {
	var params = getRequestParams();
	if (key in params) {
		return params[key];
	}
	return null;
}

function getRequestFragments() {
	var e = window.location.hash.replace(/^#/, "").split("&"), n = 0, r, i = {}, s, o, u;
	while ((r = e[n++]) !== undefined) s = r.match(/^([^=&]*)=(.*)$/), s && (o = decodeURIComponent(s[1]), u = decodeURIComponent(s[2]), i[o] = u);
	return i;
}

function getRequestFragment(key) {
	var params = getRequestFragments();
	if (key in params) {
		return params[key];
	}
	return null;
}

function getRedirectUriWithParms(uri, params) {
	if (params != null) {
		var sParams = '';
		for (var key in params) {
			sParams += '&' + encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
		}
		if (sParams.length > 0) {
			if (uri.indexOf('?') < 0) {
				sParams = '?' + sParams.substr(1);
			}
			uri += sParams;
		}
	}
	return uri;
}

function redirect(uri, params) {
	var redirectUri = getRedirectUriWithParms(uri, params);
	window.location = redirectUri;
}

function redirectWithFragments(uri, params, fragments) {
	var redirectUri = getRedirectUriWithParms(uri, params);
    if (fragments != null) {
        var sFragments = '';
		for (var key in fragments) {
			sFragments += '&' + encodeURIComponent(key) + '=' + encodeURIComponent(fragments[key]);
		}
		if (sFragments.length > 0) {
			if (redirectUri.indexOf('#') < 0) {
				sFragments = '#' + sFragments.substr(1);
			}
			redirectUri += sFragments;
		}
    }
	window.location = redirectUri;
}

function setCookie(name, value, expiredSeconds, domain) {
	var sValue = escape(value);
	if (expiredSeconds != null) {
		var expires = new Date(new Date().getTime() + expiredSeconds);
		sValue += "; expires=" + expires.toUTCString();
	}
	if (domain != null) {
		sValue += "; domain=" + domain;
	}
	document.cookie = name + "=" + sValue;
}

function removeCookie(name, domain) {
	document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; domain=' + domain + '; path=/;';
}

function changePlatform(platform) {
	var baseUrl = getCurrentBaseUrl();
	var params = getRequestParams();
	params['platform'] = platform;
	redirect(baseUrl, params);
}

function requestJsonp(url, params, callback) {
	params['format'] = 'jsonp';
	params['callback'] = callback;
	params['id'] = new Date().getTime();
	params['app_id'] = SETTINGS['app_id'];
	var first = true;
	for (var key in params) {
		var value = params[key];
		if (first) {
			url += '?';
			first = false;
		} else {
			url += '&';
		}
		url += encodeURIComponent(key);
		url += '=';
		url += encodeURIComponent(value);
	}
	var scriptTag = $('<script/>', { 'type': 'text/javascript' }).appendTo($('body'));
	scriptTag.attr('src', url);
}

function requestJson(url, params, callback, method) {
	method = (typeof method === "undefined") ? "GET" : method;
	params['format'] = 'json';
	params['id'] = new Date().getTime();
	params['app_id'] = SETTINGS['app_id'];
	$.ajax({
		type: method,
		url: url,
		data: params,
		dataType: 'json',
		success: callback,
		error: function (xhr, status, error) {
			try {
				callback(xhr.responseJSON, xhr.status);
			}
			catch(err) {
				console.log(err);
				callback({'error': 'error_server'});
			}
		}
	});
}