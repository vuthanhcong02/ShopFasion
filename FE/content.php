<?php
require_once '../connectDB.php';
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$limit = 10;
$offset = ($page - 1) * $limit;
$sql_A_product = "SELECT * FROM products LIMIT $limit OFFSET $offset";
$result_A_product = mysqli_query($conn, $sql_A_product);
$sql_count_products = "SELECT COUNT(id) as total FROM products";
$result_sql_count = mysqli_query($conn,$sql_count_products);
$row_result_count = mysqli_fetch_assoc($result_sql_count);
$total_count_products = $row_result_count['total'];
$total_page=ceil($total_count_products/$limit);

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

  .card {
    margin: 10px 15px;
    background-color: white;
  }
</style>

<body>
  <div class=" row container mt-4 mb-5 d-flex justify-content-between align-content-center">
    <div class="col-5 mt-2 slogan">
      <div class="d-flex justify-content-center flex-column align-items-end mt-5">
        <p>Fashion is the armor to survice the</p>
        <p>reality of erveryday life</p><label>-Bill Cunningham</label>
        <a class="btn-shop mt-4 " href="../FE/product.php">Shop Now</a>
      </div>
    </div>
    <div class="col-5 mt-2">
      <img src="https://tse3.mm.bing.net/th?id=OIP.vMPAI9pNzggIFpj4BEsjiwHaFj&pid=Api&P=0" />
    </div>
  </div>
  <div>
    <ul class="nav justify-content-center mb-5">
      <li class="nav-item">
        <a class="nav-link" href="#">Sản phẩm mới</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sản phẩm bán chạy</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Tất cả sản phẩm</a>
      </li>
    </ul>
    <div class="d-flex flex-wrap justify-content-center align-items-start all-product">
      <?php while ($row = mysqli_fetch_assoc($result_A_product)) : ?>
        <div class="card p-2" style="width: 15rem;">
          <img src="../admin/product/img/<?php echo $row['thumbnail'] ?>" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title fs-6"><?php echo $row['title'] ?></h5>
            <p class="card-text fs-6"><?php echo number_format($row['price'],0,",",".")." VND" ?></p>
            <a href="product_Infor.php?id=<?php echo $row['id'] ?>" class="btn-shop mt-3">Xem thêm</a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center align-items-center mt-5">
      <ul class="pagination" style="z-index:-9999;">
       <?php
        if($page>1)
         {
          echo '<li class="page-item"><a class="page-link" href="?page='.($page-1).'" aria-label="Previous"><span aria-hidden="false">&laquo;</span></a></li>';
         }

       ?>
        <?php
          for($i=1;$i<=$total_page;$i++){
            if($page==$i){
              echo '<li class="page-item active"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
            }
            else{
              echo '<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
            }
          }
        ?>
        <?php
        if($page<$total_page)
         {
          echo '<li class="page-item"><a class="page-link" href="?page='.($page+1).'" aria-label="Next"><span aria-hidden="false">&raquo;</span></a></li>';
         }
       ?>
      </ul>
    </nav>
  </div>
</body>

</html>