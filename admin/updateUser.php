<?php
require_once '../connectDB.php';
$id = $_GET['id'];
echo "$id";
$username = $_POST['username'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$sqlUpdate_User  = "UPDATE accounts SET username = '$username' , fullname='$fullname' , email = '$email' WHERE accounts.id=$id";
$result = mysqli_query($conn,$sqlUpdate_User);
if($result){
    header("Location: users.php");
}



?>