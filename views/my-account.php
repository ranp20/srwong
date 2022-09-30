<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['usr-logg_srwong'])){
  header("Location: ./login-register");
}else{
  require_once '../model/users.php';
  $users = new Users();
  $listprof = $users->get_users($_SESSION['usr-logg_srwong']['email']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>SrWong - Mi Cuenta</title>
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
          <li class="active">Mi Perfil </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- my account start -->
  <div class="myaccount-area pb-80 pt-50">
    <div class="container">
      <div class="row">
        <?php require_once 'includes/inc_user-profile.php';?>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/my-account.js"></script>
</body>
</html>
