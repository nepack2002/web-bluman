<?php
session_start();
include 'config/database.php';

if (isset($_POST['change_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    // Lấy thông tin người dùng từ session
    $user_email = $_SESSION['email']; // Lấy email từ session

    // Lấy mật khẩu từ cơ sở dữ liệu
    $sql = "SELECT password FROM users WHERE email = :email";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':email', $user_email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra mật khẩu cũ có đúng không
    if ($user && $old_password === $user['password']) {
        // Kiểm tra mật khẩu mới và mật khẩu xác nhận có khớp nhau không
        if ($new_password === $confirm_password) {
            // Update mật khẩu mới vào cơ sở dữ liệu
            $update_sql = "UPDATE users SET password = :password WHERE email = :email";
            $update_stmt = $connection->prepare($update_sql);
            $update_stmt->bindParam(':password', $new_password);
            $update_stmt->bindParam(':email', $user_email);

            if ($update_stmt->execute()) {
                $success = "Đổi mật khẩu thành công!";
            } else {
                $error = "Đã có lỗi xảy ra. Vui lòng thử lại sau.";
            }
        } else {
            $error = "Mật khẩu mới và mật khẩu xác nhận không khớp.";
        }
    } else {
        $error = "Mật khẩu cũ không đúng.";
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
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style_header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style_footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/change_password.css?v=<?php echo time(); ?>">

</head>

<body>
    <header>
        <?php require "components/header.php" ?>
    </header>
    <div class="container change">
        <h2>Change Password</h2>
        <div class="error">
            <?php 
                if(isset($error)){
                    echo " <input type='text' class='form-control mb-2' value='$error' disabled>";
                }
                ?>
        </div>
        <div class="success">
            <?php 
                if(isset($success)){
                    echo " <input type='text' class='form-control mb-2' value='$success' disabled>";
                }
                ?>
        </div>
        <form action="change_password.php" method="post">
            <div class="mb-3">
                <label for="old_password" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="old_password" name="old_password" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn" name="change_password">Change Password</button>
        </form>
    </div>
</body>
<footer>
    <?php require "components/footer.php" ?>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/header.js"></script>

</html>