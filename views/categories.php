<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/categories.php';
$catg = new Categories();

?>
<!DOCTYPE html>
<html lang="es">
<head>    
  <title>SrWong - Categorías</title>
  <?php require_once 'includes/inc_header_links.php';?>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR OWL CAROUSEL 2 -->
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/assets/owl.carousel.min.css">
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/owl.carousel.min.js"></script>
  <!-- INCLUIR CRYPTO-JS -->
  <script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <?php require_once 'includes/inc_header_top.php';?>
  <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="../">Home</a></li>
          <li class="active">Categorías</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="category-page-area pt-50 pb-100">
    <div class="container">
      <div class="row flex-row-reverse mb-20">
        <div class="col-12">
          <h3 class="category-title" style="font-size: 20px;">TODAS LAS CATEGORÍAS</h3>
        </div>
      </div>
      <div class="row flex-row-reverse">
        <div class="col-12">
          <div class="grid-list-product-wrapper">
            <div class="product-grid product-view pb-20">
              <div class="row">
                <!-- LIST ALL PRODUCTS BY NAME CATEGORIES (INIT) -->
                <?php echo $catg->getAllCategories();?>
                <!-- LIST ALL PRODUCTS BY NAME CATEGORIES (END) -->
              </div>
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
                <img src="<?= $url;?>assets/img/logo/logo.png" alt="">
              </a>
            </div>
            <p>Restaurante de venta de comida china.</p>  
          </div>

        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-22">
              <h4>CATEGORÍAS</h4>
            </div>
            <div class="footer-content">
              <ul>
                <?php
                  $tmp_ctgshort = "";
                  foreach($shortListCatg as $k => $v){
                    $catg_name = mb_convert_case($v['name'], MB_CASE_TITLE, "UTF-8");
                    $tmp_ctgshort .= "<li><a href='./category/{$v['id']}'>{$catg_name}</a></li>";
                  }
                  echo $tmp_ctgshort;
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-22">
              <h4>MENÚ</h4>
            </div>
            <div class="footer-content">
              <ul>
                <li><a href="my-account">Perfil</a></li>
                <li><a href="about-us">Nosotros</a></li>
                <li><a href="wishlist">Políticas de privacidad</a></li>
                <li><a href="javascript:void(0);">Términos y condiciones</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-22">
              <h4>INFORMACIÓN DE CONTACTO</h4>
            </div>
            <div class="footer-contact">
              <ul>
                <li>Av. Los Jardines este 173 Urb. Las flores 78 S.J.L</li>
                <li>Teléfonos: (01) 612 8000 </li>
                <li>Email: <a href="javascript:void(0);">ventas@srwong.pe</a></li>
              </ul>
            </div>
            <div class="mt-35 footer-title mb-22">
              <h4>Horarios</h4>
            </div>
            <div class="footer-time">
              <ul>
                <li>Abierto:  <span>8:00 AM</span> - Cerrado: <span>18:00 PM</span></li>
                <li>Sábado y Domingo: <span>Abierto</span></li>
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
            <p>Copyright © <a href="javascript:void(0);">SrWong.</a> Todos los derechos reservados.</p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-5">
          <div class="footer-social">
            <ul>
              <li><a href="javascript:void(0);"><i class="ion-social-facebook"></i></a></li>
              <li><a href="javascript:void(0);"><i class="ion-social-twitter"></i></a></li>
              <li><a href="javascript:void(0);"><i class="ion-social-instagram-outline"></i></a></li>
              <li><a href="javascript:void(0);"><i class="ion-social-googleplus-outline"></i></a></li>
              <li><a href="javascript:void(0);"><i class="ion-social-rss"></i></a></li>
              <li><a href="javascript:void(0);"><i class="ion-social-dribbble-outline"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php require_once 'includes/inc_mobile-tabs-links-footer.php';?>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/category.js"></script>
</body>
</html>
