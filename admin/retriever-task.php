<?php

if(!isset($_SESSION)) { 
    session_start(); 
} 

if(isset($_SESSION["projectID"])){
	
    $projectID = $_SESSION["projectID"];

}



?>

<div class="card-body">
    <div class="table-responsive">
        <table id="projTableId" class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Task</th> 
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                        
                <?php
                
                include("../connections.php");
                                
                $count = 0;

                $getTask = mysqli_query($conn,"SELECT * FROM tbl_task WHERE projectID='$projectID'");

                while($rowTask = mysqli_fetch_assoc($getTask)){
                    $db_taskID = $rowTask["taskID"];
                    $db_taskName = $rowTask["taskName"];
                    $db_taskDesc = $rowTask["taskDescription"];
                    $db_status = $rowTask["taskStatus"];;
                    $count++;

                    $jScript = md5(rand(1,9));
                    $newScript = md5(rand(1,9));
                    $getUpdate = md5(rand(1,9));
                    $getDelete = md5(rand(1,9));

                    echo "
                        <tr>
                            <th scope='row'>$count</th>
                            <td hidden>$db_taskID</td>
                            <td>$db_taskName</td>
                            <td>$db_taskDesc</td>
                            <td>$db_status</td>
                            <td hidden>$projectID</td>

                            <td>
                                <button type='button' class='btn btn-outline-primary updateBtn' onclick='modalOpen($count)'>
                                    <i class='fas fa-edit'></i>
                                </button>
                                <a href='?jScript=$jScript && newScript=$newScript && getDelete=$getDelete && taskID=$db_taskID && projectID=$projectID' class='btn btn-outline-danger'><i class='fas fa-trash'></i></a>
                            </td>
                                
                        </tr>
                                    
                    ";
                                    
                }
                ?>                                                                                           
        </table>
    </div>
</div>



<script type="text/javascript">

	function modalOpen(id){
		$('#editTaskModal').modal('show');

            $(".statusOption").removeAttr('selected');

            $('#projectNameU').val($('#projectName').text());

            $('#departmentU').val($('#department').text());

            $('#taskID').val($('#projTableId tr:eq('+id+') td:eq(0)').text())

			$('#taskName').val($('#projTableId tr:eq('+id+') td:eq(1)').text())

            $('#description').val($('#projTableId tr:eq('+id+') td:eq(2)').text())

            status = $('#projTableId tr:eq('+id+') td:eq(3)').text();
            $("#"+status).attr('selected', 'selected');

            $('#projectID').val($('#projTableId tr:eq('+id+') td:eq(4)').text())

            
            	
	}

</script>