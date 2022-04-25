<?php

if(!isset($_SESSION)) { 
    session_start(); 
} 

include ("connections.php");

if(isset($_SESSION["username"])){
	
	$username = $_SESSION["username"];

}

$getUser = mysqli_query($conn,"SELECT a.userID,a.departmentID FROM tbl_users AS a INNER JOIN tbl_user_creds AS b ON a.userID=b.userID WHERE b.username='$username'");
$rowUserID = mysqli_fetch_assoc($getUser);

$userID = $rowUserID["userID"];
$departmentID =$rowUserID["departmentID"];

    $count = 0;
    $countNotif = mysqli_query($conn,"SELECT * FROM tbl_notifications WHERE receiverDepartment = $departmentID");
                
    while(mysqli_fetch_assoc($countNotif)){
        $count++;
    }

    if ($count>0){
        echo "
            <span class='badge badge-danger badge-counter'>
                    $count
            </span>  
        ";   
    }
?>