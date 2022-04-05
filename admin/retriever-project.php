<div class="card-body">
    <div class="table-responsive">
        <table id="projTableId" class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Project</th> 
                    <th>Progress</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                        
                <?php
                                
                $count = 0;

                $getProject = mysqli_query($conn,"SELECT * FROM tbl_project");

                while($rowProject = mysqli_fetch_assoc($getProject)){
                                    
                    $db_projectName = $rowProject["projectTitle"];
                    $db_status = $rowProject["projectStatus"];
                    $db_progress = $rowProject["projectProgress"];
                    $db_endDate = $rowProject["endDate"];
                    $count++;

                    echo "
                        <tr onclick='tryFunction()'>
                            <th scope='row'>$count</th>
                            <td>$db_projectName</td>
                    ";

                ?>

                <th><progress id="file" value="<?php echo $db_progress; ?>" max="100">50%</progress></th>
                            
                <?php
                    echo "  <td>$db_endDate</td>
                            <td>$db_status</td>

                            <td>
                                <a href='#' class='btn btn-outline-primary'><i class='fas fa-edit'></i></a>
                                <a href='#' class='btn btn-outline-danger'><i class='fas fa-trash'></i></a>
                            </td>
                                
                        </tr>
                                    
                    ";
                                    
                }
                ?>                                                                                           
        </table>
    </div>
</div>