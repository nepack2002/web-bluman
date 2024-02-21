<?php
session_start();
include 'config/database.php';

// Initialize the $error variable
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate input (you can add more validation as needed)
        if (empty($email) || empty($password)) {
            $error = "Please fill in all login information";
        } else {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $_SESSION['email'] = $user['email'];
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                // Additional information if needed
            } else {
                $error = "Incorrect login credentials";
            }
        }
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
    <!-- Jquery -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style_header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/style_footer.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <?php require "./components/header.php" ?>
    </header>
    <div class="container login">
        <?php 
        if (!isset($_SESSION['email'])) {
        ?>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="login.php" method="post">
                    <h1 class="text-center mb-4">LOGIN</h1>
                    <div class="error">
                        <?php 
                        if(!empty($error)){
                        echo "<input type='text' class='form-control mb-2' value='$error' disabled>";
                        }
                    ?>
                    </div>

                    <div class="mb-4">
                        <label for="user" class="form-label">EMAIL</label>
                        <input type="text" class="form-control" id="email" name="email" autocomplete="off">
                    </div>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="password" class="form-label">PASSWORD</label>
                            <a href="forgot_password.php" class="text-black-50">Forgot password?</a>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn" name="login">SIGN IN</button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="register.php" class="text-black-50">Create account</a>
                    </div>
                </form>
            </div>
        </div>
        <?php 
        } else {
        ?>
        <!-- Thông tin người dùng -->
        <div class="account">
            <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
            <a href="change_password.php" class="btn-change mt-3 btn-dark btn">Change Password</a>

            <a href="logout.php" class="btn-logout mt-3 btn-dark btn">LOG OUT</a>
        </div>
        <?php 
        }
        ?>
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
<script>
// Clear input values on page load
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('email').value = '';
    document.getElementById('password').value = '';
});
</script>

</html>