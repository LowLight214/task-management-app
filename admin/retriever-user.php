<div class="card-body">
    <div class="table-responsive">
        <table id="projTableId" class="table table-striped table-hover">
             <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Full Name</th> 
                    <th>Role</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot class="tfoot-light">
                <tr>
                    <th>#</th>
                    <th>Full Name</th> 
                    <th>Role</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                            

                <?php

                include("../connections.php");
                                
                $count = 0;

                $getUser = mysqli_query($conn,"SELECT a.userID,a.firstName,a.lastName,a.adress,c.accountType,b.departmentName FROM tbl_users AS a INNER JOIN tbl_department AS b INNER JOIN tbl_account_type AS c ON a.role=c.accountTypeID AND a.departmentID=b.departmentID");

                while($rowUser = mysqli_fetch_assoc($getUser)){

                    $db_userID = $rowUser["userID"]; 
                    $db_firstName = $rowUser["firstName"];
                    $db_lastName = $rowUser["lastName"];              
                    $db_fullName = $db_firstName. " " . $db_lastName;
                    $db_address = $rowUser["adress"];
                    $db_role = $rowUser["accountType"];
                    $db_department = $rowUser["departmentName"];
                    $count++;

                    $jScript = md5(rand(1,9));
                    $newScript = md5(rand(1,9));
                    $getUpdate = md5(rand(1,9));
                    $getDelete = md5(rand(1,9));

                    echo "
                        <tr>
                            <th scope='row'>$count</th>
                            <td>$db_fullName</td>
                            <td>$db_role</td>
                            <td>$db_department</td>

                            <td>
                                <a href='#' class='btn btn-outline-primary'><i class='fas fa-edit'></i></a>
                                <a href='?jScript=$jScript && newScript=$newScript && getDelete=$getDelete && userID=$db_userID' class='btn btn-outline-danger'><i class='fas fa-trash'></i></a>
                            </td>
                                
                        </tr>
                                    
                    ";
                                    
                }
                ?>                                                                               
        </table>
    </div>
</div>