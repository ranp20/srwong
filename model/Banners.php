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
      $sql = "SELECT id,product_id,title,image FROM {$this->table} WHERE banners.status=1;";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML="";
      foreach ($res as $data) {
         $resultHTML.= "<div class='single-slider pt-210 pb-220 bg-img' style='background-image:url(adminSrwong/storage/app/public/banner/$data[3]);'>
                    <div class='container'>
                        <div class='slider-content slider-animated-1'>
                            <h1 class='animated'>$data[2]</h1>
                            <!--h3 class='animated'>Fresh Heathy and Organic.</h3-->
                            <div class='slider-btn mt-90'>
                                <a class='animated' href='./product-details/$data[1]'>Ordenar Ahora</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        return $resultHTML;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  
}
$dmlBanners=new Banners();