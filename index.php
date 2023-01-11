<?php

    // Initialize the session
    session_start();

    require_once 'partials/header.php'
?>
<body>
<div id="preloader"></div>
<!--    Main Content    -->
<div class="container">

    <div class="d-flex justify-content-center" style="margin-top: 8rem; margin-bottom: 8rem;">
        <h1 class="d-flex justify-content-center text-center tracking-in-expand" style="font-size: 6rem;">Hello World.</h1>
    </div>
    <div class="row d-flex">
        <div class="col-md-6 col-12 my-3 d-flex justify-content-center">
            <button class="register-button"><a href="#register-component" style="color: #fff;text-decoration: none;">Click here to Register!</a></button>
        </div>
        <div class="col-md-6 col-12 my-3 d-flex justify-content-center">
            <button class="login-button"><a href="login.php" style="color: #fff;text-decoration: none;">Click here to Login!</a></button>
        </div>
    </div>
    <!--    Sign Up Component   -->
    <div class="" style="margin-top: 45rem; margin-bottom: 20rem;" id="register-component">
        <?php require_once 'partials/register.php' ?>
    </div>
</div>
<?php require_once 'partials/footer.php'; ?>