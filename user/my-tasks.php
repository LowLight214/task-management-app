<?php

if(!isset($_SESSION)) { 
    session_start(); 
} 

include ("../connections.php");

if(isset($_SESSION["username"])){
	
	$username = $_SESSION["username"];

}



$getUser = mysqli_query($conn,"SELECT a.userID,a.departmentID,a.profilePic FROM tbl_users AS a INNER JOIN tbl_user_creds AS b ON a.userID=b.userID WHERE b.username='$username'");
$rowUserID = mysqli_fetch_assoc($getUser);

$userID = $rowUserID["userID"];
$departmentID =$rowUserID["departmentID"];

?>

<div class="table">
    <div class="card border-left-primary shadow h-100 py-2">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="color: white; text-align:center;">
                <tr>
                    <th style="color: gray;">Task Name</th>
                    <th class="bg-danger">Pending</th>
                    <th class="bg-primary">Ongoing</th>
                    <th class="bg-success">Completed</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $getMyTasks = mysqli_query($conn,"SELECT * FROM tbl_task WHERE departmentID=$departmentID");
                    if(mysqli_num_rows($getMyTasks)>0){
                        while($rowTasks = mysqli_fetch_assoc($getMyTasks)){

                            $db_taskName = $rowTasks["taskName"];
                            $db_taskStatus = $rowTasks["taskStatus"];

                            echo "
                                <tr>
                                    <td>$db_taskName</td>
                            ";
                                if($db_taskStatus==="Pending"){
                                    echo " 
                                        <td style='text-align:center;'><i class='fa fa-check'></i></td>
                                        <td></td>
                                        <td></td>
                                    ";
                                }
                                else if($db_taskStatus==="Ongoing"){
                                    echo " 
                                        <td style='text-align:center;'><i class='fa fa-check'></i></td>
                                        <td></td>
                                        <td></td>
                                    ";
                                }
                                else if($db_taskStatus==="Completed"){
                                    echo " 
                                        <td style='text-align:center;'><i class='fa fa-check'></i></td>
                                        <td></td>
                                        <td></td>
                                    ";
                                }
                            echo "</tr>";
                        }
                    }
                    else{
                        echo "<td colspan=4><center>NO TASKS</center></td>";
                    }

                ?>
            </tbody>
        </table>
    </div>
</div>