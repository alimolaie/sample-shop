<?php
include '../admin/connect.php';
$allPrdcoct = $connect->prepare("SELECT * FROM `product` ORDER BY id ASC");
$allPrdcoct->execute();  //کویری اجرا کن
$countProductQuery = $connect->query("SELECT * FROM product");
$countProduct=$countProductQuery->fetch(PDO::FETCH_ASSOC);  //کویری اجرا کن
$newestProduct = $connect->prepare("SELECT * FROM product LIMIT 4");
$newestProduct->execute();  //کویری اجرا کن
?>

<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>گالری طلا</title>
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

<section class="inner-page" id="products-page">
    <div class="container-fluid" id="page-hero">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-12 px-0">
                            <h1>فروشگاه مکمل</h1>
                            <p>هر آنچه نیاز دارید در این فروشگاه موجود است</p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./index.html">صفحه نخست</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">محصولات</li>
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
                        <div class="col-12 col-lg-3 px-3 px-lg-0">
                            <!-- Side Panel -->


                            <div class="accordion filters-container mt-5">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                            جدیدترین محصولات
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <?php
                                                if ($newestProduct->rowCount() > 0) { ?>
                                                <?php  foreach ($newestProduct as $new) {?>
                                                <div class="col-12 col-md-4 col-lg-12 px-0 mt-2">
                                                    <a href="product.php?idProduct=<?=$new['id'] ?>">
                                                        <div class="side-product">
                                                            <div class="row pl-3">
                                                                <div class="col-3 pl-2">
                                                                    <div class="image" style="background-image: url('../admin/images/<?=$new['image'] ?>')"></div>
                                                                </div>
                                                                <div class="col-9 pr-0">
                                                                    <h2><?=$new['name'] ?></h2>
                                                                    <div class="row">
                                                                        <div class="col-7 pl-0">
                                                                            <span class="price"><?=$new['price'] ?> تومان</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                    <?php } ?>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Side Panel -->
                        </div>
                        <div class="col-12 col-lg-9 px-0 pl-lg-0 pr-lg-2 mt-2 mt-lg-0">
                            <!-- Filters -->
                            <div id="order-filters">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-sm-2 pt-1 text-end">
                                            <span>
                                                <a href="products-list.html" class="products-view-type"><i class="fa fa-th-list"></i></a>
                                                <a href="products.html" class="products-view-type active"><i class="fa fa-th"></i></a>
                                            </span>
                                            &nbsp;|&nbsp;



                                            <span><?php print count($countProduct); ?>کالا</span>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Filters -->
                            <div class="mt-2" id="pager">
                                <div class="container">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 gx-md-4">
                                        <!-- Products -->
                                        <?php
                                        if ($allPrdcoct->rowCount() > 0) { ?>
                                            <?php  foreach ($allPrdcoct as $Prdcoct) {?>
                                                <div class="col">
                                                    <!-- Product Box -->

                                                    <div class="product-box">

                                                        <a href="product.php?idProduct=<?=$Prdcoct['id'] ?>"><div class="image" style="background-image: url('../admin/images/<?=$Prdcoct['image'] ?>')"></div></a>
                                                        <div class="icons">
                                                            <div class="btn btn-outline-secondary btn-favorite"></div>
                                                            <div class="btn btn-outline-secondary btn-compare"></div>
                                                        </div>
                                                        <div class="details p-3">
                                                            <div class="category">
                                                                <a href="product.php?idProduct=<?=$Prdcoct['id'] ?>">گوشواره</a>
                                                            </div>
                                                            <a href="product.php?idProduct=<?=$Prdcoct['id'] ?>"><h2><?=$Prdcoct['name'] ?></h2></a>
                                                            <div class="price"><?=$Prdcoct['price'] ?> تومان</div>
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

                                        <!-- /Products -->
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="pagination-bg">
                                            <ul class="pagination justify-content-center pagination-sm"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script src="assets/js/scripts.js"></script>
<!-- /Scripts -->
</body>
</html>