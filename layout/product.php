<?php
error_reporting(0);
include '../admin/connect.php';
$id = $_GET['idProduct'];
$prod = $connect->prepare("SELECT * FROM `product` WHERE id= $id ");
$prod->execute();
$product = $prod->fetch();
if ($product['category'] == 1)
    $cat = "گوشواره";
elseif ($product['category'] == 2)
    $cat = "'النگو'";
elseif ($product['category'] == 3)
    $cat = "'انگشتر'";
else
    $cat = "'سرویس طلا'";

?>


<!DOCTYPE html>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $product['name'] ?></title>
    <!-- CSS Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/aos-master/dist/aos.css">
    <link rel="stylesheet" href="assets/plugins/hover-master/css/hover-min.css">
    <link rel="stylesheet" href="assets/css/ionicons.css">
    <link rel="stylesheet" href="assets/css/droopmenu.css">
    <link rel="stylesheet" href="assets/css/highlight.css">
    <link rel="stylesheet" href="assets/css/nouislider.min.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/product-gallery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css" />

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
                        <li><a href="./index.html">صفحه نخست</a></li>
                        <li><a href="./about.html">درباره ما</a></li>
                        <li><a href="./contact.html">تماس با ما</a></li>
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
                    <a href="./index.html">
                        <img src="assets/images/logo.png" alt=""> فروشگاه مکمل
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
                                <div class="btn btn-warning w-100"><i class="fa fa-shopping-cart"></i>&nbsp;<span class="d-md-none d-lg-inline-block">سبد خرید</span> (9)</div>
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
                                            <li><a href="#">خدمات<em class="droopmenu-topanim"></em></a></li>
                                              
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

