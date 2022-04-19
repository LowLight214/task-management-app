<?php
$projectID = $_GET["projectID"];
$taskID = $_GET["taskID"];

$getTaskDel = mysqli_query($conn,"SELECT * FROM tbl_task WHERE taskID = $taskID");

$rowTaskDel = mysqli_fetch_assoc($getTaskDel);

$taskNameDel = $rowTaskDel["taskName"];
$taskDescDel = $rowTaskDel["taskDescription"];

if(isset($_POST["btnDelete"])){
    mysqli_query($conn,"DELETE FROM tbl_task WHERE taskID=$taskID");
    echo "<script>alert('$taskNameDel was deleted successfully.')</script>";

    echo "<script>window.location.href='task.php?projectID=$projectID';</script>";
}

?>

<center>
	<form method="POST">
        <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
            <div>
                You are about to delete this task: <strong><?php echo $taskNameDel; ?></strong> <br>
                <small>DESCRIPTION: <?php echo $taskDescDel; ?></small>
            </div>
            <br>

            <input type="submit" name="btnDelete" value="Delete" class="btn btn-danger"/>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
		
	
	</form>
</center>