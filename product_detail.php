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
     <link rel="stylesheet" href="./css/product_detail.css?v=<?php echo time(); ?>">
     <link rel="stylesheet" href="./css/style_header.css?v=<?php echo time(); ?>">
     <link rel="stylesheet" href="./css/style_footer.css?v=<?php echo time(); ?>">
</head>
<body>
     <header>
          <?php require "./components/header.php" ?>
     </header>
     <main>
          <div class="product_detail">
               <div class="container mt-5 mb-5">
                    <div class="row">
                          <!-- cột trái -->
                         <div class="col-lg-6">
                              <div class="images p-3">
                                   <div class="text-center p-4">
                                        <img id="main-image" class="a " src="./img/sp1.webp"/>
                                   </div>
                                   <div class="thumbnail text-center">
                                        <img onclick="change_image(this)" src="./img/sp1_1.webp" width="100">
                                        <img onclick="change_image(this)" src="./img/sp1_2.webp" width="100">
                                        <img onclick="change_image(this)" src="./img/sp1_3.webp" width="100">
                                        <img onclick="change_image(this)" src="./img/sp1_4.webp" width="100">
                                        <img onclick="change_image(this)" src="./img/sp1.webp" width="100">
                                   </div>
                              </div>
                         </div>
                         <!-- end cột trái -->
                         <!-- cột phải -->
                         <div class="col-lg-6">
                              <div class="p-4">
                                   <div class="mt-3 mb-5">
                                        <h5 class="text-uppercase">REBOUND CURL DEFINING CREAM</h5>
                                   </div>
                                   <div class="type-wrapper d-flex my-3">
                                        <div class="type-item">
                                             <span>Anti-Frizz</span>
                                        </div>
                                        <div class="type-item">
                                             <span>Anti-Frizz</span>
                                        </div>
                                        <div class="type-item">
                                             <span>Anti-Frizz</span>
                                        </div>
                                   </div>
                                   <p class="about">A curl-enhancing hair cream that adds definition and light hold to
                                        natural curls. Perfect for those with wavy or curly hair. Add this lightweight
                                        cream to damp, towel-dried hair and either gently scrunch with your hands before
                                        airdrying, or follow with a diffuser.</p>
                                   <ul>
                                        <li>Adds bounce and body to natural texture</li>
                                        <li>Minimizes frizz for more defined waves and curls</li>
                                        <li>Uses healthy hair ingredients to moisturize for softer, healthier-looking
                                             hair</li>
                                        <li>Adds a natural, low-shine finish to styled hair.</li>
                                        <li>Cruelty-free, 100% recyclable packaging, and made in the USA without
                                             parabens, sulfates, phthalates, silicones or aluminum</li>
                                   </ul>
                                   <div class="cart mt-4 align-items-center">
                                        <button class="btn text-uppercase">Add to cart</button>
                                   </div>
                              </div>
                         </div>
                         <!-- end cột phải -->
                    </div>
               </div>
          </div>
     </main>

     <footer>
          <?php require "./components/footer.php" ?>
     </footer>
     <!-- Bootstrap JavaScript Libraries -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
          integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
     </script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
          integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
     </script>
</body>
<script>
function change_image(image) {
     var container = document.getElementById("main-image");
     container.src = image.src;
}
document.addEventListener("DOMContentLoaded", function(event) {});
</script>
<script src="header.js?v=<?php echo time(); ?>"></script>
<script>
    function change_image(image) {
    var mainImage = document.getElementById("main-image");

    mainImage.src = image.src;
    mainImage.classList.add('zoom-in');

    setTimeout(function() {
        mainImage.classList.remove('zoom-in');
    }, 500); // Xóa lớp 'zoom-in' sau 1 giây (1000ms)
}
</script>
</html>