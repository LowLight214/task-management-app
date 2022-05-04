
    <?php

$getMyTasks = mysqli_query($conn,"SELECT * FROM tbl_task WHERE departmentID=$departmentID AND taskStatus='Completed'");
    if(mysqli_num_rows($getMyTasks)>0){
        while($rowTasks = mysqli_fetch_assoc($getMyTasks)){

            $db_taskName = $rowTasks["taskName"];
            
                
            echo "
                <div class='todo-item'> 
                    <td><center>$db_taskName</center></td>
                </div>
            "; 
        }
    }
    else{
        echo "
            <div class='todo-item'> 
                <td><center>NO COMPLETED TASK</center></td>
            </div>
        ";
    }

?>