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
     <link rel="stylesheet" href="./css/about.css?v=<?php echo time(); ?>">
     <link rel="stylesheet" href="./css/style_header.css?v=<?php echo time(); ?>">
     <link rel="stylesheet" href="./css/style_footer.css?v=<?php echo time(); ?>">
</head>

<body>
     <header>
          <?php require "./components/header.php" ?>
     </header>
     <main>
          <video class="myVideo" controls autoplay>
               <source src="img/WXRDIE - ALL THESE FEELINGS ft. 2pillz (No One Mastered) _ Official Lyric Video.mp4"
                    type="video/mp4">
               Your browser does not support the video tag.
          </video>
          <div class="our-misson">
               <p class="h2 story-page-title">
                    <span class="story_title_border">Our Mission</span>
               </p>
               <div class="rte wc_desc_rich mt-4" bis_skin_checked="1">

                    <p>When BluMaan started, our mission has always been to help you find your personal style through
                         the power of hair styling. We also believe that in order to achieve the best hairstyle possible
                         your hair needs to be at optimum health. All our products are made in the USA with ingredients
                         that will nourish your hair and are safe to use on a daily basis.</p>
                    <p>We are here to help and guide you to achieve a look that is unique to you - through information
                         and products that are catered for you.</p>
               </div>
          </div>
          <div class="feature-row-left">
               <div class="image-container" id="image">
                    <img src="img/Gordon_Hayward_resize_950x.webp" alt="Your Image" />
               </div>
               <div class="text-left-container" id="text">
                    <p class="h2 story-page-title">
                         <span class="story_title_border">OUR COMMITMENT</span>
                    <p class="h3 wc_hr_sub mt-4">Creating quality Products That Work</p>
                    </p>
                    <div class="rte wc_desc_rich" bis_skin_checked="1">

                         <p>With your constant help, we’ve created products that meet specific needs for different hair
                              types. We have proudly created clay, pomade, wax and paste products that continually help
                              shape and mold all sorts of hairstyles.</p>
                         <p>We are committed to creating quality products that work for you. For each product
                              development process, we ideate based on what you want and reiterate based on the feedback
                              we get from our community. That is our commitment to you. &nbsp;</p>
                    </div>
               </div>
          </div>
          <!-- Banner -->
          <div class="banner" id="banner">
          </div>
          <!--End Banner -->
     </main>
     <footer>
          <?php require "components/footer.php" ?>
     </footer>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script src="./js/about.js?v=<?php echo time(); ?>"></script>
<script src="./js/header.js?v=<?php echo time(); ?>"></script>
</html>