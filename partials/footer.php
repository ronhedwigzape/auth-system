<?php
?>
<script>
    $(function (){
        var button = $("form .toggle-eye");
        var p = $("#password, #confirm_password");
        button[0].onclick = function (e) {
            e.preventDefault;
            $("#eye").fadeOut(100).fadeIn(700).toggleClass("fa-eye");
            if(p.attr("type") === "password") {
                p.attr("type", "text");
            } else {
                p.attr("type", "password");
            }
        }


        $("#toggle").change(function() {
            if ($(this).is(':checked')) {
                // checkbox is checked
                localStorage.setItem('darkMode', 'enabled');
                $(".form-check-label").html('Switch to Light Mode');
                $("body, input, h2, a, b, p, small, hr").addClass("dark-mode");
            } else {
                // checkbox is not checked
                localStorage.setItem('darkMode', 'disabled');
                $(".form-check-label").html('Switch to Dark Mode');
                $("body, input, h2, a, b, p, small, hr").removeClass("dark-mode");
            }
        });

        if (localStorage.getItem('darkMode') === 'enabled') {
            $("body, input, h2, a, b, p, small, hr").addClass("dark-mode");
            $("#toggle").prop("checked", true);
        }


        // $(".signup").submit(function(event){
        //     event.preventDefault();
        //
        //     let username = $("#username").val();
        //     let password = $("#password").val();
        //     let confirm_password = $("#confirm_password").val();
        //
        //     $.ajax({
        //         type: "POST",
        //         url: "account-creation.php",
        //         data: {
        //             username: username,
        //             password: password,
        //             confirm_password: confirm_password
        //         },
        //         success: function(response) {
        //             if(response === "success"){
        //                 alert("Account created successfully!");
        //             }else{
        //                 alert("An error occurred, please try again");
        //             }
        //         }
        //     });
        // });
    });
</script>
<script src="assets/js/main.js"></script>
</body>
</html>
