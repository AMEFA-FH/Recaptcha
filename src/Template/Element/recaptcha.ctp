<?php
    if($recaptcha["loadMethod"] != 'gtm') {
        $options = ["defer" => "", "async" => "", "id" => 'scriptreCAPTCHA'];
        if($recaptcha["loadMethod"] == 'usercentrics'){
            $options["type"] = "text/plain";
            $options["data-usercentrics"] = "reCAPTCHA";
        }
        echo $this->Html->script('https://www.google.com/recaptcha/api.js?hl=' . $recaptcha['lang'] . '&onload=CaptchaCallback&render=explicit', $options);
    }
?>
<script type="text/javascript">
    var CaptchaCallback = function() {
        var el = document.getElementsByClassName('g-recaptcha');
        for (var i = 0; i < el.length; i++)
            grecaptcha.render(el[i], {'sitekey' : '<?= $recaptcha['sitekey'] ?>'});
    };
    function docReady(fn) {
        if (document.readyState === "complete" || document.readyState === "interactive") {
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }
    docReady(function() {
        f();
        function f() {
            let t = "text/plain";
            let el = document.querySelector("#scriptreCAPTCHA");
            if(el != null) {t = el.getAttribute("type");}
            if(t == "text/plain"){
                let rs = document.getElementsByClassName("g-recaptcha");
                for (i=0; i < rs.length;i++){
                    rs[i].innerHTML ="<?= $recaptcha['notLoadedMessage'] ?>";
                }
            }
        }
    });
</script>

<div
    class="g-recaptcha"
    data-sitekey="<?= $recaptcha['sitekey'] ?>"
    data-theme="<?= $recaptcha['theme'] ?>"
    data-type="<?= $recaptcha['type'] ?>"
    data-size="<?= $recaptcha['size'] ?>"
    async defer>
</div>
