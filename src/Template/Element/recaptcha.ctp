<?= $this->Html->script('https://www.google.com/recaptcha/api.js?hl=' . $recaptcha['lang']. '&onload=CaptchaCallback&render=explicit', ["defer"=>"", "async"=>"" ,"type"=>"text/plain", "data-usercentrics"=>"reCAPTCHA"]) ?>
<script type="text/javascript">
var CaptchaCallback = function() {
	var el = document.getElementsByClassName('g-recaptcha');
    for (var i = 0; i < el.length; i++)
        grecaptcha.render(el[i], {'sitekey' : '<?= $recaptcha['sitekey'] ?>'});
};
</script>

<div
    class="g-recaptcha"
    data-sitekey="<?= $recaptcha['sitekey'] ?>"
    data-theme="<?= $recaptcha['theme'] ?>"
    data-type="<?= $recaptcha['type'] ?>"
    data-size="<?= $recaptcha['size'] ?>"
    async defer>
</div>
