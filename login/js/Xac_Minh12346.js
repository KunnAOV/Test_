 var captchaGenerate = function() {
        var b = "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(a) {
            var b = 16 * Math.random() | 0;
            return ("x" == a ? b : b & 3 | 8).toString(16)
        }).replace(/-/g, "");
        $("#captcha-key").val(b);
        $("#captcha-img").attr("src", "login/captcha.php?id=" + b)
    },
    refreshCaptcha = function() {
        $(".refresh").click(function() {
            captchaGenerate()
        })
    };
$("#sso_captcha_wrap").show(), $("#input-captcha").attr("required", !0);
$(document).ready(function() {
    captchaGenerate();
    refreshCaptcha()
});