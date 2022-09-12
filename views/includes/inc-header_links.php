<?php 
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
// CONFIGURACIÓN LOCALHOST
$url = $actual_link . "/srwong/views/";
$url_admin = $actual_link . "/srwong/admin/";
// CONFIGURACIÓN SERVIDOR
/*
$url = $actual_link . "/views/";
$url_admin = $actual_link . "/admin/";
*/
?>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="robots" content="noindex, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?= $url;?>assets/img/favicon.png">
<!-- all css here -->
<link rel="stylesheet" href="<?= $url;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/animate.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/slick.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/chosen.min.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/ionicons.min.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/magnific-popup.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/simple-line-icons.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/jquery-ui.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/meanmenu.min.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/style.css">
<link rel="stylesheet" href="<?= $url;?>assets/css/responsive.css">
<script type="text/javascript" src="<?= $url;?>assets/js/vendor/modernizr-2.8.3.min.js"></script>