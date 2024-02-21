<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vender/PHPMailer/src/Exception.php';
require 'vender/PHPMailer/src/PHPMailer.php';
require 'vender/PHPMailer/src/SMTP.php';


if(isset($_POST['reset_password'])){
    $email = $_POST['email'];

    $mail = new PHPMailer(true);
    
    try {
       
        $mail->isSMTP();                     
        $mail->Host = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'nepack2002@gmail.com';                     
        $mail->Password   = 'ifsl xxfa xpxx bvvj';                             
        $mail->SMTPSecure = 'ssl';          
        $mail->Port       = 465;                               
    
        //Recipients
        $mail->setFrom('nepack2002@gmail.com');
        $mail->addAddress($email);    
        
    
         // Thiết lập nội dung email
         $mail->isHTML(true);
         $mail->Subject = 'Reset Password';
         $reset_link = "http://localhost:8888/shop/reset_password.php?email=$email"; // Thay đổi đường dẫn cho phù hợp
         $mail->Body = 'Click this link to reset your password: <a href="'.$reset_link.'">'.$reset_link.'</a>';
         // Gửi email
         $mail->send();
         echo "Vui lòng kiểm tra email để đặt lại mật khẩu.";
     } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
 }
?>
<!DOCTYPE html>
<html lang="en">

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
     <link rel="stylesheet" href="./css/forgot_password.css?v=<?php echo time(); ?>">
     <link rel="stylesheet" href="./css/style_header.css?v=<?php echo time(); ?>">
     <link rel="stylesheet" href="./css/style_footer.css?v=<?php echo time(); ?>">
</head>

<body>
     <header>
          <?php require "./components/header.php" ?>
     </header>
     <div class="container forgot">
          <form action="forgot_password.php" method="post">
          <h1 class="text-center mb-2">Reset your password</h1>
               <p class="text-center mb-4">We will send you an email to reset your password.</p>
               <div class="mb-4">
                    <label for="user" class="form-label">EMAIL</label>
                    <input type="text" class="form-control" id="email" name="email" required>
               </div>
               <button type="submit" name="reset_password" class="btn btn-dark">SUBMIT</button>
          </form>
     </div>

     <footer>
          <?php require "components/footer.php" ?>
     </footer>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="./js/header.js"></script>

</html>