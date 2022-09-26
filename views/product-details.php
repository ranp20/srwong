<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();

if(isset($_GET['prod']) && !empty($_GET) && is_numeric($_GET['prod'])){
  require_once '../model/Products.php';
  $l_details = $dmlProducts->getProductDescription($_GET['prod']);
  
}else{
  header("Location: ../");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>    
  <title>SrWong - Detalle de producto</title>
  <?php require_once 'includes/inc_header_links.php';?>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR OWL CAROUSEL 2 -->
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/assets/owl.carousel.min.css">
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/owl.carousel.min.js"></script>
  <!-- INCLUIR ELEVATEZOOM -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/elevatezoom/jquery.elevateZoom-3.0.8.min.js"></script>
  <!-- INCLUIR CRYPTO-JS -->
  <script type="text/javascript" src="../node_modules/crypto-js/crypto-js.js"></script>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <?php require_once 'includes/inc_header_top-ind.php';?>
  <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="../">Home</a></li>
          <li class="active">Detalle del producto </li>
        </ul>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_product-details.php';?>        
  <div class="product-area pb-95">
    <div class="container">
      <div class="product-top-bar section-border mb-25">
        <div class="section-title-wrap">
          <h3 class="section-title section-bg-white">Related Products</h3>
        </div>
      </div>
      <div class="related-product-active owl-carousel product-nav">
        <div class="product-wrapper">
          <div class="product-img">
            <a href="product-details">
              <img src="<?= $url;?>assets/img/product/product-1.jpg" alt="">
            </a>
            <div class="product-action">
              <div class="pro-action-left">
                <a title="Add Tto Cart" href="javascript:void(0);"><i class="ion-android-cart"></i> Add Tto Cart</a>
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
                <a title="Add Tto Cart" href="javascript:void(0);"><i class="ion-android-cart"></i> Add Tto Cart</a>
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
                <a title="Add Tto Cart" href="javascript:void(0);"><i class="ion-android-cart"></i> Add Tto Cart</a>
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
                <a title="Add Tto Cart" href="javascript:void(0);"><i class="ion-android-cart"></i> Add Tto Cart</a>
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
        <div class="product-wrapper">
          <div class="product-img">
            <a href="product-details">
              <img src="<?= $url;?>assets/img/product/product-7.jpg" alt="">
            </a>
            <div class="product-action">
              <div class="pro-action-left">
                <a title="Add Tto Cart" href="javascript:void(0);"><i class="ion-android-cart"></i> Add Tto Cart</a>
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
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
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
                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
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
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/product-details.js"></script>
</body>
</html>
