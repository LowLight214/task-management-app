<?php

$new_projectName = $new_status = $new_endDate = $new_teamLeader = $new_department = $new_description = "";

if(isset($_POST["btnUpdateProject"])){
    
    if(!empty($_POST["new_projectName"])){
        $new_projectName = $_POST["new_projectName"];
    }

    if(!empty($_POST["new_status"])){
        $new_status = $_POST["new_status"];
    }
    
    if(!empty($_POST["new_endDate"])){
        $new_endDate = $_POST["new_endDate"];
    }
    
    if(!empty($_POST["new_tLeader"])){
        $new_teamLeader = $_POST["new_tLeader"];
    }
    
    if(!empty($_POST["new_department"])){
        $new_department = $_POST["new_department"];
    }
    
    if(!empty($_POST["new_description"])){
        $new_description = $_POST["new_description"];
    }

    $projectID = $_POST["projectIDHidden"];
    
    if($new_projectName && $new_status && $new_endDate && $new_teamLeader && $new_department && $new_description){
        
        //$getLeaderID = mysqli_query($conn,"SELECT * FROM tbl_user AS a INNER JOIN tbl_department AS b ON a.departmentID=b.departmentID WHERE a.role=2 AND departmentID='$new_department'") 
        
        mysqli_query($conn, "UPDATE `tbl_project` 
        SET `projectTitle` = '$new_projectName', `projectDescription` = '$new_description', 
        `projectStatus` = '$new_status', `endDate` = '$new_endDate', `departmentID` = '$new_department'
        WHERE `projectID` = $projectID ");

        echo "<script> window.location.href='project.php'; </script>";
            
    }


}

?>

<form method="POST" class="needs-validation" novalidate>
    <div class="modal-header">						
        <h4 class="modal-title">Update Project</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
            <div class="proj-details">

                <input type="hidden" name="projectIDHidden" id="projectID">

                <div class="input-box">
                    <span class="details">Project Title</span>
                    <input type="text" id="projectname" name="new_projectName" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Project Status</span>
                    <select type="text" id="status" name="new_status" class="form-control" required>
                        <option value="" selected disabled>Select Status</option>
                            <option class="statusOption" id="newPending" value="Pending">Pending</option>
                            <option class="statusOption" id="newOngoing" value="Ongoing">Ongoing</option>
                            <option class="statusOption" id="newFinished" value="Finished">Finished</option>
                    </select>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Start Date</span>
                    <input type="date" class="form-control" name="new_startDate" id="startDate" required disabled>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">End Date</span>
                    <input type="date" class="form-control" name="new_endDate" id="endDate" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Team Leader</span>
                    <input type="text" class="form-control" name="new_tLeader" id="new_tLeader" required >
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Department</span>
                    <select type="text" name="new_department" id="new_department" class="form-control" required>
                        <option value="" selected disabled>Select Department</option>
                        <?php

                        $count = 0;

                        $getDept = mysqli_query($conn,"SELECT * FROM tbl_department");

                        while($rowDept = mysqli_fetch_assoc($getDept)){
                                
                            $db_departmentName = $rowDept["departmentName"];
                            $db_departmentID = $rowDept["departmentID"];

                        ?>

                        <option class="deptOption" id="dept<?php echo $db_departmentID; ?>" value="<?php echo $db_departmentID ?>"><?php echo $db_departmentName ?></option>

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
                <textarea name="new_description" id="description" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    This field cannot be empty!
                </div>
            </div>
    
                            
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" name="btnUpdateProject" value="Save"
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