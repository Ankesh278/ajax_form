<?php
include ('db.php');
$sql="SELECT * FROM studenttable ";
$result=mysqli_query($conn,$sql);
?>
<?php

while($row=mysqli_fetch_assoc($result)){
 
?>

     <tr class="text-center">
    <td><?php echo$row['id'] ?></td>
    <td><?php echo$row['name'] ?></td>
    <td><?php echo$row['email'] ?></td>
    <td><?php echo$row['phone'] ?></td>
    <td><?php echo$row['password'] ?></td>
    <td><button class="btn btn-warning text-center"value="<?php echo $row['id']; ?>" id="Edit">update</button></td>
    <td><button class="btn btn-danger text-center" value="<?php echo $row['id']; ?>" id="Delete">Delete</button></td>
    
</tr>

      
<?php
}
?>

    
