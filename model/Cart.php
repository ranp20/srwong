<?php
require_once 'db/ext_connection.php';
class CartList extends Connection
{
  private $table = "tbl_cartlist";
  function __construct()
  {
    parent::__construct();
  }
  // -------------- CAROUSEL DE BANNERS
  function deleteAllTempCartByIdClient($idcli,$idprod){
    try{
      $sql = "CALL sp_delete_allTempCart_ByIdClient(:idcli,:idprod)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idcli",$idcli);
      $stm->bindValue(":idprod",$idprod);
      $stm->execute();
      return $stm->rowCount() > 0 ? 'true' : 'false';
    }catch(PDOException $e){
      return $e->getMessage();
    }
  } 
}