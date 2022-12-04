<div class="slider-area hpbannerhom" id="fromHereFixedHeadTop">
  <div class="slider-active owl-dot-style owl-carousel hpbannerhom__sec">
    <?php 
      require_once './model/banners.php';
      echo $dmlBanners->getSliders();
    ?>
  </div>
</div>