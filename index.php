<?php
// Initialize the session
session_start();

//Include connection
require_once 'partials/conn.php';

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
    setcookie('username', '', 0, '/');
    setcookie('id', '', 0, '/');
    setcookie('reset_pass_status', '', 0, '/');
    $conn->close();
    session_destroy();
    session_abort();
}

// Include config file
require_once "partials/conn.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
//                $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash


            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page
                echo "success";
                header("location: login.php");
            } else {
                echo "error";
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
                $stmt->close();
        }
    }

    // Close connection
        $conn->close();
}
require_once 'partials/header.php'
?>
<body>
<div id="preloader"></div>
<!--    Main Content    -->
<div class="container">

    <!--    Header    -->
    <div class="d-flex justify-content-center mt-5" style=" margin-bottom:3rem;">
        <h1 class="d-flex justify-content-center text-center fw-bolder text-shadow-drop-bottom" style="font-size: 6rem;"><i class="fa-solid fa-user-secret me-4"></i> Auth</h1>
    </div>

    <!--      Dark Mode Toggle Switch     -->
    <div class="d-flex justify-content-center form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="toggle">
        <label class="form-check-label ms-3" for="toggle">Switch to Dark Mode</label>
    </div>

    <!--    Sign Up Component   -->
    <div class="" id="register-component">
        <div class="px-2 px-md-4 py-1 py-md-3 h-100" id="register"> <!--register container-->
            <div class="row d-flex justify-content-center h-100"> <!--grid-->
                <div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-5 "> <!--column-->
                    <div class="text-black rounded-4"> <!--background-->
                        <div class="border px-3 px-md-5 py-3 text-center rounded-4 shadow-lg"> <!--padding-->
                            <div class="mb-md-2 mt-md-2"> <!--margin-->
                                <form class="signup" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <h2 class="fw-bold my-4 text-uppercase">Sign Up</h2>
                                    <p>Please fill this form to create an account.</p>
                                    <div class="form-floating form-outline form-group form-white mb-3">
                                        <input type="text"
                                               id="username"
                                               name="username"
                                               class="form-control form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                                               value=""
                                               placeholder="Username" autofocus>
                                        <label for="username" class="text-muted">Username</label>
                                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="form-floating form-outline form-group form-white mb-3 toggle-password-visibility">
                                        <input type="password"
                                               id="password"
                                               name="password"
                                               class="form-control form-control toggle-password-visibility__input  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                                               value=""
                                               placeholder="Password">
                                        <label for="password" class="text-muted">Password</label>
                                        <a type="button" class="toggle-eye text-decoration-none transition pt-3 mt-1 text-dark px-3 fa-solid"><b id="eye" class="fa-eye-slash "></b></a>
                                    </div>
                                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                    <div class="form-floating form-outline form-group form-white mb-3 toggle-password-visibility">
                                        <input type="password"
                                               id="confirm_password"
                                               name="confirm_password"
                                               class="form-control form-control toggle-password-visibility__input  <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                                               value=""
                                               placeholder="Confirm Password">
                                        <label for="password" class="text-muted">Confirm Password</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="" type="checkbox" value="" id="defaultCheck1" required>
                                        <label for="defaultCheck1">
                                            <p>Accept <b>Terms and Conditions</b></p>
                                        </label>
                                    </div>
                                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                    <div class="row container">
                                        <div class="col-6 d-flex align-items-center justify-content-center my-3">
                                            <input class="btn btn-outline-primary btn-md px-5 fw-bold rounded-5 text-center ms-3 ms-md-4" type="submit" value="Submit" >
                                        </div>
                                        <div class="col-6 d-flex align-items-center">
                                            <input class="btn btn-outline-warning btn-md px-5 fw-bold rounded-5 text-center ms-3 ms-md-4" type="reset" value="Reset">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            <div>
                                <p class="mb-3">Already have an account? <a class="fw-bold" href="login.php">Login here.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php require_once 'partials/footer.php'; ?>