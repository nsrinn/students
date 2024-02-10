<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="description" content="">
    <meta name="author" content=""> -->

    <title>Admin</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <script src="https://kit.fontawesome.com/6e4f86569d.js" crossorigin="anonymous"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    session_start(); // Start the session

    // Check if the user is logged in
    if (!isset($_SESSION['login_admin'])) {
        header("Location: adminlogin.php"); // Redirect to login page if session variable is not set
        exit();
    }

    $_SESSION['referrer'] = 'adminprofile.php';


    // Display user profile
    // echo "<h1> Welcome to your profile,</h1> " . $_SESSION['login_user'];

  
    include 'data.php';

   
    $userid = $_SESSION['login_admin'];

    // if (isset($_COOKIE['login_admin_username']) && isset($_COOKIE['login_admin_password'])) {
    //     // Cookies are set, do something
    //     $storedUsername = $_COOKIE['login_admin_username'];
    //     $storedPassword = $_COOKIE['login_admin_password'];

    //     // Perform actions with the stored data
    //     echo "Stored Username: $storedUsername";
    //     echo "Stored Password: $storedPassword";
    // } else {
    //     // Cookies are not set
    //     echo "Cookies are not set.";
    // }

    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminprofile.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo "$userid"; ?> </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" id="dashboardLink" href="adminprofile.php" style="cursor: pointer;">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- href="adminprofile.php" -->



            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Works</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Login Screens:</h6> -->
                        <a class="collapse-item" id="addstudentLink" href="studentregister.php?userid=<?php echo $userid; ?>" style="cursor: pointer;">Add Students</a>
                        <a class="collapse-item" id="addmarksLink" href="addmarks.php" style="cursor: pointer;">Add Mark</a>
                        <!-- <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a> -->
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" id="resetpswdLink" href="resetpassword.php" style="cursor: pointer;">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Reset Password</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" id="tablesLink" href="tables.php" style="cursor: pointer;">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>
            <li class="nav-item active" style="cursor: pointer;">
                <a class="nav-link" id="logoutadmin" href="adminlogout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                     
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->

                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "$userid"; ?></span>
                                <img class="img-profile rounded-circle" src="assets/img/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <?php
                        include 'data.php';
                        $userid = $_SESSION['login_admin']; ?>
                        <!-- <a class="collapse-item" id="addstudentLink" href="studentregister.php&userid=$userid" style="cursor: pointer;">Add Students</a> -->

                        <a href="studentregister.php?userid=<?php echo $userid; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Add Student
                        </a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL SUBJECTS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">9</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                TOTAL MARK </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">900</div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fa-solid fa-square-poll-vertical text-gray-300"></i> -->
                                            <i class="fas fa-poll fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pass Mark
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">40%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <?php
                            // Assuming you have a database connection established before this point
                            include 'data.php';

                            // Query to get the count of students
                            $countQuery = "SELECT COUNT(*) as total_students FROM student";
                            $countResult = mysqli_query($conn, $countQuery);

                            // Check if the query executed successfully
                            if ($countResult) {
                                $studentCount = mysqli_fetch_assoc($countResult)['total_students'];
                            } else {
                                // Handle error if the query fails
                                $studentCount = "Error fetching student count";
                            }

                            ?>
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $studentCount; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">



                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Student Data</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Registration No</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Blood Group</th>
                                            <th>Date of Birth</th>
                                            <th>Guardian</th>
                                            <th>Address</th>
                                            <th>Image</th>
                                            <th>View Marks</th>
                                            <th>Update Marks</th>
                                            <th>Edit Details</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'data.php';

                                        $sql = "SELECT id, name,lname, registerno, email,gender,bloodgrp,date_of_birth,guardian,address,image FROM student";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>{$row['id']}</td>";
                                                echo "<td>{$row['name']} {$row['lname']}</td>";
                                                echo "<td>{$row['registerno']}</td>";
                                                echo "<td>{$row['email']}</td>";
                                                echo "<td>{$row['gender']}</td>";
                                                echo "<td>{$row['bloodgrp']}</td>";
                                                echo "<td>{$row['date_of_birth']}</td>";
                                                echo "<td>{$row['guardian']}</td>";
                                                echo "<td>{$row['address']}</td>";
                                                echo '<td><img src="' . $row['image'] . '" alt="User Image" style="max-width: 100px;"></td>';
                                                echo "<td><a href='viewmarks.php?registerno={$row['registerno']}&userid=$userid' class='btn btn-success'>View Marks</a></td>";
                                                echo "<td><a href='updatemark.php?registerno={$row['registerno']}' class='btn btn-warning'>Edit Marks</a></td>";

                                                echo "<td><a href='editstddetails.php?registerno={$row['registerno']}&userid=$userid' class='btn btn-info'>Edit details</a></td>";
                                                echo "<td><a href='delete.php?registerno={$row['registerno']}' class='btn btn-danger'>delete details</a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No students found</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- Content Row -->
                        <div class="row">

                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">

                                <!-- Project Card Example -->
                                <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div> -->

                                <!-- Color System -->
                                <!-- <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primary
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            </div>

                            <div class="col-lg-6 mb-4">

                                <!-- Illustrations -->
                                <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="img/undraw_posting_photo.svg" alt="...">
                                    </div>
                                    <p>Add some quality, svg illustrations to your project courtesy of <a
                                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                        constantly updated collection of beautiful svg images that you can use
                                        completely free and without attribution!</p>
                                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                        unDraw &rarr;</a>
                                </div>
                            </div> -->

                                <!-- Approach -->
                                <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div> -->

                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <!-- <div class="copyright text-center my-auto">
                            <span>Copyright &copy; </span>
                        </div> -->
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="adminlogout.php" id="logoutadmin1">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="assets/js/demo/chart-area-demo.js"></script>
        <script src="assets/js/demo/chart-pie-demo.js"></script>
        <script>
            // $(document).ready(function() {
            //     // Add a click event listener to the link
            //     $('#dashboardLink').click(function(e) {
            //         e.preventDefault(); // Prevent the default behavior of the link

            //         // Perform AJAX request to load the content of adminprofile.php
            //         $.ajax({
            //             url: 'adminprofile.php',
            //             type: 'GET',
            //             success: function(response) {
            //                 // Replace the content of the current page with the content of adminprofile.php
            //                 // alert("succsee");
            //                 $('body').html(response);
            //                 loadContent(location.pathname);
            //             },
            //             error: function(error) {
            //                 console.error('Error loading content:', error);
            //             }
            //         });
            //     });

            //     $("#addstudentLink").click(function(e) {
            //         e.preventDefault(); // Prevent the default link behavior

            //         // Perform AJAX request to load the content of studentregister.php
            //         $.ajax({
            //             url: "studentregister.php?userid=<?php echo $userid; ?>",
            //             type: "GET",
            //             success: function(data) {
            //                 // Replace the entire content of the document with the received data
            //                 document.open();
            //                 document.write(data);
            //                 document.close();

            //                 // Change the URL using pushState
            //                 history.pushState({}, "", "studentregister.php?userid=<?php echo $userid; ?>");
            //                 loadContent(location.pathname);
            //             },
            //             error: function() {
            //                 alert("Error loading content");
            //             }
            //         });
            //     });

            //     // Add Marks Link Click Event
            //     $("#addmarksLink").click(function(e) {
            //         e.preventDefault(); // Prevent the default link behavior

            //         // Perform AJAX request to load the content of addmarks.php
            //         $.ajax({
            //             url: "addmarks.php",
            //             type: "GET",
            //             success: function(data) {
            //                 // Replace the entire content of the document with the received data
            //                 document.open();
            //                 document.write(data);
            //                 document.close();

            //                 // Change the URL using pushState
            //                 history.pushState({}, "", "addmarks.php");
            //             },
            //             error: function() {
            //                 alert("Error loading content");
            //             }
            //         });
            //     });


            //     $("#resetpswdLink").click(function(e) {
            //         e.preventDefault(); // Prevent the default link behavior

            //         // Perform AJAX request to load the content of addmarks.php
            //         $.ajax({
            //             url: "resetpassword.php",
            //             type: "GET",
            //             success: function(data) {
            //                 // Replace the entire content of the document with the received data
            //                 document.open();
            //                 document.write(data);
            //                 document.close();

            //                 // Change the URL using pushState
            //                 history.pushState({}, "", "resetpassword.php");
            //                 loadContent(location.pathname);
            //             },
            //             error: function() {
            //                 alert("Error loading content");
            //             }
            //         });
            //     });

            //     $("#tablesLink").click(function(e) {
            //         e.preventDefault(); // Prevent the default link behavior

            //         // Perform AJAX request to load the content of addmarks.php
            //         $.ajax({
            //             url: "tables.php",
            //             type: "GET",
            //             success: function(data) {
            //                 // Replace the entire content of the document with the received data
            //                 document.open();
            //                 document.write(data);
            //                 document.close();

            //                 // Change the URL using pushState
            //                 history.pushState({}, "", "tables.php");
            //                 loadContent(location.pathname);
            //             },
            //             error: function() {
            //                 alert("Error loading content");
            //             }
            //         });
            //         // Handle popstate event

            //     });
            //     $("#logoutadmin").click(function(e) {
            //         e.preventDefault(); // Prevent the default link behavior

            //         // Perform AJAX request to load the content of addmarks.php
            //         $.ajax({
            //             url: "adminlogout.php",
            //             type: "GET",
            //             success: function(data) {
            //                 // Replace the entire content of the document with the received data
            //                 document.open();
            //                 document.write(data);
            //                 document.close();

            //                 // Change the URL using pushState
            //                 history.pushState({}, "", "adminlogout.php");
            //             },
            //             error: function() {
            //                 alert("Error loading content");
            //             }

            //         });

            //     });

            //     $("#logoutadmin1").click(function(e) {
            //         e.preventDefault(); // Prevent the default link behavior

            //         // Perform AJAX request to load the content of addmarks.php
            //         $.ajax({
            //             url: "adminlogout.php",
            //             type: "GET",
            //             success: function(data) {
            //                 // Replace the entire content of the document with the received data
            //                 document.open();
            //                 document.write(data);
            //                 document.close();

            //                 // Change the URL using pushState
            //                 history.pushState({}, "", "adminlogout.php");
            //             },
            //             error: function() {
            //                 alert("Error loading content");
            //             }

            //         });
            //         // Handle popstate event
            //         window.addEventListener("popstate", function(event) {
            //             // Load the content based on the current URL
            //             loadContent(location.pathname);
            //         });

            //         // Load initial content based on the current URL
            //         loadContent(location.pathname);

            //     });




            // });

            // $(document).ready(function() {
            //     // Container div to hold the content
            //     var contentContainer = $('#content-container');

            //     // Function to load content and update URL
            //     function loadContent(url) {
            //         $.ajax({
            //             url: url,
            //             type: 'GET',
            //             success: function(response) {
            //                 // Replace the content of the container with the received data
            //                 contentContainer.html(response);
            //                 history.pushState({}, "", url);
            //             },
            //             error: function(error) {
            //                 console.error('Error loading content:', error);
            //             }
            //         });
            //     }

            //     // Add a click event listener to the link
            //     $('#dashboardLink').click(function(e) {
            //         e.preventDefault();
            //         loadContent('adminprofile.php');
            //         history.pushState({}, "", 'adminprofile.php');
            //     });

            //     // Add other click event listeners for different links...
            //     $("#addstudentLink").click(function(e) {
            //         e.preventDefault();
            //         loadContent("studentregister.php?userid=<?php echo $userid; ?>");
            //         history.pushState({}, "", "studentregister.php?userid=<?php echo $userid; ?>");
            //     });

            //     $("#addmarksLink").click(function(e) {
            //         e.preventDefault();
            //         loadContent("addmarks.php");
            //         history.pushState({}, "", "addmarks.php");
            //     });

            //     $("#resetpswdLink").click(function(e) {
            //         e.preventDefault();
            //         loadContent("resetpassword.php");
            //         history.pushState({}, "", "resetpassword.php");
            //     });

            //     $("#tablesLink").click(function(e) {
            //         e.preventDefault();
            //         loadContent("tables.php");
            //         history.pushState({}, "", "tables.php");
            //     });

            //     $("#logoutadmin").click(function(e) {
            //         e.preventDefault();
            //         loadContent("adminlogout.php");
            //         history.pushState({}, "", "adminlogout.php");
            //     });

            //     $("#logoutadmin1").click(function(e) {
            //         e.preventDefault();
            //         loadContent("adminlogout.php");
            //         history.pushState({}, "", "adminlogout.php");
            //     });
            //     // Handle popstate event
            //     window.addEventListener("popstate", function(event) {
            //         // Load the content based on the current URL
            //         loadContent(location.pathname);
            //     });

            //     // Load initial content based on the current URL
            //     loadContent(location.pathname);
            // });

            // $(document).ready(function() {
            //     function loadContent(url) {
            //         // Perform AJAX request to load content
            //         $.ajax({
            //             url: url,
            //             type: "GET",
            //             success: function(data) {
            //                 // Replace the entire content of the document with the received data
            //                 document.open();
            //                 document.write(data);
            //                 document.close();
            //             },
            //             error: function() {
            //                 alert("Error loading content");
            //             }
            //         });
            //     }

            //     // Handle popstate event
            //     window.addEventListener("popstate", function(event) {
            //         // Load the content based on the current URL
            //         loadContent(location.pathname);
            //     });

            //     // Load initial content based on the current URL
            //     loadContent(location.pathname);

            //     // Add click event listeners
            //     $('#dashboardLink').click(function(e) {
            //         e.preventDefault();
            //         loadContent('adminprofile.php');
            //         history.pushState({}, "", 'adminprofile.php');
            //     });

            //     $("#addstudentLink").click(function(e) {
            //         e.preventDefault();
            //         loadContent("studentregister.php?userid=<?php echo $userid; ?>");
            //         history.pushState({}, "", "studentregister.php?userid=<?php echo $userid; ?>");
            //     });

            //     $("#addmarksLink").click(function(e) {
            //         e.preventDefault();
            //         loadContent("addmarks.php");
            //         history.pushState({}, "", "addmarks.php");
            //     });

            //     $("#resetpswdLink").click(function(e) {
            //         e.preventDefault();
            //         loadContent("resetpassword.php");
            //         history.pushState({}, "", "resetpassword.php");
            //     });

            //     $("#tablesLink").click(function(e) {
            //         e.preventDefault();
            //         loadContent("tables.php");
            //         history.pushState({}, "", "tables.php");
            //     });

            //     $("#logoutadmin").click(function(e) {
            //         e.preventDefault();
            //         loadContent("adminlogout.php");
            //         history.pushState({}, "", "adminlogout.php");
            //     });

            //     $("#logoutadmin1").click(function(e) {
            //         e.preventDefault();
            //         loadContent("adminlogout.php");
            //         history.pushState({}, "", "adminlogout.php");
            //     });
            // });
        </script>


</body>

</html>