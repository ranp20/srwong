<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/categories.php';
$categories = new Categories();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>SrWong - Deliveries y Pedidos</title>
    <?php require_once 'includes/inc_header_links.php';?>
</head>
<body>
    <?php require_once 'includes/inc_header_top.php';?>
    <div class="breadcrumb-area gray-bg">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="./">Home</a></li>
                    <li class="active">Blog Details Gallery</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- blog-area start -->
    <div class="blog-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="blog-details-wrapper">
                        <div class="blog-img mb-20">
                            <div class="blog-gallery-slider owl-carousel">
                                <img src="<?= $url;?>assets/img/blog/blog-details3.jpg" alt="">
                                <img src="<?= $url;?>assets/img/blog/blog-details2.jpg" alt="">
                                <img src="<?= $url;?>assets/img/blog/blog-details1.jpg" alt="">
                            </div>
                            <div class="blog-date">
                                <span>
                                    26
                                    <br>
                                    JUNE
                                </span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h2>Familiar with the countless</h2>
                            <div class="blog-date-categori">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> Admin </a></li>
                                    <li><a href="#"><i class="ion-heart"></i> likes </a></li>
                                    <li><a href="#"><i class="fa fa-comment"></i> Comments </a></li>
                                </ul>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available,<span>but the majority have suffered alteration in some form</span>, by injected humou, ors randomised words which don't look even sl If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't are anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.<span>The generated Lorem Ipsum is therefore always free from repetition,</span></p>
                            <blockquote>Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt labo dolor magna aliqua. Ut enim ad minim veniam quis nostrud</blockquote>
                            <div class="text-content-img">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="text-single">
                                            <p>It is a long established fact that a reader will be distracted by the readable ish content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, </p><p>as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now uses Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident,</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img">
                                            <img alt="" src="<?= $url;?>assets/img/blog/blog-dec-img1.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="social-network text-center">
                            <ul>
                                <li><a class="facebook" href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a class="instagram" href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                <li><a class="rss" href="#"><i class="ion-social-rss"></i></a></li>
                                <li><a class="dribbble" href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                            </ul>
                        </div>
                        <div class="blog-comment-wrapper mt-55">
                            <h4 class="blog-dec-title">COMMENTS : 02</h4>
                            <div class="single-comment-wrapper mt-35">
                                <div class="blog-comment-img">
                                    <img src="<?= $url;?>assets/img/blog/blog-comment1.png" alt="">
                                </div>
                                <div class="blog-comment-content">
                                    <h4>Anthony Stephens</h4>
                                    <span>October 14, 2018 </span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor magna aliqua. Ut enim ad minim veniam, </p>
                                    <div class="blog-dec-btn">
                                        <a href="blog-details"><i class="ion-reply"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-comment-wrapper mt-50 ml-125">
                                <div class="blog-comment-img">
                                    <img src="<?= $url;?>assets/img/blog/blog-comment2.png" alt="">
                                </div>
                                <div class="blog-comment-content">
                                    <h4>Anthony Stephens</h4>
                                    <span>October 14, 2018 </span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor magna aliqua. Ut enim ad minim veniam, </p>
                                    <div class="blog-dec-btn">
                                        <a href="blog-details"><i class="ion-reply"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-reply-wrapper mt-50">
                            <h4 class="blog-dec-title">POST A COMMENT</h4>
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="leave-form">
                                            <input type="text" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="leave-form">
                                            <input type="email" placeholder="Eail Address ">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-leave">
                                            <textarea placeholder="Massage"></textarea>
                                            <input type="submit" value="SEND MASSAGE">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
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
    <?php require_once 'includes/inc_footer.php';?>
	<!-- all js here -->
    <script type="text/javascript" src="<?= $url;?>assets/js/popper.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/ajax-mail.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/plugins.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
</body>
</html>
