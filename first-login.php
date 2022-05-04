<?php

include("connections.php");

session_start();


$userID = $_GET["userID"];

$newPass = $currentPass = $confirmPass = "";
if(isset($_POST["btnChangePass"])){

    if(!empty($_POST["currentPass"])){
        $currentPass = $_POST["currentPass"];
    }

    if(!empty($_POST["newPass"])){
        $newPass = $_POST["newPass"];
    }

    if(!empty($_POST["confirmPass"])){
        $confirmPass = $_POST["confirmPass"];
    }

    if($newPass && $confirmPass && $currentPass){

        $getCurrentPass = mysqli_query($conn,"SELECT * FROM tbl_user_creds WHERE userID = $userID");
        $fetchCurrent = mysqli_fetch_assoc($getCurrentPass);
        $username = $fetchCurrent["username"];
        $db_currentPass = $fetchCurrent["password"];
        $db_account_type = $fetchCurrent["accountType"];

        if($db_currentPass === $currentPass){
            if($newPass === $confirmPass){
                mysqli_query($conn,"UPDATE `tbl_user_creds` SET `password` = '$newPass', `firstLogin` = '0' WHERE `userID` = $userID ");
                
                if($db_account_type === "1"){
					
                    $_SESSION["username"] = $username;
                    echo "<script> window.location.href='admin'; </script>";
                    
                } 
                elseif($db_account_type === "2" || $db_account_type === "3"){
            
                    $_SESSION["username"] = $username;
                    echo "<script> window.location.href='user'; </script>";
                }
            }
        }
        else{

        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMAV</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <form method="POST">
        <div class="container">
            <div class="card" style="margin:auto;margin-top:200px;width:500px;">
                <div class="card-header">
                    <h4 class="modal-title">Change Password</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="text" name="currentPass" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="text" name="newPass" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="text" name="confirmPass" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="btnChangePass" class="btn btn-primary" value="Change">
                </div>
            </div>
        </div>
    </form>
</body>
</html>