<div class="card-body">
    <div class="col-md-6">
        <div class="form-group text-left text-white font-weight-bold"> 
            <label for="form_department">Department</label> 
            <select id="form_department" type="text" name="department" class="form-control" required="required" data-error="Department is required." onchange="refreshFunc()"> </div>
                <option value="" selected disabled>Select Department</option>
                    <?php

                    $count = 0;

                    $getDept = mysqli_query($conn,"SELECT * FROM tbl_department");

                    while($rowDept = mysqli_fetch_assoc($getDept)){
                                                            
                        $db_departmentName = $rowDept["departmentName"];
                        $db_departmentID = $rowDept["departmentID"];

                    ?>

                         <option value="<?php echo $db_departmentID ?>"><?php echo $db_departmentName ?></option>

                    <?php

                    }

                    ?>
            </select>  
        </div>
    </div>

    <div class="table-responsive">
        <table id="projTableId" class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Progress</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Progress</th>
                    <th>Status</th>
                </tr>
            </tfoot>
            <tbody>
                
                <?php
                                
                $count = 0;

                $getProject = mysqli_query($conn,"SELECT * FROM tbl_project");

                while($rowProject = mysqli_fetch_assoc($getProject)){
                                    
                    $db_projectName = $rowProject["projectTitle"];
                    $db_status = $rowProject["projectStatus"];
                    $db_progress = $rowProject["projectProgress"];
                    $db_startDate = $rowProject["startDate"];
                    $db_endDate = $rowProject["endDate"];
                    $db_department = $rowProject["departmentID"];
                    $count++;

                    echo "
                        <tr hidden class='depts $db_department'>
                            <th scope='row'>$count</th>
                            <td>$db_projectName</td>
                            <td>$db_startDate</td>
                            <td>$db_endDate</td>
                    ";

                ?>

                            
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $db_progress; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                <?php
                    echo "<td>$db_status</td>
                                
                        </tr>
                    ";
                                    
                }
                ?>
                                                       
                                                        
                                                        
            </tbody>
        </table>
    </div>
</div>

<script>
    function refreshFunc(){
        $(".depts").attr('hidden',true);
        deptID = $("#form_department").val();
        $('.'+deptID).removeAttr("hidden");
    }
</script>

