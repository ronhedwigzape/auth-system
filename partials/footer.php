<?php
?>
<script>
    $(function (){
        // Data Table JS
        $('#myTable').DataTable();

        // Toggle passsword visibility
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
                // Execute when checkbox is checked
                localStorage.setItem('darkMode', 'enabled');
                $(".form-check-label").html('Switch to Light Mode');
                $("body, input").addClass("dark-mode");
                $("h2, b, p, small, hr").addClass("text-white");
            } else {
                // Execute when checkbox is not checked
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
