<?php

include ("connections.php");

if(!isset($_SESSION)) { 
    session_start(); 
} 

if(isset($_SESSION["username"])){
	
	$username = $_SESSION["username"];

}

$getUser = mysqli_query($conn,"SELECT a.userID,a.departmentID FROM tbl_users AS a INNER JOIN tbl_user_creds AS b ON a.userID=b.userID WHERE b.username='$username'");
$rowUserID = mysqli_fetch_assoc($getUser);

$userID = $rowUserID["userID"];
$departmentID =$rowUserID["departmentID"];


            $getNotif = mysqli_query($conn,"SELECT * FROM tbl_notifications WHERE receiverDepartment = $departmentID");
                    
            while($rowNotif = mysqli_fetch_assoc($getNotif)){
                $db_date = $rowNotif["dateSent"];
                $db_title = $rowNotif["notifTitle"];
                $db_desc = $rowNotif["notifDescription"];
            
        ?>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?php echo $db_date; ?></div>
                <span class="font-weight-bold"><?php echo $db_title; ?></span>
                <div class="small text-gray-500"><?php echo $db_desc; ?></div>
            </div>
        </a>
        <?php
            }
        ?>         

