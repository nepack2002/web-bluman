<?php
session_start();
include 'config/database.php';
     $query = "SELECT * FROM products";
     $stmt = $connection->query($query);

   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart']) && isset($_SESSION['user_id'])) {
 if(isset($_SESSION['order_id'])){
          $order_id = $_SESSION['order_id'];
     } else {
          $order_id = "DH" . date("YmdHis") . rand(1000, 9999);
          $_SESSION['$order_id'] = $order_id;
     }

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $user_id = $_SESSION['user_id'];

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng của người dùng hay chưa
    $checkQuery = "SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id";
    $checkStmt = $connection->prepare($checkQuery);
    $checkStmt->bindParam(':user_id', $user_id);
    $checkStmt->bindParam(':product_id', $product_id);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        // Nếu sản phẩm đã tồn tại, cập nhật quantity
        $updateQuery = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = :user_id AND product_id = :product_id";
        $updateStmt = $connection->prepare($updateQuery);
        $updateStmt->bindParam(':user_id', $user_id);
        $updateStmt->bindParam(':product_id', $product_id);

        if ($updateStmt->execute()) {
            header("Location: cart.php");
            exit();
        } else {
            echo "Error updating quantity: " . $updateStmt->errorInfo()[2];
        }
    } else {
     
        // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
        $insertQuery = "INSERT INTO cart (order_id,product_id, quantity, user_id, created_at) VALUES (:order_id,:product_id, 1, :user_id, NOW())";
        $insertStmt = $connection->prepare($insertQuery);
        $insertStmt->bindParam(':order_id', $order_id);
        $insertStmt->bindParam(':product_id', $product_id);
        $insertStmt->bindParam(':user_id', $user_id);
        if ($insertStmt->execute()) {
            header("Location: cart.php");
            exit();
        } else {
            echo "Error inserting into cart_items: " . $insertStmt->errorInfo()[2];
        }
    }
}

?>
<!doctype html>
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
    <!-- Jquery -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style_header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/products.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <?php require "./components/header.php" ?>
    </header>

    <!-- categories -->
    <nav>
        <div class="container items">
            <a href="" class="item active" data-category="all">All</a>
            <?php
    // Lấy danh sách các danh mục từ bảng categories
    $categoryQuery = "SELECT * FROM categories";
    $categoryStmt = $connection->query($categoryQuery);
    while ($category = $categoryStmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<a href="" class="item" data-category="' . $category['category_id'] . '">' . $category['category_name'] . '</a>';
    }
    ?>
        </div>
    </nav>
    <!-- categories -->


    <div class="container product-container">
        <div class="product-wrapper">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="product" data-category="<?= $row["category_id"] ?>">
                <img src="<?= $row["image_url"] ?>" alt="<?= $row["product_name"] ?>">
                <h3><?= $row["product_name"] ?></h3>
                <p>$<?= $row["price"] ?></p>
                <form action="" method="post" class="add-to-cart-form">
                    <input type="hidden" name="product_id" value="<?= $row["product_id"] ?>">
                    <input type="hidden" name="product_name" value="<?= $row["product_name"] ?>">
                    <input type="hidden" name="product_price" value="<?= $row["price"] ?>">
                    <button class="btn add-to-cart" type="submit" name="add_to_cart">ADD TO CART</button>
                </form>
            </div>
            <?php }?>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <footer>
        <?php require "components/footer.php" ?>
    </footer>

    <script src="./js/products.js?v=<?php echo time(); ?>"></script>
    <script src="./js/header.js?v=<?php echo time(); ?>"></script>
</body>

</html>