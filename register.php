<?php 
session_start();
include 'config/database.php';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    
    // Kiểm tra tính hợp lệ của dữ liệu nhập vào
    if(empty($username) || empty($email) || empty($password) || empty($rpassword)){
        $error = "Please complete all information.";
    } elseif($password !== $rpassword){
        $error = "Passwords do not match. Please try again.";
    } else {
        // Thêm dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $connection->prepare($sql);

        // Bind các giá trị vào câu truy vấn SQL
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Thực hiện thêm dữ liệu
        if($stmt->execute()){
        } else {
            $error = "Đăng ký không thành công. Vui lòng thử lại.";
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
    <link rel="stylesheet" href="./css/register.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style_header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style_footer.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <?php require "./components/header.php" ?>
    </header>
    <div class="container register">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="" method="post" role="form">
                    <h1 class="text-center mb-4">CREATE ACCOUNT</h1>
                    <div class="error">
                        <?php 
                if(isset($error)){
                    echo " <input type='text' class='form-control mb-2' value='$error' disabled>";
                }
                ?>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">USER</label>
                        <input type="text" class="form-control" id="name" name="username">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">EMAIL</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">PASSWORD</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">CONFIRM PASSWORD</label>
                        <input type="password" class="form-control" id="rpassword" name="rpassword">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn" name="register">CREATE</button>
                    </div>
                </form>
            </div>
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
</body>
<script src="./js/header.js"></script>

</html>