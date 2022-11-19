<?php
require_once 'db/ext_connection.php';
class Banners extends Connection
{
  private $table = "banners";
  function __construct()
  {
    parent::__construct();
  }
  // -------------- CAROUSEL DE BANNERS
  function getSliders(){
    try{
      $sql = "SELECT id,product_id,title,image,category_id FROM {$this->table} WHERE banners.status=1;";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML="";
      foreach($res as $data){
        $url_def = "";
        if($data[4] != "" && $data[4] != "null"){
          $url_def = "./category/".$data[4];
        }else{
          $url_def = "./product-details/".$data[1];
        }
        $banner_pathimg = "./admin/storage/app/public/banner/".$data[3];
        
        $resultHTML.= "<div class='single-slider hpbannerhom__sec__c pt-210 pb-220 bg-img' style='background-image: url({$banner_pathimg});'>
                  <!--<img class='hpbannerhom__sec__c--cImg' src='{$banner_pathimg}' alt='{$data[2]}' width='100' height='100'>-->
                  <div class='hpbannerhom__sec__c--cTxt'>
                    <div class='container'>
                      <div class='hpbannerhom__sec__c--ct'>
                        <div class='slider-content slider-animated-1 hpbannerhom__sec__c--ct__cDsc'>
                          <h1 class='animated hpbannerhom__sec__c--ct__cDsc--cTitle'>{$data[2]}</h1>
                          <!--h3 class='animated'>Fresh Heathy and Organic.</h3-->
                          <div class='slider-btn hpbannerhom__sec__c--ct__cDsc--cLink'>
                            <a class='animated' href='{$url_def}' title='Ordenar ahora'>
                              <span>Ordenar ahora</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>";
        /*
        $resultHTML.= "<div class='single-slider hpbannerhom__sec__c'>
            <img src='{$banner_pathimg}' class='img-fluid' alt='$data[2]' width='100' height='100'/> 
          </div>";        
          */
      }
      return $resultHTML;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  
}
$dmlBanners=new Banners();