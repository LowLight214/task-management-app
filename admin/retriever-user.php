

            <?php

                include("../connections.php");
                                
                $count = 0;

                $getUser = mysqli_query($conn,"SELECT a.*, c.accountTypeID,c.accountType,b.departmentID, b.departmentName FROM tbl_users AS a INNER JOIN tbl_department AS b INNER JOIN tbl_account_type AS c ON a.role=c.accountTypeID AND a.departmentID=b.departmentID");

                while($rowUser = mysqli_fetch_assoc($getUser)){

                    $db_firstName = $rowUser["firstName"];
                    $db_lastName = $rowUser["lastName"];
                    $db_middleName =$rowUser["middleName"];
                    $db_fullName = $rowUser["firstName"]. " " . $rowUser["lastName"];
                    $db_role = $rowUser["accountType"];
                    $db_roleID = $rowUser["accountTypeID"];
                    $db_department = $rowUser["departmentName"];
                    $db_departmentID = $rowUser["departmentID"];
                    $db_userID = $rowUser["userID"];
                    $db_contactNum = $rowUser["phoneNumber"];
                    $db_email = $rowUser["email"];
                    $db_address = $rowUser["adress"];
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
                            <td hidden>$db_roleID</td>
                            <td hidden>$db_contactNum</td>
                            <td hidden>$db_userID</td>
                            <td hidden>$db_email</td>
                            <td hidden>$db_address</td>
                            <td hidden>$db_departmentID</td>
                            <td hidden>$db_firstName</td>
                            <td hidden>$db_lastName</td>
                            <td hidden>$db_middleName</td>

                            <td>
                            <button type='button' class='btn btn-outline-primary updateBtn' onclick='modalOpen($count+2)'>
                            <i class='fas fa-edit'></i>
                            </button>
                            <a href='?jScript=$jScript && newScript=$newScript && getDelete=$getDelete && userID=$db_userID' class='btn btn-outline-danger'><i class='fas fa-trash'></i></a>
                            </td>
                                
                        </tr>
                                    
                    ";
                                    
                }
                ?> 