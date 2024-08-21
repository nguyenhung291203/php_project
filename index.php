<?php
include_once 'database/connection.php';

// Thực hiện truy vấn để lấy tất cả dữ liệu trong bảng categories
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

// Kiểm tra nếu có kết quả trả về
if ($result->num_rows > 0) {
    // Lặp qua từng hàng và in ra
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "Không có dữ liệu trong bảng categories.";
}