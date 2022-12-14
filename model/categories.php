<?php
require_once 'db/ext_connection.php';
class Categories extends Connection
{
  private $table = "categories";
  function __construct()
  {
    parent::__construct();
  }
  // -------------- LISTAR LOS ITEMS
  function getAll(){
    try{
      $sql = "SELECT * FROM {$this->table}";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- LISTAR CATEGORIAS POR ID_CATEGORY DE PRODUCTOS
  function getCategoriesByIdCategory($id_category){
    try{
      $sql = "SELECT id, name, status, image, banner_image FROM {$this->table} WHERE id = :id";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id",$id_category);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- LISTAR CATEGORIAS POR NOMBRE DE CATEOGORÍA
  function getCategoriesByNameCategory($name_category){
    try{
      $sql = "SELECT id, name, status, image, banner_image FROM {$this->table} WHERE name = :name";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":name",$name_category);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- LISTADO DE CATEGORÍAS EN EL CAROUSEL PRINCIPAL
  public function getCategoriesCarousel(){
    try{
      $sql = "SELECT id, name, image FROM {$this->table} ORDER BY id LIMIT 50";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML="";
      foreach ($res as $data){
        $catg_name = (strlen($data[1]) > 18) ? substr($data[1], 0, 15) . '...' : $data[1];
        $resultHTML .= "
          <div class='item'>
            <div class='category-wrapper mb-25'>
              <div class='category-img'>
                <a href='./category/$data[0]' class='category-img__linkcateg six_slider' title='{$catg_name}'>
                  <img loading='lazy' src='./admin/storage/app/public/category/$data[2]' alt='./admin/storage/app/public/category/$data[1]' class='img-fluid' width='100' height='100'>
                </a>
              </div>
              <div class='category-content six_slider_title'>
                <h4 class='text-center'>
                  <a href='./category/$data[0]' title='$catg_name'>{$catg_name}</a>
                </h4>
              </div>
            </div>
          </div>
        ";
      }
    return $resultHTML;
   }catch(Exception $exc){
    echo $exc->getTraceAsString();
   }
  }
  // -------------- LISTADO DE TODAS LAS CATEGORÍAS
  public function getAllCategories(){
    try{
      $sql = "SELECT id, name, image FROM {$this->table} ORDER BY name ASC";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML="";
      foreach ($res as $data){
        $catg_name = $data[1];
        $resultHTML .= "
          <div class='product-width col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-30'>
            <div class='product-wrapper'>
              <div class='product-img'>
                <a href='./category/$data[0]' class='product-img__linkprods' title='{$catg_name}'>
                  <img loading='lazy' src='./admin/storage/app/public/category/$data[2]' alt='catg_{$catg_name}' class='img-fluid' width='100' height='100'>
                </a>
              </div>
              <div class='product-content'>
                <h4>
                  <a href='./category/$data[0]' title='$catg_name'>{$catg_name}</a>
                </h4>
              </div>
            </div>
          </div>
        ";
      }
    return $resultHTML;
   }catch(Exception $exc){
    echo $exc->getTraceAsString();
   }
  }
}
$dmlCategories = new Categories();