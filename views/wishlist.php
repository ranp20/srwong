<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>    
    <title>SrWong - Deliveries y Pedidos</title>
    <?php require_once 'includes/inc-header_links.php';?>
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
                    <li class="active">Wishlist </li>
                </ul>
            </div>
        </div>
    </div>
     <!-- shopping-cart-area start -->
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <h3 class="page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive wishlist">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Add To Cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="<?= $url;?>assets/img/cart/cart-3.jpg" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">PRODUCTS NAME HERE </a></td>
                                        <td class="product-price-cart"><span class="amount">$260.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">$110.00</td>
                                        <td class="product-wishlist-cart">
                                            <a href="#">add to cart</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="<?= $url;?>assets/img/cart/cart-4.jpg" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">PRODUCTS NAME HERE </a></td>
                                        <td class="product-price-cart"><span class="amount">$150.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">$150.00</td>
                                        <td class="product-wishlist-cart">
                                            <a href="#">add to cart</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="<?= $url;?>assets/img/cart/cart-5.jpg" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">PRODUCTS NAME HERE </a></td>
                                        <td class="product-price-cart"><span class="amount">$170.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">$170.00</td>
                                        <td class="product-wishlist-cart">
                                            <a href="#">add to cart</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="<?= $url;?>assets/img/cart/cart-3.jpg" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">PRODUCTS NAME HERE </a></td>
                                        <td class="product-price-cart"><span class="amount">$170.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">$170.00</td>
                                        <td class="product-wishlist-cart">
                                            <a href="#">add to cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'includes/inc-footer.php';?>
	<!-- all js here -->
    <script type="text/javascript" src="<?= $url;?>assets/js/popper.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/ajax-mail.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/plugins.js"></script>
    <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
</body>
</html>
