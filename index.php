<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
  <?php require_once 'views/includes/inc-header_links.php';?>
  <title>SrWong - Deliveries y Pedidos</title>
  <!-- INCLUIR OWL CAROUSEL 2 -->
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/assets/owl.carousel.min.css">
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/owl.carousel.min.js"></script>
</head>
<body>
  <?php require_once 'views/includes/inc-header_top.php';?>
  <div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
      <div class="single-slider pt-210 pb-220 bg-img" style="background-image:url(<?= $url;?>assets/img/slider/slider-1.jpg);">
        <div class="container">
          <div class="slider-content slider-animated-1">
            <h1 class="animated">Drink & Heathy Food</h1>
            <h3 class="animated">Fresh Heathy and Organic.</h3>
            <div class="slider-btn mt-90">
              <a class="animated" href="product-details">Order Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="single-slider pt-210 pb-220 bg-img" style="background-image:url(<?= $url;?>assets/img/slider/slider-2.jpg);">
        <div class="container">
          <div class="slider-content slider-animated-1">
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
  <div class="banner-area row-col-decrease pt-100 pb-75 clearfix">
    <div class="container">
      <div class="banner-left-side mb-20">
        <div class="single-banner">
          <div class="hover-style">
            <a href="#"><img src="<?= $url;?>assets/img/banner/banner-1.jpg" alt=""></a>
          </div>
        </div>
      </div>
      <div class="banner-right-side mb-20">
        <div class="single-banner mb-20">
          <div class="hover-style">
            <a href="#"><img src="<?= $url;?>assets/img/banner/banner-2.jpg" alt=""></a>
          </div>
        </div>
        <div class="single-banner">
          <div class="hover-style">
            <a href="#"><img src="<?= $url;?>assets/img/banner/banner-3.jpg" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="product-area pb-70">
    <div class="custom-container">
      <div class="product-tab-list-wrap text-center mb-40">
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
      <div class="tab-content jump">
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
  <div class="banner-area">
    <div class="container">
      <div class="discount-overlay bg-img pt-130 pb-130" style="background-image:url(<?= $url;?>assets/img/banner/banner-4.jpg);">
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
  <div class="best-food-area pt-100 pb-95">
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
          <div class="product-top-bar section-border mb-25">
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
          <div class="tab-content jump">
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
  <div class="brand-logo-area pb-100">
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
  <script src="<?= $url;?>assets/js/popper.js"></script>
  <script src="<?= $url;?>assets/js/imagesloaded.pkgd.min.js"></script>
  <script src="<?= $url;?>assets/js/isotope.pkgd.min.js"></script>
  <script src="<?= $url;?>assets/js/ajax-mail.js"></script>
  <script src="<?= $url;?>assets/js/plugins.js"></script>
  <script src="<?= $url;?>assets/js/main.js"></script>
</body>
</html>
