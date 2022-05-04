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

    <title>TaskMAV Calendar</title>

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

        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <div class="container-fluid">

                 

                  <div class="row">

                      <div class="col-lg">

                          <!-- Basic Card Example -->
                          <div class="card shadow mb-4">
                              <div class="card-header py-3">
                                  <h6 class="m-0 font-weight-bold text-primary">Task Calendar</h6>
                              </div>
                              <div class="card-body">
                                <div id='calendar'></div>
                              </div>
                          </div>
                      </div>

                  </div>

              </div>
              <!-- /.container-fluid -->

          </div>
          

          <!-- Footer -->
          <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                      <span> &copy; </span>
                  </div>
              </div>
          </footer>
          <!-- End of Footer -->

      </div>
  
                
</body>
<style>

  body {
    
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1000px;
    margin: 0 auto;
  }

</style>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      dateFormat: 'dd-mm-yy',
      changeYear: true,
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
       
      ]
    });

    calendar.render();
  });

</script>

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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
