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
</head>
<body>
  <?php require_once 'includes/inc-header_top.php';?>
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
      <h3 class="page-title">Your cart items</h3>
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
          <form action="#">
            <div class="table-content table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="product-thumbnail">
                      <a href="javascript:void(0);"><img src="<?= $url;?>assets/img/cart/cart-3.jpg" alt=""></a>
                    </td>
                    <td class="product-name">
                      <div>
                        <a href="javascript:void(0);">PRODUCTS NAME HERE </a>
                        <span class="amount">$260.00</span>
                      </div>
                    </td>
                    <td class="product-quantity">
                      <div class="cart-plus-minus">
                        <div class="dec qtybutton">-</div>
                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                        <div class="inc qtybutton">+</div>
                      </div>
                    </td>
                    <td class="product-subtotal">$110.00</td>
                    <td class="product-remove">
                      <a href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                      <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td class="product-thumbnail">
                      <a href="javascript:void(0);"><img src="<?= $url;?>assets/img/cart/cart-4.jpg" alt=""></a>
                    </td>
                    <td class="product-name">
                      <div>
                        <a href="javascript:void(0);">PRODUCTS NAME HERE </a>
                        <span class="amount">$150.00</span>
                      </div>
                    </td>
                    <td class="product-quantity">
                      <div class="cart-plus-minus">
                        <div class="dec qtybutton">-</div>
                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                        <div class="inc qtybutton">+</div>
                      </div>
                    </td>
                    <td class="product-subtotal">$150.00</td>
                    <td class="product-remove">
                      <a href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                      <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                   </td>
                  </tr>
                  <tr>
                    <td class="product-thumbnail">
                      <a href="javascript:void(0);"><img src="<?= $url;?>assets/img/cart/cart-5.jpg" alt=""></a>
                    </td>
                    <td class="product-name">
                      <div>
                        <a href="javascript:void(0);">PRODUCTS NAME HERE </a>
                        <span class="amount">$170.00</span>
                      </div>
                    </td>
                    <td class="product-quantity">
                      <div class="cart-plus-minus">
                        <div class="dec qtybutton">-</div>
                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                        <div class="inc qtybutton">+</div>
                      </div>
                    </td>
                    <td class="product-subtotal">$170.00</td>
                    <td class="product-remove">
                      <a href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                      <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                   </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="cart-shiping-update-wrapper">
                  <div class="cart-clear">
                    <a href="javascript:void(0);">Clear Shopping Cart</a>
                  </div>
                  <div class="cart-shiping-update">
                    <a href="javascript:void(0);">Continue Shopping</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="grand-totall">
            <div class="title-wrap">
              <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
            </div>
            <h5>Total products <span>$260.00</span></h5>
            <div class="total-shipping">
              <h5>Total shipping</h5>
              <ul>
                <li><input type="checkbox"> Standard <span>$20.00</span></li>
                <li><input type="checkbox"> Express <span>$30.00</span></li>
              </ul>
            </div>
            <h4 class="grand-totall-title">Grand Total  <span>$260.00</span></h4>
            <a href="./checkout">Proceed to Checkout</a>
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
