
<?php

$new_department = "";

if(isset($_POST["btnUpdateDepartment"])){

    if(!empty($_POST["new_department"])){
        $new_department = $_POST["new_department"];
    }

    $departmentID = $_POST["teamIDHidden"];

    if($new_department){
        mysqli_query($conn, "UPDATE `tbl_department`
        SET `departmentName` = '$new_department' 
        WHERE `departmentID` = $departmentID ");

        echo "<script> window.location.href='team.php?'; </script>";
    }
}
?>
<form method="POST" class="needs-validation" novalidate>
    <div class="modal-header">						
        <h4 class="modal-title">Update Team</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
        <div class="proj-details">
            <div class="col-lg-12 input-box">
                <input type="hidden" name="teamIDHidden" id="departmentID">
                <span class="details">Team Name</span>
                <input type="text" id="new_department" name="new_department" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>                   
        </div>  
        <hr class="solid">
               
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-primary" name="btnUpdateDepartment" value="Update" 
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