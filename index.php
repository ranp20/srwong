<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();

require_once 'model/products.php';
require_once 'model/categories.php';
$products = new Products();
$categories = new Categories();
$l_products = $products->getAll();
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
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
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
  <?php require_once 'views/includes/inc-category-list-home.php';?>
  <?php require_once 'views/includes/inc-products-filter-home.php';?>
  <?php require_once 'views/includes/inc-popular-products-home.php';?>
  <?php require_once 'views/includes/inc-latest-products-home.php';?>
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
