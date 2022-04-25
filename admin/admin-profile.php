<?php

session_start();

include ("../connections.php");

if(isset($_SESSION["username"])){
	
	$username = $_SESSION["username"];

}

$getUser = mysqli_query($conn,"SELECT a.userID,a.firstName,a.middleName,a.lastName,a.phoneNumber,a.email,a.adress,a.profilePic,c.accountType,b.departmentName,b.departmentID FROM tbl_users AS a INNER JOIN tbl_user_creds AS d INNER JOIN tbl_department AS b INNER JOIN tbl_account_type AS c ON a.role=c.accountTypeID AND a.userID=d.userID AND a.departmentID=b.departmentID WHERE d.username='$username'");
$rowUserID = mysqli_fetch_assoc($getUser);

    $db_userID = $rowUserID["userID"]; 
    $db_firstName = $rowUserID["firstName"];
    $db_middleName = $rowUserID["middleName"];
    $db_lastName = $rowUserID["lastName"];      
    $db_address = $rowUserID["adress"];
    $db_role = $rowUserID["accountType"];
    $db_department = $rowUserID["departmentName"];
    $db_username = $rowUserID["email"];
    $db_phoneNumber = $rowUserID["phoneNumber"];
    $img = $rowUserID["profilePic"];

    $userID = $rowUserID["userID"];
    $departmentID =$rowUserID["departmentID"];

    $image = "";
    if($img == ""){
        $image = "https://bootdey.com/img/Content/avatar/avatar7.png";
    }
    else{
        $image = $img;
    }

$new_firstName = $new_middleName = $new_lastName = $new_username = $new_phoneNo = $new_address = "";

if(isset($_POST["btnUpdateProfile"])){

    if(!empty($_POST["new_firstName"])){
        $new_firstName = $_POST["new_firstName"];
    }
    if(!empty($_POST["new_middleName"])){
        $new_middleName = $_POST["new_middleName"];
    }
    if(!empty($_POST["new_lastName"])){
        $new_lastName = $_POST["new_lastName"];
    }
    if(!empty($_POST["new_username"])){
        $new_username = $_POST["new_username"];
    }
    if(!empty($_POST["new_phoneNo"])){
        $new_phoneNo = $_POST["new_phoneNo"];
    }
    if(!empty($_POST["new_address"])){
        $new_address = $_POST["new_address"];
    }
    
    if($new_firstName && $new_middleName && $new_lastName && $new_username && $new_phoneNo && $new_address){
        mysqli_query($conn,"UPDATE `tbl_users` 
        SET `lastName` = '$new_lastName', `firstName` = '$new_firstName', 
        `middleName` = '$new_middleName', `email` = '$new_username', 
        `phoneNumber` = '$new_phoneNo', `adress` = '$new_address' 
        WHERE `tbl_users`.`userID` = $userID ");

        echo "<script> window.location.href='admin-profile.php'; </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TaskMAV - Task Monitoring System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/css-modal.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">TaskMAV <sup>admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="task.html">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="report.html">
                    <i class="fas fa-list"></i>
                    <span>Reports</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Users
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="user-list.html">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                Team
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="team.html">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>Teams</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
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

</head>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
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
                        <?php
                            include("../notifications.php");
                        ?>

                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" style="width:auto;"
                                    src="<?php echo $image; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="admin-profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
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

                  <h4 class="m-0 font-weight-bold text-primary">Admin Profile</h4>

                  <hr>

                  <div class="card shadow mb-4">
                    <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>

                </div>

                <div class="container">
                    <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                <a href="edit-image.php">	<img style="height:150px;" src="<?php echo $image; ?>" alt="Maxwell Admin"> </a>
                                </div>
                                <h5 style="margin-top:1rem;" class="user-name"><?php echo $db_firstName." ".$db_lastName; ?></h5>
                                <h6 class="user-email"><?php echo $db_username; ?></h6>
                            </div>

                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                    <div class="card-body">
                    <form method="POST">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Personal Details</h6>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="fullName">First Name</label>
                                            <input type="text" class="form-control" name="new_firstName" id="fullName" placeholder="Enter first name" value="<?php echo $db_firstName; ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="fullName">Middle Name</label>
                                            <input type="text" class="form-control" name="new_middleName" id="fullName" placeholder="Enter middle name" value="<?php echo $db_middleName; ?>">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="fullName">Last Name</label>
                                            <input type="text" class="form-control" name="new_lastName" id="fullName" placeholder="Enter last name" value="<?php echo $db_lastName; ?>">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input type="email" class="form-control" name="new_username" id="eMail" placeholder="Enter email ID" value="<?php echo $db_username; ?>">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="new_phoneNo" placeholder="Enter phone number" value="<?php echo $db_phoneNumber; ?>">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="position">Enter Designated Position</label>
                                    <input type="text" class="form-control" id="position" name="new_role" placeholder="Designated Position" value="<?php echo $db_role; ?>">
                                </div>
                            </div>
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="position">Department</label>
                                    <input type="text" class="form-control" id="position" name="new_department" placeholder="Enter Department" value="<?php echo $db_department; ?>">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="about">Address</label>
                                        <textarea class="form-control" rows="3" name="new_address"> <?php echo $db_address; ?> </textarea>
                                    </div>
                                </div>
                        </div>


                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                    <input type="submit"  name="btnUpdateProfile" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>

                </div>
<br>


                        <!-- Area Chart -->

                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
<!-- Start of Change Password Modal -->
        <div id="changePassModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Change Password</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- End of Change Password Modal -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © UIP Dev Intern 2022</span>
                        <br>
                        <br>
                        <li class="list-inline-item"><a href="https://www.facebook.com/melhamconstruction"><i class="fab fa-facebook-f fa-lg" aria-hidden="true" ></i></a></li>
                         <li class="list-inline-item"><a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcRzCMjsMqlLJGKKQpXQJdcgjhMwmzdnPLlhqGLxQFsjQhMqSnHsbZQdSnmZZMswdBbccBTsr"><i class="fab fa-google-plus-g fa-lg" aria-hidden="true"></i></a></li>
                         <li class="list-inline-item"><a href="https://www.instagram.com/melhamconstcorp/?fbclid=IwAR3X0T2kjjhtgZ77rNBznPyMDc1Uu7GqmWIwuaVjpcyyj7wNzi_tLlzGvuU"><i class="	fab fa-instagram fa-lg" aria-hidden="true"></i></a></li>
                    </div>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


</body>


</html>
