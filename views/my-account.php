<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>SrWong - Mi Cuenta</title>
  <?php require_once 'includes/inc-header_links.php';?>
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
                  <li class="active">My Account </li>
              </ul>
          </div>
      </div>
  </div>
  <!-- my account start -->
  <div class="myaccount-area pb-80 pt-50">
      <div class="container">
          <div class="row">
              <div class="ml-auto mr-auto col-lg-9">
                  <div class="checkout-wrapper">
                      <div id="faq" class="panel-group">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                              </div>
                              <div id="my-account-1" class="panel-collapse collapse show">
                                  <div class="panel-body">
                                      <div class="billing-information-wrapper">
                                          <div class="account-info-wrapper">
                                              <h4>My Account Information</h4>
                                              <h5>Your Personal Details</h5>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-6 col-md-6">
                                                  <div class="billing-info">
                                                      <label>First Name</label>
                                                      <input type="text">
                                                  </div>
                                              </div>
                                              <div class="col-lg-6 col-md-6">
                                                  <div class="billing-info">
                                                      <label>Last Name</label>
                                                      <input type="text">
                                                  </div>
                                              </div>
                                              <div class="col-lg-12 col-md-12">
                                                  <div class="billing-info">
                                                      <label>Email Address</label>
                                                      <input type="email">
                                                  </div>
                                              </div>
                                              <div class="col-lg-6 col-md-6">
                                                  <div class="billing-info">
                                                      <label>Telephone</label>
                                                      <input type="text">
                                                  </div>
                                              </div>
                                              <div class="col-lg-6 col-md-6">
                                                  <div class="billing-info">
                                                      <label>Fax</label>
                                                      <input type="text">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="billing-back-btn">
                                              <div class="billing-back">
                                                  <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                              </div>
                                              <div class="billing-btn">
                                                  <button type="submit">Continue</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                              </div>
                              <div id="my-account-2" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      <div class="billing-information-wrapper">
                                          <div class="account-info-wrapper">
                                              <h4>Change Password</h4>
                                              <h5>Your Password</h5>
                                          </div>
                                          <div class="row">
                                              <div class="col-lg-12 col-md-12">
                                                  <div class="billing-info">
                                                      <label>Password</label>
                                                      <input type="password">
                                                  </div>
                                              </div>
                                              <div class="col-lg-12 col-md-12">
                                                  <div class="billing-info">
                                                      <label>Password Confirm</label>
                                                      <input type="password">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="billing-back-btn">
                                              <div class="billing-back">
                                                  <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                              </div>
                                              <div class="billing-btn">
                                                  <button type="submit">Continue</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries   </a></h5>
                              </div>
                              <div id="my-account-3" class="panel-collapse collapse">
                                  <div class="panel-body">
                                      <div class="billing-information-wrapper">
                                          <div class="account-info-wrapper">
                                              <h4>Address Book Entries</h4>
                                          </div>
                                          <div class="entries-wrapper">
                                              <div class="row">
                                                  <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                      <div class="entries-info text-center">
                                                          <p>Farhana hayder (shuvo) </p>
                                                          <p>hastech </p>
                                                          <p> Road#1 , Block#c </p>
                                                          <p> Rampura. </p>
                                                          <p>Dhaka </p>
                                                          <p>Bangladesh </p>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                      <div class="entries-edit-delete text-center">
                                                          <a class="edit" href="#">Edit</a>
                                                          <a href="#">Delete</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="billing-back-btn">
                                              <div class="billing-back">
                                                  <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                              </div>
                                              <div class="billing-btn">
                                                  <button type="submit">Continue</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h5 class="panel-title"><span>4</span> <a href="wishlist">Modify your wish list   </a></h5>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <?php require_once 'includes/inc-footer.php';?>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/my-account.js"></script>
</body>
</html>
