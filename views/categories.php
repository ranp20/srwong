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
                <?php echo $categories->getAllCategories();?>
                <!-- LIST ALL PRODUCTS BY NAME CATEGORIES (END) -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
  <?php require_once 'includes/inc_mobile-tabs-links-footer.php';?>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/categories.js"></script>
</body>
</html>
