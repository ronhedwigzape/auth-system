<?php
// Initialize the session
session_start();

// Include connection
require_once 'partials/conn.php';

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
<body>
<div id="preloader"></div>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <div class="img-fluid"><h2 class="navbar-brand col-md-2 col-lg-2 me-0 px-3 pt-3"><i class="fa-solid fa-user-secret me-2"></i> Authentication System</h2></div>

    <button class="navbar-toggler position-relative d-md-none collapsed me-3 me-" style="top: 5%;" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0 ms-lg-4 mt-2 mx-2 mt-md-0 mt-lg-0" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="login.php" method="POST">
                <button type="submit" href="login.php" name="logout" class="btn btn-dark ms-2 ms-md-0 ms-lg-0 my-1 my-md-0 my-lg-0"><i class="fa-solid fa-right-from-bracket"></i> Sign Out</button>
            </form>
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="welcome.php">
                            <i class="fa-solid fa-house-chimney"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-graduation-cap"></i>
                            Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-school"></i>
                            Faculty
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-code"></i>
                            Developer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-flag"></i>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-brands fa-intercom"></i>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-calendar"></i>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-calendar-week"></i>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-user"></i>
                            Social engagement
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="my-3">Hi, <b><?php echo htmlspecialchars($_COOKIE["username"]); ?></b>. Welcome to our site.</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2 mb-0 mb-md-3 mb-lg-0">
                        <a href="reset-password.php" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-repeat me-1"></i> Reset Your Password</a>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <i class="fa-solid fa-calendar-days"></i>
                        This week
                    </button>
                </div>
            </div>
            <div>
                <?php
                // Modal box for data submitted is successful
                if (isset($_COOKIE['reset_pass_status'])) {
                ?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <b class="fa-regular fa-circle-check me-2"></b>
                    <div>
                        <?php
                        if ($_COOKIE['reset_pass_status'] = "success") {
                            echo "Password Reset Successful!";
                        }
                        ?>
                    </div>
                </div>
                <?php } ?>
                <div>
                    <div class="m-auto">
                        <!-- Add New Button trigger modal -->
                        <button type="button" class="btn btn-primary rounded-5 mt-1 mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fa-solid fa-user-plus me-2"></i>Add New Data
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-user-secret me-2"></i>Add your data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="insert-data.php" class="record" method="post">
                                        <div class="modal-body">
                                            <p class="mb-4">Please ensure that all information is accurately filled out.</p>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="firstname" class="form-control" id="first-name" placeholder="Your First Name" autofocus>
                                                <label for="first-name" class="form-label">First Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="lastname" class="form-control" id="last-name" placeholder="Your Last Name">
                                                <label for="last-name" class="form-label">Last Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="mobile" class="form-control form-control-lg" id="department" placeholder="Mobile">
                                                <label for="exampleFormControlTextarea1" class="form-label">Mobile</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark me-2"></i>Close</button>
                                            <button class="btn btn-success" type="submit"><i class="fa-solid fa-user-plus me-2"></i>Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--      Data table      -->
                        <table id="myTable" class="display table text-center">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Mobile</th>
                                <th class="text-center">Action/s</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $num =  1 ;
                            $data = mysqli_query($conn, "SELECT * FROM persons");
                            while($row = mysqli_fetch_array($data)){ ?>
                                <tr>
                                    <td><?= $num; ?></td>
                                    <td><?= $row['person_firstname']; ?></td>
                                    <td><?= $row['person_lastname']; ?></td>
                                    <td><?= $row['person_mobile']; ?></td>
                                    <td>
                                        <a type="button" id="delete" class="btn btn-outline-danger" href="delete-data.php?id=<?= $row['person_id']?>"><i class="fa-solid fa-trash me-2"></i>Delete</a>
                                        <a type="button" class="btn btn-outline-info ms-3" data-bs-toggle="modal" data-bs-target="#editData<?= $row['person_id']?>"><i class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="editData<?= $row['person_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-user-secret me-2"></i>Update <?= $row['person_firstname']?>'s data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="update-data.php" method="post">
                                                <div class="modal-body">
                                                    <p class="mb-4">Please ensure that you are correctly updating the specific information.</p>
                                                    <div class="form-floating mb-3">
                                                        <input type="hidden" name="id" value="<?= $row['person_id']?>">
                                                        <input type="text" name="firstname" class="form-control" value="<?= $row['person_firstname']?>" placeholder="Your First Name">
                                                        <label for="first-name" class="form-label">New First Name</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="lastname" class="form-control" value="<?= $row['person_lastname']; ?>" id="floatingPassword" placeholder="Your Last Name">
                                                        <label for="floatingPassword">New Last Name</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="mobile" class="form-control form-control-lg" value="<?= $row['person_mobile']; ?>" placeholder="Mobile">
                                                        <label for="exampleFormControlTextarea1" class="form-label">New Mobile</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark me-2"></i>Close</button>
                                                    <button class="btn btn-success" type="submit"><i class="fa-regular fa-pen-to-square me-2"></i>Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php $num++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://unpkg.com/jquery-cookie-bubble@1.0.0/dist/cookieBubble.min.js"></script>
<script>
    //---------------Code-for-Cookie-Bubble-JS-----------------//
    // Source: https://github.com/CookieBubble/jquery-cookie-bubble
    (function($){
        $.cookieBubble(
            {
                messageTextColor:'rgb(44,88,162)',
                buttonText:'Got It',
                messageFontSize:'15',
                iconColor:'rgba(166, 118, 72, 1)',
                buttonColor:'rgba(0, 0, 0, 1)',
                iconVisibility:true,
                cookiePolicyButtonText:'Read our cookie Policy',
                cookiePolicyButtonUrl:'http://allaboutcookies.org',
                cookiePolicyButtonTarget:'_blank',
                boxPosition:'bottom-left',
                messageText:'We use cookies to personalize your experience. By continuing to visit this website you agree to our use of cookies.',
            });
    })(jQuery);
</script>
<?php require_once 'partials/footer.php'; ?>