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
    });
    function myFunction() {
        var x = document.getElementById("#password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script src="assets/js/main.js"></script>
</body>
</html>
