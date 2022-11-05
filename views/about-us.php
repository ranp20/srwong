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
  <title>Señor Wong - Sobre nosotros</title>
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
<body>
    <?php require_once 'includes/inc_header_top.php';?>
  <div class="breadcrumb-area gray-bg">
      <div class="container">
          <div class="breadcrumb-content">
              <ul>
                  <li><a href="./">Home</a></li>
                  <li class="active">Nosotros </li>
              </ul>
          </div>
      </div>
  </div>
  <?php
    /*
    require_once '../model/business-settings.php';
    $buss_settings = new BusinessSettings();
    $list_schedule = $buss_settings->getTimeSchedule();
    $messagealert = "";
    date_default_timezone_set('America/Lima');
    echo date('H:i:s');
    foreach($list_schedule as $k => $v){
        $open_t = $v['open_time'];
        $clos_t = $v['closing_time'];
        if (date('H') > $clos_t) {
           $messagealert = "Lo sentimos, en estos momentos nos encontramos fuera del horario de trabajo.";
        }
    }
    echo $messagealert;
    */
  ?>
  <div class="about-us-area pt-100 pb-100">
      <div class="container">
          <div class="row">
             <div class="col-lg-6 col-md-5">
                  <div class="overview-img text-center">
                      <a href="#">
                          <img src="<?= $url;?>assets/img/background.jpg" alt="">
                      </a>
                  </div>
              </div>
              <div class="col-lg-6 col-md-7 d-flex align-items-center">
                  <div class="overview-content-2">
                      <?php 
        require_once '../model/business-settings.php';
        echo $dmlBusinessSettings->getAboutUs();
      ?>
                     
                      
                  </div>
              </div>
              
          </div>
      </div>
  </div>



    <?php require_once 'includes/inc_footer.php';?>
  </div>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/about-us.js"></script>
</body>
</html>
