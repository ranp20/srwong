<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/footer-settings.php';
if(isset($_GET['cat']) && !empty($_GET) && is_numeric($_GET['cat'])){
  require_once '../model/categories.php';
  $categories = new Categories();
  $liById = $categories->getCategoriesByIdCategory($_GET['cat']);
}else{
  header("Location: ../");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>    
  <title>Señor Wong - Categoría <?= (isset($liById[0]['name']) && $liById[0]['name'] != "") ? $liById[0]['name'] : "";?></title>
  <?php require_once 'includes/inc_header_links.php';?>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR OWL CAROUSEL 2 -->
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/assets/owl.carousel.min.css">
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/owl.carousel.min.js"></script>
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
          <li><a href="../">Inicio</a></li>
          <li class="active">Categoría </li>
        </ul>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_products-by-category-name.php';?>
  <?php require_once 'includes/inc_footer-ind.php';?>
  <?php require_once 'includes/inc_mobile-tabs-links-footer-ind.php';?>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/category.js"></script>
</body>
</html>
