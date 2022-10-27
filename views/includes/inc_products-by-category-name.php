<?php 
  // require_once '../model/categories.php';
  $cat = new Categories();
  $l_byName = $cat->getCategoriesByIdCategory($_GET['cat']);
  $cat_id = $l_byName[0]['id'];
  $cat_banner = "./admin/storage/app/public/category/".$l_byName[0]['image'];
  $cat_banner = "./admin/storage/app/public/category/banner/".$l_byName[0]['banner_image'];
  require_once '../model/products.php';
  $products=new Products();
?>
<div class="category-banner">
  <div class="col-12 p-0">
    <div class="category-banner" style="max-height: 330px;height: 330px;background:url(<?= $cat_banner;?>);background-size: cover;background-repeat: no-repeat;background-position: center;">
     
      <div class="container">
    <div class="row"><p class="text-ce"><?= (isset($liById[0]['name']) && $liById[0]['name'] != "") ? $liById[0]['name'] : "";?></p>
    </div>
    </div>
    </div>
  </div>
</div>
<div class="category-page-area pt-50 pb-100">
  <div class="container">
    <div class="row flex-row-reverse mb-20">
      <div class="col-12">
        <div class="category-title" style="font-size: 20px;">RESULTADOS</div>
      </div>
    </div>
    <div class="row flex-row-reverse">
      <div class="col-12">
        <div class="grid-list-product-wrapper">
          <div class="product-grid product-view pb-20">
            <div class="row">
              <!-- LIST ALL PRODUCTS BY NAME CATEGORIES (INIT) -->
              <?php echo $products->getProductsForCategories($_GET['cat']); ?>
              <!-- LIST ALL PRODUCTS BY NAME CATEGORIES (END) -->
            </div>
          </div>
          <!-- 
          <div class="pagination-total-pages">
            <div class="pagination-style">
              <ul>
                <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">10</a></li>
                <li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
              </ul>
            </div>
            <div class="total-pages">
              <p>Showing 1 - 20 of 30 results  </p>
            </div>
          </div>
           -->
        </div>
      </div>
    </div>
  </div>
</div>