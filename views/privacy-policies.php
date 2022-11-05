<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/footer-settings.php';
require_once '../model/categories.php';
$categories = new Categories();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Señor Wong - Políticas de Privacidad</title>
    <?php require_once 'includes/inc_header_links.php';?>
    <!-- INCLUIR MEANMENU -->
    <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
    <!-- INCLUIR SCROLLUP -->
    <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
    <!-- INCLUIR CRYPTO-JS -->
    <script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>
    <!-- INCLUIR SWEET ALERT 2 -->
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<style type="text/css">
    #c_privacy-policies > div > h1,
    #c_privacy-policies > div > h2,
    #c_privacy-policies > div > h3,
    #c_privacy-policies > div > h4,
    #c_privacy-policies > div > h5,
    #c_privacy-policies > div > h6{
        display: block;
        text-align:center;
        font-size: 2.05rem;
        margin-bottom: 1rem;
    }
    @media (min-width: 991px){
        #c_privacy-policies > div > h1,
        #c_privacy-policies > div > h2,
        #c_privacy-policies > div > h3,
        #c_privacy-policies > div > h4,
        #c_privacy-policies > div > h5,
        #c_privacy-policies > div > h6{
            display: block;
            text-align:center;
            font-size: 2.313rem;
            margin-bottom: 2rem;
        }   
    }
    #c_privacy-policies p{
        font-size: 1rem;
        font-weight: 500;
        line-height: 24px;
        color: #242424;
        margin-bottom: 15px;
        font-family: sans-serif;
    }
    #c_privacy-policies ul,
    #c_privacy-policies li{
        list-style: disc;
    }
    #c_privacy-policies li{
        font-size: 1rem;
        font-weight: 500;
        line-height: 24px;
        color: #242424;
        margin-bottom: 15px;
        font-family: sans-serif;
    }
    #c_privacy-policies ul, menu, dir {
       display: block;
       list-style-type: disc;
       -webkit-margin-before: 1em;
       -webkit-margin-after: 1em;
       -webkit-margin-start: 0px;
       -webkit-margin-end: 0px;
       -webkit-padding-start: 40px;
    }
    
</style>
<body>
  <?php require_once 'includes/inc_header_top.php';?>
  <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Inicio</a></li>
          <li class="active">Políticas de Privacidad</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="category-page-area pt-50 pb-100">
    <div class="container" id="c_privacy-policies">
      <?php 
        require_once '../model/business-settings.php';
        echo $dmlBusinessSettings->getPrivacyPolicies();
      ?>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
  <?php require_once 'includes/inc_mobile-tabs-links-footer.php';?>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/privacy-policies.js"></script>
</body>
</html>