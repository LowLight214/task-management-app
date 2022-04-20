<?php
$userIDDel = $_GET["userID"];

$getUserDel = mysqli_query($conn,"SELECT a.userID,a.firstName,a.lastName,c.accountType,b.departmentName 
    FROM tbl_users AS a INNER JOIN tbl_department AS b INNER JOIN tbl_account_type AS c 
    ON a.role=c.accountTypeID AND a.departmentID=b.departmentID
    WHERE a.userID=$userIDDel");

$rowUserDel = mysqli_fetch_assoc($getUserDel);

$db_fullNameDel = $rowUserDel["firstName"]. " " . $rowUserDel["lastName"];
$db_roleDel = $rowUserDel["accountType"];
$db_departmentDel = $rowUserDel["departmentName"];

if(isset($_POST["btnDelete"])){
    mysqli_query($conn,"DELETE FROM tbl_users WHERE userID=$userIDDel");
    echo "<script>alert('$db_fullNameDel 's account was deleted.')</script>";

    echo "<script>window.location.href='user.php?';</script>";
}

?>

<center>
	<form method="POST">
        <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
            <div>
                You are about to delete this user: <strong><?php echo $db_fullNameDel; ?></strong> <br>
                <small>Role: <?php echo $db_roleDel; ?> | Department: <?php echo $db_departmentDel; ?> </small>
            </div>
            <br>

            <input type="submit" name="btnDelete" value="Delete" class="btn btn-danger"/>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
		
	
	</form>
</center>