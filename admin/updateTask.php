<?php

$new_taskName = $new_status = $new_description = "";

if(isset($_POST["btnAddTask"])){
    
    if(!empty($_POST["new_status"])){
        $new_status = $_POST["new_status"];
    }
    if(!empty($_POST["new_taskName"])){
        $new_taskName = $_POST["new_taskName"];
    }
    if(!empty($_POST["new_description"])){
        $new_description = $_POST["new_description"];
    }

    $taskID = $_POST["taskIDHidden"];
    $projectID = $_POST["projectIDHidden"];
    
    if($new_taskName && $new_status && $new_description){
        
        mysqli_query($conn, "UPDATE `tbl_task` 
        SET `taskName` = '$new_taskName', `taskDescription` = '$new_description', `taskStatus` = '$new_status' 
        WHERE `tbl_task`.`taskID` = $taskID ");

        echo "<script> window.location.href='task.php?projectID=$projectID'; </script>";

    }


}

?>

<form method="POST" class="needs-validation" novalidate>
    <div class="modal-header">						
        <h4 class="modal-title">Update Task</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
            <div class="proj-details">
                <div class="input-box">

                    <input type="hidden" name="taskIDHidden" id="taskID">
                    <input type="hidden" name="projectIDHidden" id="projectID">

                    <span class="details">Project Name</span>
                    <input id="projectNameU" type="text" name="new_projectName" class="form-control" placeholder="Input Project Name" required="required" data-error="Project Name is required." disabled> 
 
                </div>
                <div class="input-box">
                    <span class="details">Status</span>
                    <select type="text" id="status" name="new_status" class="form-control" required>
                        <option value="" selected disabled>Select Status</option>
                            <option class="statusOption" id="Pending" value="Pending">Pending</option>
                            <option class="statusOption" id="Ongoing" value="Ongoing">Ongoing</option>
                            <option class="statusOption" id="Completed" value="Completed">Completed</option>
                    </select>
                </div>
                <div class="input-box">
                    <span class="details">Task</span>
                    <input id="taskName" type="text" name="new_taskName" class="form-control" placeholder="Input Task" required="required" data-error="Task Name is required."> 
                </div>
                <div class="input-box">
                    <span class="details">Department</span>
                    <input id="departmentU" type="text" name="new_department" class="form-control" placeholder="Input Department" required="required" data-error="Department is required." disabled> 
                </div>
            </div>
            <hr class="solid">
            <div class="proj-details">
                <span class="project-title">Description</span>
                <textarea id="description" name="new_description" class="form-control" required></textarea>
            </div>
    
                            
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-primary" name="btnAddTask" value="Save"
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