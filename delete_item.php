<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id_to_delete = $_POST['product_id'];

    // Kiểm tra xem session giỏ hàng có tồn tại không
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            // Nếu product_id của sản phẩm trong giỏ hàng trùng với product_id cần xóa
            if ($item['product_id'] === $product_id_to_delete) {
                // Xóa sản phẩm khỏi giỏ hàng
                unset($_SESSION['cart'][$key]);
                break; // Dừng vòng lặp sau khi xóa sản phẩm
            }
        }
    }

    // Chuyển hướng người dùng trở lại trang cart.php sau khi xóa
    header('Location: cart.php');
    exit();
} else {
    // Xử lý nếu không có dữ liệu POST hoặc không có product_id được gửi
    // Có thể chuyển hướng người dùng đến trang khác hoặc hiển thị thông báo lỗi
}
?>
