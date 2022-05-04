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

            $('#badgeNotif').load('../notification-badge.php');
            $('#contentNotif').load('../notification-content.php');
            
        }, 1000);

    </script>

    <title>TaskMAV Task List</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #5B8EDB;" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
              <div class="sidebar-brand-icon rotate-n-15">
                  <i class="fas fa-laugh-wink"></i>
              </div>
              <div class="sidebar-brand-text mx-3">TaskMAV</div>
          </a>




            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="projectList.php">
                    <i class="fas fa-project-diagram"></i>
                    <span>Project</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="taskList.php">
                    <i class="fas fa-list"></i>
                    <span>Task</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
           <li class="nav-item">
                <a class="nav-link collapsed" href="calendar.php">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Task Calendar</span>
                </a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MCC PROJECT IT 26
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="memberList.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Team Members</span>
                </a>
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Juan Dela Cruz</span>
                                <img class="img-profile rounded-circle"
                                    src="img/man.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="user-profile.html">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePassModal">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
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
        <h4 class="m-0 font-weight-bold">TASK LIST</h4>
        <br>
        <div class="row">
          <div class="col-sm-4">
            <div class="card">
              <h5 class="card-header pending">Pending</h5>
              <div class="card-body">
              <div class="todo-list">
                    <?php
                        include("tasks-pending.php");
                    ?>
                </div>
              </div>
            </div>
          </div>
        <div class="col-sm-4">
          <div class="card">
            <h5 class="card-header ongoing">On-Going</h5>
            <div class="card-body">
                <div class="todo-list">
                    <?php
                        include("tasks-ongoing.php");
                    ?>
                </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <h5 class="card-header done">Completed</h5>
            <div class="card-body">
                <div class="todo-list">
                    <?php
                        include("tasks-completed.php");
                    ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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

        <!-- Start of View details modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

        <div class="modal-body">
          <label for="task-title">Task Title</label>
          <input type="text" class="form-control" id="task" placeholder="Add Task">
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Add</button>
          </div>
        </div>
        </div>
        </div>
        <!-- End of view details modal-->

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
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
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

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
          $('#taskTableId').DataTable();
         } );
    </script>
       <script>
         $(document).ready(function() {
           $('#submittedTableId1').DataTable();
          } );
     </script>
       </script>
<script>

       $( document ).ready(function() {

    "use strict";

    var todo = function() {
        $('.todo-list .todo-item input').click(function() {
        if($(this).is(':checked')) {
            $(this).parent().parent().parent().toggleClass('complete');
        } else {
            $(this).parent().parent().parent().toggleClass('complete');
        }
    });

    $('.todo-nav .all-task').click(function() {
        $('.todo-list').removeClass('only-active');
        $('.todo-list').removeClass('only-complete');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });

    $('.todo-nav .active-task').click(function() {
        $('.todo-list').removeClass('only-complete');
        $('.todo-list').addClass('only-active');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });

    $('.todo-nav .completed-task').click(function() {
        $('.todo-list').removeClass('only-active');
        $('.todo-list').addClass('only-complete');
        $('.todo-nav li.active').removeClass('active');
        $(this).addClass('active');
    });

    $('#uniform-all-complete input').click(function() {
        if($(this).is(':checked')) {
            $('.todo-item .checker span:not(.checked) input').click();
        } else {
            $('.todo-item .checker span.checked input').click();
        }
    });

    $('.remove-todo-item').click(function() {
        $(this).parent().remove();
    });
    };

    todo();

    $(".add-task").keypress(function (e) {
        if ((e.which == 13)&&(!$(this).val().length == 0)) {
            $('<div class="todo-item"><div class="checker"><span class=""><input type="checkbox"></span></div> <span>' + $(this).val() + '</span> <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="icon-close"></i></a></div>').insertAfter('.todo-list .todo-item:last-child');
            $(this).val('');
        } else if(e.which == 13) {
            alert('Please enter new task');
        }
        $(document).on('.todo-list .todo-item.added input').click(function() {
            if($(this).is(':checked')) {
                $(this).parent().parent().parent().toggleClass('complete');
            } else {
                $(this).parent().parent().parent().toggleClass('complete');
            }
        });
        $('.todo-list .todo-item.added .remove-todo-item').click(function() {
            $(this).parent().remove();
        });
    });
});
</script>
</body>

</html>
