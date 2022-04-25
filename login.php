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

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/css-login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>TaskMAV Login</title>
</head>
<body>
	<div class="container" id="container">
    <div class="form-container log-in-container">

			<form method="post">

				<h2>LOGIN</h2>
				<input name="username" type="text" id="username" class="form__input" autocomplete="off" placeholder="Email "/>
				<input name="password" type="password" class="form__input" autocomplete="off" placeholder="Password"/>
				<a href="#">Forgot your password?</a>
				<input type="submit" name="btnLogin" value="Login"/>
			</form>

		</div>

		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
          <img src="img/logo-melham.png" alt="">
					<p>COLLABORATIVE:RESPECT:INTEGRITY:PRIDE</p>

				</div>
			</div>
		</div>

	</div>
</body>
</html>