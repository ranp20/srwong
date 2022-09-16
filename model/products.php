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
      $sql = "SELECT * FROM {$this->table}";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
}