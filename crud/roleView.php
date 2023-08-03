<?php
 include "crud-function.php"; 
 $con=new Dbconnection();
    $managerId=$_REQUEST['managerId'];
    echo $managerId;
    $sql="SELECT users.name FROM users LEFT JOIN roles ON roles.employee_id=users.id WHERE manager_id='28'";
    $query=mysqli_query($con->getconnection(),$sql) or die(mysqli_error($con->getconnection()));
    ?>
    <table class="table">
        <thead>
        <tr>
            <th>Sr.No.</th>
            <th>Employee Name</th>
        </tr>
        </thead>
        <tbody>
            <?php 
            $s=1;
            while($output=mysqli_fetch_array($query))
            {?>
        <tr>
            <td><?php echo $s++;?></td>
            <td><?php echo $output["name"] ?></td>
        </tr>
            <?php
            }
            ?>
        </tbody>
    </table>