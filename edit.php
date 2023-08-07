<?php
include ("db.php");
if(isset($_POST['id'])){
    $id=$_POST['id'];

$sql="SELECT * from studenttable where id='$id'";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);
   
   echo json_encode($row);
}

   

?>