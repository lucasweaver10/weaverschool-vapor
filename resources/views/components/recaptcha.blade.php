<script src="https://www.google.com/recaptcha/api.js?render=6LcH794UAAAAAKn98WogwInV28NZYI3oOsW8CeFQ"></script>
  <script>
    grecaptcha.ready(function () {
        grecaptcha.execute('6LcH794UAAAAAKn98WogwInV28NZYI3oOsW8CeFQ', { action: 'contact' }).then(function (token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
    });
</script>