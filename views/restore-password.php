<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/footer-settings.php';
if(isset($_SESSION['usr-logg_srwong'])){
  header("Location: ./");
}else{
  if(isset($_GET) && isset($_GET['token']) && $_GET['token'] != ""){
    require_once '../model/categories.php';
    $categories = new Categories();
  }else{
    header("Location: ./");
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Señor Wong - Reestablecer contraseña</title>
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
    <input tabindex="-1" placeholder="" type="hidden" width="0" height="0" autocomplete="off" spellcheck="false" f-hidden="aria-hidden" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" id="u-s_tokenbygetclient-sis" value="<?= (isset($_GET) && isset($_GET['token']) && $_GET['token'] != "") ? $_GET['token'] : "";?>">
  <?php require_once 'includes/inc_header_top.php';?>
  <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Home</a></li>
          <li class="active"> Reestablecer contraseña </li>
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
              <div id="lg1" class="tab-pane active">
                <div class="login-form-container p-5">
                  <div class="login-register-form">
                    <form action="" method="POST" id="frm-restorepass_ussRecov">
                        <div class="alert alert-warning" role="alert" style="font-family: sans-serif !important;font-weight: 500 !important;font-size: 14px !important;">
                            A continuación introduzca la nueva contraseña que usará para ingresar a su cuenta de Ttrueque.
                        </div>
                        <div class="mb-3">
                            <div class="ipt_cont-wicon">
                                <label class="ipt_cont-wicon__cIcon" for="usr-recovpass">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32px" height="32px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m491.68 217.28h-15.68v-60.48c0-72.238-52.078-128.8-126.56-128.8-74.48 0-125.44 57.68-125.44 128.8v59.922 0h-15.68c-34.719 0-62.719 28-63.281 63.281v189.28c0 34.719 28 62.719 63.281 63.281h283.36c34.719 0 62.719-28 63.281-63.281v-189.29c0-34.719-28.562-62.719-63.281-62.719zm-236.32 0v-60.48c0-53.762 36.961-97.441 94.078-97.441 56.559 0 95.199 42.559 95.199 97.441v59.922 0l-189.28-0.003906v0.5625zm267.68 252c0 17.359-14 31.359-31.359 31.359h-283.36c-17.359 0-31.359-14-31.359-31.359v-189.28c0-17.359 14-31.359 31.359-31.359h283.36c17.359 0 31.359 14 31.359 31.359zm-141.68-126c0 11.762-6.1602 21.84-15.68 27.441h-0.55859 0.55859v51.52c0 8.9609-7.2812 15.68-15.68 15.68-8.9609 0-15.68-7.2812-15.68-15.68v-51.52h0.55859-0.55859c-9.5195-5.6016-15.68-15.68-15.68-27.441 0-17.359 14-31.359 31.359-31.359 17.359-0.5625 31.359 13.438 31.359 31.359z"/></g></svg>
                                    </span>
                                </label>
                                <input class="form-control mb-0" type="password" id="usr-recovpass" name="usr-recovpass" placeholder="Password" required>
                            </div>
                            <span class="ml-1 txt-noti-req" id="pss_1notif"></span>
                        </div>
                        <div class="mb-3">
                            <div class="ipt_cont-wicon">
                                <label class="ipt_cont-wicon__cIcon" for="usr-repeat_recovpass">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32px" height="32px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m491.68 217.28h-15.68v-60.48c0-72.238-52.078-128.8-126.56-128.8-74.48 0-125.44 57.68-125.44 128.8v59.922 0h-15.68c-34.719 0-62.719 28-63.281 63.281v189.28c0 34.719 28 62.719 63.281 63.281h283.36c34.719 0 62.719-28 63.281-63.281v-189.29c0-34.719-28.562-62.719-63.281-62.719zm-236.32 0v-60.48c0-53.762 36.961-97.441 94.078-97.441 56.559 0 95.199 42.559 95.199 97.441v59.922 0l-189.28-0.003906v0.5625zm267.68 252c0 17.359-14 31.359-31.359 31.359h-283.36c-17.359 0-31.359-14-31.359-31.359v-189.28c0-17.359 14-31.359 31.359-31.359h283.36c17.359 0 31.359 14 31.359 31.359zm-141.68-126c0 11.762-6.1602 21.84-15.68 27.441h-0.55859 0.55859v51.52c0 8.9609-7.2812 15.68-15.68 15.68-8.9609 0-15.68-7.2812-15.68-15.68v-51.52h0.55859-0.55859c-9.5195-5.6016-15.68-15.68-15.68-27.441 0-17.359 14-31.359 31.359-31.359 17.359-0.5625 31.359 13.438 31.359 31.359z"/></g></svg>
                                    </span>
                                </label>
                                <input class="form-control mb-0" type="password" id="usr-repeat_recovpass" name="usr-repeat_recovpass" placeholder="Password Repeat" required>
                            </div>
                            <span class="ml-1 txt-noti-req" id="pss_2notif"></span>
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
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/restore-password.js"></script>
</body>
</html>