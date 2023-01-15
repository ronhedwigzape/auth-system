<?php
// Initialize the session
session_start();
//echo "<pre>";
//echo var_dump($_COOKIE);
//echo "</pre>";
//
//echo "<pre>";
//echo var_dump($_SESSION);
//echo "</pre>";

if(isset($_COOKIE['username'])){
    header("location: welcome.php");
}

if(isset($_POST['logout'])) {
    setcookie('username', $username, 0, '/');
}

require_once 'partials/header.php'
?>
<body>
<div id="preloader"></div>
<!--    Main Content    -->
<div class="container">

    <div class="d-flex justify-content-center mt-5" style=" margin-bottom:5rem;">
        <h1 class="d-flex justify-content-center text-center tracking-in-expand" style="font-size: 6rem;">Hello World.</h1>
    </div>
    <!--    Sign Up Component   -->
    <div class="" style=" margin-bottom: 20rem;" id="register-component">
        <?php require_once 'partials/register.php' ?>
    </div>
</div>
<?php require_once 'partials/footer.php'; ?>