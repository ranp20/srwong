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
        $p_pathimg = "../adminSrwong/storage/app/public/product/".$data['image'];
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
        <div class='product-width col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-30'>
          <div class='product-wrapper'>
            <div class='product-img'>
              <a href='../product-details/{$data['id']}' class='product-img__linkprods'>
                <img src='{$p_pathimg}' alt='{$p_name}'>
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
                <span class='product-price-old'>S/. {$p_price_old} </span>
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
  //---------------- LISTAR LOS PRODUCTOS RELACIONADOS
  public function getCategoriesProducts($idProduct){
    try{
      $sql = "SELECT category_ids FROM products WHERE id=?";
      $stm = $this->con->prepare($sql);
      $stm->execute([$idProduct]);
      $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      foreach ($res as $data){
        $dataProduct = $data[0];
      }
      echo $dataProduct;
      
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  //---------------- LISTAR CATEGORIAS A LAS QUE PERTENECE EL PRODUCTO RELACIONADOS
  function getCategoriesName($idCategorie){
    try{
      $conexion=new Conexion();
       $conectado=$conexion->conectar();
       $sql = "SELECT name FROM categories WHERE id=?";
       $result=$conectado->prepare($sql);
       $result->execute([$idCategorie]);
      //return $result->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  //---------------- LISTAR LOS PRODUCTOS RELACIONADOS
  function getRelatedProducts($idProduct){
    try{
      $conexion=new Conexion();
       $conectado=$conexion->conectar();
       $sql = "SELECT *
                FROM products
                ORDER BY created_at DESC LIMIT 10;";
       $result=$conectado->prepare($sql);
       $result->execute();
       $resultHTML="";
      foreach ($result as $data) {
          $precioAnt=number_format($data['price'], 2, '.', ' '); 
          $precioNuevo=$data['price'] - $data['discount'];
          $precioNuevo=number_format($precioNuevo, 2, '.', ' '); 
          //verificando si hay descuento
          if ($data['discount']>0) {
              $htmlDiscount="<span class='product-price-old'>S/ {$precioAnt}</span>";
          }else{
             $htmlDiscount="";
          }
           
         $resultHTML.= "<div class='custom-col-5'>
                                <div class='product-wrapper mb-25'>
                                    <div class='product-img' style='background-image:url(adminSrwong/storage/app/public/product/{$data['image']});'>
                                        <a href='product-details.html'>
                                            <img src='adminSrwong/storage/app/public/product/{$data['image']}' alt='{$data['image']}' style='opacity:0;'>
                                        </a>
                                        <div class='product-action'>
                                            <div class='pro-action-left'>
                                                <a title='Agregar' href='#'><i class='ion-android-cart'></i> Agregar</a>
                                            </div>
                                            <!--div class='pro-action-right'>
                                                <a title='Wishlist' href='wishlist.html'><i class='ion-ios-heart-outline'></i></a>
                                                <a title='Quick View' data-toggle='modal' data-target='#exampleModal' href='#'><i class='ion-android-open'></i></a>
                                            </div-->
                                        </div>
                                    </div>
                                    <div class='product-content'>
                                        <h4>
                                            <a href='product-details.html'>{$data['name']} </a>
                                        </h4>
                                        <div class='product-price-wrapper'>
                                            <span>S/ {$precioNuevo}</span>
                                            $htmlDiscount
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