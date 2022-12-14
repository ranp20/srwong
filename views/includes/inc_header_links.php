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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no, viewport-fit=cover">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>
<meta name="description" content="¡Pide tu delivery en 3 sencillos pasos!"/>
<meta name="theme-color" content="#B58440">
<meta name="author" content="PDG"/>
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
<meta name="twitter.card" content="summary">
<meta content="Venta de comida china" name="title">
<title>Señor Wong</title>
<meta content="Venta de comida china" property="og:title">
<meta property="og:locale" content="es_ES"/>
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="Señor Wong"/>
<meta property="og:url" name="twitter.url" content="Venta de comida china">
<meta property="og:title" name="twitter.title" content="Sistema de ordenes y pedidos | Señor Wong"/>
<meta property="og:description" name="twitter.description" content="¡Pide tu delivery en 3 sencillos pasos!"/>
<meta property="og:image" name="twitter.image" content="<?= $url;?>assets/img/favicon.png"/>
<link rel="shortcut icon" type="image/x-icon" href="<?= $url;?>assets/img/favicon.png"/>
<!-- PRELOADER FILES -->
<link rel="preload" href="<?= $url;?>assets/css/styles.min.css" as="style"/>
<link rel="preload" href="<?= $url;?>assets/js/plugins/jquery/jquery-3.6.0.min.js" as="script"/>
<!-- <link rel="preload" href="<?= $url;?>assets/js/plugins/jquery/jquery-1.12.4.min.js" as="script"/> -->
<!-- JQUERY COMPRESSED -->
<script type="text/javascript" src="<?= $url;?>assets/js/plugins/jquery/jquery-3.6.0.min.js"></script>
<!-- <script type="text/javascript" src="<?= $url;?>assets/js/plugins/jquery/jquery-1.12.4.min.js"></script> -->
<!-- BOOTSTRAP UNCOMPRESSED -->
<link rel="stylesheet" href="<?= $url;?>assets/js/plugins/bootstrap-4.6.2/css/bootstrap.min.css">
<script type="text/javascript" src="<?= $url;?>assets/js/plugins/bootstrap-4.6.2/js/bootstrap.min.js"></script>
<!-- STYLESSHEET -->
<link rel="stylesheet" href="<?= $url;?>assets/css/styles.min.css">
<!-- MODERNIZR 2.8.3 -->
<script type="text/javascript" src="<?= $url;?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
<!---->
<input tabindex="-1" placeholder="" type="hidden" width="0" height="0" autocomplete="off" spellcheck="false" f-hidden="aria-hidden" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" id="u-s_regclient-sis" value="<?= (isset($_SESSION['usr-logg_srwong'])) ? $_SESSION['usr-logg_srwong']['id'] : '';?>">
<!-- GOOGLE FONTS -->
<!-- 
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;900&display=swap" rel="stylesheet">
 -->
<!-- GOOGLE FONTS 2 -->
<!--
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Days+One&display=swap" rel="stylesheet">
-->