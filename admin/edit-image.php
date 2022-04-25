<?php

session_start();

include ("../connections.php");

if(isset($_SESSION["username"])){
	
	$username = $_SESSION["username"];

}

$getUser = mysqli_query($conn,"SELECT a.userID,a.departmentID,a.firstName,a.lastName,a.email,a.profilePic FROM tbl_users AS a INNER JOIN tbl_user_creds AS b ON a.userID=b.userID WHERE b.username='$username'");
$rowUserID = mysqli_fetch_assoc($getUser);

$userID = $rowUserID["userID"];
$departmentID =$rowUserID["departmentID"];
$db_firstName = $rowUserID["firstName"];
$db_lastName = $rowUserID["lastName"];
$db_username = $rowUserID["email"];
$img = $rowUserID["profilePic"];


if(isset($_POST["btnUpdatePic"])){

    $target_dir = "photo_folder/";
	$uploadErr = "";
	$image="";

	$target_file = $target_dir."/".basename($_FILES["profile_pic"]["name"]);
	$uploadOK =1;
	
	if(file_exists($target_file)){
		$target_file = $target_dir.rand(1,9).rand(1,9).rand(1,9).rand(1,9)."_".basename($_FILES["profile_pic"]["name"]);
		$uploadOK =1;
	}
	
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	if($_FILES["profile_pic"]["size"]> 5000000000000000000000000){
		$uploadErr = "Sorry, your file is too large.";
		$uploadOK = 0;
	}
	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
		$uploadErr = "Sorry, only JPG, PNG, JPEG, and GIF are allowed.";
		$uploadOK = 0;
	}
	if($uploadOK == 1){
		if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"],$target_file)){
			
			echo "<font color=green> Your profile picture has been uploaded!</font>";
		}
		else{
			echo "Sorry, there was an error uploading your file.";
		}
	}
	else{
		$target_file = "";
	}

    if($target_file){
        mysqli_query($conn,"UPDATE `tbl_users` SET `profilePic` = '$target_file' WHERE `userID` = '$userID' ");

        echo "<script>window.location.href='admin-profile.php'</script>";
    }

}

$image = "";
if($img == ""){
    $image = "https://bootdey.com/img/Content/avatar/avatar7.png";
}
else{
    $image = $img;
}


?>

<script type="text/javascript" src="../js/jQuery.js"></script>
	
<script type="application/javascript">
	
    var _URL = window.url || window.webkitURL;
        
    function displayPreview(files){
        var file = 	files[0];
        var img = new Image();
        img.onload = function(){
            $("#preview").html(img);
        }
        img.src= _URL.createObjectURL(file);
    }
</script>
<style>

img{
	height:150px;
}

</style>


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
            <li class="nav-item active">
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
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
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

                  <h4 class="m-0 font-weight-bold text-primary">Edit Profile</h4>

                  <hr>

                  <div class="container3">
                  <form method="POST" enctype="multipart/form-data">
                      <div class="row gutters">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="card2 h-100">
                      <div class="card-body">
                      	<div class="account-settings">
                          
                      		<div class="user-profile">
                              
                            <br>
                      			<div class="user-avatar">
                      			    <span id="preview"><img src="<?php echo $image; ?>" alt="Maxwell Admin"></span>
                      			</div>
                      			<h5 class="user-name"><?php echo $db_firstName." ".$db_lastName; ?></h5>
                      			<h6 class="user-email"><?php echo $db_username; ?></h6>
                      		</div>
                      		<div class="about">

                            <div class="wrapper">
                                <div class="container">
                                  <div class="upload-container">
                                    <div class="border-container">
                                      <div class="icons fa-4x">
                                        <i class="fas fa-cloud-upload-alt" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>

                                      </div>
                                      <!--<input type="file" id="file-upload">-->
                                      <p><b>Select a file from local drive</b> or drag it here</p>
                                      <input type="file" class="file-upload" id="profile_pic" name="profile_pic" onChange="displayPreview(this.files);">
                                    </div>
                                  </div>
                                </div>
                                </div>
                      		</div>
                          <br>
                          <div class="row gutters">
                        		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        			<div class="text-right">
                        				<a href="admin-profile.php"class="btn btn-secondary">Cancel</a>
                        				<input type="submit" value="Update" class="btn btn-primary" name="btnUpdatePic">
                        			</div>
                        		</div>
                        	</div>
                      	</div>
                        
                      </div>
                      </div>
                      </div>

                      </div>
                      </form>
                  </div>
                    <br>


                        <!-- Area Chart -->

                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

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
