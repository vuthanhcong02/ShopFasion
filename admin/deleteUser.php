<?php
require_once '../connectDB.php';
$id_User = $_GET['id'];

$sqlDel_User = "DELETE FROM accounts WHERE id =$id_User";
mysqli_query($conn,$sqlDel_User);
header('Location: users.php');


?>