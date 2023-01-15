<?php
?>
<script>
    $(function (){
        var button = $("form .toggle-eye");
        var p = $("div.form-floating #password");
        button[0].onclick = function (e) {
            e.preventDefault;
            $("#eye").fadeOut(100).fadeIn(700).toggleClass("fa-eye");
            if(p.attr("type") === "password") {
                p.attr("type", "text");
            } else {
                p.attr("type", "password");
            }
        }

        $("#show-password").change(function() {
            if ($(this).is(":checked")) {
                $("#password1, #password2").attr("type", "text");
            } else {
                $("#password1, #password2").attr("type", "password");
            }
        });

    });



</script>
<script src="assets/js/main.js"></script>
</body>
</html>
