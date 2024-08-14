<?php
include '../admin/connect.php';
$gooshvares = $connect->prepare("SELECT * FROM `product` WHERE category=1 ");
$gooshvares->execute();  //کویری اجرا کن
$alangoos = $connect->prepare("SELECT * FROM `product` WHERE category=2 ");
$alangoos->execute();  //کویری اجرا کن
$anoshtars = $connect->prepare("SELECT * FROM `product` WHERE category=3 ");
$anoshtars->execute();
$services = $connect->prepare("SELECT * FROM `product` WHERE category=4 ");
$services->execute();
$productStars = $connect->prepare("SELECT * FROM `product` ORDER BY RAND() LIMIT 4 ");
$productStars->execute();
$mostVISTED = $connect->prepare("SELECT * FROM product LIMIT 4");
$mostVISTED->execute();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فروشگاه مکمل</title>
    <!-- CSS Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/aos-master/dist/aos.css">
    <link rel="stylesheet" href="assets/plugins/hover-master/css/hover-min.css">
    <link rel="stylesheet" href="assets/css/ionicons.css">
    <link rel="stylesheet" href="assets/css/droopmenu.css">
    <link rel="stylesheet" href="assets/css/highlight.css">
    <link rel="stylesheet" href="assets/css/nouislider.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- /CSS Styles -->
