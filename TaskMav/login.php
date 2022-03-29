<?php

session_start();

include ("connections.php");

if(isset($_SESSION["username"])){
	
	$username = $_SESSION["username"];
	
	$query_account_type = mysqli_query($conn, "SELECT * FROM tbl_user_creds WHERE username='$username'");
	
	$get_account_type = mysqli_fetch_assoc($query_account_type);
	
	$account_type = $get_account_type["accountType"];
	
	if ($account_type===1){
		
		echo "<script> window.location.href='admin'; </script>";

	}
    elseif($account_type === "2" || $account_type === "3"){
			
        echo "<script> window.location.href='user'; </script>";
            
    }
	
}


$username = $password = "";
$usernameErr = $passwordErr = "";

if(isset($_POST["btnLogin"])){

	if (empty($_POST["username"])){
		
		$usernameErr = "Username is required";
	
	} else{
		
		$username = $_POST["username"];
		
	}
	
	if (empty($_POST["password"])){
		
		$passwordErr = "Password is required";
	
	} else{
		
		$password = $_POST["password"];
		
	}
	
	if($username && $password){
		
		$check_username = mysqli_query($conn, "SELECT * FROM tbl_user_creds WHERE username='$username'");
		$check_row = mysqli_num_rows($check_username);
		
		if($check_row > 0 ){
		
			$fetch = mysqli_fetch_assoc($check_username);
			$db_password = $fetch["password"];
            $db_account_type = $fetch["accountType"];
			
			if ($db_password == $password){
					
				if($db_account_type === "1"){
				
					$_SESSION["username"] = $username;
					echo "<script> window.location.href='admin'; </script>";
					
				} 
                elseif($db_account_type === "2" || $db_account_type === "3"){
			
                    $_SESSION["username"] = $username;
					echo "<script> window.location.href='user'; </script>";
						
				}
				
			} else{
				
				$passwordErr = "Password is incorrect!";
				
			}
		
		} else{
		
			$usernameErr = "Username not registered!";
		
		}
		
	}

}

?>

<!DOCTYPE html> <!-- what is the version of html:5 -->
<html> <!-- html tag, consists of head and body -->
    <head>  
        <meta charset="utf-8"> 
        <title>TaskMAV - Task Monitoring System - Login</title>
        <link rel="stylesheet" href="css/login-style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Convergence&family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <form method="post">
            <img src="images/logo-melham.png">

            <div class="form">
                <input name="username"type="text" id="username" class="form__input" autocomplete="off" placeholder=" ">
                <label for="username" class="form__label">Username</label>
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </div>
                
             <div class="form">
                    <input name="password" type="password" class="form__input" autocomplete="off" placeholder=" ">
                    <label for="password" class="form__label">Password</label>
                    <i class="fa fa-lock icon" aria-hidden="true"></i>     
                    <br>
                    <input type ="checkbox" class="check-box"><span>Remember me</span>          
                </div>
                <div class="pass">Forgot password?</div>
                <input type="submit" name="btnLogin" value="Login">
                
        </form>

    </body>
</html>