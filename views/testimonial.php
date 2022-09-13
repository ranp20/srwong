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
</head>
    <body>
        <?php require_once 'includes/inc-header_top.php';?>
        <div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="./">Home</a></li>
                        <li class="active">Testimonials </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="testimonials-area-3 pt-95 pb-75">
            <div class="container">
                <div class="section-title-wrap-2 section-padding-none text-center mb-45">
                    <h3 class="section-title section-bg-white">Testimonial Style 1</h3>
                </div>
                <div class="testimonial-2-active owl-carousel">
                    <div class="testimonial-wrapper-3 text-center">
                        <div class="testimonial-3-content testimonial-content-padding">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomis</p>
                        </div>
                        <div class="testimonial-2-information mt-40">
                            <div class="testimonial-2-img">
                                <img alt="" src="<?= $url;?>assets/img/client/1.png">
                            </div>
                            <div class="testimonial-2-name mt-10">
                                <h3>Larry Sims</h3>
                                <span>Customer</span>
                                <div class="testimonial-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-wrapper-3 text-center">
                        <div class="testimonial-3-content testimonial-content-padding">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomis</p>
                        </div>
                        <div class="testimonial-2-information mt-40">
                            <div class="testimonial-2-img">
                                <img alt="" src="<?= $url;?>assets/img/client/2.png">
                            </div>
                            <div class="testimonial-2-name mt-10">
                                <h3>Helen Wood</h3>
                                <span>Creative Director</span>
                                <div class="testimonial-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-wrapper-3 text-center">
                        <div class="testimonial-3-content testimonial-content-padding">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomis</p>
                        </div>
                        <div class="testimonial-2-information mt-40">
                            <div class="testimonial-2-img">
                                <img alt="" src="<?= $url;?>assets/img/client/3.png">
                            </div>
                            <div class="testimonial-2-name mt-10">
                                <h3>Diane Rose</h3>
                                <span>Creative Director</span>
                                <div class="testimonial-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonials-area-2 pt-95 pb-95 gray-bg">
            <div class="container">
                <div class="section-title-wrap-2 section-padding-none text-center mb-50">
                    <h3 class="section-title section-bg-white">Testimonial Style 2</h3>
                </div>
                <div class="testimonial-style-2">
                    <div class="testimonial-2-wrapper mb-50">
                        <div class="testimonial-2-img">
                            <img alt="" src="<?= $url;?>assets/img/client/1.png">
                        </div>
                        <div class="testimonial-2-content">
                            <div class="testimonial-2-name">
                                <h3>Denise Ford</h3>
                                <span>Customer</span>
                                <div class="testimonial-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat sed do eiusmod tempor incididunt.</p>
                        </div>
                    </div>
                    <div class="testimonial-2-wrapper mb-50">
                        <div class="testimonial-2-img">
                            <img alt="" src="<?= $url;?>assets/img/client/2.png">
                        </div>
                        <div class="testimonial-2-content">
                            <div class="testimonial-2-name">
                                <h3>Pamela Hall</h3>
                                <span>Customer</span>
                                <div class="testimonial-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat sed do eiusmod tempor incididunt.</p>
                        </div>
                    </div>
                    <div class="testimonial-2-wrapper ">
                        <div class="testimonial-2-img">
                            <img alt="" src="<?= $url;?>assets/img/client/3.png">
                        </div>
                        <div class="testimonial-2-content">
                            <div class="testimonial-2-name">
                                <h3>Jerry Roberts</h3>
                                <span>Customer</span>
                                <div class="testimonial-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat sed do eiusmod tempor incididunt.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial-area start -->
        <div class="testimonials-main pt-95">
            <div class="container">
                <div class="section-title-wrap-2 section-padding-none text-center mb-50">
                    <h3 class="section-title section-bg-white">Testimonial Style 3</h3>
                </div>
            </div>
            <div class="testimonials-area bg-img pt-130 pb-125 discount-overlay" style="background-image:url(assets/img/banner/banner-4.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-12 col-lg-10 col-xl-8 ml-auto mr-auto">
                            <div class="testimonial-active owl-carousel pagination-style">
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-img mb-30">
                                        <img alt="" src="<?= $url;?>assets/img/client/1.png">
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis do eiusmod tempor incididunt. </p>
                                    <h4>Samia Robiul</h4>
                                    <span>Customer</span>
                                </div>
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-img mb-30">
                                        <img alt="" src="<?= $url;?>assets/img/client/1.png">
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ex ea commodo consequat. Duis do eiusmod tempor incididunt. </p>
                                    <h4> Tayeb Rayed</h4>
                                    <span>Creative Director</span>
                                </div>
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-img mb-30">
                                        <img alt="" src="<?= $url;?>assets/img/client/1.png">
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                    <h4>Hamim Ahamed</h4>
                                    <span>Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonials-area-4 pt-95 pb-95">
            <div class="container">
                <div class="section-title-wrap-2 section-padding-none text-center mb-50">
                    <h3 class="section-title section-bg-white">Testimonial Style 4</h3>
                </div>
                <div class="col-md-12 col-12 col-lg-10 col-xl-8 ml-auto mr-auto">
                    <div class="testimonial-active owl-carousel">
                        <div class="single-testimonial-4 text-center">
                            <div class="testimonial-img mb-30">
                                <img src="<?= $url;?>assets/img/client/1.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  </p>
                            <h4>Denise Ford</h4>
                            <span>Customer</span>
                            <div class="testimonial-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="single-testimonial-4 text-center">
                            <div class="testimonial-img mb-30">
                                <img src="<?= $url;?>assets/img/client/2.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis do eiusmod tempor incididunt.</p>
                            <h4>Pamela Hall</h4>
                            <span>Customer</span>
                            <div class="testimonial-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>
                        </div>
                        <div class="single-testimonial-4 text-center">
                            <div class="testimonial-img mb-30">
                                <img src="<?= $url;?>assets/img/client/3.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                            <h4>Jerry Roberts</h4>
                            <span>Customer</span>
                            <div class="testimonial-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        
        <script src="<?= $url;?>assets/js/popper.js"></script>
        
        <script src="<?= $url;?>assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?= $url;?>assets/js/isotope.pkgd.min.js"></script>
        <script src="<?= $url;?>assets/js/ajax-mail.js"></script>
        
        <script src="<?= $url;?>assets/js/plugins.js"></script>
        <script src="<?= $url;?>assets/js/main.js"></script>
    </body>
</html>
