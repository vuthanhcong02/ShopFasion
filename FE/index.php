<?php
// $conn=mysqli_connect("localhost","root","","shopmini");
// if(!$conn){
//     die("Kết nối thất bại : ". mysqli_connect_error());
// }
// else{
require_once '../connectDB.php';
  $sql="SELECT * FROM products";
$result = mysqli_query($conn,$sql);
// }
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
  .card{
    margin: 10px 15px;
  }
  .d-flex.flex-wrap.justify-content-center.align-items-center.all-product {
    padding: 0 80px;
}
img.card-img-top {
    height: 200px;
}
</style>
<body>
  <?php include './header/index.php' ?>
  <?php /*include_once './content_page/index.php'*/ ?>
  <!-- Optional JavaScript; choose one of the two! -->
  <div class=" row container mt-4 mb-5 d-flex justify-content-between align-content-center">
    <div class="col-5 mt-2 slogan">
      <div class="d-flex justify-content-center flex-column align-items-end">
        <p>Fashion is the armor to</p>
        <p>survice the reality</p>
        <p>of erveryday life</p><label>-Bill Cunningham</label>
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
        <div class="card p-3" style="width: 13rem;">
          <img src="../admin/product/img/<?php echo $row['thumbnail'] ?>" class="card-img-top" alt="..." />
          <div class="card-body">
            <h6 class="card-title"><?php echo $row['title'] ?></h6>
            <p class="card-text"><?php echo $row['decription'] ?></p>
            <a href="#" class="btn-shop mt-2">Xem thêm</a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <?php
  include './footer/index.php';
  ?>
</body>

</html>