</head>
<body>
<!-- Header -->
<section id="header">
    <!-- Top NavBar -->
    <div id="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-8 d-none d-md-block">
                    <ul>
                        <li><a href="index.php">صفحه نخست</a></li>
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">تماس با ما</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 text-center text-md-end" id="top-support-info">
                    <span>تلفن مشاوره و فروش: 09351234567</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /Top NavBar -->
    <!-- Search NavBar -->
    <div id="search-nav">
        <div class="container pt-1">
            <div class="row py-3 align-content-center">
                <div class="col-12 col-md-3 col-xl-2 text-center text-md-start pb-2" id="header-logo">
                    <a href="./index.php">
                        <img src="assets/images/logo.png" alt="">فروشگاه مکمل
                    </a>
                </div>
                <div class="col-12 col-md-5 col-xl-6">
                    <div id="search-bar">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="جستجو کنید...">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="row">
                        <div class="col-12 col-md-7 col-lg-6 text-center" id="btn-login-register">
                            <?php if (!isset($_SESSION['login'])) { ?>
                            <a href="./login-user.php">ورود</a> /
                            <a href="./user-register.php">عضویت</a>
                                <?php
                            }
                            else{
                            ?>
                            <a href="../auth/logout.php">خروج</a>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-12 col-md-5 col-lg-6">
                            <a href="#">
                                <div class="btn btn-warning w-100"><i class="fa fa-shopping-cart"></i>&nbsp;<span class="d-md-none d-lg-inline-block">سبد خرید</span> (2)</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Search NavBar -->
    <!-- Main NavBar -->
    <div id="main-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="droopmenu-navbar dmarrow-down droopmenu-horizontal dmpos-top dmfade">
                        <div class="droopmenu-inner">
                            <div class="droopmenu-header">
                                <a href="#" class="droopmenu-toggle"><i class="dm-burg"></i></a>
                                <span class="d-md-none">منوی فروشگاه</span>
                            </div>
                            <!-- Header Mega Menu-->
                            <div class="droopmenu-nav">
                                <div class="droopmenu-nav-wrap">
                                    <div class="droopmenu-navi">
                                        <ul class="droopmenu">

                                            <li><a href="index.php">خانه<em class="droopmenu-topanim"></em></a></li>
                                            <li><a href="#">درباره ی ما<em class="droopmenu-topanim"></em></a></li>
                                            <li><a href="#">تماس با ما<em class="droopmenu-topanim"></em></a></li>

                                            <?php if (isset($_SESSION['login'])) { ?>
                                                <li><a href="../admin/product/product.php">مدیریت<em class="droopmenu-topanim"></em></a></li>
                                                <?php
                                            }
                                            ?>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /Header Menu Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main NavBar -->
</section>
<!-- /Header -->

<!-- Slider Section -->
<section id="slider" class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9" data-aos="fade-zoom-in" data-aos-duration="700">
                <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/slider/banner2.jpg" class="d-block" alt="..." style="height: 416px;width: 1500px;">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/slider/banner1.jpg" class="d-block" alt="..." style="height: 416px;width: 980px;">
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Slider Section -->

<!-- Featured Products Section -->
<section id="featured-products" class="my-5">
    <div class="container">
        <!-- Tabs -->
        <div class="row pb-2 pb-sm-4">
            <div class="col-12 text-center">
                <div class="btn-group" role="group" id="featured-products-nav">
                    <button type="button" class="btn active featured-categories" data-val="featured">محصولات منتخب</button>
                    <button type="button" class="btn featured-categories" data-val="most-visited">پربازدیدترین</button>
                </div>
            </div>
        </div>
        <!-- /Tabs -->

        <!-- Products -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-md-4 featured-product featured" data-aos="fade-up" data-aos-duration="1000">
            <?php
            if ($productStars->rowCount() > 0) { ?>
                <?php  foreach ($productStars as $productStar) {?>
                    <div class="col">
                        <!-- Product Box -->

                        <div class="product-box">

                            <a href="product.php?idProduct=<?=$productStar['id'] ?>"><div class="image" style="background-image: url('../admin/images/<?=$productStar['image'] ?>')"></div></a>
                            <div class="icons">
                                <div class="btn btn-outline-secondary btn-favorite"></div>
                                <div class="btn btn-outline-secondary btn-compare"></div>
                            </div>
                            <div class="details p-3">
                                <div class="category">
                                    <a href="product.php?idProduct=<?=$productStar['id'] ?>">مکمل</a>
                                </div>
                                <a href="product.php?idProduct=<?=$productStar['id'] ?>"><h2><?=$productStar['name'] ?></h2></a>
                                <div class="price"><?=$productStar['price'] ?> تومان</div>
                                <div class="rate">
                                    <i class="fa fa-star-half-alt"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span class="reviews">(14 رای دهنده)</span>
                                </div>
                            </div>
                        </div>

                        <!-- /Product Box -->

                    </div>
                <?php } ?>
            <?php }?>


        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-md-4 featured-product most-visited" data-aos="fade-up" data-aos-duration="1000">
            <?php
            if ($mostVISTED->rowCount() > 0) { ?>
                <?php  foreach ($mostVISTED as $mostVISTE) {?>
                    <div class="col">
                        <!-- Product Box -->

                        <div class="product-box">

                            <a href="product.php?idProduct=<?=$mostVISTE['id'] ?>"><div class="image" style="background-image: url('../admin/images/<?=$mostVISTE['image'] ?>')"></div></a>
                            <div class="icons">
                                <div class="btn btn-outline-secondary btn-favorite"></div>
                                <div class="btn btn-outline-secondary btn-compare"></div>
                            </div>
                            <div class="details p-3">
                                <div class="category">
                                    <a href="product.php?idProduct=<?=$mostVISTE['id'] ?>">هودی</a>
                                </div>
                                <a href="product.php?idProduct=<?=$mostVISTE['id'] ?>"><h2><?=$mostVISTE['name'] ?></h2></a>
                                <div class="price"><?=$mostVISTE['price'] ?> تومان</div>
                                <div class="rate">
                                    <i class="fa fa-star-half-alt"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span class="reviews">(14 رای دهنده)</span>
                                </div>
                            </div>
                        </div>

                        <!-- /Product Box -->

                    </div>
                <?php } ?>
            <?php }?>


        </div>

        <!-- /Products -->
    </div>
</section>
<!-- /Featured Products Section -->


<!-- Benefits Section -->
<section id="benefits" class="pt-4">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 gy-3 text-center">
            <div class="col" data-aos="fade-zoom-in" data-aos-duration="800">
                <img src="assets/images/benefits/benefit1.png" alt="">
                <span>پشتیبانی 24 ساعته</span>
            </div>
            <div class="col" data-aos="fade-zoom-in" data-aos-duration="1000">
                <img src="assets/images/benefits/benefit2.png" alt="">
                <span>ضمانت اصالت کالا</span>
            </div>
            <div class="col" data-aos="fade-zoom-in" data-aos-duration="1200">
                <img src="assets/images/benefits/benefit3.png" alt="">
                <span>ضمانت بازگشت وجه</span>
            </div>
            <div class="col" data-aos="fade-zoom-in" data-aos-duration="1400">
                <img src="assets/images/benefits/benefit4.png" alt="">
                <span>ارسال سریع و رایگان</span>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col">
                <hr>
            </div>
        </div>
    </div>
</section>
<!-- /Benefits Section -->

<!-- Most Sales Products -->
<!-- /Most Sales Products -->





<!-- Footer -->
<section class="pt-4 pb-3" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="title">دسترسی سریع</div>
                <ul>

                    <li><a href="#">راهنمای خرید</a></li>
                    <li><a href="#">شیوه های پرداخت</a></li>
                    <li><a href="#">پیگیری سفارش</a></li>
                    <li><a href="#">سوالات متداول</a></li>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="title">دسترسی سریع</div>
                <ul>
                    <li><a href="#">راهنمای خرید</a></li>
                    <li><a href="#">شیوه های پرداخت</a></li>
                    <li><a href="#">پیگیری سفارش</a></li>
                    <li><a href="#">سوالات متداول</a></li>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="title">دسترسی سریع</div>
                <ul>
                    <li><a href="#">بلاگ آموزشی</a></li>
                    <li><a href="#">راهنمای خرید</a></li>
                    <li><a href="#">شیوه های پرداخت</a></li>
                    <li><a href="#">پیگیری سفارش</a></li>
                    <li><a href="#">سوالات متداول</a></li>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">تماس با ما</a></li>
                </ul>
            </div>


            <div class="col-12 col-md-12 col-lg-6">
                <hr class="d-lg-none">
                <img src="assets/images/logo.png" alt="">فروشگاه مکمل

                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                <div class="row">
                    <div class="col-12 col-md-6 text-center p-2" id="support-info">
                        <div>7 روز هفته، 24 ساعت شبانه روز</div>
                        <div>پاسخگوی شما هستیم</div>
                        <div>09351234567</div>
                    </div>
                    <div class="col-12 col-md-6 pt-2 pt-md-0" id="certificates">
                        <div class="row">
                            <div class="col-4 text-center">
                                <a href="#"><img src="assets/images/certificates/enamad.png" alt=""></a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#"><img src="assets/images/certificates/samandehi.png" alt=""></a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#"><img src="assets/images/certificates/etehadiye.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Footer -->

<!-- Copyright -->
<section class="py-2" id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6" id="social-links">
                <span>ما را دنبال کنید</span>
                <a href="#"><img src="assets/images/social/insta.png" alt=""></a>
                <a href="#"><img src="assets/images/social/facebook.png" alt=""></a>
                <a href="#"><img src="assets/images/social/linkedin.png" alt=""></a>
                <a href="#"><img src="assets/images/social/twitter.png" alt=""></a>
                <a href="#"><img src="assets/images/social/youtube.png" alt=""></a>
            </div>
            <div class="col-12 col-sm-6 text-sm-end pt-2 pt-sm-0">
                <span>کلیه حقوق و مادی معنوی محفوط است.</span>
            </div>
        </div>
    </div>
</section>
<!-- Copyright -->

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/fontawesome/js/all.min.js"></script>
<script src="assets/plugins/aos-master/dist/aos.js"></script>
<script src="assets/js/droopmenu.js"></script>
<script src="assets/js/nouislider.min.js"></script>
<script src="assets/js/pagination.js"></script>
<script src="assets/js/scripts.js"></script>
<!-- /Scripts -->
</body>
</html>