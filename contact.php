<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vender/PHPMailer/src/Exception.php';
require 'vender/PHPMailer/src/PHPMailer.php';
require 'vender/PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['inputMessage'];

    // Kiểm tra nếu có thông tin cần thiết
    if ($name != '' && $email != '' && $message != '') {
        // Kiểm tra địa chỉ email hợp lệ
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();                     
                $mail->Host = 'smtp.gmail.com';                     
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'nepack2002@gmail.com';                     
                $mail->Password   = 'ifsl xxfa xpxx bvvj';                             
                $mail->SMTPSecure = 'ssl';          
                $mail->Port      = 465;   

                $mail->setFrom($email);
                $mail->addAddress('nepack2002@gmail.com');    

                $mail->isHTML(true);
                $mail->Subject = 'Contact Form Submission';
                $mail->Body = "Name: $name <br> Email: $email <br> Message: $message";

                $mail->send();
                'Your message has been sent successfully!';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo 'Enter a valid email address!';
        }
    } else {
        echo 'Please enter full information!';
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
     <link rel="stylesheet" href="./css/contact.css?v=<?php echo time(); ?>">
     <link rel="stylesheet" href="./css/style_header.css?v=<?php echo time(); ?>">
     <link rel="stylesheet" href="./css/style_footer.css?v=<?php echo time(); ?>">
</head>

<body>
     <header>
          <?php require "./components/header.php" ?>
     </header>
     <main>
          <div class="container-contact">
               <header class="h1 text-center m-3">CONTACT US</header>
               <p class="text-center">Need more information? Have a question? No problem. We're here to help. </p>
               <form action="#" method="post">
                    <div class="row mb-3">
                         <div class="col-6">
                              <div class="input-group">
                                   <span class="input-group-text"><i class="fas fa-user"></i></span>
                                   <input type="text" name="name" class="form-control" placeholder="Your Name">
                              </div>
                         </div>
                         <div class="col-6">
                              <div class="input-group">
                                   <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                   <input type="text" name="email" class="form-control" placeholder="Your Email">
                              </div>
                         </div>
                    </div>
                    <div class="mb-3">
                         <textarea class="form-control" id="inputMessage" name="inputMessage"
                              placeholder="Enter your Message" rows="5"></textarea>
                    </div>
                    <div class="btn-area">
                         <button type="submit" name="submit" class="btn btn-dark">Send</button>
                         <span>
                              <?php
                              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                   if (isset($name) && isset($email) && isset($message)) {
                                        if ($name != '' && $email != '' && $message != '') {
                                             if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                                  try {
                                                       // Gửi email và thông báo thành công nếu không có lỗi
                                                       echo 'Your message has been sent successfully!';
                                                  } catch (Exception $e) {
                                                       // Thông báo lỗi nếu có lỗi khi gửi email
                                                       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                                  }
                                             } else {
                                                  // Thông báo lỗi email không hợp lệ
                                                  echo 'Enter a valid email address!';
                                             }
                                        } else {
                                             // Thông báo lỗi nếu thiếu thông tin
                                             echo 'Please enter full information!';
                                        }
                                   }
                              }
                              ?>
                         </span>
                    </div>
               </form>
          </div>
     </main>
     <footer>
          <?php require "components/footer.php" ?>
     </footer>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="./js.about.js"></script>
<script src="./js/header.js"></script>
</html>