<div class="card-body">
    <div class="table-responsive">
        <table id="projTableId" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Team ID</th>
                    <th>Team Name</th>
                    <th>Team Leader</th>						
                    <th>No. of Members</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Team ID</th>
                    <th>Team Name</th>
                    <th>Team Leader</th>						
                    <th>No. of Members</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                            

                <?php
                                
                $count = $memberCount = 0;

                $getDept = mysqli_query($conn,"SELECT a.firstName,a.lastName,a.role,b.departmentName,b.departmentID FROM tbl_users AS a RIGHT JOIN tbl_department AS b ON a.departmentID=b.departmentID  ORDER BY departmentName ASC");

                while($rowDept = mysqli_fetch_assoc($getDept)){
                    $memberCount=0;              
                    $db_fullName = $rowDept["firstName"]. " " . $rowDept["lastName"];
                    $db_role = $rowDept["role"];
                    $db_department = $rowDept["departmentName"];
                    $db_departmentID = $rowDept["departmentID"];
                    

                    if($db_role==3 || $db_role==1){
                        continue;
                        
                    }
                    else{
                        $count++;
                    }

                    if($db_fullName===" " || $db_fullName===NULL){
                        $db_fullName = "No Leader yet";
                    }
                    

                    $getMembers = mysqli_query($conn,"SELECT * FROM tbl_users WHERE role=3 AND departmentID=$db_departmentID");
                    while(mysqli_fetch_assoc($getMembers)){
                        $memberCount++;
                    }

                    echo "
                        <tr>
                            <th scope='row'>$count</th>
                            <td>$db_department</td>
                            <td>$db_fullName</td>
                            <td>$memberCount</td>
                            <td hidden>$db_departmentID</td>
                            

                            <td>
                                <button type='button' class='btn btn-outline-primary updateBtn' onclick='modalOpen($count+1)'>
                                    <i class='fas fa-edit'></i>
                                </button>
                                <a href='#' class='btn btn-outline-danger'><i class='fas fa-trash'></i></a>
                            </td>
                                
                        </tr>
                                    
                    ";
                                    
                }
                ?>                                                                               
        </table>
    </div>
</div>

<script>

    function modalOpen(id){
		$('#updateProjectModal').modal('show');

            dept = $('#projTableId tr:eq('+id+') td:eq(0)').text();
            $('#new_department').val(dept);

            $('#departmentID').val($('#projTableId tr:eq('+id+') td:eq(3)').text())
           
	}
</script>