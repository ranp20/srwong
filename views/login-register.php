<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(isset($_SESSION['usr-logg_srwong'])){
  header("Location: ./");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>SrWong - Login | Registro</title>
  <?php require_once 'includes/inc-header_links.php';?>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
  <?php require_once 'includes/inc-header_top.php';?>
    <div class="loader-in">
        <span class="loader-in--loader"></span>
    </div>
    <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Home</a></li>
          <li class="active"> Login / Register </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="login-register-area pt-95 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
          <div class="login-register-wrapper">
            <div class="login-register-tab-list nav">
              <a class="active" data-toggle="tab" href="#lg1">
                <h4> login </h4>
              </a>
              <a data-toggle="tab" href="#lg2">
                <h4> register </h4>
              </a>
            </div>
            <div class="tab-content">
              <div id="lg1" class="tab-pane active">
                <div class="login-form-container">
                  <div class="login-register-form">
                    <form action="" method="POST" id="frm_1-Log">
                      <div class="mb-3">
                        <input class="form-control mb-0" type="text" id="u-email" name="u-email" placeholder="Email" required>
                        <span class="ml-1 txt-noti-req"></span>
                      </div>
                      <div class="mb-3">
                        <input class="form-control mb-0" type="password" id="u-password" name="u-password" placeholder="Password" required>
                        <span class="ml-1 txt-noti-req"></span>
                      </div>
                      <div class="button-box">
                        <div class="login-toggle-btn">
                          <input type="checkbox">
                          <label>Remember me</label>
                          <a href="javascript:void(0);">Forgot Password?</a>
                        </div>
                        <button type="submit"><span>Login</span></button>
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
                        <button type="submit"><span>Register</span></button>
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
  <?php require_once 'includes/inc-footer.php';?>
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/login-user.js"></script>
</body>
</html>