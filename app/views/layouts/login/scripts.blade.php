<script src="assets/js/plugin/pace/pace.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script> if (!window.jQuery) { document.write('<script src="assets/js/libs/jquery-2.1.1.min.js"><\/script>');} </script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script> if (!window.jQuery.ui) { document.write('<script src="assets/js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>
<script src="assets/js/app.config.js"></script>
<script src="assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/bootstrap/bootstrap.min.js"></script>
<script src="assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>
<script src="assets/js/plugin/masked-input/jquery.maskedinput.min.js"></script>
<!--[if IE 8]>
    <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
<![endif]-->
<script src="assets/js/app.min.js"></script>
<script type="text/javascript">
    runAllForms();

    $(function() {
        // Validation
        $("#login-form").validate({
            // Rules for form validation
            rules :
            {
                identifier :
                {
                    required    : true,
                    email       : true
                },
                password :
                {
                    required    : true,
                    minlength   : 3,
                    maxlength   : 20
                }
            },

            // Messages for form validation
            messages :
            {
                identifier :
                {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
                },
                password :
                {
                    required : 'Please enter your password'
                }
            },

            // Do not change code below
            errorPlacement : function(error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>