<?php

$newFName = $newMName = $newLName = $newEmail = $newContactNo = $newRole = $newDepartment = $newAddress = "";

if(isset($_POST["btnUpdateUser"])){
    
    if(!empty($_POST["new_firstName"])){
        $newFName = $_POST["new_firstName"];
    }
    if(!empty($_POST["new_middleName"])){
        $newMName = $_POST["new_middleName"];
    }
    if(!empty($_POST["new_lastName"])){
        $newLName = $_POST["new_lastName"];
    }
    if(!empty($_POST["new_email"])){
        $newEmail = $_POST["new_email"];
    }
    if(!empty($_POST["new_contactNo"])){
        $newContactNo = $_POST["new_contactNo"];
    }
    if(!empty($_POST["new_role"])){
        $newRole = $_POST["new_role"];
    }
    if(!empty($_POST["new_department"])){
        $newDepartment = $_POST["new_department"];
    }
    if(!empty($_POST["new_address"])){
        $newAddress = $_POST["new_address"];
    }

    $userID = $_POST["userhidden"];

    

    if($newFName && $newMName && $newLName && $newEmail && $newContactNo && $newRole && $newDepartment && $newAddress){
        
        mysqli_query($conn, "UPDATE `tbl_users` 
        SET `lastName` = '$newLName', `firstName` = '$newFName', `middleName` = '$newMName',
         `email` = '$newEmail', `phoneNumber` = '$newContactNo', `adress` = '$newAddress',
          `role` = '$newRole', `departmentID` = '$newDepartment' WHERE `tbl_users`.`userID` = $userID");

        echo "<script> window.location.href='user.php'; </script>";

    }
}
?>
<form method="POST" class="needs-validation" novalidate>
    <div class="modal-header">						
        <h4 class="modal-title">Update Users</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
        <div class="proj-details">
            <div class="input-box">
                <input type="hidden" name="userhidden" id="userID">
                <span class="details">First Name</span>
                <input type="text" id="new_firstName" name="new_firstName" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Middle Name</span>
                <input type="text" id="new_middleName" name="new_middleName" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Last Name</span>
                <input type="text" id="new_lastName" name="new_lastName" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Contact No.</span>
                <input type="text" name="new_contactNo" id="contactNum" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="text" name="new_email" id="new_email" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Role</span>
                <select id="new_role" name="new_role" class="form-control" required="required" data-error="Role is required."> </div>
                    <option value="" selected disabled>--Select Role--</option>
                        <?php
                            $count = 0;
                            $getRole = mysqli_query($conn,"SELECT * FROM tbl_account_type");
                            while($rowRole = mysqli_fetch_assoc($getRole)){
                                $db_role = $rowRole["accountType"];
                                $db_type = $rowRole["accountTypeID"];
                            ?>
                            <option class="account_role" id="new_role_account<?php echo $db_type; ?>" value="<?php echo $db_type ?>"><?php echo $db_role ?></option>
                                <?php
                            }
                                ?>
                </select> 
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Department</span>
                <select id="new_department" type="text" name="new_department" class="form-control" required="required" data-error="Department is required."> </div>
                    <option value="" selected disabled>--Select Department--</option>
                        <?php
                            $count = 0;
                            $getDept = mysqli_query($conn,"SELECT * FROM tbl_department");
                            while($rowDept = mysqli_fetch_assoc($getDept)){
                                $db_departmentName = $rowDept["departmentName"];
                                $db_departmentID = $rowDept["departmentID"];
                                ?>
                                <option class="dept" id="new_depart<?php echo $db_departmentID; ?>" value="<?php echo $db_departmentID ?>"><?php echo $db_departmentName ?></option>
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
            <span class="project-title">Address </span>
            <textarea name="new_address" id="new_address" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    This field cannot be empty!
                </div> 
        </div>       
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-primary" name="btnUpdateUser" value="Update" 
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