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
</head>

<body>
    <header>
        <?php require "./components/header.php" ?>
    </header>
    <main>
        <!-- Banner -->
        <div class="banner" id="banner">
            <div class="text-container">
                <h1>Welcome to Our Website</h1>
                <p>Discover the secret to effortless, head-turning hairstyles with Nepack's premium grooming
                    essentials
                </p>
                <a href="products.php" class="btn btn-light">SHOP NOW</a>
            </div>
        </div>
        <!--End Banner -->
        <!-- Best Seller -->
        <div class="best-products">
            <div class="head_info text-center">
                <h2>BEST SELLING BUNDLES</h2>
                <p>Real results, simple routines.</p>
            </div>
            <div class="list-product">
                <?php
include 'config/database.php';

// Mảng chứa thông tin sản phẩm
$products = [
    4 => ["name" => "", "price" => ""],
    14 => ["name" => "", "price" => ""],
    11 => ["name" => "", "price" => ""],
    12 => ["name" => "", "price" => ""]
];

// Câu truy vấn SQL để lấy thông tin tên và giá sản phẩm từ cơ sở dữ liệu
$query = "SELECT product_id, product_name, price FROM products WHERE product_id IN (4, 14, 11, 12)";
$stmt = $connection->query($query);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $products[$row['product_id']]['name'] = $row['product_name'];
    $products[$row['product_id']]['price'] = $row['price'];
}
?>

                <!-- Hiển thị thông tin sản phẩm và giữ nguyên ảnh -->
                <div class="container-product">
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="4">
                        <input type="hidden" name="product_name" value="<?= $products[4]['name'] ?>">
                        <input type="hidden" name="product_price" value="<?= $products[4]['price'] ?>">

                        <img src="//blumaan.com/cdn/shop/files/HVTSv2.png?v=1700260673" alt="Ảnh 1" />
                        <p><?= $products[4]['name'] ?></p>

                    </form>
                </div>

                <div class="container-product">
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="14">
                        <input type="hidden" name="product_name" value="<?= $products[14]['name'] ?>">
                        <input type="hidden" name="product_price" value="<?= $products[14]['price'] ?>">

                        <img src="//blumaan.com/cdn/shop/files/THCSv2.png?v=1700260672" alt="Ảnh 2" />
                        <p><?= $products[14]['name'] ?></p>

                    </form>
                </div>

                <div class="container-product">
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="11">
                        <input type="hidden" name="product_name" value="<?= $products[11]['name'] ?>">
                        <input type="hidden" name="product_price" value="<?= $products[11]['price'] ?>">

                        <img src="//blumaan.com/cdn/shop/files/DSKv2.png?v=1700260673" alt="Ảnh 3" />
                        <p><?= $products[11]['name'] ?></p>

                    </form>
                </div>

                <div class="container-product">
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="12">
                        <input type="hidden" name="product_name" value="<?= $products[12]['name'] ?>">
                        <input type="hidden" name="product_price" value="<?= $products[12]['price'] ?>">

                        <img src="//blumaan.com/cdn/shop/files/HHSv2.png?v=1700260673" alt="Ảnh 4" />
                        <p><?= $products[12]['name'] ?></p>

                    </form>
                </div>
            </div>
        </div>
        <!-- End Best Seller -->
        <!-- infinity running banner -->
        <div class="runningbanner">
            <div class="running-text">
                NOURISHES HAIR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GENTLE
                FORMULA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CRUELTY
                FREE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARABEN
                FREE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOURISHES
                HAIR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GENTLE
                FORMULA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CRUELTY
                FREE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARABEN
                FREE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOURISHES
                HAIR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GENTLE
                FORMULA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CRUELTY
                FREE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARABEN
                FREE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOURISHES
                HAIR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GENTLE
                FORMULA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CRUELTY
                FREE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PARABEN
                FREE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </div>
        <!-- End infinity running banner -->

        <!-- newproduct -->
        <a href="product_detail.php?id=1">
            <div class="new-product" id="new=product"></div>
        </a>
        <!-- end newproduct -->

        <div class="end-image">
            <h1>A GOOD HAIR STYLE IS MORE THAN JUST A LOOK</h1>
        </div>

        <!-- Carousel -->
        <div class="carousel-item-2">
            <div class="text-container">
                <h2>"WE STAND FOR CREATING THINGS THAT ARE DIFFIRENT AND TRULY UNIQUE"</h2>
                <p>Take a look at what make Nepack so special and why we're committed to delivering you
                    the
                    best products for your hair</p>
            </div>
        </div>
        <!-- End Carousel -->

        <div class="feature-row-left">
            <div class="image-container">
                <img src="img/premium-is-our-standard-2000x.webp" alt="Your Image" />
            </div>
            <div class="text-left-container">
                <h1 class="mb-3">PREMIUM IS OUR STANDARD</h1>
                <h2>Premium Ingredients</h2>
                <p>Nourish your hair with formulas that feature ingredients known to improve hair health.</p>
                <h2>Designed by Experts</h2>
                <p>Our formulas crafted by experienced chemists, labs and informed by top barber feedback.</p>
                <h2>Community-Tested</h2>
                <p>Each product goes through rigorous testing from our 50,000-strong private online group.</p>
            </div>
        </div>

        <div class="feature-row-right">
            <div class="text-right-container">
                <h1 class="mb-3">STYLING THAT WORKS</h1>
                <h2>Styling For Everyone</h2>
                <p>Whether you have thin hair or a thick, unruly mane, we have a styling solution for any and
                    all
                    hair types.</p>
                <h2>Effortless Results</h2>
                <p>Our products are specifically designed to be easy to use to achieve maximum style.</p>
                <h2>No Parabens, Sulfates, or Harsh Chemicals</h2>
                <p>Style your hair with zero worry about what you’re putting into your hair.</p>
            </div>
            <div class="image-container">
                <img src="img/styling-that-works-4000x-V2.jpg" alt="Your Image" />
            </div>
        </div>

        <div class="end-image">
            <h1>STAY TRUE WHAT MAKE YOU DIFFIRENT</h1>
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
<script src="./js/home.js"></script>
<script src="./js/header.js?v=<?php echo time(); ?>"></script>

</html>