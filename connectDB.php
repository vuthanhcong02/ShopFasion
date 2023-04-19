<?php
$conn=mysqli_connect("localhost","root","","shopmini");
if(!$conn){
    die("Kết nối thất bại : ". mysqli_connect_error());
}
// echo "Kết nối thành công";
?>