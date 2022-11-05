<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/footer-settings.php';
if(!isset($_SESSION['usr-logg_srwong'])){
  header("Location: ./login-register");
}else{
  require_once '../model/categories.php';
  $categories = new Categories();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>    
  <?php require_once 'includes/inc_header_links.php';?>
  <title>Señor Wong - Confirmaci贸n de compra</title>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR CRYPTO-JS -->
  <script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>
</head>
<style type="text/css">
    .btn-theme__link{
        background-color: #e41a25 !important;
        color: #fff !important;
        padding: 18px 10px 19px !important;
        max-width: 400px !important;
        width: 95% !important;
        margin: 0 auto !important;
        font-size: 1.1rem !important;
        font-weight: 600 !important;
        border: none !important;
        display: block !important;
        line-height: 1 !important;
        border-radius: 3px !important;
        text-align: center !important;
        text-transform: uppercase !important;
        transition: all ease-in-out .2s !important;
    }
    .btn-theme__link:hover {
        background-color: #242424 !important;
        color: #fff !important;
    }
</style>
<body>
  <?php require_once 'includes/inc_header_top.php';?>
    <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Home</a></li>
          <li class="active"> Confirmaci贸n </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- checkout-area start -->
  <div class="checkout-area pb-80 pt-50">
    <div class="container">
      <div class="row">
        <div class="ml-auto mr-auto col-lg-8">
          <div class="checkout-wrapper">
            <div style="text-align: center;">            
              <h1>脡XITO!</h1>
              <p>Su compra ha sido procesada correctamente.</p>
              <div class="col-xl-6 m-auto">
                <a href="./" class="btn-theme__link" title="Ir al inicio">
                  <span>IR AL INICIO</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
  <?php require_once 'includes/inc_mobile-tabs-links-footer.php';?>
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/confirm.js"></script>
</body>
</html>
