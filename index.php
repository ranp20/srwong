<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();

require_once 'model/products.php';
require_once 'model/categories.php';
$products = new Products();
$l_products = $products->getAll();
$categories = new Categories();
$l_categories = $products->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'views/includes/inc-header_links.php';?>
  <title>SrWong - Deliveries y Pedidos</title>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR CRYPTO-JS -->
  <script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>
  <!-- INCLUIR SLICK -->
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/slick/slick.css">
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/slick/slick-theme.css">
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/slick/slick.min.js"></script>
  <!-- INCLUIR WAYPOINTS -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/waypoints/noframework.waypoints.min.js"></script>
  <!-- INCLUIR COUNTER-UP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/Counter-Up/jquery.counterup.min.js"></script>
  <!-- INCLUIR ELEVATEZOOM -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/elevatezoom/jquery.elevateZoom-3.0.8.min.js"></script>
  <!-- INCLUIR MAGNIFIC-POP-UP -->
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/Magnific-Popup/magnific-popup.css">
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/Magnific-Popup/jquery.magnific-popup.min.js"></script>
  <!-- INCLUIR OWL CAROUSEL 2 -->
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/assets/owl.carousel.min.css">
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/owl.carousel.min.js"></script>
</head>
<body>
  <?php require_once 'views/includes/inc-header_top.php';?>
  <div class="loader-in">
    <span class="loader-in--loader"></span>
  </div>
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
            <a href="javascript:void(0);"><img src="<?= $url;?>assets/img/banner/banner-1.jpg" alt=""></a>
          </div>
        </div>
      </div>
      <div class="banner-right-side mb-20">
        <div class="single-banner mb-20">
          <div class="hover-style">
            <a href="javascript:void(0);"><img src="<?= $url;?>assets/img/banner/banner-2.jpg" alt=""></a>
          </div>
        </div>
        <div class="single-banner">
          <div class="hover-style">
            <a href="javascript:void(0);"><img src="<?= $url;?>assets/img/banner/banner-3.jpg" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="product-area pb-70">
    <div class="custom-container container">
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
          <div class="products-tabfilter-home owl-carousel owl-theme row">
            <?php 
              function addTwoDecimalsOrGuion($number){
                $output_final = "";
                if($number != "0" || $number != 0){
                  $output_num = explode(".", $number);
                  if(!isset($output_num[1]) || $output_num[1] == "undefined" || $output_num[1] == ""){
                    $output_final = number_format($number).".00";
                  }else if(isset($output_num[1]) && strlen($output_num[1]) < 2){
                    $output_final = number_format($output_num[0]).".".$output_num[1]."0";
                  }else{
                    $output_final = number_format($output_num[0]).".".$output_num[1];
                  }
                }else{
                  $output_final = 0.00;
                }
                return $output_final;
              }

              $tmp = "";
              foreach ($l_products as $key => $value){

                $price_new = floatval($value['price']);
                $price_new_convert = addTwoDecimalsOrGuion($price_new);
                $price_old = $price_new - 10;
                $price_old_convert = addTwoDecimalsOrGuion($price_old);
                $prod_categories = substr($value['category_ids'], 1, strlen($value['category_ids']) - 2);
                $prod_list_categories = json_decode($prod_categories, TRUE);
                
                $tmp .= "
                  <div class='item'>
                    <div class='product-wrapper mb-25'>
                      <div class='product-img'>
                        <a href='product-details'>
                          <img src='{$url}assets/img/product/product-1.jpg' alt=''>
                        </a>
                        <div class='product-action'>
                          <div class='pro-action-left'>
                            <a title='Add Tto Cart' href='javascript:void(0);' class='a__tocart'><i class='ion-android-cart'></i> Add Tto Cart</a>
                          </div>
                          <div class='pro-action-right'>
                            <a title='Wishlist' href='wishlist'><i class='ion-ios-heart-outline'></i></a>
                            <a title='Quick View' data-toggle='modal' data-target='#exampleModal' href='javascript:void(0);'><i class='ion-android-open'></i></a>
                          </div>
                        </div>
                      </div>
                      <div class='product-content'>
                        <h4>
                          <a href='product-details'>{$value['name']}</a>
                        </h4>
                        <div class='product-price-wrapper'>
                          <span>S/. {$price_new_convert}</span>
                            <span class='product-price-old'>S/. {$price_old_convert} </span>
                        </div>
                        <p><strong>ID CATEGORÍA: {$prod_list_categories['id']}</strong></p>
                      </div>
                    </div>
                </div>
                ";
              }
              echo $tmp;
            ?>
            
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
            <a href="javascript:void(0);">Order Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="best-food-area pt-100 pb-95">
    <div class="custom-container container">
      <div class="row">
        <div class="best-food-width-1">
          <div class="single-banner">
            <div class="hover-style">
              <a href="javascript:void(0);"><img src="<?= $url;?>assets/img/banner/banner-5.jpg" alt=""></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                  <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                              </div>
                              <div class="pro-action-right">
                                  <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                  <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                    <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                </div>
                                <div class="pro-action-right">
                                    <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                    <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                    <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                </div>
                                <div class="pro-action-right">
                                    <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                    <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                    <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                </div>
                                <div class="pro-action-right">
                                    <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                    <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
                                    <a title="Add Tto Cart" href="javascript:void(0);" class="a__tocart"><i class="ion-android-cart"></i> Add Tto Cart</a>
                                </div>
                                <div class="pro-action-right">
                                    <a title="Wishlist" href="wishlist"><i class="ion-ios-heart-outline"></i></a>
                                    <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);"><i class="ion-android-open"></i></a>
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
              <a href="javascript:void(0);"><img src="<?= $url;?>assets/img/banner/banner-6.jpg" alt=""></a>
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
  <?php require_once 'views/includes/inc-footer.php';?>
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
    <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/home-settings.js"></script>
</body>
</html>
