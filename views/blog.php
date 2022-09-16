<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
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
                    <li class="active">Blog page</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- blog-area start -->
    <div class="blog-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="single-blog-wrapper mb-50">
                        <div class="blog-img mb-20">
                            <a href="blog-details-standerd">
                                <img src="<?= $url;?>assets/img/blog/blog-1.jpg" alt="">
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
                        </div>
                        <div class="blog-btn mt-30">
                            <a href="blog-details-standerd">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                   <div class="single-blog-wrapper mb-50">
                        <div class="blog-img mb-20">
                            <div class="blog-gallery-slider owl-carousel">
                                <a href="blog-details-standerd">
                                    <img src="<?= $url;?>assets/img/blog/blog-5.jpg" alt="">
                                </a>
                                <a href="blog-details-standerd">
                                    <img src="<?= $url;?>assets/img/blog/blog-6.jpg" alt="">
                                </a>
                                <a href="blog-details-standerd">
                                    <img src="<?= $url;?>assets/img/blog/blog-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-date">
                                <span>26 <br> OCT</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h2><a href="blog-details-standerd">Little world among the stalks </a></h2>
                            <div class="blog-date-categori">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                    <li><a href="#"><i class="ion-heart"></i> likes </a></li>
                                    <li><a href="#"><i class="fa fa-comment"></i> Comments </a></li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
                        </div>
                        <div class="blog-btn mt-30">
                            <a href="blog-details-standerd">read more</a>
                        </div>
                    </div>
               </div>
                <div class="col-lg-6 col-md-6">
                   <div class="single-blog-wrapper mb-50">
                        <div class="blog-img mb-20">
                            <a href="blog-details-standerd">
                                <img src="<?= $url;?>assets/img/blog/blog-4.jpg" alt="">
                            </a>
                            <div class="video-icon">
                                <a class="video-popup" href="https://www.youtube.com/watch?v=BQAF3tWBXQM">
                                    <i class="ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="blog-date">
                                <span>30 <br> JUNE</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h2><a href="blog-details-standerd">Familiar with the countless </a></h2>
                            <div class="blog-date-categori">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                    <li><a href="#"><i class="ion-heart"></i> likes </a></li>
                                    <li><a href="#"><i class="fa fa-comment"></i> Comments </a></li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
                        </div>
                        <div class="blog-btn mt-30">
                            <a href="blog-details-standerd">read more</a>
                        </div>
                    </div>
               </div>
                <div class="col-lg-6 col-md-6">
                   <div class="single-blog-wrapper mb-50">
                        <div class="blog-img mb-20">
                            <a href="blog-details-standerd">
                                <img src="<?= $url;?>assets/img/blog/blog-3.jpg" alt="">
                            </a>
                            <div class="blog-date">
                                <span>21 <br> FEB</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h2><a href="blog-details-standerd">Spirit of Adventure Rises </a></h2>
                            <div class="blog-date-categori">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                    <li><a href="#"><i class="ion-heart"></i> likes </a></li>
                                    <li><a href="#"><i class="fa fa-comment"></i> Comments </a></li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
                        </div>
                        <div class="blog-btn mt-30">
                            <a href="blog-details-standerd">read more</a>
                        </div>
                    </div>
               </div>
                <div class="col-lg-6 col-md-6">
                   <div class="single-blog-wrapper mb-50">
                        <div class="blog-img mb-20">
                            <div class="blog-gallery-slider owl-carousel">
                                <a href="blog-details-standerd">
                                    <img src="<?= $url;?>assets/img/blog/blog-2.jpg" alt="">
                                </a>
                                <a href="blog-details-standerd">
                                    <img src="<?= $url;?>assets/img/blog/blog-3.jpg" alt="">
                                </a>
                                <a href="blog-details-standerd">
                                    <img src="<?= $url;?>assets/img/blog/blog-6.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-date">
                                <span>08 <br> DEC</span>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
                        </div>
                        <div class="blog-btn mt-30">
                            <a href="blog-details-standerd">read more</a>
                        </div>
                    </div>
               </div>
                <div class="col-lg-6 col-md-6">
                   <div class="single-blog-wrapper mb-50">
                        <div class="blog-img mb-20">
                            <a href="blog-details-standerd">
                                <img src="<?= $url;?>assets/img/blog/blog-6.jpg" alt="">
                            </a>
                            <div class="video-icon">
                                <a class="video-popup" href="https://www.youtube.com/watch?v=BQAF3tWBXQM">
                                    <i class="ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="blog-date">
                                <span>31 <br> MAY</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h2><a href="blog-details-standerd">Lorem ipsum dolor amet</a></h2>
                            <div class="blog-date-categori">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                    <li><a href="#"><i class="ion-heart"></i> likes </a></li>
                                    <li><a href="#"><i class="fa fa-comment"></i> Comments </a></li>
                                </ul>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing , sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex commodo consequat.</p>
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
    </div>
    <?php require_once 'includes/inc-footer.php';?>
	<!-- all js here -->
    <script type="text/javascript" src="<?= $url;?>assets/js/actions/blog.js"></script>
</body>
</html>
