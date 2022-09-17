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
}