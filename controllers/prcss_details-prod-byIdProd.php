<?php
require_once '../model/db/ext_connection.php';
class ProductDetail extends Connection{
  function list($idprod){
    try{
      $sql = "CALL sp_list_details_ByIdProduct(:idprod)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idprod", $idprod);
      $stm->execute();
      $data = $stm->fetchAll(PDO::FETCH_ASSOC);
      return $data;
    }catch(PDOException $e){
      return $e->getMessage();
    } 
  }
}