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
                $("body, input").addClass("dark-mode");
                $("h2, b, p, small, hr").addClass("text-white");
            } else {
                // checkbox is not checked
                localStorage.setItem('darkMode', 'disabled');
                $(".form-check-label").html('Switch to Dark Mode');
                $("body, input").removeClass("dark-mode");
                $("h2, a, b, p, small, hr").removeClass("text-white");
            }
        });

        if (localStorage.getItem('darkMode') === 'enabled') {
            $("body, input").addClass("dark-mode");
            $("h2, a, b, p, small, hr").addClass("text-white");
            $("#toggle").prop("checked", true);
        }


        // if (getCookie("darkMode") === 'enabled') {
        //     $("body, input, h2, a, b, p, small, hr").addClass("dark-mode");
        //     $("#toggle").prop("checked", true);
        // }
        //
        // $("#toggle").change(function() {
        //     if (getCookie("darkMode") === 'enabled') {
        //         setCookie("darkMode", "disabled", 365);
        //         $("body, input, h2, a, b, p, small, hr").removeClass("dark-mode");
        //     } else {
        //         setCookie("darkMode", "enabled", 365);
        //         $("body, input, h2, a, b, p, small, hr").addClass("dark-mode");
        //     }
        // });
        //
        // // function to get cookie value
        // function getCookie(name) {
        //     var value = "; " + document.cookie;
        //     var parts = value.split("; " + name + "=");
        //     if (parts.length == 2) return parts.pop().split(";").shift();
        // }
        //
        // // function to set cookie
        // function setCookie(name, value, days) {
        //     var expires = "";
        //     if (days) {
        //         var date = new Date();
        //         date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        //         expires = "; expires=" + date.toUTCString();
        //     }
        //     document.cookie = name + "=" + (value || "") + expires + "; path=/";
        // }

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
