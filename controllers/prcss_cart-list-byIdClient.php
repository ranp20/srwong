<?php
require_once '../model/db/ext_connection.php';
class CartListTemp extends Connection{
  function list(){
    $idcli = (isset($_POST['idcli']) && $_POST['idcli'] != "") ? $_POST['idcli'] : '';
    try{
      $sql = "CALL sp_list_cart_ByIdClient(:idcli)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idcli", $idcli);
      $stm->execute();
      $data = $stm->fetchAll(PDO::FETCH_ASSOC);
      $res = json_encode($data);
      echo $res;
    }catch(PDOException $e){
      return $e->getMessage();
    } 
  }
}
$carlisttemp = new CartListTemp();
echo $carlisttemp->list();