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
      $sql = "SELECT * FROM {$this->table} WHERE id = :id";
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
        $resultHTML .= "
          <div class='item'>
            <div class='category-wrapper mb-25'>
              <div class='category-img'>
                <a href='./category/$data[1]' class='category-img__linkcateg'>
                  <img src='./adminSrwong/storage/app/public/category/$data[2]' alt='./adminSrwong/storage/app/public/category/$data[1]'>
                </a>
              </div>
              <div class='category-content'>
                <h4 class='text-center'>
                  <a href='./category/$data[1]'>$data[1]</a>
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
$dmlCategories=new Categories();