<section class="inner-page" id="product-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1><?= $product['name'] ?></h1>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./index.html">صفحه نخست</a></li>
                                    <li class="breadcrumb-item"><a href="./products.html">فروشگاه</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">نمایش محصولات</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <div class="row">
                        <div class="col-12 col-lg-5 px-lg-0">
                            <div class="swiper-container gallery-top">
                                <!-- Additional required wrapper -->
                                <ul class="swiper-wrapper">
                                    <!-- Slides -->
                                    <li id="1" class="swiper-slide">
                                        <a href="../admin/images/<?= $product['image'] ?>" itemprop="contentUrl" data-size="900x710">
                                            <img src="../admin/images/<?= $product['image'] ?>" itemprop="thumbnail" alt="<?= $product['name'] ?>" />
                                        </a>
                                    </li>

                                    <!-- /Slides -->
                                </ul>
                                <!-- If we need navigation buttons -->
                                <div title="قبلی" class="swiper-button-prev swiper-button-white"></div>
                                <div title="بعدی" class="swiper-button-next swiper-button-white"></div>
                            </div>

                            <!-- Swiper -->
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" style="background-image:url('../admin/images/<?= $product['image'] ?>')"></div>

                                </div>
                            </div>

                            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="pswp__bg"></div>
                                <div class="pswp__scroll-wrap">
                                    <div class="pswp__container">
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                    </div>
                                    <div class="pswp__ui pswp__ui--hidden">
                                        <div class="pswp__top-bar">
                                            <div class="pswp__counter"></div>
                                            <button class="pswp__button pswp__button--close" title="بستن (Esc)"></button>
                                            <button class="pswp__button pswp__button--fs" title="تمام صفحه"></button>
                                            <button class="pswp__button pswp__button--zoom" title="بزرگنمایی"></button>
                                            <div class="pswp__preloader">
                                                <div class="pswp__preloader__icn">
                                                    <div class="pswp__preloader__cut">
                                                        <div class="pswp__preloader__donut"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="pswp__button pswp__button--arrow--left" title="قبلی"></button>
                                        <button class="pswp__button pswp__button--arrow--right" title="بعدی"></button>
                                        <div class="pswp__caption">
                                            <div class="pswp__caption__center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 mt-5 mt-lg-0 pl-lg-0" id="product-intro">
                            <a href="./product.html">
                                <h1><?= $product['name'] ?></h1>
                            </a>
                            <div class="stars-container">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <a href="#tabs-panel"><span>(نقد و بررسی)</span></a>
                            </div>
                            <div class="price-container py-2">
                                <span class="price"><?= $product['price'] ?> <span>تومان</span></span>
                                <div class="badge badge-danger font-weight-light m-1 py-1 px-2">10%</div>
                            </div>
                            <hr>
                            <div class="variables">
                                <div class="title">گزینه های موجود:</div>
                                <div class="row">
                                    <form method="post" action="product.php?page=cart">
                                    <div class="col-12 col-sm-4 col-lg-3">
                                        <div class="variable">
                                            <div class="sub-title pt-2 pb-2">تعداد</div>
                                            <input type="number" min="1" max="500" class="form-control" value="1" name="quantity" size="2">
                                            <input type="hidden" name="product_id" value="<?=$product['id']?>">

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="cta-container pt-3 pt-md-5">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" style="border:none;">
                                            <div class="btn btn-success px-4 px-lg-2 px-xl-4 btn-add-to-basket"><i class="fa fa-shopping-cart"></i>  خرید</div>
                                        </button>
                                        <br class="d-sm-none">
                                        <div class="btn btn-outline-secondary btn-favorite mt-1 mt-sm-0" data-toggle="tooltip" data-placement="top" title="افزودن به علاقه‌مندی"></div>
                                        <a href="#"><div class="btn btn-outline-secondary btn-compare mt-1 mt-sm-0" data-toggle="tooltip" data-placement="top" title="مقایسه"></div></a>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- Share Links -->
                            <div class="pt-5" id="share-links">
                                <span>اشتراک گذاری: </span>
                                <a href="#" target="_blank"><span class="share-link"><img src="assets/images/social/twitter.png" alt="توئیتر" width="18px"></span></a>
                                <a href="#" target="_blank"><span class="share-link"><img src="assets/images/social/insta.png" alt="اینستاگرام" width="18px"></span></a>
                                <a href="#" target="_blank"><span class="share-link"><img src="assets/images/social/linkedin.png" alt="لینکدین" width="18px"></span></a>
                                <a href="#" target="_blank"><span class="share-link"><img src="assets/images/social/facebook.png" alt="فیس بوک" width="18px"></span></a>
                            </div>
                            <!-- Share Links -->
                        </div>

                        <!-- Nav Tabs -->
                    </div>
                    <!-- /Nav Tabs -->

                    <!-- Suggested Products -->
                    <div class="col-12 pt-5" id="suggested-products">
                        <div class="title py-3 text-center">محصولات مرتبط</div>
                        <div class="owl-carousel products-carousel">
                            <?php  foreach ($Relatedproducts as $Relatedproduct) {?>
                            <div class="product-box item">
                                <a href="product.php?idProduct=<?=$Relatedproduct['id'] ?>"><div class="image" style="background-image: url('../admin/images/<?=$Relatedproduct['image'] ?>')"></div></a>
                                <div class="details p-3">

                                    <a href="product.php?idProduct=<?=$Relatedproduct['id'] ?>"><h2><?=$Relatedproduct['name'] ?></h2></a>
                                    <div class="price"><?=$Relatedproduct['price'] ?></div>
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
                            <?php } ?>

                    </div>
                    <!-- /Suggested Products -->
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Footer -->
<section class="pt-4 pb-3" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="title">دسترسی سریع</div>
                <ul>

                    <li><a href="./faq.html">راهنمای خرید</a></li>
                    <li><a href="./faq.html">شیوه های پرداخت</a></li>
                    <li><a href="./contact.html">پیگیری سفارش</a></li>
                    <li><a href="./faq.html">سوالات متداول</a></li>
                    <li><a href="./about.html">درباره ما</a></li>
                    <li><a href="./contact.html">تماس با ما</a></li>
                </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="title">دسترسی سریع</div>
                <ul>
                    <li><a href="./faq.html">راهنمای خرید</a></li>
                    <li><a href="./faq.html">شیوه های پرداخت</a></li>
                    <li><a href="./contact.html">پیگیری سفارش</a></li>
                    <li><a href="./faq.html">سوالات متداول</a></li>
                    <li><a href="./about.html">درباره ما</a></li>
                    <li><a href="./contact.html">تماس با ما</a></li>
                </ul>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="title">دسترسی سریع</div>
                <ul>
                    <li><a href="./blog.html">بلاگ آموزشی</a></li>
                    <li><a href="./faq.html">راهنمای خرید</a></li>
                    <li><a href="./faq.html">شیوه های پرداخت</a></li>
                    <li><a href="./contact.html">پیگیری سفارش</a></li>
                    <li><a href="./faq.html">سوالات متداول</a></li>
                    <li><a href="./about.html">درباره ما</a></li>
                    <li><a href="./contact.html">تماس با ما</a></li>
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

<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/nav-tabs.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js"></script>
<script src="assets/js/product-gallery.js"></script>

<script src="assets/js/scripts.js"></script>
<!-- /Scripts -->
</body>
</html>
