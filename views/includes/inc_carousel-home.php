<div class="slider-area">
  <div class="slider-active owl-dot-style owl-carousel">
    <?php 
      require_once './model/Banners.php';
      echo $dmlBanners->getSliders();
    ?>
  </div>
</div>