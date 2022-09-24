<?php
require_once '../model/db/ext_connection.php';
class CartListByIdTemp extends Connection{
  function changequantity(){
    $idtmp = (isset($_POST['idtmp']) && $_POST['idtmp'] != "") ? $_POST['idtmp'] : '';
    $btnchg = (isset($_POST['btnchg']) && $_POST['btnchg'] != "") ? $_POST['btnchg'] : '';
    try{
      $sql = "CALL sp_change_ByIdTempCart(:idtmp,:btnchg)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idtmp", $idtmp);
      $stm->bindValue(":btnchg", $btnchg);
      $stm->execute();
      return $stm->rowCount() > 0 ? "true" : "false";
    }catch(PDOException $e){
      return $e->getMessage();
    } 
  }
}
$carlisttemp = new CartListByIdTemp();
echo $carlisttemp->changequantity();