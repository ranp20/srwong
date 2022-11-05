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
  <title>Señor Wong - Recuperar contraseña</title>
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
    .ipt_cont-wicon{
        display: flex;
        flex-flow: row nowrap;
        align-items: center;
        justify-content: flex-start;
        position: relative;
    }
    .ipt_cont-wicon__cIcon{
        cursor: pointer;
        margin: 0 0.5rem 0 0;
        background-color: rgba(0,0,0,0);
        border-top: 1px solid #ebebeb;
        border-right: none;
        border-left: 1px solid #ebebeb;
        border-bottom: 1px solid #ebebeb;
        padding: 0.5rem;
        border-radius: .25rem 0 0 .25rem;
        position: absolute;
        left: 0;
    }
    .ipt_cont-wicon__cIcon > span{
        position: relative;
        top: 2px;
    }
    .ipt_cont-wicon > input{
        padding-left: 4rem;
    }
    a.alert-link{
        text-decoration: underline !important;
    }
</style>
<body>
  <?php require_once 'includes/inc_header_top.php';?>
  <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Home</a></li>
          <li class="active"> Recuperar contraseña </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="login-register-area pt-20 pb-100">
    <div class="container">
      <div class="row">
        <!--
        <div class="col-lg-12 col-md-12 ml-auto mr-auto">
          <div class="logo" style="text-align: center;margin-bottom: 1rem;">
            <img alt="logo_loggregister" src="<?= $url;?>assets/img/logo/logo.png">
          </div>
        </div>
        -->
        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
          <div class="login-register-wrapper">
            <div class="login-register-tab-list nav pt-4">
              <a class="active" data-toggle="tab" href="javascript:void(0);">
                <h4> Recuperar contraseña </h4>
              </a>
            </div>
            <div class="tab-content">
              <div id="cFrm_grecovpass" class="tab-pane active">
                <div class="login-form-container p-5">
                  <div class="login-register-form">
                    <form action="" method="POST" id="frm-recoverypass_ussLog">
                        <div class="alert alert-primary" role="alert" style="font-family: sans-serif !important;font-weight: 500 !important;font-size: 14px !important;">
                            Introduce tu correo electrónico de usuario e ingresa a tu <a href="http://mail.google.com/" class="alert-link" target="_blank">bandeja de entrada</a>, para recibir instrucciones de como reestablecer tu contraseña.
                        </div>
                        <div class="mb-3">
                            <div class="ipt_cont-wicon">
                                <label class="ipt_cont-wicon__cIcon" for="usr-email">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32px" height="32px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m572.25 107.17h-444.5c-24.125 0-43.75 19.629-43.75 43.754v258.15c0 24.125 19.625 43.75 43.75 43.75h444.5c24.129 0 43.75-19.625 43.75-43.75l0.003906-258.15c0-24.125-19.625-43.754-43.75-43.754zm-11.055 26.406-186.46 131.21c-14.789 10.406-34.672 10.406-49.461 0l-186.46-131.21zm-450.71 277.14c-0.050781-0.54297-0.082031-1.0898-0.082031-1.6484v-258.15c0-1.5938 0.22266-3.1406 0.625-4.6055l154.98 109.05zm21.648 15.699 155.8-155.62 22.145 15.582c11.941 8.4023 25.93 12.602 39.926 12.602 13.988 0 27.988-4.2031 39.93-12.605l22.145-15.582 155.8 155.62zm457.47-17.348c0 0.55469-0.027343 1.1055-0.082031 1.6484l-155.53-155.35 154.98-109.05c0.40625 1.4688 0.625 3.0117 0.625 4.6055z"/></g></svg>
                                    </span>
                                </label>
                                <input class="form-control mb-0" type="email" id="usr-email" name="usr-email" placeholder="Email" required>
                            </div>
                            <span class="ml-1 txt-noti-req"></span>
                        </div>
                        <div class="button-box talign-r">
                            <button type="submit"><span>ENVIAR</span></button>
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
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/recover-password.js"></script>
</body>
</html>