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
      
        <div class="c-cofrm__c__ct--ccont">
          <div class="c-cofrm__c__ct--ccont__c">
            <div class="c-cofrm__c__ct--ccont__c--cTitle">
              <?php
                
                $srwong_usr_name = "";
                if(isset($_SESSION['usr-logg_srwong']['f_name']) && $_SESSION['usr-logg_srwong']['f_name'] != "" && $_SESSION['usr-logg_srwong']['f_name'] != "No especificado" && isset($_SESSION['usr-logg_srwong']['l_name']) && $_SESSION['usr-logg_srwong']['l_name'] != "" && $_SESSION['usr-logg_srwong']['l_name'] != "No especificado"){
                  $srwong_usr_originname = explode(" ", $_SESSION['usr-logg_srwong']['f_name']);
                  $srwong_usr_name = $srwong_usr_originname[0];
                }else if(isset($_SESSION['usr-logg_srwong']['username']) && $_SESSION['usr-logg_srwong']['username'] != "" && $_SESSION['usr-logg_srwong']['username'] != "No especificado"){
                  $srwong_usr_name = $_SESSION['usr-logg_srwong']['username'];
                }else{
                  $srwong_usr_name = "estimad@ client@";
                }
                
              ?>
              <h2>ola <?= $srwong_usr_name; ?>!</h2>
              <span class="c-cofrm__c__ct--ccont__c--cTitle__cIcon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50px" height="50px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m307.15 324.84 141.5-133.52c25.906-23.914 61.781 13.949 35.871 37.863l-159.43 151.46c-9.9648 9.9648-27.898 9.9648-37.863-1.9922l-83.699-85.695c-23.914-23.914 13.949-59.785 37.863-35.871l65.766 67.758z" fill-rule="evenodd"/><path d="m351 0c153.45 0 279 125.55 279 281 0 153.45-125.55 279-279 279-155.45 0-281-125.55-281-279 0-155.45 125.55-281 281-281zm0 508.18c125.55 0 227.19-101.64 227.19-227.19 0-127.54-101.64-229.18-227.19-229.18-127.54 0-229.18 101.64-229.18 229.18 0 125.55 101.64 227.19 229.18 227.19z" fill-rule="evenodd"/></g></svg>
              </span>
            </div>
            <div class="c-cofrm__c__ct--ccont__c--cMssg">
              <p>Nuestros cocineros ya est醤 preparando tu pedido.</p>
              <p><strong>Tiempo estimado de entrega: 60 minutos aproximadamente.</strong></p>
              <p>Tu pedido podr韆 demorar unos minutos m醩, ya que cuidamos con cumplir al 100% todos los protocolos de salubridad para que disfrutes tu Bembos con total seguridad. Agradecemos tu comprensi髇.</p>
            </div>
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
  <?php require_once 'includes/inc_footer.php';?>
  <?php require_once 'includes/inc_mobile-tabs-links-footer.php';?>
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/confirm.js"></script>
</body>
</html>
