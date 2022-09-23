<?php
require_once '../model/db/ext_connection.php';
class CartListByIdTemp extends Connection{
  function delete(){
    $idtmp = (isset($_POST['idtmp']) && $_POST['idtmp'] != "") ? $_POST['idtmp'] : '';
    try{
      $sql = "CALL sp_delete_ByIdTempCart(:idtmp)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idtmp", $idtmp);
      $stm->execute();
      return $stm->rowCount() > 0 ? "true" : "false";
    }catch(PDOException $e){
      return $e->getMessage();
    } 
  }
}
$carlisttemp = new CartListByIdTemp();
echo $carlisttemp->delete();