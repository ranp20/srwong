<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(isset($_SESSION['usr-logg_srwong'])){
  header("Location: ./");
}
?>
<!doctype html>
<html class="no-js" lang="es">
<head>
  <title>SrWong - Deliveries y Pedidos</title>
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
  <div class="footer-area black-bg-2 pt-70">
    <div class="footer-top-area pb-18">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="footer-about mb-40">
              <div class="footer-logo">
                <a href="index">
                  <img src="<?= $url;?>assets/img/logo/footer-logo.png" alt="">
                </a>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
              <div class="payment-img">
                <a href="javascript:void(0);">
                  <img src="<?= $url;?>assets/img/icon-img/payment.png" alt="">
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="footer-widget mb-40">
              <div class="footer-title mb-22">
                <h4>Information</h4>
              </div>
              <div class="footer-content">
                <ul>
                  <li><a href="about-us">About Us</a></li>
                  <li><a href="javascript:void(0);">Delivery Information</a></li>
                  <li><a href="javascript:void(0);">Privacy Policy</a></li>
                  <li><a href="javascript:void(0);">Terms & Conditions</a></li>
                  <li><a href="javascript:void(0);">Customer Service</a></li>
                  <li><a href="javascript:void(0);">Return Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="footer-widget mb-40">
              <div class="footer-title mb-22">
                <h4>My Account</h4>
              </div>
              <div class="footer-content">
                <ul>
                  <li><a href="my-account">My Account</a></li>
                  <li><a href="javascript:void(0);">Order History</a></li>
                  <li><a href="wishlist">Wish List</a></li>
                  <li><a href="javascript:void(0);">Newsletter</a></li>
                  <li><a href="javascript:void(0);">Order History</a></li>
                  <li><a href="javascript:void(0);">International Orders</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="footer-widget mb-40">
              <div class="footer-title mb-22">
                <h4>Get in touch</h4>
              </div>
              <div class="footer-contact">
                <ul>
                  <li>Address: 123 Main Street, Anytown, CA 12345 - USA.</li>
                  <li>Telephone Enquiry: (012) 800 456 789-987 </li>
                  <li>Email: <a href="javascript:void(0);">Info@example.com</a></li>
                </ul>
              </div>
              <div class="mt-35 footer-title mb-22">
                <h4>Get in touch</h4>
              </div>
              <div class="footer-time">
                <ul>
                  <li>Open:  <span>8:00 AM</span> - Close: <span>18:00 PM</span></li>
                  <li>Saturday - Sunday: <span>Close</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom-area border-top-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-7">
            <div class="copyright">
              <p>Copyright © <a href="javascript:void(0);">Fudink.</a> . All Right Reserved.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-5">
            <div class="footer-social">
              <ul>
                <li><a href="javascript:void(0);"><i class="ion-social-facebook"></i></a></li>
                <li><a href="javascript:void(0);"><i class="ion-social-twitter"></i></a></li>
                <li><a href="javascript:void(0);"><i class="ion-social-instagram-outline"></i></a></li>
                <li><a href="javascript:void(0);"><i class="ion-social-googleplus-outline"></i></a></li>
                <li><a href="javascript:void(0);"><i class="ion-social-rss"></i></a></li>
                <li><a href="javascript:void(0);"><i class="ion-social-dribbble-outline"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/login-user.js"></script>
</body>
</html>