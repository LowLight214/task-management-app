<?php

$projectID = $taskName = $status = $department = $description = "";

if(isset($_POST["btnAddTask"])){
    
    if(!empty($_POST["projectID"])){
        $projectID = $_POST["projectID"];
    }
    if(!empty($_POST["status"])){
        $status = $_POST["status"];
    }
    if(!empty($_POST["taskName"])){
        $taskName = $_POST["taskName"];
    }
    if(!empty($_POST["department"])){
        $department = $_POST["department"];
    }
    if(!empty($_POST["description"])){
        $description = $_POST["description"];
    }
    
    if($projectID && $taskName && $status && $department && $description){
        
        mysqli_query($conn, "INSERT INTO `tbl_task` (`taskID`, `taskName`, `taskDescription`, `taskStatus`, `projectID`, `departmentID`, `filePath`) 
        VALUES (NULL, '$taskName', '$description', '$status', '$projectID', '$department', '') ");

        echo "<script> window.location.href='task.php'; </script>";

    }


}

?>

<form method="POST" class="needs-validation" novalidate>
    <div class="modal-header">						
        <h4 class="modal-title">Add Task</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
            <div class="proj-details">
                <div class="input-box">
                    <span class="details">Assigned Project</span>
                    <select id="form_projectname" type="text" name="projectID" class="form-control" required="required" data-error="Status is required."> </div>
                                            <option value="" selected disabled>--Select Project--</option>
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
                <div class="input-box">
                    <span class="details">Status</span>
                    <select type="text" name="status" class="form-control" required>
                        <option value="" selected disabled>Select Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                            <option value="Close">Close</option>
                    </select>
                </div>
                <div class="input-box">
                    <span class="details">Task</span>
                    <input id="form_tleader" type="text" name="taskName" class="form-control" placeholder="Input Task" required="required" data-error="Task Name is required."> 
                </div>
                <div class="input-box">
                    <span class="details">Department</span>
                    <select type="text" name="department" class="form-control" required>
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
            <hr class="solid">
            <div class="proj-details">
                <span class="project-title">Description</span>
                <textarea name="description" class="form-control" required></textarea>
            </div>
    
                            
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-primary" name="btnAddTask" value="Add"
                onclick="
                    (function () {
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.prototype.slice.call(forms)
                        .forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                            if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                        })
                    })()"
                >
            </div>
</form>