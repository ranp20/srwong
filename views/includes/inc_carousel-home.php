<style type="text/css">
  .hpbannerhom__sec__c{
    background-repeat: no-repeat;
    background-size: cover;
    padding-bottom: 60px !important;
    padding-top: 40px !important;
  }
  .hpbannerhom__sec__c--cImg{
    position: relative;
  }
  .hpbannerhom__sec__c--cTxt{
    position: relative;
  }
  .hpbannerhom__sec__c--ct{
    max-width: 610px;
    width: 95% !important;
    display: inline-block;
    align-items: center;
    justify-content: flex-start;
    background-color: rgba(0,0,0,.65);
    padding: 1.15rem;
    border-radius: 6px;
    text-align: center;
  }
  .hpbannerhom__sec__c--ct__cDsc--cTitle{
    font-size: 1.5rem !important;
  }
  .hpbannerhom__sec__c--ct__cDsc--cLink a{
    cursor: pointer;
    border: none !important;
    color: #fff !important;
    background-color: #f60715 !important;
    border: 1px solid #e02c2b !important;
    box-shadow: 0 5px 8px 0 rgb(0 0 0 / 30%) !important;
  }
  .hpbannerhom__sec__c--ct__cDsc--cLink a:hover{
    border: 1px solid transparent !important;
    background-color: #ff6972 !important;
  }
  .hpbannerhom__sec__c--ct__cDsc--cLink a span{
    color: #fff;
    font-size: .9rem;
    font-weight: 600;
  }
  @media (min-width: 768px){
    .hpbannerhom__sec__c{
      padding-bottom: 65px !important;
      padding-top: 70px !important;
    }
    .hpbannerhom__sec__c--ct{
      max-width: 710px;
      width: auto !important;
      padding: 35px 35px;
      border-radius: 10px;
      text-align: left;
    }
  }
  @media (min-width: 991px){
    .hpbannerhom__sec__c{
      background-position: center;
      padding-bottom: 220px !important;
      padding-top: 210px !important;
    }
    .hpbannerhom__sec__c--ct{
      max-width: 810px;
      width: auto !important;
    }
    .hpbannerhom__sec__c--ct__cDsc--cTitle{
      font-size: 48px !important;
    }
    .hpbannerhom__sec__c--ct__cDsc--cLink a span{
      font-size: 16px;
    }
  }
</style>
<div class="slider-area hpbannerhom" id="fromHereFixedHeadTop">
  <div class="slider-active owl-dot-style owl-carousel hpbannerhom__sec">
    <?php 
      require_once './model/banners.php';
      echo $dmlBanners->getSliders();
    ?>
  </div>
</div>