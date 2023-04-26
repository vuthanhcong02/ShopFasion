<?php
session_start();
ob_start();
require_once '../connectDB.php';
include('./includes/header.php');
include('./includes/sidebar.php');

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
$result_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_products = $row_count['total'];
$total_pages = ceil($total_products / $limit);

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
<!-- Sidebar -->

<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">3+</span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 12, 2019</div>
                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-donate text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 7, 2019</div>
                                $290.29 has been deposited into your account!
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 2, 2019</div>
                                Spending Alert: We've noticed unusually high spending for your account.
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <!-- Counter - Messages -->
                        <span class="badge badge-danger badge-counter">7</span>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                    problem I've been having.</div>
                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate">I have the photos that you ordered last month, how
                                    would you like them sent to you?</div>
                                <div class="small text-gray-500">Jae Chun · 1d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                <div class="status-indicator bg-warning"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Last month's report looks great, I am very happy with
                                    the progress so far, keep up the good work!</div>
                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                    told me that people say this to all dogs, even if they aren't good...</div>
                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['fullname']?></span>
                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Thông in sản phẩm</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>
                <div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <button type="button" class="btn btn-success mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Thêm sản phẩm
                            </button>
                           
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
                                        <a href="EditProduct.php?id=<?php echo ($row['id']) ?>" class="btn btn-warning">Sửa</a>
                                        <a onclick="return confirm('Ban co muon xoa khong ?');" href="deleteProduct.php?id=<?php echo ($row['id']) ?>" class="btn btn-danger">Xóa</a>
                                    </td>

                                </tr>
                            <?php endwhile; ?>
                        </tbody>

                    </table>
                    <nav aria-label="Page navigation example" style="margin-top:20px;" class="d-flex justify-content-end align-content-end">
                        <ul class="pagination">
                            <?php
                            if ($page > 1) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '" aria-label="Previous"><span aria-hidden="false">&laquo;</span></a></li>';
                            }
                            ?>
                            <!-- <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="false">&laquo;</span>
        </a
      </li> -->
                            <?php
                            for ($i = 1; $i <= $total_pages; $i++) {
                                if ($page == $i) {
                                    echo  '<li class="page-item active"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                } else {
                                    echo  '<li class="page-item "><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                }
                            }

                            ?>
                            <?php
                            if ($page < $total_pages) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '" aria-label="Next"><span aria-hidden="false">&raquo;</span></a></li>';
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
                                <form method="post" action="insertProduct.php" enctype="multipart/form-data">
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


            </div>

            <!-- Content Row -->

            <!-- Content Row -->

        </div>
    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->


<!-- Bootstrap core JavaScript-->

<?php
include('./includes/footer.php');
include('./includes/scripts.php');
?>
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

</html>