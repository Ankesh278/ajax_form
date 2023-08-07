<?php
include('db.php');
if(isset($_POST['id'])){
$id=$_POST['id'];
$sql="DELETE from studenttable where id='$id'";


if(mysqli_query($conn,$sql)){
    echo"<script type='text/JavaScript'>alert('Deleted successfully',$id);</script>";
}}
?>