<?php

session_start();

include ("../connections.php");

if(isset($_SESSION["username"])){
	
	$username = $_SESSION["username"];

}

$projectName = $status = $startDate = $endDate = $teamLeader = $department = $description = "";

if(isset($_POST["btnAddProject"])){
    
    if(!empty($_POST["projectName"])){
        $projectName = $_POST["projectName"];
    }
    if(!empty($_POST["status"])){
        $status = $_POST["status"];
    }
    if(!empty($_POST["startDate"])){
        $startDate = $_POST["startDate"];
    }
    if(!empty($_POST["endDate"])){
        $endDate = $_POST["endDate"];
    }
    if(!empty($_POST["tLeader"])){
        $tLeader = $_POST["tLeader"];
    }
    if(!empty($_POST["department"])){
        $department = $_POST["department"];
    }
    if(!empty($_POST["description"])){
        $description = $_POST["description"];
    }
    
    if($projectName && $status && $startDate && $endDate && $tLeader && $department && $description){
        
        mysqli_query($conn, "INSERT INTO `tbl_project` (`projectID`, `projectTitle`, `projectDescription`, `projectStatus`, `startDate`, `endDate`, `departmentID`, `leaderUserID`, `projectProgress`, `filePath`)
        VALUES (NULL, '$projectName', '$description', '$status', '$startDate', '$endDate', '$department', '$teamLeader', '0', NULL) ");

        echo "<script> window.location.href='admin-projectList.php'; </script>";

    }


}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="with=device-width, initial-scale=1.0"/>
        <title>TaskMAV - Add Project</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <main>
            <h2 class="title text-justify py-4">New Project</h2>
            <div class="container">
            <div class="navigation adminNav">
                    <ul>
                        <li>
                            <a href="/">
                                <!-- insert logo  -->
                                <span class="nav_name font-weight-bold">TaskMAV</span>
                             </a>
                        </li>
                        <li>
                            <a href="/">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <form action="/adminHome" method="get">
                                    <button class="nav_name btn btn-outline-primary font-weight-bold" type="submit">Dashboard</button>
                                </form>
                                 </a>
                        </li>
                        <li>
                           <a href="#">
                            <i class='bx bx-folder nav_icon'></i>
                            <button class="nav_name btn btn-outline-primary font-weight-bold">Projects</button>
                           </a>
                        </li>
                        <li>
                            <a href="admin-addProject.php">
                                
                             <button class="subnav_name btn btn-outline-primary sub_proj" type="submit">Add Project</button>
                            
                            </a>
                         </li>
                         <li>
                           <a href="admin-addTask.php">
                            
                            <button class="subnav_name btn btn-outline-primary sub_proj" type="submit">Add Task</button>
                           
                        </a>
                        </li>
                        <li>
                            <a href="admin-projectList.php">
                                
                             <button class="subnav_name btn btn-outline-primary sub_proj" type="submit">List</button>
                             
                            </a>
                         </li>

                        <li>
                            <a href="#"> 
                             <i class='bx bx-message-square-detail nav_icon'></i> 
                             <button class="nav_name btn btn-outline-primary font-weight-bold">Reports</button> </a>
                        </li>
                        <li>
                            <a href="#">
                            <form action="/teamReports" method="get">
                             <button class="subnav_name btn btn-outline-primary sub_report" type="submit">Team Reports</button>
                            </form>
                            </a>
                         </li>
                         <li>
                            <a href="#">
                                <form action="/individualReports" method="get">
                             <button class="subnav_name btn btn-outline-primary sub_report" type="submit">Individual Reports</button>
                            </form>
                            </a>
                         </li>
                        <li>
                             <a href="#"> 
                            <i class='bx bx-user'></i>
                             <button class="nav_name btn btn-outline-primary font-weight-bold">User</button> </a>
                        </li>
                        <li>
                            <a href="admin-addUser.php">
                             <button class="subnav_name sub_user btn btn-outline-primary">Add User</button>
                            </a>
                         </li>
                         <li>
                            <a href="#">
                             <button class="subnav_name btn btn-outline-primary sub_user">List</button>
                            </a>
                         </li>
                        <li>
                             <a href="#">  
                            <i class='bx bx-notification'></i>
                            <form action="/notifications" method="get">
                            <button class="nav_name btn btn-outline-primary font-weight-bold" type="submit">Notifications</button> 
                        </form>
                        </a>
                        </li>
                        <li>
                            <a href="#"> 
                            <i class='bx bx-log-out nav_icon'></i> 
                            <form action="/logout" method="get">
                                <button class="nav_name btn btn-outline-primary font-weight-bold" type="submit">LogOut</button> 
                            </form>
                        </a>   
                        </li>
                    </ul>
                </div>
               </div>   
            <!-- add new project form-->
                <section class="glass-proj">
                        <form method="post" class="addproject-form" style=" width: 50vw; margin-left: 5vw; padding-top: 3vw;" role="form">
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group text-left text-white font-weight-bold"> <label for="form_name">Project Name</label> <input id="form_projectname" type="text" name="projectName" class="form-control" placeholder="Input Project Name" required="required" data-error="Project Name is required."> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-left text-white font-weight-bold"> <label for="form_status">Status</label> <select id="form_status" type="text" name="status" class="form-control" required="required" data-error="Status is required."> </div>
                                            <option value="" selected disabled>--Select Status--</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Ongoing">Ongoing</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Close">Close</option>
                                        </select> </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group text-left text-white font-weight-bold"> <label for="form_startdate">Start Date</label> <input id="form_startdate" type="date" name="startDate" class="form-control"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-left text-white font-weight-bold"> <label for="form_enddate">End Date</label> <input id="form_enddate" type="date" name="endDate" class="form-control"> </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group text-left text-white font-weight-bold"> <label for="form_tleader">Team Leader</label> <input id="form_tleader" type="text" name="tLeader" class="form-control" placeholder="Select Team Leader" required="required" data-error="Team Leader is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-left text-white font-weight-bold"> 
                                            <label for="form_tmembers">Department</label> 
                                            <select id="form_tmembers" type="text" name="department" class="form-control" required="required" data-error="Status is required."> </div>
                                                <option value="" selected disabled>--Select Department--</option>
                                                <?php

                                                    $count = 0;

                                                    $getDept = mysqli_query($conn,"SELECT * FROM tbl_department");

                                                    while($rowDept = mysqli_fetch_assoc($getDept)){
                                                            
                                                        $db_departmentName = $rowDept["departmentName"];
                                                        $db_departmentID = $rowDept["departmentID"];

                                                ?>

                                                <option value="<?php echo $db_departmentID ?>"><?php echo $db_departmentName ?></option>

                                                <?php

                                                    }

                                                ?>
                                            </select>  
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group text-left text-white font-weight-bold"> <label for="form_descript">Description</label> <textarea id="form_descript" name="description" class="form-control" placeholder="Write the description here." rows="4"></textarea> </div>
                                    </div>
                                    <div class="ins_container">
                                        <input class="btn1 btn-primary" type="submit" value="ADD" name="btnAddProject">
                                     </div>
                                </div>
                            </div>
                        </div>
                    </form>
               
                </section>
        </main>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/index.js" charset="utf-8"></script>
    </body>
</html> 