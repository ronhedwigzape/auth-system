<?php

?>
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
                                <label class="form-check-label" for="defaultCheck1">
                                    Accept <a href="#" class="text-decoration-none">Terms and Conditions</a>
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
                        <p class="mb-3 text-muted">Already have an account? <a class="text-dark" href="login.php">Login here</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>