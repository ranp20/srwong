<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();

if(isset($_GET['prod']) && !empty($_GET) && is_numeric($_GET['prod'])){
  require_once '../model/products.php';
  require_once '../model/categories.php';
  $categories = new Categories();
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
  <!-- INCLUIR SLICK -->
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/slick/slick.css">
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/slick/slick-theme.css">
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/slick/slick.min.js"></script>
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
          <h3 class="section-title section-bg-white">Productos relacionados</h3>
        </div>
      </div>
      <div class="related-product-active owl-carousel product-nav">
        <?php
          echo $dmlProducts->getRelatedProducts($dmlProducts->getArrCategories($_GET['prod']), $_GET['prod']);
        ?>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
  <?php require_once 'includes/inc_mobile-tabs-links-footer-ind.php';?>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/product-details.js"></script>
</body>
</html>
