<?php

session_start();

include ("../connections.php");

if(isset($_SESSION["username"])){
	
	$username = $_SESSION["username"];

}

$getUser = mysqli_query($conn,"SELECT a.userID,a.departmentID,a.profilePic FROM tbl_users AS a INNER JOIN tbl_user_creds AS b ON a.userID=b.userID WHERE b.username='$username'");
$rowUserID = mysqli_fetch_assoc($getUser);

$userID = $rowUserID["userID"];
$departmentID =$rowUserID["departmentID"];

$img = $rowUserID["profilePic"];

$image = "";
if($img == ""){
    $image = "https://bootdey.com/img/Content/avatar/avatar7.png";
}
else{
    $image = $img;
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

    <script type="text/javascript" src="../js/jQuery.js"></script>
    <script type="application/javascript">

        setInterval(function(){
            
            $('#retriever').load('retriever-project.php');
            
        }, 20000);

    </script>

    <script type="application/javascript">

    setInterval(function(){

        $('#badgeNotif').load('../notification-badge.php');
        $('#contentNotif').load('../notification-content.php');
        
    }, 1000);

    </script>

    <title>TaskMAV - Task Monitoring System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/css-modal.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

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
                <a class="nav-link" href="dashboard.php">
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
            <li class="nav-item active">
                <a class="nav-link collapsed" href="project.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="report.php">
                    <i class="fas fa-list"></i>
                    <span>Reports</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Users
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="user.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Team
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="team.php">
                    <i class="fas fa-fw fa-folder"></i>
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
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <div id="badgeNotif">
                                    <?php
                                        include("../notification-badge.php")
                                    ?>
                                </div> 
                            </a>
                                <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifications
                                </h6>

                                <div id="contentNotif">
                                    <?php
                                        include("../notification-content.php")
                                    ?>
                                </div>
                                            
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" style="border:1px solid black;object-fit:cover;width:50px;height:50px;"
                                    src="<?php echo $image; ?>">
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

                   
                <?php
                    if(empty($_GET["getDelete"])){

                    }
                    else{
                        include("deleteProject.php");
                    }
                ?>
                   

                    <!-- Content Row -->

                    

                        <!-- Area Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Project List</h6>
                                <div class="pull-right">
                                    
                                        <a class="btn btn-outline-primary" data-toggle="modal" data-target="#addProjectModal">
                                            <i class="fas fa-plus"></i>
                                        </a>

                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="projTableId1" class="table table-striped table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Project</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Department</th>
                                                <th>Leader</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Project</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Department</th>
                                                <th>Leader</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="retriever">
                                            <tr hidden>
                                                <th>#</th>
                                                <th>Project</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                                <th>Department</th>
                                                <th>Leader</th>
                                                <th>Action</th>
                                            </tr> 

                                            <?php
                                                include("retriever-project.php");
                                            ?>
                                            
                                        </tbody>                                                                                       
                                    </table>
                                </div>
                            </div>

                            <script>
                                function goToProject(projectID){
                                    window.location.href="task.php?projectID="+projectID;
                                }

                                function modalOpen(id){
                                    $('#editProjectModal').modal('show');

                                        $(".statusOption").removeAttr('selected');
                                        $(".deptOption").removeAttr('selected');

                                        $('#projectname').val($('#projTableId1 tr:eq('+id+') td:eq(0)').text());

                                        $('#endDate').val($('#projTableId1 tr:eq('+id+') td:eq(1)').text());
                                        
                                        status = $('#projTableId1 tr:eq('+id+') td:eq(2)').text();
                                        $("#new"+status).attr('selected', 'selected');

                                        dept = $('#projTableId1 tr:eq('+id+') td:eq(4)').text();;
                                        $("#dept"+dept).attr('selected', 'selected');

                                        $('#new_tLeader').val($('#projTableId1 tr:eq('+id+') td:eq(5)').text());

                                        $('#description').val($('#projTableId1 tr:eq('+id+') td:eq(6)').text());
                                        $('#startDate').val($('#projTableId1 tr:eq('+id+') td:eq(7)').text());
                                        $('#projectID').val($('#projTableId1 tr:eq('+id+') td:eq(8)').text())
                                            
                                }
                            </script>
                                 
                        </div>
        
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Start of Add Project Modal -->
            <div id="addProjectModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?php
                            include("addProject.php");
                        ?>
                    </div>
                </div>
            </div>
            <!-- End of Add Project Modal -->

            <div id="editProjectModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?php
                            include("updateProject.php");
                        ?>
                    </div>
                </div>
            </div>


            <!-- Footer -->
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

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
          $('#projTableId1').DataTable();
         } );
    </script>

    

</body>

</html>