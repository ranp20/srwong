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
  <title>SrWong - Sobre nosotros</title>
  <?php require_once 'includes/inc_header_links.php';?>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR WAYPOINTS -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <!-- INCLUIR COUNTER-UP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
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
                      <h2>Bienvenidos a la tienda <span>Señor Wong</span>!</h2>
                      <p class="peragraph-blog">

Somos un restaurante dedicado a la preparación de platos provenientes de diferentes regiones del Perú.

Nuestro principal propósito es dar un servicio de calidad, brindando una experiencia amigable y distinta en cada visita.
</p>
                      
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
