<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();

if(isset($_GET['prod']) && !empty($_GET) && is_numeric($_GET['prod'])){
  require_once '../controllers/prcss_details-prod-byIdProd.php';
  $prod = new ProductDetail();
  $l_details = $prod->list($_GET['prod']);
}else{
  header("Location: ../");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>    
  <title>SrWong - Detalle de producto</title>
  <?php require_once 'includes/inc-header_links.php';?>
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
  <?php require_once 'includes/inc-header_top-ind.php';?>
  <div class="loader-in">
    <span class="loader-in--loader"></span>
  </div>
  <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="../">Home</a></li>
          <li class="active">Product Details </li>
        </ul>
      </div>
    </div>
  </div>
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
    foreach ($l_details as $k => $v){
      // print_r($v['p_name']);
      $p_name = substr($v["p_name"], 0, 60);
      $p_desc = ($v["p_desc"] != "") ? substr($v["p_desc"], 0, 120) : "No especificado";
      $p_price_new = floatval($v['p_price']);
      $p_price_new_convert = addTwoDecimalsOrGuion($p_price_new);
      $p_status = ($v["p_status"] == 1) ? "Disponible" : "No disponible";

      $tmp .= "
      <div class='product-details pt-100 pb-90'>
        <div class='container'>
          <div class='row'>
            <div class='col-lg-6 col-md-12'>
              <div class='product-details-img'>
                <img class='zoompro' src='{$url}assets/img/product/mostricrunh.jpg' data-zoom-image='{$url}assets/img/product-details/product-details.jpg' alt='zoom'/>
                <span>-29%</span>
              </div>
            </div>
            <div class='col-lg-6 col-md-12'>
              <div class='product-details-content'>
                <h4>{$p_name}</h4>
                <div class='rating-review'>
                  <div class='pro-dec-rating'>
                    <i class='ion-android-star-outline theme-star'></i>
                    <i class='ion-android-star-outline theme-star'></i>
                    <i class='ion-android-star-outline theme-star'></i>
                    <i class='ion-android-star-outline theme-star'></i>
                    <i class='ion-android-star-outline'></i>
                  </div>
                  <div class='pro-dec-review'>
                    <ul>
                      <li>32 Reviews </li>
                      <li> Add Your Reviews</li>
                    </ul>
                  </div>
                </div>
                <span>S/. {$p_price_new_convert}</span>
                <div class='in-stock'>
                  <p>Estado: <span>{$p_status}</span></p>
                </div>
                <p>{$p_desc}</p>
                <div class='pro-dec-feature'>
                  <ul>
                    <li><input type='checkbox'> Chicken Popeyes: <span>  $4.99</span></li>
                    <li><input type='checkbox'> Organic Smoothie : <span> $9.99</span></li>
                    <li><input type='checkbox'> Beef Burger With Extra Cheese: <span> Red  $16.99</span></li>
                    <li><input type='checkbox'> Fries McDonald's: <span>$14.99</span></li>
                  </ul>
                </div>
                <div class='pro-details-cart-wrap'>
                  <div class='shop-list-cart-wishlist'>
                    <a title='Add To Cart' href='javascript:void(0);' class='a__tocart'
                      dt-srwg_name='{$p_name}'
                      dt-srwg_price='{$p_price_new_convert}'
                      dt-srwg_image='{$url}assets/img/product/mostricrunh.jpg'
                      dt-srwg_id='{$v["id"]}'
                    >
                      <i class='ion-android-cart'></i>
                    </a>
                    <!-- <a title='Wishlist' href='javascript:void(0);'>
                      <i class='ion-ios-heart-outline'></i>
                    </a> -->
                  </div>
                  <!--
                  <div class='product-quantity'>
                    <div class='cart-plus-minus'>
                      <div class='dec qtybutton'>-</div>
                      <input class='cart-plus-minus-box' type='text' name='qtybutton' value='2'>
                      <div class='inc qtybutton'>+</div>
                    </div>
                  </div>
                  -->
                </div>
                <div class='pro-dec-categories'>
                  <ul>
                    <li class='categories-title'>Categories:</li>
                    <li><a href='javascript:void(0);'>Fast Foods,</a></li>
                    <li><a href='javascript:void(0);'> Rich Foods, </a></li>
                    <li><a href='javascript:void(0);'>Custom Orders,</a></li>
                  </ul>
                </div>
                <div class='pro-dec-categories'>
                  <ul>
                    <li class='categories-title'>Tags: </li>
                    <li><a href='javascript:void(0);'> Cheesy,</a></li>
                    <li><a href='javascript:void(0);'> Fast Food, </a></li>
                    <li><a href='javascript:void(0);'> French Fries,</a></li>
                  </ul>
                </div>
                <div class='pro-dec-social'>
                  <ul>
                    <li><a class='tweet' href='javascript:void(0);'><i class='ion-social-twitter'></i> Tweet</a></li>
                    <li><a class='share' href='javascript:void(0);'><i class='ion-social-facebook'></i> Share</a></li>
                    <li><a class='google' href='javascript:void(0);'><i class='ion-social-googleplus-outline'></i> Google+</a></li>
                    <li><a class='pinterest' href='javascript:void(0);'><i class='ion-social-pinterest'></i> Pinterest</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class='description-review-area pb-100'>
        <div class='container'>
          <div class='description-review-wrapper'>
            <div class='description-review-topbar nav text-center'>
              <a class='active' data-toggle='tab' href='#des-details1'>Descripción</a>
              <a data-toggle='tab' href='#des-details2'>Etiquetas</a>
              <a data-toggle='tab' href='#des-details3'>Reseñas</a>
            </div>
            <div class='tab-content description-review-bottom'>
              <div id='des-details1' class='tab-pane active'>
                <div class='product-description-wrapper'>
                  {$p_desc}
                </div>
              </div>
              <div id='des-details2' class='tab-pane'>
                <div class='product-anotherinfo-wrapper'>
                  <ul>
                    <li><span>Tags:</span></li>
                    <li><a href='javascript:void(0);'> All,</a></li>
                    <li><a href='javascript:void(0);'> Cheesy,</a></li>
                    <li><a href='javascript:void(0);'> Fast Food,</a></li>
                    <li><a href='javascript:void(0);'> French Fries,</a></li>
                    <li><a href='javascript:void(0);'> Hamburger,</a></li>
                    <li><a href='javascript:void(0);'> Pizza</a></li>
                  </ul>
                </div>
              </div>
              <div id='des-details3' class='tab-pane'>
                <div class='rattings-wrapper'>
                  <div class='sin-rattings'>
                    <div class='star-author-all'>
                      <div class='ratting-star f-left'>
                        <i class='ion-star theme-color'></i>
                        <i class='ion-star theme-color'></i>
                        <i class='ion-star theme-color'></i>
                        <i class='ion-star theme-color'></i>
                        <i class='ion-star theme-color'></i>
                        <span>(5)</span>
                      </div>
                      <div class='ratting-author f-right'>
                        <h3>tayeb rayed</h3>
                        <span>12:24</span>
                        <span>9 March 2018</span>
                      </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                  </div>
                  <div class='sin-rattings'>
                    <div class='star-author-all'>
                      <div class='ratting-star f-left'>
                        <i class='ion-star theme-color'></i>
                        <i class='ion-star theme-color'></i>
                        <i class='ion-star theme-color'></i>
                        <i class='ion-star theme-color'></i>
                        <i class='ion-star theme-color'></i>
                        <span>(5)</span>
                      </div>
                      <div class='ratting-author f-right'>
                        <h3>farhana shuvo</h3>
                        <span>12:24</span>
                        <span>9 March 2018</span>
                      </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                  </div>
                </div>
                <div class='ratting-form-wrapper'>
                  <h3>Add your Comments :</h3>
                  <div class='ratting-form'>
                    <form action='javascript:void(0);'>
                      <div class='star-box'>
                        <h2>Rating:</h2>
                        <div class='ratting-star'>
                          <i class='ion-star theme-color'></i>
                          <i class='ion-star theme-color'></i>
                          <i class='ion-star theme-color'></i>
                          <i class='ion-star theme-color'></i>
                          <i class='ion-star'></i>
                        </div>
                      </div>
                      <div class='row'>
                        <div class='col-md-6'>
                          <div class='rating-form-style mb-20'>
                            <input placeholder='Name' type='text'>
                          </div>
                        </div>
                        <div class='col-md-6'>
                          <div class='rating-form-style mb-20'>
                            <input placeholder='Email' type='text'>
                          </div>
                        </div>
                        <div class='col-md-12'>
                          <div class='rating-form-style form-submit'>
                            <textarea name='message' placeholder='Message'></textarea>
                            <input type='submit' value='add review'>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      ";
    }
    echo $tmp;
  ?>
  
        
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
