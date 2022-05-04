<?php
    include("../connections.php");

    $getMembers = mysqli_query($conn,"SELECT * FROM tbl_users AS a INNER JOIN tbl_account_type AS b ON a.role=b.accountTypeID WHERE departmentID=$departmentID");
    while($rowMembers = mysqli_fetch_assoc($getMembers)){
        $db_fullName = $rowMembers["firstName"]." ".$rowMembers["lastName"];
        $db_role = $rowMembers["accountType"];
?>

<div class="col-lg-3 col-sm-12">
	<div class="card shadow mb-6">
		<div class="container d-flex justify-content-center">
			<div class="card p-3 py-4" style="height: 20rem;">
				<div class="text-center" style="margin:auto;"> 
					<br> 
					<img src="img/user.png" width="100" class="rounded-circle">
					<h4 class="mt-2"><?php echo $db_fullName; ?></h4> <span class="mt-1 clearfix"><?php echo $db_role; ?></span>
					<hr class="line"> 
                    <center><a href="#" class="btn btn-outline-primary" style="margin-top:20px;">View <i class='fas fa-eye'></i></a></center>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
    }
?>