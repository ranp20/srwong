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
  <title>Señor Wong - Contacto</title>
  <?php require_once 'includes/inc_header_links.php';?>
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
          <li class="active"> Contáctanos </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="contact-area pt-100 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-12">
          <div class="contact-info-wrapper text-center mb-30">
            <div class="contact-info-icon">
              <i class="ion-ios-location-outline"></i>
            </div>
            <div class="contact-info-content">
              <h4>Our Location</h4>
              <p>012 345 678 / 123 456 789</p>
              <p><a href="#">info@example.com</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="contact-info-wrapper text-center mb-30">
            <div class="contact-info-icon">
              <i class="ion-ios-telephone-outline"></i>
            </div>
            <div class="contact-info-content">
              <h4>Contact us Anytime</h4>
              <p>Mobile: 012 345 678</p>
              <p>Fax: 123 456 789</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
          <div class="contact-info-wrapper text-center mb-30">
            <div class="contact-info-icon">
              <i class="ion-ios-email-outline"></i>
            </div>
            <div class="contact-info-content">
              <h4>Write Some Words</h4>
              <p><a href="#">Support24/7@example.com </a></p>
              <p><a href="#">info@example.com</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="contact-message-wrapper">
            <h4 class="contact-title">PONERSE EN CONTACTO</h4>
            <div class="contact-message">
              <form id="contact-form" action="<?= $url;?>assets/mail" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="contact-form-style mb-20">
                      <input name="name" placeholder="Nombres completos" type="text">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="contact-form-style mb-20">
                      <input name="email" placeholder="Email" type="email">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="contact-form-style mb-20">
                      <input name="subject" placeholder="Asunto" type="text">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="contact-form-style">
                      <textarea name="message" placeholder="Mensaje"></textarea>
                      <button class="submit btn-style" type="submit">ENVIAR MENSAJE</button>
                    </div>
                  </div>
                </div>
              </form>
              <p class="form-messege"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="contact-map">
        <div id="map"></div>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
  <!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmGmeot5jcjdaJTvfCmQPfzeoG_pABeWo"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/contact-us.js"></script>
</body>
</html>
