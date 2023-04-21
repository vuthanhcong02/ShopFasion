<?php
require_once '../connectDB.php';
$sql="SELECT * FROM products";
$result = mysqli_query($conn,$sql);

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
    border-bottom: 3px solid black;
  }
  .card{
    margin: 10px 15px;
  }
  .d-flex.flex-wrap.justify-content-center.align-items-center.all-product {
    padding: 0 80px;
}
</style>

<body>
  <div class=" row container mt-4 mb-5 d-flex justify-content-between align-content-center">
    <div class="col-5 mt-2 slogan">
      <div class="d-flex justify-content-center flex-column align-items-end mt-5">
        <p>Fashion is the armor to survice the</p>
        <p>reality of erveryday life</p><label>-Bill Cunningham</label>
        <button class="btn-shop mt-4 ">Shop Now</button>
      </div>
    </div>
    <div class="col-5 mt-2">
      <img src="https://tse3.mm.bing.net/th?id=OIP.vMPAI9pNzggIFpj4BEsjiwHaFj&pid=Api&P=0" />
    </div>
  </div>
  <div>
    <ul class="nav justify-content-center mb-5">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Tất cả sản phẩm</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sản phẩm bán chạy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sản phẩm mới</a>
      </li>
    </ul>
    <div class="d-flex flex-wrap justify-content-center align-items-center all-product">
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <div class="card p-2 border-dark" style="width: 15rem;">
      <img src="../admin/product/img/<?php echo $row['thumbnail'] ?>" class="card-img-top" alt="..."/>
        <div class="card-body">
          <h5 class="card-title fs-6"><?php echo $row['title']?></h5>
          <p class="card-text fs-6"><?php echo $row['decription']?></p>
          <a href="product_Infor.php" class="btn-shop mt-3">Xem thêm</a>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</body>

</html>
