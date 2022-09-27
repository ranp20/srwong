<?php
require_once 'db/ext_connection.php';
class Products extends Connection
{
  private $table = "products";
  function __construct()
  {
    parent::__construct();
  }
  // -------------- LISTAR LOS PRODUCTOS
  function getAll(){
    try{
      $sql = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 100";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- MOSTRAR PRODUCTOS MÁS POPULARES
  public function getMasPopulares(){
    try{
      $sql = "SELECT * FROM 
              ( SELECT COUNT(*) 
                cantidad, 
                products.*, 
                MID(products.category_ids, 
                POSITION(':\"' IN products.category_ids)+2, 
                POSITION('\",' IN products.category_ids) -(POSITION(':\"' IN products.category_ids)+2)) idcategorie
              FROM order_details
              INNER JOIN products ON order_details.product_id=products.id
              GROUP BY products.id  ORDER  BY cantidad DESC) AS listProducts LIMIT 10";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML = "";
      foreach ($res as $data){      
        
        $p_name = substr($data["name"], 0, 60);
        $p_pathimg = "./adminSrwong/storage/app/public/product/".$data['image'];
        $p_price_old = number_format($data['price'], 2, '.', ' '); 
        $p_price_new = $data['price'] - $data['discount'];
        $p_price_new = number_format($p_price_new, 2, '.', ' ');
        $htmlDiscount = "";
        if($data['discount'] > 0){
          $htmlDiscount = "<span class='product-price-old'>S/ {$p_price_old}</span>";
        }else{
          $htmlDiscount = "";
        }

        $resultHTML .= "
          <div class='item'>
            <div class='product-wrapper mb-25'>
              <div class='product-img'>
                <a href='./product-details/{$data['id']}' class='product-img__linkprods'>
                  <img src='{$p_pathimg}' alt='{$p_name}'>
                </a>
                <div class='product-action product-img__contentprods'>
                  <div class='pro-action-left'>
                    <a title='Agregar al carrito' href='javascript:void(0);' class='a__tocart'
                      dt-srwg_name='{$p_name}'
                      dt-srwg_price='{$p_price_new}'
                      dt-srwg_image='{$p_pathimg}'
                      dt-srwg_id='{$data['id']}'
                    >
                      <i class='ion-android-cart'></i>
                      <span> Agregar al carrito</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class='product-content'>
                <h4>
                  <a href='./product-details/{$data["id"]}'>{$p_name}</a>
                </h4>
                <div class='product-price-wrapper'>
                  <span>S/. {$p_price_new}</span>
                    {$htmlDiscount}
                </div>
              </div>
            </div>
        </div>
        ";
      }
      return $resultHTML;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- MOSTRAR PRODUCTOS RECIENTES
  public function getUltimos(){
    try{
      $sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT 10";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML = "";
      foreach ($res as $data) {
        $p_name = substr($data["name"], 0, 60);
        $p_pathimg = "./adminSrwong/storage/app/public/product/".$data['image'];
        $p_price_old = number_format($data['price'], 2, '.', ' '); 
        $p_price_new = $data['price'] - $data['discount'];
        $p_price_new = number_format($p_price_new, 2, '.', ' ');
        $htmlDiscount = "";
        if($data['discount'] > 0){
          $htmlDiscount = "<span class='product-price-old'>S/ {$p_price_old}</span>";
        }else{
          $htmlDiscount = "";
        }
         
       $resultHTML.= "
          <div class='item'>
            <div class='product-wrapper mb-25'>
              <div class='product-img'>
                <a href='./product-details/{$data['id']}' class='product-img__linkprods'>
                  <img src='{$p_pathimg}' alt='{$p_name}'>
                </a>
                <div class='product-action product-img__contentprods'>
                  <div class='pro-action-left'>
                    <a title='Agregar al carrito' href='javascript:void(0);' class='a__tocart'
                      dt-srwg_name='{$p_name}'
                      dt-srwg_price='{$p_price_new}'
                      dt-srwg_image='{$p_pathimg}'
                      dt-srwg_id='{$data['id']}'
                    >
                      <i class='ion-android-cart'></i>
                      <span> Agregar al carrito</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class='product-content'>
                <h4>
                  <a href='./product-details/{$data["id"]}'>{$p_name}</a>
                </h4>
                <div class='product-price-wrapper'>
                  <span>S/. {$p_price_new}</span>
                    {$htmlDiscount}
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
  // -------------- MOSTRAR LA DESCRIPCIÓN EN EL DETALLE DEL PRODUCTO
  public function getProductDescription($idProduct){
    try{
      $sql = "CALL sp_list_details_ByIdProduct(:id)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id",$idProduct);
      $stm->execute();
      $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      foreach ($res as $data) {
        $dataProduct = $data;
      }
      return $dataProduct;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- MOSTRAR COMPLEMENTOS EN EL DETALLE DEL PRODUCTO
  public function getAddOns($idAddOns){
    try{
      $sql = "SELECT id,name,price FROM add_ons WHERE id = :id";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id",$idAddOns);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML="";
      foreach($res as $data){
        $resultHTML.="<li>
                        <input data-id='$data[0]' type='checkbox'> $data[1]: <span>  S/ $data[2]</span>
                      </li>";
      }
      return $resultHTML;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- LISTAR LOS VALORES DEL TEMPCART POR ID DE CLIENTE
  function listTmpCartByIdClient($idcli){
    try{
      $sql = "CALL sp_list_cart_ByIdTempCart(:idcli)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idcli", $idcli);
      $stm->execute();
      $data = $stm->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
}
$dmlProducts = new Products();