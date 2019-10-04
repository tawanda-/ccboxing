<?php 
    require_once(realpath(__DIR__ . '/..')."/config/settings.php"); 
    include(__DIR__.'/templates/header.php');
    include(__DIR__.'/templates/top_navbar.php');
    include(__DIR__.'/templates/checkout_content.php');
?>


<? include(__DIR__.'/templates/footer2.php'); ?>
<script>
    //Source: https://getbootstrap.com/docs/4.0/examples/checkout/
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';

    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
</script>