<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!doctype html>
<html class="no-js" lang="es">
<head>
    <title>SrWong - Deliveries y Pedidos</title>
    <?php require_once 'includes/inc-header_links.php';?>
    <!-- INCLUIR MAGNIFIC-POP-UP -->
    <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/Magnific-Popup/magnific-popup.css">
    <script type="text/javascript" src="<?= $url;?>assets/js/plugins/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <!-- INCLUIR OWL CAROUSEL 2 -->
    <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/assets/owl.carousel.min.css">
    <script type="text/javascript" src="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/owl.carousel.min.js"></script>
</head>
<body>
    <?php require_once 'includes/inc-header_top.php';?>
    <div class="breadcrumb-area gray-bg">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="./">Home</a></li>
                    <li class="active">Blog Right Sidebar</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- blog-area start -->
    <div class="blog-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9 col-md-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-blog-wrapper mb-50">
                                <div class="blog-img mb-20">
                                    <a href="blog-details-standerd">
                                        <img src="<?= $url;?>assets/img/blog/blog-6.jpg" alt="">
                                    </a>
                                    <div class="blog-date">
                                        <span>26 <br> JUNE</span>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h2><a href="blog-details-standerd">Thousand unknown plants </a></h2>
                                    <div class="blog-date-categori">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                            <li><a href="#"><i class="ion-heart"></i> likes </a></li>
                                            <li><a href="#"><i class="fa fa-comment"></i> Comments </a></li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercit ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                </div>
                                <div class="blog-btn mt-30">
                                    <a href="blog-details-standerd">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-blog-wrapper mb-50">
                                <div class="blog-img mb-20">
                                    <div class="blog-gallery-slider owl-carousel">
                                        <a href="blog-details-standerd">
                                            <img src="<?= $url;?>assets/img/blog/blog-3.jpg" alt="">
                                        </a>
                                        <a href="blog-details-standerd">
                                            <img src="<?= $url;?>assets/img/blog/blog-1.jpg" alt="">
                                        </a>
                                        <a href="blog-details-standerd">
                                            <img src="<?= $url;?>assets/img/blog/blog-4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-date">
                                        <span>26 <br> JUNE</span>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h2><a href="blog-details-standerd">Thousand unknown plants </a></h2>
                                    <div class="blog-date-categori">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                            <li><a href="#"><i class="ion-heart"></i> likes </a></li>
                                            <li><a href="#"><i class="fa fa-comment"></i> Comments </a></li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercit ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                </div>
                                <div class="blog-btn mt-30">
                                    <a href="blog-details-standerd">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-blog-wrapper mb-50">
                                <div class="blog-img mb-20">
                                    <a href="blog-details-standerd">
                                        <img src="<?= $url;?>assets/img/blog/blog-4.jpg" alt="">
                                    </a>
                                    <div class="video-icon">
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=6Tc7LBx7XzE">
                                            <i class="ion-ios-play"></i>
                                        </a>
                                    </div>
                                    <div class="blog-date">
                                        <span>26 <br> JUNE</span>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h2><a href="blog-details-standerd">Thousand unknown plants </a></h2>
                                    <div class="blog-date-categori">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                            <li><a href="#"><i class="ion-heart"></i> likes </a></li>
                                            <li><a href="#"><i class="fa fa-comment"></i> Comments </a></li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercit ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                </div>
                                <div class="blog-btn mt-30">
                                    <a href="blog-details-standerd">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-total-pages">
                        <div class="pagination-style">
                            <ul>
                                <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">10</a></li>
                                <li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
                            </ul>
                        </div>
                        <div class="total-pages">
                            <p>Showing 1 - 20 of 30 results  </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-4">
                    <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                        <div class="sidebar-search">
                            <form class="header-search-form" action="#">
                                <input type="text" placeholder="Type key word">
                                <button>
                                    <i class="ion-android-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="shop-widget mt-30 shop-sidebar-border pt-25">
                            <h4 class="shop-sidebar-title">Categories </h4>
                            <div class="sidebar-list-style mt-20">
                                <ul>
                                    <li><a href="#">Misti Doi  <span>(10)</span></a></li>
                                    <li><a href="#">Naan Roti <span>(3)</span></a></li>
                                    <li><a href="#">Morog Polao <span>(2)</span></a></li>
                                    <li><a href="#">Sheek Kabab  <span>(6)</span></a></li>
                                    <li><a href="#">Grilled Chicken  <span>(5)</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                            <h4 class="shop-sidebar-title">Blog Archives</h4>
                            <div class="sidebar-list-style mt-20">
                                <ul>
                                    <li><a href="#">March 2015 <span>(2)</span></a></li>
                                    <li><a href="#">August 2011  <span>(2)</span></a></li>
                                    <li><a href="#">December 2015  <span>(1)</span></a></li>
                                    <li><a href="#">Novermber 2013  <span>(3)</span></a></li>
                                    <li><a href="#">September 2012  <span>(1)</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                            <h4 class="shop-sidebar-title">Recent Posts</h4>
                            <div class="sidebar-list-style mt-20">
                                <ul>
                                    <li><a href="#">Blog image post</a></li>
                                    <li><a href="#">Post with Gallery</a></li>
                                    <li><a href="#">Post with Audio</a></li>
                                    <li><a href="#">Post with Video</a></li>
                                    <li><a href="#">Maecenas ultricies</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                            <h4 class="shop-sidebar-title">By Brand</h4>
                            <div class="sidebar-list-style mt-20">
                                <ul>
                                    <li><input type="checkbox"><a href="#">Poure </a></li>
                                    <li><input type="checkbox"><a href="#">Eveman </a></li>
                                    <li><input type="checkbox"><a href="#">Iccaso </a></li>
                                    <li><input type="checkbox"><a href="#">Annopil </a></li>
                                    <li><input type="checkbox"><a href="#">Origina </a></li>
                                    <li><input type="checkbox"><a href="#">Perini  </a></li>
                                    <li><input type="checkbox"><a href="#">Dolloz </a></li>
                                    <li><input type="checkbox"><a href="#">Spectry </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                            <h4 class="shop-sidebar-title">Popular Tags</h4>
                            <div class="shop-tags mt-25">
                                <ul>
                                    <li><a href="#">Bouquet</a></li>
                                    <li><a href="#">Event</a></li>
                                    <li><a href="#">Gift</a></li>
                                    <li><a href="#">Joy</a></li>
                                    <li><a href="#">Love </a></li>
                                    <li><a href="#">Special</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area end -->
    <div class="footer-area black-bg-2 pt-70">
        <div class="footer-top-area pb-18">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-about mb-40">
                            <div class="footer-logo">
                                <a href="index">
                                    <img src="<?= $url;?>assets/img/logo/footer-logo.png" alt="">
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                            <div class="payment-img">
                                <a href="#">
                                    <img src="<?= $url;?>assets/img/icon-img/payment.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <div class="footer-title mb-22">
                                <h4>Information</h4>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="about-us">About Us</a></li>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Customer Service</a></li>
                                    <li><a href="#">Return Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <div class="footer-title mb-22">
                                <h4>My Account</h4>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="my-account">My Account</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="wishlist">Wish List</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="#">International Orders</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <div class="footer-title mb-22">
                                <h4>Get in touch</h4>
                            </div>
                            <div class="footer-contact">
                                <ul>
                                    <li>Address: 123 Main Street, Anytown, CA 12345 - USA.</li>
                                    <li>Telephone Enquiry: (012) 800 456 789-987 </li>
                                    <li>Email: <a href="#">Info@example.com</a></li>
                                </ul>
                            </div>
                            <div class="mt-35 footer-title mb-22">
                                <h4>Get in touch</h4>
                            </div>
                            <div class="footer-time">
                                <ul>
                                    <li>Open:  <span>8:00 AM</span> - Close: <span>18:00 PM</span></li>
                                    <li>Saturday - Sunday: <span>Close</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area border-top-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-7">
                        <div class="copyright">
                            <p>Copyright © <a href="#">Fudink.</a> . All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-5">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-rss"></i></a></li>
                                <li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- all js here -->
    <script type="text/javascript" src="<?= $url;?>assets/js/actions/blog.js"></script>
</body>
</html>
