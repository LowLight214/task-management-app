
<?php

$department =  "";

if(isset($_POST["btnAddUser"])){
    
    
    if(!empty($_POST["department"])){
        $department = $_POST["department"];
    }

    
    if($department){
        
        mysqli_query($conn,"INSERT INTO `tbl_department` (`departmentID`, `departmentName`) VALUES (NULL, '$department') ");
        

        echo "<script> window.location.href='team.php'; </script>";

    }


}

?>
<form method="POST" class="needs-validation" novalidate>
    <div class="modal-header">						
        <h4 class="modal-title">Add Team</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
        <div class="proj-details">
            <div class="col-lg-12 input-box">
                <span class="details">Team Name</span>
                <input type="text" id="department" name="department" class="form-control" required>
                    <div class="invalid-feedback">
                        This field cannot be empty!
                    </div>
            </div>                   
        </div>  
        <hr class="solid">
               
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