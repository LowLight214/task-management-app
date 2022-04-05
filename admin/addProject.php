<?php

$projectName = $status = $startDate = $endDate = $teamLeader = $department = $description = "";

if(isset($_POST["btnAddProject"])){
    
    if(!empty($_POST["projectName"])){
        $projectName = $_POST["projectName"];
    }

    if(!empty($_POST["status"])){
        $status = $_POST["status"];
    }
    
    if(!empty($_POST["startDate"])){
        $startDate = $_POST["startDate"];
    }
    
    if(!empty($_POST["endDate"])){
        $endDate = $_POST["endDate"];
    }
    
    if(!empty($_POST["tLeader"])){
        $teamLeader = $_POST["tLeader"];
    }
    
    if(!empty($_POST["department"])){
        $department = $_POST["department"];
    }
    
    if(!empty($_POST["description"])){
        $description = $_POST["description"];
    }
    
    
    if($projectName && $status && $startDate && $endDate && $teamLeader && $department && $description){
        
        mysqli_query($conn, "INSERT INTO `tbl_project` (`projectID`, `projectTitle`, `projectDescription`, `projectStatus`, `startDate`, `endDate`, `departmentID`, `leaderUserID`, `projectProgress`, `filePath`)
                VALUES (NULL, '$projectName', '$description', '$status', '$startDate', '$endDate', '$department', '$teamLeader', '0', NULL) ");

        echo "<script> window.location.href='project.php'; </script>";
            
    }


}

?>

<form method="POST" class="needs-validation" novalidate>
    <div class="modal-header">						
        <h4 class="modal-title">Add Project</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
            <div class="proj-details">
                <div class="input-box">
                    <span class="details">Project Title</span>
                    <input type="text" id="form_projectname" name="projectName" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Project Status</span>
                    <select type="text" name="status" class="form-control" required>
                        <option value="" selected disabled>Select Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                            <option value="Close">Close</option>
                    </select>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Start Date</span>
                    <input type="date" class="form-control" name="startDate" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">End Date</span>
                    <input type="date" class="form-control" name="endDate" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Team Leader</span>
                    <input type="text" class="form-control" name="tLeader" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
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
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
                </div>
            </div>
            <hr class="solid">
            <div class="proj-details">
                <span class="project-title">Project Details</span>
                <textarea name="description" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    This field cannot be empty!
                </div>
            </div>
    
                            
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-primary" name="btnAddProject" value="Add"
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