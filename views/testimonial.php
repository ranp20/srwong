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
    <?php require_once 'includes/inc-footer.php';?>
	<!-- all js here -->
    <script type="text/javascript" src="<?= $url;?>assets/js/actions/testimonials.js"></script>
</body>
</html>
