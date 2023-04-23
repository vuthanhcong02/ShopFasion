<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Product</title>
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

  .btn-shop-size {
    background-color: white;
    color: black;
    padding: 8px 15px;
    border: 1px solid black;
    margin-right: 10px;
  }

  .btn-shop-size:hover {
    background-color: black;
    color: white;
  }

  /* .row.d-flex.justify-align-content-center.align-items-center {
    padding: 50px;
} */
  .card {
    margin: 10px;
  }
  .product_lienquan{
    padding: 5px 0;
    border-bottom: 2px solid black;
    margin-bottom: 3px;
  }
</style>

<body>
  <?php
  global $conn;
  include './header.php';

  $id = $_GET['id'];
  
 
  
  $sqlInforP = "SELECT *FROM products WHERE products.id=$id";
  $result_Infor = mysqli_query($conn, $sqlInforP);
  $row_Infor = mysqli_fetch_assoc($result_Infor);


  $id_relative =$row_Infor['id_category'];
  $sql_relative_Pro = "SELECT * FROM products JOIN category ON products.id_category = category.id WHERE id_category=$id_relative";
  $querySql_relative = mysqli_query($conn,$sql_relative_Pro);
  $row_Pro_relative = mysqli_fetch_assoc($querySql_relative);
  
  
  ?>
  <div class="container p-2 mt-5 ">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col p-2 d-flex justify-content-center align-items-end">
        <img src="../admin/product/img/<?php echo $row_Infor['thumbnail'] ?>" alt="" />
      </div>
      <div class="col p-2 d-flex justify-content-between align-items-start flex-column">
        <div class="">
          <div class="mb-3 d-flex flex-column justify-content-center align-content-center">
            <div class="fs-6 fw-bold">Name : </div>
            <div class=""><?php echo $row_Infor['title'] ?></div>
          </div>
          <div class="mb-3 d-flex flex-column justify-content-center align-content-center">
            <p class="fs-6 fw-bold">Mô tả : </p>
            <p class=""><?php echo $row_Infor['decription'] ?></p>
          </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3">
          <p class="fs-6 fw-bold">Giá : </p>
          <p style="margin-left: 50px;"><?php echo number_format($row_Infor['price'],0,",",".")." VND" ?></p>
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3">
          <p class="fs-6 fw-bold">Số lượng : </p>
          <div class=" d-flex justify-content-center align-items-center">
            <p class="btn-shop-size" style="margin-left: 10px;">-</p>
            <p class="">0</p>
            <p class="btn-shop-size" style="margin-left: 10px;">+</p>
          </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3">
          <p class="fs-6 fw-bold">Size : </p>
          <div class="d-flex justify-content-center align-items-center" style="margin-left: 46px;">
            <p class="btn-shop-size">38</p>
            <p class="btn-shop-size">39</p>
            <p class="btn-shop-size">40</p>
            <p class="btn-shop-size">41</p>
            <p class="btn-shop-size">42</p>
            <p class="btn-shop-size">43</p>
          </div>
        </div>
        <button class="btn-shop" style="width: 100%; margin-left: 0;">Thêm vào giỏ hàng</button>
      </div>
    </div>
    <div>
      <div class="fs-5 fw-bold mt-4 product_lienquan mb-4">Các sản phẩm liên quan</div>
      <div class="d-flex flex-wrap justify-content-start align-items-center">
      <?php while (  $row_Pro_relative = mysqli_fetch_assoc($querySql_relative)) : ?>
        <div class="card" style="width: 16rem; height:25rem;">
            <img src="../admin/product/img/<?php echo $row_Pro_relative['thumbnail']?>" class="card-img-top" alt="..." height="250px" style="object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title fs-6 p-1"><?php echo $row_Pro_relative['title']?></h5>
              <p class="card-text fs-6 mb-3 p-1"><?php echo number_format($row_Pro_relative['price'],0,",",".")." VND";?></p>
              <a href="product_Infor2.php?id=<?php echo $row_Pro_relative['id'] ?>" class="btn-shop">Xem thêm</a>
            </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
<?php
include './footer.php';
?>