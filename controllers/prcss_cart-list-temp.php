<?php
require_once '../model/db/ext_connection.php';
class CartListTemp extends Connection{
  function add(){
    
    $arr_cart = [
      'idprod' => $_POST['p_id'],
      'idcli' => $_POST['p_idcli'],
      'price' =>  $_POST['p_price'],
      'quantity' => $_POST['p_quantity']
    ];
    try{
      $sql = "CALL sp_add_temp_cart(:idprod,:idcli,:price,:quantity)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_cart as $key => $value){
        $stm->bindValue($key, $value);
      }
      $stm->execute();
      $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($res[0]);
    }catch(PDOException $e){
      return $e->getMessage();
    }
    
  }
}
$carlisttemp = new CartListTemp();
echo $carlisttemp->add();