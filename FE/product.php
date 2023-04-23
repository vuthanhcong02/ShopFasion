<?php
require_once '../connectDB.php';
global $conn;
$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);
/// phân trang
$limit = 6;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$offset = ($page - 1) * $limit;
// Xác định tổng sóo trang
$sql_count = "SELECT COUNT(id) AS total FROM products";
$result_count = mysqli_query($conn,$sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_products = $row_count['total'];
$total_pages = ceil($total_products/$limit);

if (isset($_GET['category'])) {
  $categoryId = $_GET['category'];
} else {
  $categoryId = 0;
}

if ($categoryId == 0) {
  $sql_product_byCategory = "SELECT *FROM products  LIMIT $limit OFFSET $offset";
} else {
  $sql_product_byCategory = "SELECT *FROM products WHERE products.id_category=$categoryId";
}
$result_product_byCategory = mysqli_query($conn, $sql_product_byCategory);

?>

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

  .btn-product {
    text-decoration: none;
    border: 1px solid black;
    color: black;
    padding: 5px 10px;
    background-color: white;
  }

  .btn-product:hover {
    background-color: black;
    color: white;

  }

  .card {
    margin: 8px;
  }

  .active {
    background-color: white !important;
    color: blue !important;
  }
</style>

<body>
  <?php
  include 'header.php';
  ?>
  <div class="container border p-3 mt-5">
    <div class="row d-flex justify-content-between align-items-start">
      <section class="col-2 p-2">
        <p class="mt-2 fw-bold">CATEGORIES</p>
        <hr />
        <ul class="nav flex-column border">
          <?php
          $first = true;
          while ($row =  mysqli_fetch_assoc($result)) :
            if (!$first) {
              echo '<li><hr class="dropdown-divider"></li>';
            } else {
              $first = false;
            }
          ?><?php
            if ($categoryId == $row['id']) {
              echo '<li><a class="dropdown-item active" href="?category=' . $row['id'] . '">' . "->  " . $row['name'] . '</a></li>';
            } else {
              echo '<li><a class="dropdown-item " href="?category=' . $row['id'] . '">' . "->  " . $row['name'] . '</a></li>';
            }
            ?>
        <?php endwhile; ?>
        </ul>
      </section>
      <section class="col-10 p-2">
        <p class="mt-2 fw-bold"><a href="?category=0" style="color: black;text-decoration: none;">TẤT CẢ SẢN PHẨM</a></p>
        <hr />
        <div class="border d-flex flex-wrap justify-content-start align-items-center">
          <?php while ($row_result_product_byCategory =  mysqli_fetch_assoc($result_product_byCategory)) : ?>
            <div class="card" style="width: 10rem; height:16rem;">
              <img src="../admin/product/img/<?php echo $row_result_product_byCategory['thumbnail'] ?>" class="card-img-top" alt="..." height="120px" style="object-fit: contain;">
              <div class="card-body">
                <h5 class="card-title fs-6"><?php echo $row_result_product_byCategory['title'] ?></h5>
                <p class="card-text fs-6"><?php echo $row_result_product_byCategory['price'] ?></p>
                <a href="product_Infor.php?id=<?php echo $row_result_product_byCategory['id'] ?>" class="btn-product">Xem thêm</a>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <nav aria-label="Page navigation example" style="margin-top: 30px;" class="d-flex justify-content-end">
          <ul class="pagination">
            <?php
            if($page>1)
              {
                echo '<li class="page-item"><a class="page-link" href="?page='.($page-1).'" aria-label="Previous"><span aria-hidden="false">&laquo;</span></a></li>';
             }
            ?>
            <!-- <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="false">&laquo;</span>
                </a
              </li> -->
            <?php
              for($i=1;$i<=$total_pages;$i++){
                if($page==$i){
                echo  '<li class="page-item active"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                }
                else{
                  echo  '<li class="page-item "><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                }
              }
            
            ?>
            <?php
            if($page<$total_pages)
              {
                echo '<li class="page-item"><a class="page-link" href="?page='.($page+1).'" aria-label="Next"><span aria-hidden="false">&raquo;</span></a></li>';
             }
            ?>
          </ul>
        </nav>
      </section>
    </div>

  </div>

  <?php
  include 'footer.php';
  ?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>