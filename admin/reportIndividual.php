<?php
    include("../connections.php")
?>

<div class="card-body">
    <div class="col-md-6">
        <div class="form-group text-left text-white font-weight-bold"> 
            <label for="form_tmembers">Project</label> 
            <select id="form_tmembers" type="text" name="project" class="form-control" required="required" data-error="Department is required." onchange="refreshFuncI()"> </div>
                <option value="" selected disabled>Select Project</option>
                    <?php

                    $count = 0;

                    $getProject = mysqli_query($conn,"SELECT * FROM tbl_project");

                    while($rowProject = mysqli_fetch_assoc($getProject)){
                                                                    
                        $db_projectName = $rowProject["projectTitle"];
                        $db_projectID = $rowProject["projectID"];

                    ?>

                        <option value="<?php echo $db_projectID ?>"><?php echo $db_projectName ?></option>

                    <?php

                    }

                    ?>
            </select>  
        </div>
    </div>

    <div class="table-responsive">
        <table id="projTableId1" class="table table-striped table-hover dataTable" aria-describedby="projTableId_info">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Member</th>
                    <th>Project</th>
                    <th>Tasks Completed</th> 
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Member</th>
                    <th>Project</th>
                    <th>Tasks Completed</th> 
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </tfoot>                
            <tbody>
                            

                <?php
                                
                $count = 0;

                $get = mysqli_query($conn,"SELECT * FROM tbl_project AS a INNER JOIN tbl_users AS b ON a.departmentID=b.departmentID");

                while($row = mysqli_fetch_assoc($get)){
                                    
                    $db_fullName = $row["firstName"]. " " . $row["lastName"];
                    $db_projectName = $row["projectTitle"];
                    $db_status = $row["projectStatus"];
                    $db_endDate = $row["endDate"];
                    $db_project = $row["projectID"];
                    $count++;

                    echo "
                            <tr hidden class='projects $db_project'>
                                <th scope='row'>$count</th>
                                <td>$db_fullName</td>
                                <td>$db_projectName</td>
                                <td>2</td>
                                <td>$db_endDate</td>
                                <td>$db_status</td>
                                
                            </tr>
                                    
                    ";
                                    
                }
            ?>
                    
        </table>
    </div>
</div>

<script>
    function refreshFuncI(){
        $(".projects").attr('hidden',true);
        projectID = $("#form_tmembers").val();
        $('.'+projectID).removeAttr("hidden");
    }
</script>