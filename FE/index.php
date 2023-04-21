<?php
require_once '../connectDB.php';
  $sql="SELECT * FROM products";
$result = mysqli_query($conn,$sql);
$sql1 = "SELECT name FROM category";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);
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
    border-radius: 5px;
    outline: none;
  }

  .cart-text a {
    color: gray;
    text-decoration: none;
    font-size: 16px;
    margin-left: 10px;
  }

  .cart-text:hover {
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
  //  include './header/index.php' 
  ?>
  <?php /*include_once './content_page/index.php'*/ ?>
  <!-- Optional JavaScript; choose one of the two! -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Category</a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu category-menu" aria-labelledby="navbarDropdown">
              <?php
              $first = true;
              while ($row1 = mysqli_fetch_assoc($result1)) :
                if (!$first) {
                  echo '<li><hr class="dropdown-divider"></li>';
                } else {
                  $first = false;
                }
              // ?>
                 <li><a class="dropdown-item" href="#"><?php echo $row1['name']; ?></a></li>
               <?php endwhile; ?>
            </ul>

          <li class="nav-item">
            <a class="nav-link" href="#">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <button class="fs-5 cart-text btn btn-outline-success">
          <a class="" href="#">Cart</a>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </svg>
        </button>
      </div>
    </div>
  </nav>

<!--content-->  
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
        <div class="card p-3" style="width: 16rem;">
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