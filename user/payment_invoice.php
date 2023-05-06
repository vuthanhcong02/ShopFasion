<?php
include 'header.php'; 
?>
<?php
require_once '../connectDB.php';
$user_id =$_SESSION['user_id'];
if(isset($_POST['payment'])&& isset($_POST['phone'])&&isset($_POST['fullname'])&&isset($_POST['email'])&&isset($_POST['address'])){
    $fullname = $_POST['fullname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $created_at =$full_time = date('Y-m-d H:i:s');
    $sql = "UPDATE orders SET fullname ='$fullname',phone = $phone,email='$email',address='$address',order_date='$created_at' WHERE user_id = $user_id";
    mysqli_query($conn,$sql);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Checkout</title>
</head>

<style>
    .btn-shop {
        border: 1px solid black;
        padding: 10px 30px;
        background-color: black;
        font-weight: 600;
        color: white;
        text-decoration: none;
        margin-left: 10px;
    }

    .btn-shop:hover {
        background-color: white;
        color: black;
        font-weight: 600;
    }

</style>
<body>
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <h4>Cảm ơn bạn đã xác nhận chúng tôi sẽ sớm liên hệ lại với bạn</h4>
    </div>




        <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

<script>
</script>

</html>
<?php
include 'footer.php';
?>