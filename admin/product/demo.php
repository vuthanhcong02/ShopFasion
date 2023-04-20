<?php
require_once '../../connectDB.php';
if(isset($_POST['upload'])){
   $file_name = $_FILES['image']['name'];
   $file_type = $_FILES['image']['type'];
   $file_size = $_FILES['image']['size'];
   $file_tmp = $_FILES['image']['tmp_name'];
   
   // Kiểm tra định dạng file hợp lệ
   $allowed_extensions = array("jpg","jpeg","png","gif");
   $extension = pathinfo($file_name, PATHINFO_EXTENSION);
   if(!in_array($extension,$allowed_extensions)){
      echo "Chỉ được phép upload các định dạng JPG, JPEG, PNG & GIF";
   }else{
      // Mã hóa nội dung file thành chuỗi hex và chèn vào câu truy vấn SQL.
      $imgContent = addslashes(file_get_contents($file_tmp));
      $sql = "INSERT INTO products(thumbnail) VALUES('$imgContent')";
      // Thực thi câu truy vấn
      mysqli_query($conn, $sql) or die("Error in Query: " . mysqli_error($conn)); 
      echo "File được tải lên thành công";
   }
}
// Tạo kết nối đến cơ sở dữ liệu

// Lấy thông tin ảnh từ cơ sở dữ liệu
$sql1 = "SELECT thumbnail FROM products WHERE products.id=37"; // Thay $id bằng ID của record cần hiển thị ảnh
$result1 = mysqli_query($conn, $sql1);
echo "<table>";
// Hiển thị các ảnh
while ($row = mysqli_fetch_assoc($result1)){
   echo "<tr>";
   echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['thumbnail']) . "'/></td>";
   echo "</tr>";
}
echo "</table>";

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);


?>

