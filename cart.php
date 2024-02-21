<?php
session_start();
include 'config/database.php';

$user_id = $_SESSION['user_id'];

if (isset($_POST['delete']) && isset($_POST['product_id'])) {
    $delete_product_id = $_POST['product_id'];

    // Lấy thông tin số lượng hiện tại của sản phẩm trong giỏ hàng
    $quantityQuery = "SELECT quantity FROM cart WHERE user_id = :user_id AND product_id = :product_id";
    $quantityStmt = $connection->prepare($quantityQuery);
    $quantityStmt->bindParam(':user_id', $user_id);
    $quantityStmt->bindParam(':product_id', $delete_product_id);
    $quantityStmt->execute();

    if ($quantityStmt->rowCount() > 0) {
        $current_quantity = $quantityStmt->fetch(PDO::FETCH_ASSOC)['quantity'];

        // Nếu số lượng là 1, thì xóa sản phẩm hẳn khỏi giỏ hàng
        if ($current_quantity == 1) {
            $deleteQuery = "DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id";
            $deleteStmt = $connection->prepare($deleteQuery);
            $deleteStmt->bindParam(':user_id', $user_id);
            $deleteStmt->bindParam(':product_id', $delete_product_id);

            if ($deleteStmt->execute()) {
                // Redirect hoặc thực hiện các hành động khác sau khi xóa
                header("Location: cart.php");
                exit();
            } else {
                // Xử lý lỗi nếu cần
                echo "Error deleting product from cart.";
            }
        } else {
            // Nếu số lượng lớn hơn 1, giảm số lượng đi 1
            $updateQuery = "UPDATE cart SET quantity = quantity - 1 WHERE user_id = :user_id AND product_id = :product_id";
            $updateStmt = $connection->prepare($updateQuery);
            $updateStmt->bindParam(':user_id', $user_id);
            $updateStmt->bindParam(':product_id', $delete_product_id);

            if ($updateStmt->execute()) {
                // Redirect hoặc thực hiện các hành động khác sau khi giảm số lượng
                header("Location: cart.php");
                exit();
            } else {
                // Xử lý lỗi nếu cần
                echo "Error updating quantity in cart.";
            }
        }
    } else {
        // Xử lý lỗi nếu không tìm thấy thông tin số lượng
        echo "Error getting quantity information.";
    }
}
$selectQuery = "SELECT * FROM cart WHERE user_id = :user_id";
$selectStmt = $connection->prepare($selectQuery);
$selectStmt->bindParam(':user_id', $user_id);
$selectStmt->execute();
if (isset($_POST['place_order'])) {
    // Lấy thông tin từ form
    $total = $_POST['total'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];

    // Tạo truy vấn để chèn thông tin đặt hàng vào bảng order
    $insertOrderQuery = "INSERT INTO `order` (total, name, phone, address, note) VALUES ( :total, :name, :phone, :address, :note)";
    $insertOrderStmt = $connection->prepare($insertOrderQuery);
    $insertOrderStmt->bindParam(':total', $total);
    $insertOrderStmt->bindParam(':name', $name);
    $insertOrderStmt->bindParam(':phone', $phone);
    $insertOrderStmt->bindParam(':address', $address);
    $insertOrderStmt->bindParam(':note', $note);

    if ($insertOrderStmt->execute()) {
        // Xóa dữ liệu trong giỏ hàng sau khi đặt hàng thành công
        $deleteCartQuery = "DELETE FROM cart WHERE user_id = :user_id";
        $deleteCartStmt = $connection->prepare($deleteCartQuery);
        $deleteCartStmt->bindParam(':user_id', $user_id);
        $deleteCartStmt->execute();

        // Redirect hoặc thực hiện các hành động khác sau khi đặt hàng
     //    header("Location: home.php");
         echo '<script>alert("Bạn đã đặt hàng thành công");</script>';
         header("Location: products.php");
        exit();
    } else {
        // Xử lý lỗi nếu cần
        echo "Error placing order.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/style_header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/cart.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <?php require "components/header.php" ?>
    </header>
    <div class="container mt-5">
        <form action="" method="post">
            <table class="table cart-table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">PRODUCT NAME</th>
                        <th scope="col">IMAGE</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">TOTAL PRICE</th>
                        <th scope="col">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    $totalPrice = 0;
                    while ($row = $selectStmt->fetch(PDO::FETCH_ASSOC)) {
                        $cart_product_id = $row['product_id'];
                        $cart_quantity = $row['quantity'];
                        // Đoạn mã xử lý thông tin từ cart_items ở đây
                        // Ví dụ:
                        // Lấy thông tin sản phẩm từ bảng products (giả sử có)
                        $productQuery = "SELECT * FROM products WHERE product_id = :product_id";
                        $productStmt = $connection->prepare($productQuery);
                        $productStmt->bindParam(':product_id', $cart_product_id);
                        $productStmt->execute();
                        $productInfo = $productStmt->fetch(PDO::FETCH_ASSOC);

                         // Tính tổng tiền cho từng sản phẩm
                        $subtotal = $productInfo['price'] * $cart_quantity;
                        $totalPrice += $subtotal;

                        // Hiển thị thông tin sản phẩm trong bảng
                        echo "<tr>";
                        echo "<th scope='row'>$stt</th>";
                        echo "<td class='align-middle'>{$productInfo['product_name']}</td>";
                        echo "<td class='align-middle'><img src='{$productInfo['image_url']}' alt='{$productInfo['product_name']}' style='max-width: 50px;'></td>";
                        echo "<td class='align-middle'>{$productInfo['price']}</td>";
                        echo "<td class='align-middle'>$cart_quantity</td>";
                        $subtotal = $productInfo['price'] * $cart_quantity;
                        $totalPrice += $subtotal;
                        echo "<td class='align-middle'>$subtotal</td>";
                        echo "<td class='align-middle'>
                              <form action='' method='post'>
                                   <input type='hidden' name='product_id' value='$cart_product_id'>
                                   <button type='submit' class='btn btn-danger' name='delete'>DELETE</button>
                              </form>
                              </td>";
                         echo "</tr>";
                        echo "</tr>";
                        $stt++;
                    }
                    ?>
                    <!-- Dòng tổng tiền -->
                    <tr>
                        <td colspan="5" class="text-end">TOTAL PRICE</td>
                        <td><?php echo "$totalPrice"; ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
            </div>
            <input type="hidden" name="total" value="<?php echo $totalPrice; ?>">
            <button type="submit" class="btn btn-primary mb-3" name="place_order">Đặt hàng</button>
        </form>
    </div>

    <footer>
        <?php require "components/footer.php" ?>
    </footer>
    <script src="./js/home.js?v=<?php echo time(); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Thêm mã JavaScript vào trang của bạn -->
    <script>
    // Sử dụng sessionStorage để kiểm tra xem trang có được load lại hay không
    if (sessionStorage.getItem('reloaded')) {
        // Nếu trang được load lại, xóa dữ liệu trong sessionStorage
        sessionStorage.removeItem('reloaded');

        // Xóa dữ liệu trong form
        document.querySelector('form').reset();
    }

    // Thêm sự kiện khi trang được load lại
    window.onload = function() {
        // Lưu trạng thái load lại vào sessionStorage
        sessionStorage.setItem('reloaded', 'true');
    };
    </script>

</body>

</html>