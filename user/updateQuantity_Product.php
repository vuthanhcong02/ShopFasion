<?php 
    require_once '../connectDB.php';
    if(isset($_POST['id'])&&isset($_POST['quantity'])&&isset($_POST['price'])&&isset($_POST['size'])&&isset($_POST['product_id'])){
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $price=$_POST['price'];
        $size =$_POST['size'];
        $product_id =$_POST['product_id'];
        $new_total = $price*$quantity;
        $sql_refresh="UPDATE order_details SET quantity = $quantity ,total_money=$new_total WHERE product_id= $product_id AND size=$size";
        mysqli_query($conn,$sql_refresh);   
        header("Location: cart.php");
    }
    else{
        $id='';
        $quantity='';
        $price='';
        $size='';
    }
    
    // echo "$id<br>";
    // echo "$quantity"; 
?>