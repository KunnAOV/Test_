var SETTINGS = {};
var captcha_key = '';
var mobile_register_request = {};

var SSO_SERVER_URL = '/';
var SSO_URL_API_PRELOGIN = SSO_SERVER_URL + 'api/prelogin';
var SSO_URL_API_LOGIN = SSO_SERVER_URL + 'api/login';
var SSO_URL_API_LOGOUT = SSO_SERVER_URL + 'api/logout';
var SSO_URL_UI_REGISTER = SSO_SERVER_URL + 'ui/register';
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
