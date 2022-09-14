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
    <div class="slider-area-2">
        <div class="slider-active owl-dot-style owl-carousel">
            <div class="single-slider pt-210 pb-220 bg-img" style="background-image:url(assets/img/slider/slider-3.jpg);">
                <div class="container">
                    <div class="slider-content slider-animated-2 text-center">
                        <h1 class="animated">Drink & Heathy Food</h1>
                        <h3 class="animated">Fresh Heathy and Organic.</h3>
                        <div class="slider-btn mt-90">
                            <a class="animated" href="product-details">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider pt-210 pb-220 bg-img" style="background-image:url(assets/img/slider/slider-3.jpg);">
                <div class="container">
                    <div class="slider-content slider-animated-2 text-center">
                        <h1 class="animated">Drink & Heathy Food</h1>
                        <h3 class="animated">Fresh Heathy and Organic.</h3>
                        <div class="slider-btn mt-90">
                            <a class="animated" href="product-details">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pt-95 pb-70">
        <div class="custom-container">
            <div class="product-tab-list-wrap text-center mb-40 yellow-color">
                <div class="product-tab-list nav">
                    <a class="active" href="#tab1" data-toggle="tab">
                        <h4>All </h4>
                    </a>
                    <a href="#tab2" data-toggle="tab">
                        <h4>Food </h4>
                    </a>
                    <a href="#tab3" data-toggle="tab">
                        <h4> Drink </h4>
                    </a>
                </div>
                <p>Typi non habent claritatem insitam est usus legentis in qui facit eorum claritatem, investigationes demonstraverunt lectores legere me lius quod legunt saepius.</p>
            </div>
            <div class="tab-content jump yellow-color">
                <div id="tab1" class="tab-pane active">
                    <div class="row">
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-1.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$100.00</span>
                                        <span class="product-price-old">$120.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-2.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$200.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-3.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$90.00</span>
                                        <span class="product-price-old">$100.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-4.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$50.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-5.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$60.00</span>
                                        <span class="product-price-old">$70.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-6.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$190.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-7.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$150.00</span>
                                        <span class="product-price-old">$170.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-8.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$80.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-9.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$180.00</span>
                                        <span class="product-price-old">$190.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-10.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$70.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab-pane">
                    <div class="row">
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-10.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$100.00</span>
                                        <span class="product-price-old">$120.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-9.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$200.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-7.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$90.00</span>
                                        <span class="product-price-old">$100.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-8.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$50.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-6.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$60.00</span>
                                        <span class="product-price-old">$70.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-5.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$190.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-4.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$150.00</span>
                                        <span class="product-price-old">$170.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-3.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$80.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-2.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$180.00</span>
                                        <span class="product-price-old">$190.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-1.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$70.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab3" class="tab-pane">
                    <div class="row">
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-5.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$100.00</span>
                                        <span class="product-price-old">$120.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-4.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$200.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-2.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$90.00</span>
                                        <span class="product-price-old">$100.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-3.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$50.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-1.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$60.00</span>
                                        <span class="product-price-old">$70.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-10.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$190.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-9.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$150.00</span>
                                        <span class="product-price-old">$170.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-7.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$80.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-8.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$180.00</span>
                                        <span class="product-price-old">$190.00 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-col-5">
                            <div class="product-wrapper mb-25">
                                <div class="product-img">
                                    <a href="product-details">
                                        <img src="<?= $url;?>assets/img/product/product-5.jpg" alt="">
                                    </a>
                                    <div class="product-action">
                                        <div class="pro-action-left">
                                            <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                        </div>
                                        <div class="pro-action-right">
                                            <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a href="product-details">PRODUCTS NAME HERE </a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span>$70.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area row-col-decrease pb-75 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="single-banner mb-30">
                        <div class="hover-style">
                            <a href="#"><img src="<?= $url;?>assets/img/banner/banner-7.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="single-banner mb-30">
                        <div class="hover-style">
                            <a href="#"><img src="<?= $url;?>assets/img/banner/banner-8.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="best-food-area pb-95">
        <div class="custom-container">
            <div class="row">
                <div class="best-food-width-1">
                    <div class="single-banner">
                        <div class="hover-style">
                            <a href="#"><img src="<?= $url;?>assets/img/banner/banner-5.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="best-food-width-2">
                    <div class="product-top-bar section-border mb-25 yellow-color">
                        <div class="section-title-wrap">
                            <h3 class="section-title section-bg-white">Best Food In Our Shop</h3>
                        </div>
                        <div class="product-tab-list-2 nav section-bg-white">
                            <a class="active" href="#tab4" data-toggle="tab">
                                <h4>All </h4>
                            </a>
                            <a href="#tab5" data-toggle="tab">
                                <h4>Food </h4>
                            </a>
                            <a href="#tab6" data-toggle="tab">
                                <h4> Drink </h4>
                            </a>
                        </div>
                    </div>
                    <div class="tab-content jump yellow-color">
                        <div id="tab4" class="tab-pane active">
                            <div class="product-slider-active owl-carousel product-nav">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-1.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$100.00</span>
                                            <span class="product-price-old">$120.00 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-2.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$200.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-3.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$90.00</span>
                                            <span class="product-price-old">$100.00 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-4.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$50.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab5" class="tab-pane">
                            <div class="product-slider-active owl-carousel product-nav">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-5.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$100.00</span>
                                            <span class="product-price-old">$120.00 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-6.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$200.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-7.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$90.00</span>
                                            <span class="product-price-old">$100.00 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-8.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$50.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab6" class="tab-pane">
                            <div class="product-slider-active owl-carousel product-nav">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-9.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$100.00</span>
                                            <span class="product-price-old">$120.00 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-10.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$200.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-1.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$90.00</span>
                                            <span class="product-price-old">$100.00 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details">
                                            <img src="<?= $url;?>assets/img/product/product-2.jpg" alt="">
                                        </a>
                                        <div class="product-action">
                                            <div class="pro-action-left">
                                                <a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                            </div>
                                            <div class="pro-action-right">
                                                <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4>
                                            <a href="product-details">PRODUCTS NAME HERE </a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>$50.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="best-food-width-1 mrg-small-35">
                    <div class="single-banner">
                        <div class="hover-style">
                            <a href="#"><img src="<?= $url;?>assets/img/banner/banner-6.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area">
        <div class="container">
            <div class="discount-overlay bg-img pt-130 pb-130" style="background-image:url(assets/img/banner/banner-4.jpg);">
                <div class="discount-content text-center">
                    <h3>It’s Time To Start <br>Your Own Revolution By Laurent</h3>
                    <p>Exclusive Offer -10% Off This Week</p>
                    <div class="banner-btn">
                        <a href="#">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-logo-area pt-100 pb-100">
        <div class="container">
            <div class="brand-logo-active owl-carousel">
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-1.png">
                </div>
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-2.png">
                </div>
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-3.png">
                </div>
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-4.png">
                </div>
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-5.png">
                </div>
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-2.png">
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'includes/inc-footer.php';?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <!-- Thumbnail Large Image start -->
                            <div class="tab-content">
                                <div id="pro-1" class="tab-pane fade show active">
                                    <img src="<?= $url;?>assets/img/product-details/product-detalis-l1.jpg" alt="">
                                </div>
                                <div id="pro-2" class="tab-pane fade">
                                    <img src="<?= $url;?>assets/img/product-details/product-detalis-l2.jpg" alt="">
                                </div>
                                <div id="pro-3" class="tab-pane fade">
                                    <img src="<?= $url;?>assets/img/product-details/product-detalis-l3.jpg" alt="">
                                </div>
                                <div id="pro-4" class="tab-pane fade">
                                    <img src="<?= $url;?>assets/img/product-details/product-detalis-l4.jpg" alt="">
                                </div>
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="product-thumbnail">
                                <div class="thumb-menu owl-carousel nav nav-style" role="tablist">
                                    <a class="active" data-toggle="tab" href="#pro-1"><img src="<?= $url;?>assets/img/product-details/product-detalis-s1.jpg" alt=""></a>
                                    <a data-toggle="tab" href="#pro-2"><img src="<?= $url;?>assets/img/product-details/product-detalis-s2.jpg" alt=""></a>
                                    <a data-toggle="tab" href="#pro-3"><img src="<?= $url;?>assets/img/product-details/product-detalis-s3.jpg" alt=""></a>
                                    <a data-toggle="tab" href="#pro-4"><img src="<?= $url;?>assets/img/product-details/product-detalis-s4.jpg" alt=""></a>
                                </div>
                            </div>
                            <!-- Thumbnail image end -->
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="modal-pro-content">
                                <h3>PRODUCTS NAME HERE </h3>
                                <div class="product-price-wrapper">
                                    <span>$120.00</span>
                                    <span class="product-price-old">$162.00 </span>
                                </div>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>	
                                <div class="quick-view-select">
                                    <div class="select-option-part">
                                        <label>Size*</label>
                                        <select class="select">
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value="">L</option>
                                        </select>
                                    </div>
                                    <div class="quickview-color-wrap">
                                        <label>Color*</label>
                                        <div class="quickview-color">
                                            <ul>
                                                <li class="blue">b</li>
                                                <li class="red">r</li>
                                                <li class="pink">p</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                    </div>
                                    <button>Add to cart</button>
                                </div>
                                <span><i class="fa fa-check"></i> In stock</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    
    
    
    
	
	<!-- all js here -->
    
    <script type="text/javascript" src="<?= $url;?>assets/js/popper.js"></script>
    
    <script type="text/javascript" src="<?= $url;?>assets/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/ajax-mail.js"></script>
    
    <script type="text/javascript" src="<?= $url;?>assets/js/plugins.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
</body>
</html>