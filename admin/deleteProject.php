<?php
$projectID = $_GET["projectID"];

$getTaskDel = mysqli_query($conn,"SELECT * FROM tbl_task WHERE projectID = $projectID");

$countDel = 0;
while($rowTaskDel = mysqli_fetch_assoc($getTaskDel)){
    $countDel++;
}

$getProjectDel = mysqli_query($conn,"SELECT * FROM tbl_project WHERE projectID=$projectID");
$rowProjectDel = mysqli_fetch_assoc($getProjectDel);

$db_projectNameDel = $rowProjectDel["projectTitle"];

if(isset($_POST["btnDelete"])){
    mysqli_query($conn,"DELETE FROM tbl_project WHERE projectID=$projectID");
    mysqli_query($conn,"DELETE FROM tbl_task WHERE projectID=$projectID");
    echo "<script>alert('$db_projectNameDel was deleted successfully.')</script>";

    echo "<script>window.location.href='project.php';</script>";
}

?>

<center>
	<form method="POST">
        <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
            <div>
                You are about to delete this project: <strong><?php echo $db_projectNameDel; ?></strong> <br>
                <small>Unfinished Tasks: <?php echo $countDel; ?></small>
            </div>
            <br>

            <input type="submit" name="btnDelete" value="Delete" class="btn btn-danger"/>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
		
	
	</form>
</center>