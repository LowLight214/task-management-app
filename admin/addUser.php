
<?php

$fName = $mName = $lName = $email = $contactNo = $role = $department = $address = "";

if(isset($_POST["btnAddUser"])){
    
    if(!empty($_POST["firstName"])){
        $fName = $_POST["firstName"];
    }
    if(!empty($_POST["middleName"])){
        $mName = $_POST["middleName"];
    }
    if(!empty($_POST["lastName"])){
        $lName = $_POST["lastName"];
    }
    if(!empty($_POST["email"])){
        $email = $_POST["email"];
    }
    if(!empty($_POST["contactNo"])){
        $contactNo = $_POST["contactNo"];
    }
    if(!empty($_POST["role"])){
        $role = $_POST["role"];
    }
    if(!empty($_POST["department"])){
        $department = $_POST["department"];
    }
    if(!empty($_POST["address"])){
        $address = $_POST["address"];
    }

    
    if($fName && $mName && $lName && $email && $contactNo && $role && $department && $address){
        
        $insertUser = mysqli_query($conn, "INSERT INTO `tbl_users` (`userID`, `lastName`, `firstName`, `middleName`, `email`, `phoneNumber`, `adress`, `role`, `departmentID`) 
        VALUES (NULL, '$lName', '$fName', '$mName', '$email', '$contactNo', '$address', '$role', '$department') ");

        $getUserID = mysqli_query($conn, "SELECT * FROM tbl_users WHERE lastName='$lName' AND firstName='$fName'");
        $row = mysqli_fetch_assoc($getUserID);
        $userID = $row["userID"];

        function  random_password($length=5){
            $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890";
            $shuffled = substr(str_shuffle($str), 0, $length);
            return $shuffled;
        }
        
        $password = random_password(8);

        if($insertUser){
            mysqli_query($conn, "INSERT INTO `tbl_user_creds` (`userID`, `username`, `password`, `accountType`) VALUES ('$userID', '$email', '$password', '$role') ");
        }
        

        echo "<script> window.location.href='user.php'; </script>";

    }


}

?>
<form method="POST" class="needs-validation" novalidate>
    <div class="modal-header">						
        <h4 class="modal-title">Add Users</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
        <div class="proj-details">
            <div class="input-box">
                <span class="details">First Name</span>
                <input type="text" id="firstName" name="firstName" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Middle Name</span>
                <input type="text" id="middleName" name="middleName" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Last Name</span>
                <input type="text" id="lastName" name="lastName" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Contact No.</span>
                <input type="text" id="contactNo" name="contactNo" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="text" id="email" name="email" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>
            <div class="input-box">
                <span class="details">Role</span>
                <select id="form_tleader" name="role" class="form-control" required="required" data-error="Role is required."> </div>
                    <option value="" selected disabled>--Select Role--</option>
                        <?php
                            $count = 0;
                            $getRole = mysqli_query($conn,"SELECT * FROM tbl_account_type");
                            while($rowRole = mysqli_fetch_assoc($getRole)){
                                $db_role = $rowRole["accountType"];
                                $db_type = $rowRole["accountTypeID"];
                            ?>
                            <option value="<?php echo $db_type ?>"><?php echo $db_role ?></option>
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
                <select id="form_tmembers" type="text" name="department" class="form-control" required="required" data-error="Department is required."> </div>
                    <option value="" selected disabled>--Select Department--</option>
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
            <span class="project-title">Address </span>
            <textarea name="address" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    This field cannot be empty!
                </div> 
        </div>       
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-primary" name="btnAddUser" value="Add" 
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