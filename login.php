<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
//if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//    header("location: welcome.php");
//    exit;
//}

//echo "<pre>";
//echo var_dump($_COOKIE);
//echo "</pre>";
//
//echo "<pre>";
//echo var_dump($_SESSION);
//echo "</pre>";

// Include config file
require_once "partials/conn.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

if(isset($_COOKIE['username'])){
    header("location: welcome.php");
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                             $_SESSION["loggedin"] = true;
                            // $_SESSION["id"] = $id;
                            // $_SESSION["username"] = $username;

                            // Set expiration to 3 days
                            $expiration = time() + (60 * 60 * 24 * 3);

                            // Set Cookie for username and id
                            setcookie('username', $username, $expiration, '/');
                            setcookie('id', $id, $expiration, '/');

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
//            $stmt->close();
        }
    }


    if(isset($_POST['logout'])) {
        setcookie('username', $username, 0, '/');
        session_destroy();
        $conn->close();
    }

    // Close connection
//    $mysqli->close();
}
require_once 'partials/header.php';
?>
<div class="container">
    <div class="d-flex justify-content-center mt-5" style=" margin-bottom:5rem;">
        <h1 class="d-flex justify-content-center text-center tracking-in-expand" style="font-size: 6rem;">Hello World.</h1>
    </div>
</div>
<div class="d-flex justify-content-center form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" id="toggle">
    <label class="form-check-label ms-3" for="toggle">Switch to Dark Mode</label>
</div>
<div class="container px-4 py-3 h-100"> <!--container-->
    <div class="row d-flex justify-content-center h-100"> <!--grid-->
        <div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-5 "> <!--column-->
            <div class="text-black rounded-4"> <!--background-->
                <div class="border p-1 px-5 py-3 text-center rounded-4 shadow-lg"> <!--padding-->
                    <div class="mb-md-2 mt-md-2"> <!--margin-->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <h2 class="fw-bold my-4 text-uppercase">Login</h2>
                            <p>Please fill in your credentials to login.</p>
                            <?php
                            if(!empty($login_err)){
                                echo '<div class="alert alert-danger p-2"><i class="fa-solid fa-triangle-exclamation"></i> ' . $login_err . '</div>';
                            }
                            ?>
                            <div class="form-floating form-outline form-white mb-3">
                                <input type="text"
                                       id="username"
                                       name="username"
                                       class="form-control form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $username; ?>"
                                       placeholder="Username" autofocus>
                                <label for="username" class="text-muted">Username</label>
                                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-floating form-outline form-white mb-3 toggle-password-visibility">
                                <input type="password"
                                       id="password"
                                       name="password"
                                       class="form-control form-control toggle-password-visibility__input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                                       placeholder="Password">
                                <label for="password" class="text-muted">Password</label>
                                <a type="button" class="toggle-eye text-decoration-none transition pt-3 mt-1 text-dark px-3 fa-solid"><b id="eye" class="fa-eye-slash "></b></a>
                            </div>
                            <button class="btn btn-outline-success btn-md fw-bold px-5 rounded-5" value="Login" type="submit">Login</button>
                        </form>
                    </div>
                    <hr>
                    <div>
                        <p class="mb-3">Don't have an account? <a class="fw-bold" href="index.php">Sign up now.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'partials/footer.php'; ?>