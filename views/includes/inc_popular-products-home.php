<div class="product-area pb-70">
  <div class="container hrsec-separator-home lprodpopularhome">
    <div class="product-tab-list-wrap text-center mb-40 lprodpopularhome__sec">
      <div class="row lprodpopularhome__sec__c">
        <div class="col-lg-12 lprodpopularhome__sec__c--cTitle">      
          <h3 class="lprodpopularhome__sec__c--cTitle__title">PRODUCTOS MÁS POPULARES</h3>
        </div>
      </div>
    </div>
    <div class="tab-content jump">
      <div class="tab-pane active">
        <div class="owl-popular-products-home owl-carousel owl-theme row">
          <?php
            echo $dmlProducts->getMasPopulares();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>