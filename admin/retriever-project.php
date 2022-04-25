<div class="card-body">
    <div class="table-responsive">
        <table id="projTableId" class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Project</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Department</th>
                    <th>Leader</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                        
                <?php
                
                include("../connections.php");
                                
                $count = 0;

                $getProject = mysqli_query($conn,"SELECT a.projectID,a.projectTitle,a.projectDescription,a.projectStatus,
                a.projectProgress,a.endDate,a.startDate,b.departmentName,b.departmentID,c.firstName,c.lastName
                 FROM tbl_project AS a INNER JOIN tbl_department AS b
                INNER JOIN tbl_users AS c INNER JOIN tbl_account_type AS d
                ON a.departmentID=b.departmentID AND a.leaderUserID=c.userID AND c.role=d.accountTypeID");

                while($rowProject = mysqli_fetch_assoc($getProject)){
                    
                    $db_projectID = $rowProject["projectID"];
                    $db_projectName = $rowProject["projectTitle"];
                    $db_projectDesc = $rowProject["projectDescription"];

                    $db_status = $rowProject["projectStatus"];
                    $db_progress = $rowProject["projectProgress"];
                    $db_endDate = $rowProject["endDate"];
                    $db_startDate = $rowProject["startDate"];

                    $db_department = $rowProject["departmentName"];
                    $db_departmentID = $rowProject["departmentID"];

                    $db_leaderName = $rowProject["firstName"]." ".$rowProject["lastName"];

                    $jScript = md5(rand(1,9));
                    $newScript = md5(rand(1,9));
                    $getUpdate = md5(rand(1,9));
                    $getDelete = md5(rand(1,9));

                    $count++;

                    echo "
                        
                        <tr>
                            <th scope='row'>$count</th>
                            <td>$db_projectName</td>
                            <td>$db_endDate</td>
                            <td>$db_status</td>
                            <td>$db_department</td>
                            <td hidden>$db_departmentID</td>
                            <td>$db_leaderName</td>
                            <td hidden>$db_projectDesc</td>
                            <td hidden>$db_startDate</td>
                            <td hidden>$db_projectID</td>
                            <td>
                                <button type='button' class='btn btn-outline-primary updateBtn' onclick='modalOpen($count)'>
                                    <i class='fas fa-edit'></i>
                                </button>
                                <a href='?jScript=$jScript && newScript=$newScript && getDelete=$getDelete && projectID=$db_projectID' class='btn btn-outline-danger'><i class='fas fa-trash'></i></a>
                                <a href='#' class='btn btn-outline-dark'  onclick='goToProject($db_projectID)'><i class='fas fa-eye'></i></a>
                            </td>
                                
                        </tr>
                                    
                    ";
                                    
                }
                ?>                                                                                           
        </table>
    </div>
</div>

<script>
    function goToProject(projectID){
        window.location.href="task.php?projectID="+projectID;
    }

    function modalOpen(id){
		$('#editProjectModal').modal('show');

            $(".statusOption").removeAttr('selected');
            $(".deptOption").removeAttr('selected');

            $('#projectname').val($('#projTableId tr:eq('+id+') td:eq(0)').text());

            $('#endDate').val($('#projTableId tr:eq('+id+') td:eq(1)').text());
            
            status = $('#projTableId tr:eq('+id+') td:eq(2)').text();
            $("#"+status).attr('selected', 'selected');

            dept = $('#projTableId tr:eq('+id+') td:eq(4)').text();;
            $("#dept"+dept).attr('selected', 'selected');

            $('#new_tLeader').val($('#projTableId tr:eq('+id+') td:eq(5)').text());

            $('#description').val($('#projTableId tr:eq('+id+') td:eq(6)').text());
            $('#startDate').val($('#projTableId tr:eq('+id+') td:eq(7)').text());
            $('#projectID').val($('#projTableId tr:eq('+id+') td:eq(8)').text())
            	
	}
</script>