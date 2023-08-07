<?php
include ('db.php');
print_r($_POST);
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$password=$_POST["password"];
$id=$_POST['id'];

$p=strlen($phone);

if($id !='Undefined' && $id )
{
$sql="UPDATE studenttable SET name='$name',email='$email',phone='$phone',password='$password' WHERE id='$id'";

}
else{
$sql="INSERT into studenttable (name,email,phone,password) values('$name','$email','$phone','$password')";
}

$result=mysqli_query($conn,$sql);
if($result)
{
    echo"added successfully";
}

?>