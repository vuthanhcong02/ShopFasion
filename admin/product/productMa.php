<?php
require_once '../../connectDB.php';
// phan trang
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$limit = 4;
$offset = ($page - 1) * $limit;
//Xac dinh tong so trang
$sql_count = "SELECT COUNT(id) AS total FROM products";
$result_count = mysqli_query($conn,$sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_products = $row_count['total'];
$total_pages = ceil($total_products/$limit);

$selectCategory = "SELECT *FROM category";
$sqlSelect = "SELECT products.id,title,thumbnail,price,decription,products.created_at,products.updated_at,category.name categoryname FROM products JOIN category ON products.id_category=category.id ORDER BY products.id LIMIT $limit OFFSET $offset ";
$result = mysqli_query($conn, $sqlSelect);
$resultNameCategory = mysqli_query($conn, $selectCategory);


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Quản lí</title>
</head>

<body>
    <div class="container">

        <h5 class="mt-4 mb-3">Thông tin Sản phẩm</h5>
        <div class="d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-success mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Thêm sản phẩm
            </button>
            <div>
                <a class="btn btn-primary text-white" href="../category/categoryMa.php" id="link-quan-ly-san-pham"><-Quản lí danh mục</a>
                        <a class="btn btn-primary text-white" href="../../FE/index.php" id="home">Home-></a>
            </div>
        </div>

        <table class="table border">
            <thead class="table-dark">
                <tr>
                    <th class="text-center" scope="col">id</th>
                    <th class="text-center" scope="col">Tên sản phẩm</th>
                    <th class="text-center" scope="col">Ảnh</th>
                    <th class="text-center" scope="col">Giá</th>
                    <th class="text-center" scope="col">Danh mục</th>
                    <th class="text-center" scope="col">Mô tả</th>
                    <th class="text-center" scope="col">Ngày cập nhập</th>
                    <th class="text-center" scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                    <tr>
                        <td class="text-center"><?php echo ($row['id']); ?></td>
                        <td class="text-center"><?php echo ($row['title']); ?></td>
                        <td class="text-center"><img src="img/<?php echo ($row['thumbnail']); ?>" width="150px" height="130px" style="object-fit: cover;" /></td>
                        <td class="text-center"><?php echo ($row['price']); ?></td>
                        <td class="text-center"><?php echo ($row['categoryname']); ?></td>
                        <td class="text-center"><?php echo ($row['decription']); ?></td>
                        <td class="text-center"><?php echo (date('H:i | d/m/Y', strtotime($row['updated_at']))); ?></td>

                        <td class="text-center">
                            <a href="Edit.php?id=<?php echo ($row['id']) ?>" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('Ban co muon xoa khong ?');" href="delete.php?id=<?php echo ($row['id']) ?>" class="btn btn-danger">Xóa</a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>
        <nav aria-label="Page navigation example" style="margin-top:20px;" class="d-flex justify-content-end align-content-end">
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
                echo  '<li class="page-item active" style="z-index:-9999;"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
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
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thông tin sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="insert.php" enctype="multipart/form-data">
                        <div class="mt-4">
                            <label for="exampleInputName" class="form-label text-left">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập tên sản phẩm..." name="title" required>
                        </div>
                        <div class="mt-2">
                            <label for="thumbnail" class="form-label text-left">Ảnh</label>
                            <input type="file" class="form-control" id="thumbnail" placeholder="Chọn ảnh..." name="thumbnail" value="<?php echo $row['thumbnail'] ?>" required>
                            <img class="mt-2" src="<?php echo $row['thumbnail'] ?>" width="250px" style="object-fit: cover;" height="300px" id="img_thumbnail" />
                        </div>
                        <div class="mt-2">
                            <label for="exampleInputName" class="form-label text-left">Giá</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập giá..." name="price" required>
                        </div>
                        <div class="mt-2">
                            <label for="exampleInputName" class="form-label text-left">Danh mục</label>
                            <select class="form-select form-select" aria-label=".form-select-sm example" name="id_category" required>
                                <option value="default" checked>Chọn danh mục...</option>
                                <?php while ($categoryName = mysqli_fetch_assoc($resultNameCategory)) : ?>
                                    <option value="<?php echo $categoryName['id'] ?>"><?php echo $categoryName['name'] ?></option>
                                <?php endwhile; ?>

                            </select>
                        </div>
                        <div class="mt-2">
                            <label for="exampleInputName" class="form-label text-left">Mô tả</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Nhập ghi chú..." name="decription">
                        </div>
                        <div class="mt-2 mb-2">
                            <label for="exampleInputDate" class="form-label">Ngày cập nhập</label>
                            <input type="datetime-local" class="form-control" id="exampleInputQue" placeholder="Ngày update..." name="updated_at" required>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-success mt-4 mb-3">Thêm Sản phẩm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        const input = document.querySelector('input[type="file"]');
        input.addEventListener('change', function() {
            // Đọc file hình ảnh được chọn
            const file = this.files[0];
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                // Hiển thị hình ảnh được chọn
                const img = document.getElementById('img_thumbnail');
                img.src = reader.result;
            });
            reader.readAsDataURL(file);
        });
    </script>
</body>