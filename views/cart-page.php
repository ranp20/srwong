<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/inc-header_links.php';?>
  <title>SrWong - Carrito de compras</title>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR CRYPTO-JS -->
  <script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>
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
          <li class="active">Cart </li>
        </ul>
      </div>
    </div>
  </div>
   <!-- shopping-cart-area start -->
  <div class="cart-main-area pt-95 pb-100">
    <div class="container">
      <h3 class="page-title">Tu lista de compras</h3>
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
          <form action="#">
            <div class="table-content table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody id="c-xtbl_cartcli">
                  <?php 
                    if(!isset($_SESSION['usr-logg_srwong'])){
                      echo "
                        <tr>
                          <td class='c_any-products'>
                            <div>
                              <div>
                                <img src='<?= $url;?>assets/img/cart/cart-3.jpg' alt=''>
                              </div>
                              <div>
                                <p>Aún no tienes productos.</p>
                              </div>
                            </div>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="cart-shiping-update-wrapper">
                  <div class="cart-clear">
                    <a href="javascript:void(0);" title="Borrar listado de compras">Borrar listado</a>
                  </div>
                  <div class="cart-shiping-update">
                    <a href="./" title="Seguir comprando">Seguir comprando</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="grand-totall">
            <div class="title-wrap">
              <h4 class="cart-bottom-title section-bg-gary-cart">Total del carrito</h4>
            </div>
            <div class="cl-wrap_total" id="c-xtt_tochck">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc-footer.php';?>
  <!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/cart-page.js"></script>
</body>
</html>
