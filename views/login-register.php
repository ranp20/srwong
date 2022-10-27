<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/footer-settings.php';
if(isset($_SESSION['usr-logg_srwong'])){
  header("Location: ./");
}else{
  require_once '../model/categories.php';
  $categories = new Categories();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Señor Wong - Iniciar sesión | Registrarse</title>
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
          <li class="active"> Iniciar Sesión / Registrarse </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="login-register-area pt-20 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
          <div class="logo" style="text-align: center;margin-bottom: 1rem;">
            <img alt="logo_loggregister" src="<?= $url;?>assets/img/logo/logo.png">
          </div>
        </div>
        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
          <div class="login-register-wrapper">
            <div class="login-register-tab-list nav">
              <a class="active" data-toggle="tab" href="#lg1">
                <h4> Iniciar Sesión </h4>
              </a>
              <a data-toggle="tab" href="#lg2">
                <h4> Registrarse </h4>
              </a>
            </div>
            <div class="tab-content">
              <div id="lg1" class="tab-pane active">
                <div class="login-form-container">
                  <div class="login-register-form">
                    <form action="" method="POST" id="frm_1-Log">
                      <div class="mb-3">
                        <input class="form-control mb-0" type="text" id="u-email" name="u-email" placeholder="E-mail" required>
                        <span class="ml-1 txt-noti-req"></span>
                      </div>
                      <div class="mb-3">
                        <input class="form-control mb-0" type="password" id="u-password" name="u-password" placeholder="Contraseña" required>
                        <span class="ml-1 txt-noti-req"></span>
                      </div>
                      <div class="button-box">
                        <div class="login-toggle-btn">
                          <input type="checkbox">
                          <label>Recuérdame</label>
                          <a href="./recover-password">Has olvidado tu contraseña?</a>
                        </div>
                        <button type="submit" class="d-block talign-r">
                            <span>Iniciar sesión</span>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div id="lg2" class="tab-pane">
                <div class="login-form-container">
                  <div class="login-register-form">
                    <form action="" method="POST" id="frm_2-Reg">
                      <div class="mb-3">
                        <input class="form-control mb-0" type="text" id="u-reg_name" name="u-reg_name" placeholder="Username" required>
                        <span class="ml-1 txt-noti-req"></span>
                      </div>
                      <div class="mb-3">
                        <input class="form-control mb-0" type="email" id="u-reg_email" name="u-reg_email" placeholder="Email" required>
                        <span class="ml-1 txt-noti-req"></span>
                      </div>
                      <div class="mb-3">
                        <input class="form-control mb-0" type="password" id="u-reg_password" name="u-reg_password" placeholder="Password" required>
                        <span class="ml-1 txt-noti-req"></span>
                      </div>
                      <div class="mb-3">
                        <input class="form-control mb-0" type="password" id="u-reg_passwordtwo" name="u-reg_passwordtwo" placeholder="Password repeat" required>
                        <span class="ml-1 txt-noti-req"></span>
                      </div>
                      <div class="button-box">
                        <button type="submit" class="d-block talign-r">
                            <span>Registrarme</span>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
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
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/login-user.js"></script>
</body>
</html>