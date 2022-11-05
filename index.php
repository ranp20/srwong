<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once './model/products.php';
require_once './model/categories.php';
require_once './model/footer-settings.php';
$products = new Products();
$categories = new Categories();
$l_products = $products->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'views/includes/inc_header_links.php';?>
  <title>Señor Wong - Deliveries y Pedidos</title>
  <meta name="description" content="Venta de comida china"/>
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
  <!-- INCLUIR OWL CAROUSEL 2 -->
  <link rel="stylesheet" href="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/assets/owl.carousel.min.css">
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/OwlCarousel2/dist/owl.carousel.min.js"></script>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <?php require_once 'views/includes/inc_header_top.php';?>
  <?php require_once 'views/includes/inc_carousel-home.php';?>
  <?php require_once 'views/includes/inc_category-list-home.php';?>
  <?php require_once 'views/includes/inc_popular-products-home.php';?>
  <?php require_once 'views/includes/inc_footer.php';?>
  <?php require_once 'views/includes/inc_mobile-tabs-links-footer.php';?>
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/home-settings.js"></script>
</body>
</html>
