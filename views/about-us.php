<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/categories.php';
$categories = new Categories();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>SrWong - Sobre nosotros</title>
  <?php require_once 'includes/inc_header_links.php';?>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR WAYPOINTS -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <!-- INCLUIR COUNTER-UP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
</head>
<body>
    <?php require_once 'includes/inc_header_top.php';?>
  <div class="breadcrumb-area gray-bg">
      <div class="container">
          <div class="breadcrumb-content">
              <ul>
                  <li><a href="./">Home</a></li>
                  <li class="active">Nosotros </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="about-us-area pt-100 pb-100">
      <div class="container">
          <div class="row">
             <div class="col-lg-6 col-md-5">
                  <div class="overview-img text-center">
                      <a href="#">
                          <img src="<?= $url;?>assets/img/banner/about-us.jpg" alt="">
                      </a>
                  </div>
              </div>
              <div class="col-lg-6 col-md-7 d-flex align-items-center">
                  <div class="overview-content-2">
                      <h2>Bienvenidos a la tienda <span>SrWong</span>!</h2>
                      <p class="peragraph-blog">SrWong Shop is a premium HTML template designed and develoved from the ground up with the sole purpose of helping you create an astonishing, the beautiful and user friendly website that will boost your product’s sales.</p>
                      <p>The theme design package provides a complete Magento theme set for your online store according to your desired theme. This includes all Magento themes that are required for your online store's successful implementation.</p>
                      <p>The theme design package provides a complete Magento theme set for your online store according to your desired theme.</p>
                      <div class="overview-btn mt-45">
                          <a class="btn-style-2" href="shop">Shop now!</a>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>
  </div>
  <div class="project-count-area gray-bg pt-100 pb-70">
	<div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="single-count text-center mb-30">
                      <div class="count-icon">
                          <span class="ion-ios-briefcase-outline"></span>
                      </div>
                      <div class="count-title">
                          <h2 class="count">360</h2>
                          <span>project done</span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="single-count text-center mb-30">
                      <div class="count-icon">
                          <span class="ion-ios-wineglass-outline"></span>
                      </div>
                      <div class="count-title">
                          <h2 class="count">690</h2>
                          <span>cups of coffee</span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="single-count text-center mb-30">
                      <div class="count-icon">
                          <span class="ion-ios-lightbulb-outline"></span>
                      </div>
                      <div class="count-title">
                          <h2 class="count">420</h2>
                          <span>branding</span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="single-count text-center mb-30 mrgn-none">
                      <div class="count-icon">
                          <span class="ion-happy-outline"></span>
                      </div>
                      <div class="count-title">
                          <h2 class="count">100</h2>
                          <span>happy clients</span>
                      </div>
                  </div>
              </div>
          </div>
	</div>
  </div>
    <div class="skill-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="skill-wrapper">
                        <div class="section-border section-mrg-none mb-45">
                            <div class="section-title-wrap">
                                <h3 class="section-title section-bg-white">Nuestras habilidades</h3>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="progress">
                                <div class="lead">Marketing</div>
                                <div class="progress-bar wow fadeInLeft" data-progress="50%" style="width: 50%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span>50%</span></div>
                            </div>
                            <div class="progress">
                                <div class="lead">Wordpress Theme</div>
                                <div class="progress-bar wow fadeInLeft" data-progress="60%" style="width: 60%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>60%</span> </div>
                            </div>
                            <div class="progress">
                                <div class="lead">Shopify Theme</div>
                                <div class="progress-bar wow fadeInLeft" data-progress="70%" style="width: 70%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>70%</span> </div>
                            </div>	
                            <div class="progress">
                                <div class="lead">UI/UX Design</div>
                                <div class="progress-bar wow fadeInLeft" data-progress="80%" style="width: 80%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>80%</span> </div>
                            </div>												
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="our-work-wrapper">
                        <div class="section-border section-mrg-none mb-45">
                            <div class="section-title-wrap">
                                <h3 class="section-title section-bg-white">Nuestro trabajo</h3>
                            </div>
                        </div>
                        <div class="work-list">
                            <div class="single-work">
                                <div class="work-number">
                                    <span>1</span>
                                </div>
                                <div class="work-content">
                                    <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                                </div>
                            </div>
                            <div class="single-work">
                                <div class="work-number">
                                    <span>1</span>
                                </div>
                                <div class="work-content">
                                    <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                                </div>
                            </div>
                            <div class="single-work">
                                <div class="work-number">
                                    <span>1</span>
                                </div>
                                <div class="work-content">
                                    <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                                </div>
                            </div>
                            <div class="single-work">
                                <div class="work-number">
                                    <span>1</span>
                                </div>
                                <div class="work-content">
                                    <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="team-area pt-100">
        <div class="container">
            <div class="section-border section-mrg-none mb-45">
                <div class="section-title-wrap">
                    <h3 class="section-title section-bg-white">Nuestro Equipo</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-wrapper mb-30">
                        <div class="team-img">
                            <a href="#">
                                <img src="<?= $url;?>assets/img/team/team_1.jpg" alt="">
                            </a>
                            <div class="team-action">
                                <a class="action-plus facebook" href="#">
                                    <i class="ion-social-facebook"></i>
                                </a>
                                <a class="action-heart twitter" title="Wishlist" href="#">
                                    <i class="ion-social-twitter"></i>
                                </a>
                                <a class="action-cart instagram" href="#">
                                    <i class="ion-social-instagram"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Mr.Mike Banding</h4>
                            <span>Manager </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-wrapper mb-30">
                        <div class="team-img">
                            <a href="#">
                                <img src="<?= $url;?>assets/img/team/team_3.jpg" alt="">
                            </a>
                            <div class="team-action">
                                <a class="action-plus facebook" href="#">
                                    <i class="ion-social-facebook"></i>
                                </a>
                                <a class="action-heart twitter" title="Wishlist" href="#">
                                    <i class="ion-social-twitter"></i>
                                </a>
                                <a class="action-cart instagram" href="#">
                                    <i class="ion-social-instagram"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Mr.Peter Pan</h4>
                            <span>Developer </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-wrapper mb-30">
                        <div class="team-img">
                            <a href="#">
                                <img src="<?= $url;?>assets/img/team/team_2.jpg" alt="">
                            </a>
                            <div class="team-action">
                                <a class="action-plus facebook" href="#">
                                    <i class="ion-social-facebook"></i>
                                </a>
                                <a class="action-heart twitter" title="Wishlist" href="#">
                                    <i class="ion-social-twitter"></i>
                                </a>
                                <a class="action-cart instagram" href="#">
                                    <i class="ion-social-instagram"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Ms.Sophia</h4>
                            <span>Designer </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-wrapper mb-30">
                        <div class="team-img">
                            <a href="#">
                                <img src="<?= $url;?>assets/img/team/team_4.jpg" alt="">
                            </a>
                            <div class="team-action">
                                <a class="action-plus facebook" href="#">
                                    <i class="ion-social-facebook"></i>
                                </a>
                                <a class="action-heart twitter" title="Wishlist" href="#">
                                    <i class="ion-social-twitter"></i>
                                </a>
                                <a class="action-cart instagram" href="#">
                                    <i class="ion-social-instagram"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Mr.John Lee</h4>
                            <span>Chairmen </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-logo-area pt-70 pb-100">
        <div class="container">
            <div class="brand-logo-active owl-carousel">
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-1.png">
                </div>
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-2.png">
                </div>
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-3.png">
                </div>
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-4.png">
                </div>
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-5.png">
                </div>
                <div class="single-brand-logo">
                    <img alt="" src="<?= $url;?>assets/img/brand-logo/logo-2.png">
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'includes/inc_footer.php';?>
  </div>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/about-us.js"></script>
</body>
</html>
