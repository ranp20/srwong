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
        $p_pathimg = "./admin/storage/app/public/product/".$data['image'];
        $p_price_old = number_format($data['price'], 2, '.', ' '); 
        $p_price_new = floatval($data['price']) - floatval($data['discount']);
        $p_price_new = number_format($p_price_new, 2, '.', ' ');
        $htmlDiscount = "";
        if($data['discount_type'] == "percent" || $data['discount_type'] == "amount"){        
          if($data['discount'] != "0" && $data['discount'] != "0.00"){
            $htmlDiscount = "<span class='product-price-old'>S/ {$p_price_old}</span>";
          }else{
            $htmlDiscount = "";
          }
        }

        $resultHTML .= "
          <div class='item'>
            <div class='product-wrapper mb-25'>
              <div class='product-img'>
                <a href='./product-details/{$data['id']}' class='product-img__linkprods'>
                  <img src='{$p_pathimg}' alt='{$p_name}' class='img-fluid'>
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
                      <span> Agregar</span>
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
        $p_pathimg = "../admin/storage/app/public/product/".$data['image'];
        $p_price_old = number_format($data['price'], 2, '.', ' '); 
        $p_price_new = floatval($data['price']) - floatval($data['discount']);
        $p_price_new = number_format($p_price_new, 2, '.', ' ');
        $htmlDiscount = "";
        if($data['discount_type'] == "percent" || $data['discount_type'] == "amount"){        
          if($data['discount'] != "0" && $data['discount'] != "0.00"){
            $htmlDiscount = "<span class='product-price-old'>S/ {$p_price_old}</span>";
          }else{
            $htmlDiscount = "";
          }
        }
         
       $resultHTML.= "
          <div class='item'>
            <div class='product-wrapper mb-25'>
              <div class='product-img'>
                <a href='./product-details/{$data['id']}' class='product-img__linkprods'>
                  <img src='{$p_pathimg}' alt='{$p_name}' class='img-fluid'>
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
  //----------------MOSTRAR PRODUCTOS POR CATEGORIAS
  public function getProductsForCategories($idCategories){
    $idCategories="%".$idCategories."%"; 
    try{
      $sql = "SELECT * FROM products WHERE products.category_ids LIKE ? ORDER BY created_at DESC";
      $stm = $this->con->prepare($sql);
      $stm->execute([$idCategories]);
      $resultHTML="";
      foreach($stm as $data){
        $p_name = substr($data["name"], 0, 60);
        $p_pathimg = "../admin/storage/app/public/product/".$data['image'];
        $p_price_old = number_format($data['price'], 2, '.', ' '); 
        $p_price_new = floatval($data['price']) - floatval($data['discount']);
        $p_price_new = number_format($p_price_new, 2, '.', ' ');
        $htmlDiscount = "";
        if($data['discount_type'] == "percent" || $data['discount_type'] == "amount"){        
          if($data['discount'] != "0" && $data['discount'] != "0.00"){
            $htmlDiscount = "<span class='product-price-old'>S/ {$p_price_old}</span>";
          }else{
            $htmlDiscount = "";
          }
        }
        $resultHTML .= "
        <div class='product-width col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-30'>
          <div class='product-wrapper'>
            <div class='product-img'>
              <a href='../product-details/{$data['id']}' class='product-img__linkprods'>
                <img src='{$p_pathimg}' alt='{$p_name}' class='img-fluid'>
              </a>
              <div class='product-action product-img__contentprods'>
                <div class='pro-action-left'>
                  <a title='AGREGAR AL CARRITO' href='javascript:void(0);' class='a__tocart'
                      dt-srwg_name='{$p_name}'
                      dt-srwg_price='{$p_price_new}'
                      dt-srwg_image='{$p_pathimg}'
                      dt-srwg_id='{$data['id']}'
                  >
                    <i class='ion-android-cart'></i> 
                    <span>AGREGAR AL CARRITO</span>
                  </a>
                </div>
              </div>
            </div>
            <div class='product-content'>
              <h4>
                <a href='./product-details/{$data["id"]}'>{$p_name}</a>
              </h4>
              <div class='product-price-wrapper'>
                <span>S/ {$p_price_new}</span>
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
  //---------------- LISTAR LOS categorias de un producto RELACIONADOS----------
  public function getArrCategories($idProduct){
    try{
      $sql = "SELECT category_ids FROM products WHERE id=?;";
      $stm = $this->con->prepare($sql);
      $stm->execute([$idProduct]);
      $res = $stm->fetchAll(); 
      foreach($res as $data){
         $dataProductarr = json_decode($data[0]);
      }
      // recorriendo el array obtenido de categries id del producto para obtener el nombre
      foreach ($dataProductarr as $key=>$value) {
        foreach ($value as $keyId => $valId) {
          if ($keyId=="id") { 
            $arrCats=[$valId];
          }
        }
      }
      return $arrCats;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  } 
  //---------------- LISTAR LOS PRODUCTOS RELACIONADOS
  public function getCategoriesProducts($idProduct){
    try{
      $sql = "SELECT category_ids FROM products WHERE id=?;";
      $stm = $this->con->prepare($sql);
      $stm->execute([$idProduct]);
      $res = $stm->fetchAll(); 
      foreach($res as $data){
        $dataProductarr = json_decode($data[0]);
      }
      $resultHtmlCat="";
      //recorriendo el array obtenido de categries id del producto para obtener el nombre
      foreach($dataProductarr as $key=>$value){
        foreach($value as $keyId => $valId){
          if($keyId=="id"){
            $nameCategorie = self::getCategoriesName($valId);
            $resultHtmlCat.= "<li><a href='../category/{$valId}'>{$nameCategorie} &nbsp;</a></li>";
          }
        }
      }
      return $resultHtmlCat;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  //---------------- LISTAR CATEGORIAS A LAS QUE PERTENECE EL PRODUCTO RELACIONADOS
  function getCategoriesName($idCategorie){
    try{
      $sql = "SELECT name FROM categories WHERE id=?;";
      $stm = $this->con->prepare($sql);
      $stm->execute([$idCategorie]);
      $nameCategorie="";
      //return $result->fetchAll(PDO::FETCH_ASSOC);
      foreach ($stm as $value) {
          $nameCategorie=$value[0];
      }
      return $nameCategorie;
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
  //---------------- LISTAR LOS PRODUCTOS RELACIONADOS----------
  function getRelatedProducts($idCategorias, $idProduct){
    $stringSQL = "";
    foreach ($idCategorias as $key => $value) {
      $stringSQL.= "category_ids LIKE '%".$value."%' or";
    }
    //eliminando el ultimo or
    $stringSQL= substr($stringSQL, 0, strlen($stringSQL)-2);
    try{
      $sql = "SELECT * FROM products WHERE $stringSQL;";
      $stm = $this->con->prepare($sql);
      $stm->execute([$idProduct]);
      $resultHTML="";
      foreach ($stm as $data) {
        $p_name = substr($data["name"], 0, 60);
        $p_pathimg = "./admin/storage/app/public/product/".$data['image'];
        $p_price_old = number_format($data['price'], 2, '.', ' '); 
        $p_price_new = floatval($data['price']) - floatval($data['discount']);
        $p_price_new = number_format($p_price_new, 2, '.', ' ');
        $htmlDiscount = "";
        if($data['discount_type'] == "percent" || $data['discount_type'] == "amount"){        
          if($data['discount'] != "0" && $data['discount'] != "0.00"){
            $htmlDiscount = "<span class='product-price-old'>S/ {$p_price_old}</span>";
          }else{
            $htmlDiscount = "";
          }
        }
        $resultHTML.= "
        <div class='product-wrapper'>
          <div class='product-img'>
            <a href='../product-details/{$data['id']}' class='product-img__linkprods'>
              <img src='{$p_pathimg}' alt='{$p_name}' class='img-fluid'>
            </a>
            <div class='product-action product-img__contentprods'>
              <div class='pro-action-left'>
                <a title='AGREGAR AL CARRITO' href='javascript:void(0);' class='a__tocart'
                    dt-srwg_name='{$p_name}'
                    dt-srwg_price='{$p_price_new}'
                    dt-srwg_image='{$p_pathimg}'
                    dt-srwg_id='{$data['id']}'
                >
                  <i class='ion-android-cart'></i> 
                  <span>AGREGAR AL CARRITO</span>
                </a>
              </div>
            </div>
          </div>
          <div class='product-content'>
            <h4>
              <a href='./product-details/{$data["id"]}'>{$p_name}</a>
            </h4>
            <div class='product-price-wrapper'>
              <span>S/ {$p_price_new}</span>
              {$htmlDiscount}
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
$dmlProducts = new Products();
// $dmlProducts->getCategoriesProducts(51);