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
<div id="preloader"></div>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">ACLC Iriga</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link text-center p-3" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Faculty
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Developer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="layers" class="align-text-bottom"></span>
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
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text" class="align-text-bottom"></span>
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
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar" class="align-text-bottom"></span>
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
                <div class="d-inline-flex">
                    <div>
                        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                    </div>
                    <div class="ms-3">
                        <form action="login.php" method="POST">
                            <button type="submit" href="login.php" name="logout" class="btn btn-danger ml-3">Sign Out of Your Account</button>
                        </form>
                    </div>
                </div>

                <div class="mt-3 ">
                    <div class="m-auto">
                        <!-- Add New Button trigger modal -->
                        <button type="button" class="btn btn-success rounded-5 my-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Add New Data
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add your data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="insert-data.php" class="record" method="post">
                                        <div class="modal-body">
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
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-success" type="submit">Add</button>
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
                            $no =  1 ;
                            $data = mysqli_query($conn, "SELECT * FROM persons");
                            while($row = mysqli_fetch_array($data)){ ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['person_firstname']; ?></td>
                                    <td><?= $row['person_lastname']; ?></td>
                                    <td><?= $row['person_mobile']; ?></td>
                                    <td>
                                        <a type="button" id="delete" class="btn btn-outline-danger" href="delete-data.php?id=<?= $row['person_id']?>">Delete</a>
                                        <a type="button" class="btn btn-outline-info ms-3" data-bs-toggle="modal" data-bs-target="#editData<?= $row['person_id']?>">Edit</a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="editData<?= $row['person_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update <?= $row['person_firstname']?>'s data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="update-data.php" method="post">
                                                <div class="modal-body">
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
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-success" type="submit">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php require_once 'partials/footer.php'; ?>