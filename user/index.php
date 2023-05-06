<?php
// require_once '../connectDB.php';
// $sql = "SELECT * FROM products";
// $result = mysqli_query($conn, $sql);
// $sql1 = "SELECT name FROM category";
// $result1 = mysqli_query($conn, $sql1);
// $row1 = mysqli_fetch_assoc($result1);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Fashion</title>
</head>
<style>
  .slogan p {
    font-size: 20px;
    font-weight: 600;
    color: gray;
  }

  .btn-shop {
    border: 1px solid black;
    padding: 10px 30px;
    background-color: black;
    font-weight: 600;
    color: white;
    text-decoration: none;
  }

  .btn-shop:hover {
    background-color: white;
    color: black;
    font-weight: 600;
  }

  .nav li a {
    font-size: 18px;
    font-weight: bold;
    color: black;

  }

  .nav li {
    border-bottom: 3px solid blue;
  }

  .card {
    margin: 10px 15px;
  }

  .d-flex.flex-wrap.justify-content-center.align-items-center.all-product {
    padding: 0 80px;
  }

  img.card-img-top {
    height: 200px;
  }

  .container-fluid {
    padding: 10px 100px !important;
  }

  ul.navbar-nav.me-auto.mb-2.mb-lg-0 {

    margin-left: 100px;
  }

  li.nav-item {
    font-size: 15px;
    margin-right: 50px;
  }

  button.cart-text {
    margin-left: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    outline: none;
    color: black;
  }

  .cart-text a,
  svg {
    color: white !important;
    text-decoration: none;
    font-size: 16px;
    margin-left: 10px;
  }

  .cart-text a,
  svg :hover {
    color: white !important;
    font-weight: 600 !important;
  }

  .cart-text svg {
    margin-top: 2px;
    margin-left: 5px;
  }
</style>

<body>
  <?php 
  include 'header.php';
  ?>
  <?php include 'content.php'?>
  <?php
  include 'footer.php';
  ?>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
</body>

</html>