<div class="product-area pb-70">
  <div class="container lprodrecenthome">
    <div class="product-tab-list-wrap text-center mb-40 lprodrecenthome__sec">
      <div class="row lprodrecenthome__sec__c">
        <div class="col-lg-12 lprodrecenthome__sec__c--cTitle">
          <h3 class="lprodrecenthome__sec__c--cTitle__title">PRODUCTOS MÁS RECIENTES</h3>
        </div>
      </div>
    </div>
    <div class="tab-content jump">
      <div class="tab-pane active">
        <div class="owl-latest-products-home owl-carousel owl-theme row">
          <?php
            echo $dmlProducts->getUltimos();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>