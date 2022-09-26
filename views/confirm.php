<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['usr-logg_srwong'])){
  header("Location: ./login-register");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>    
  <?php require_once 'includes/inc_header_links.php';?>
  <title>SrWong - Confirmación de compra</title>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
</head>
<body>
  <?php require_once 'includes/inc_header_top.php';?>
    <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Home</a></li>
          <li class="active"> Confirmación </li>
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
              <h1>ÉXITO!</h1>
              <p>Su compra ha sido procesada correctamente.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
</body>
</html>
