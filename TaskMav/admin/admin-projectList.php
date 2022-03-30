<?php

session_start();

include ("../connections.php");

if(isset($_SESSION["username"])){
	
	$username = $_SESSION["username"];

}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="with=device-width, initial-scale=1.0"/>
        <title>TaskMAV - Task Monitoring System</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <main>
            <h2 class="title text-justify py-4">Greetings, here's your task.</h2>
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
                <section class="glass-proj">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Project</th> 
                                <th>Progress</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            

                            <?php
                                
                                $count = 0;

                                $getProject = mysqli_query($conn,"SELECT * FROM tbl_project");

                                while($rowProject = mysqli_fetch_assoc($getProject)){
                                    
                                    $db_projectName = $rowProject["projectTitle"];
                                    $db_status = $rowProject["projectStatus"];
                                    $db_progress = $rowProject["projectProgress"];
                                    $db_endDate = $rowProject["endDate"];
                                    $count++;

                                    echo "
                                        <tr>
                                            <th scope='row'>$count</th>
                                            <td>$db_projectName</td>
                                    ";

                            ?>

                                <th><progress id="file" value="<?php echo $db_progress; ?>" max="100">50%</progress></th>
                            
                            <?php
                                echo "  <td>$db_endDate</td>
                                        <td>$db_status</td>

                                        <th><select name='Action' id='action'>
                                            <option value='Action'>View</option>
                                            <option value='Action'>Edit</option>
                                            <option value='Action'>Delete</option></select>
                                        </th>
                                
                                    </tr>
                                ";
                                    
                                }
                            ?>

                </section>
        </main>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/index.js" charset="utf-8"></script>
    </body>
</html> 