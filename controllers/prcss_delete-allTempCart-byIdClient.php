<?php
require_once '../model/db/ext_connection.php';
class CartListTemp extends Connection{
  function delete(){
    $idcli = (isset($_POST['idcli']) && $_POST['idcli'] != "") ? $_POST['idcli'] : '';
    try{
      $sql = "CALL sp_delete_allTempCart_ByIdClient(:idcli)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idcli", $idcli);
      $stm->execute();
      return $stm->rowCount() > 0 ? 'true' : 'false';
    }catch(PDOException $e){
      return $e->getMessage();
    } 
  }
}
$carlisttemp = new CartListTemp();
echo $carlisttemp->delete();