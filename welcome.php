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


// Check if the user is logged in, otherwise redirect to login page
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//    header("location: login.php");
//    exit;
//}

// Check if the user is logged in, if not then redirect him to login page using cookies
if(!isset($_COOKIE['username'])){
    header("location: login.php");
    exit;
}
require_once 'partials/header.php';
?>
    <div id="preloader"></div>
    <div class="container">
        <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_COOKIE["username"]); ?></b>. Welcome to our site.</h1>
        <p>
            <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
            <form action="login.php" method="POST">
                <button type="submit" href="login.php" name="logout" class="btn btn-danger ml-3">Sign Out of Your Account</button>
            </form>
        </p>
    </div>

<?php require_once 'partials/footer.php'; ?>