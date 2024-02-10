<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Page</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    session_start(); // Start the session

    // Check if the user is logged in
    if (!isset($_SESSION['login_student'])) {
        header("Location: login.php"); // Redirect to login page if session variable is not set
        exit();
    }

    // Display user profile
    // echo "<h1> Welcome to your profile,</h1> " . $_SESSION['login_user'];

    // Include database connection file
    include 'data.php';

    // Retrieve user details from student_table
    $userid = $_SESSION['login_student'];
    $stmt = $conn->prepare("SELECT id ,name,lname ,registerno , email ,phone ,gender ,bloodgrp ,date_of_birth , guardian , address , password ,image FROM student WHERE registerno = ?");
    $stmt->bind_param("s", $userid);

    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userid = $row['id'];
        $username = $row['name'];
        $userlname = $row['lname'];
        $userregno = $row['registerno'];
        $useremail = $row['email'];
        $userphone = $row['phone'];
        $usergender = $row['gender'];
        $userbloodgroup = $row['bloodgrp'];
        $userdob = $row['date_of_birth'];
        $userguardian = $row['guardian'];
        $useraddress = $row['address'];
        $userpassword = $row['password'];
        $userimage = $row['image'];
        // echo "User details found.";
    } else {
        // Handle the case where user details are not found
        echo "User details not found.";
        exit();
    }

    // Close the statement and result set
    $stmt->close();
    $result->close();

    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="student.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $username; ?> </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="student.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Interface
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">

            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="editstddetails.php?registerno=<?php echo $userregno; ?>&userid=student">
                    <i class="fas fa-upload fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Update Details</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewmarks.php?registerno=<?php echo $userregno; ?>&userid=student">
                    <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>View Mark</span></a>
            </li>
            <!-- Nav Item - C -->
            <li class="nav-item">
                <a class="nav-link" href="stdntreset.php" id="resetpswdstudent">
                    <i class="fas fa-fw fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Reset Password</span></a>
            </li>

            <!-- Nav Item -  -->
            <li class="nav-item active">
                <a class="nav-link"  href="logout.php" id="logoutstudent">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <!-- <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div> -->
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> -->
                            <!-- Dropdown - Messages -->
                            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
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
                        </li> -->

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $userregno; ?></span>
                                <img src="<?php echo $userimage; ?>" class="img-profile rounded-circle" alt="User Image" style="max-width: 100px;">

                                <!-- <img  src="img/undraw_profile.svg"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="student.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"  data-toggle="modal" href="logout.php" data-target="#logoutModal">
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
                    <h1 class="h3 mb-2 text-gray-800 text-uppercase mb-3"><?php echo $userregno; ?></h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. -->
                    <!-- For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 ">
                            <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                        </div>
                        <div class="card-body">



                            <div class="container mt-5">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <img src=" <?php echo $userimage; ?>" alt="User Image" style="max-width: 100px;">
                                    <!-- <a href="viewmarks.php?registerno=<?php echo $userregno; ?>" class="btn btn-success">View Marks</a> -->

                                    <a href="viewmarks.php?registerno=<?php echo $userregno; ?>&userid=student" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> View Mark</a>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="text-uppercase h1 "><?php echo $userregno; ?></h2>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <img src=" <?php echo $userimage; ?>" alt="User Image" style="max-width: 100px;">
                                    </div>
                                </div> -->
                                <!-- <br> -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <table class="table">
                                            <tr>
                                                <th>ID</th>
                                                <td><?php echo $userid; ?></td>
                                            </tr>
                                            <tr>
                                                <th>First Name</th>
                                                <td><?php echo $username; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Last Name</th>
                                                <td><?php echo $userlname; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?php echo $useremail; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <td><?php echo $userphone; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td><?php echo $usergender; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Guardian</th>
                                                <td><?php echo $userguardian; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td><?php echo $useraddress; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Blood-Group</th>
                                                <td><?php echo $userbloodgroup; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Date of Birth</th>
                                                <td><?php echo $userdob; ?></td>
                                            </tr>
                                            <!-- <tr>
                        <th>Image</th>
                        <td><img src="<?php echo $userimage; ?>" alt="User Image" style="max-width: 100px;"></td>
                    </tr> -->
                                        </table>
                                    </div>

                                </div>

                                <!-- <a href="logout.php"><button type="submit" class="btn btn-danger">Logout</button></a>
                                <a href="stdntreset.php"><button type="submit" class="btn btn-warning">Reset Password</button></a> -->

                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                                    <a class="btn btn-primary" href="logout.php" id="logoutstudent1">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap core JavaScript-->
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="assets/js/sb-admin-2.min.js"></script>

                    <!-- Page level plugins -->
                    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="assets/js/demo/datatables-demo.js"></script>
                    <script>
                        // $(document).ready(function() {
                            
                        //     $("#resetpswdstudent").click(function(e) {
                        //         e.preventDefault(); // Prevent the default link behavior

                        //         // Perform AJAX request to load the content of addmarks.php
                        //         $.ajax({
                        //             url: "stdntreset.php",
                        //             type: "GET",
                        //             success: function(data) {
                        //                 // Replace the entire content of the document with the received data
                        //                 document.open();
                        //                 document.write(data);
                        //                 document.close();

                        //                 // Change the URL using pushState
                        //                 history.pushState({}, "", "stdntreset.php");
                        //             },
                        //             error: function() {
                        //                 alert("Error loading content");
                        //             }
                        //         });
                        //     });

                            
                        //     $("#logoutstudent").click(function(e) {
                        //         e.preventDefault(); // Prevent the default link behavior

                        //         // Perform AJAX request to load the content of addmarks.php
                        //         $.ajax({
                        //             url: "logout.php",
                        //             type: "GET",
                        //             success: function(data) {
                        //                 // Replace the entire content of the document with the received data
                        //                 document.open();
                        //                 document.write(data);
                        //                 document.close();

                        //                 // Change the URL using pushState
                        //                 history.pushState({}, "", "logout.php");
                        //             },
                        //             error: function() {
                        //                 alert("Error loading content");
                        //             }

                        //         });
                        //         window.addEventListener("popstate", function(event) {
                        //             // Load the content based on the current URL
                        //             loadContent(location.pathname);
                        //         });

                        //         // Load initial content based on the current URL
                        //         loadContent(location.pathname);
                        //     });

                        //     $("#logoutstudent1").click(function(e) {
                        //         e.preventDefault(); // Prevent the default link behavior

                        //         // Perform AJAX request to load the content of addmarks.php
                        //         $.ajax({
                        //             url: "logout.php",
                        //             type: "GET",
                        //             success: function(data) {
                        //                 // Replace the entire content of the document with the received data
                        //                 document.open();
                        //                 document.write(data);
                        //                 document.close();

                        //                 // Change the URL using pushState
                        //                 history.pushState({}, "", "logout.php");
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
                    </script>

</body>

</html>