<?php
require_once 'db/ext_connection.php';
class Orders extends Connection
{
  private $table = "orders";
  function __construct()
  {
    parent::__construct();
  }
  // -------------- LISTAR CATEGORIAS POR ID_CATEGORY DE PRODUCTOS
  function addOrder($arr_order){
    try{
      $sql = "CALL sp_add_order(
      :user_id, 
      :order_amount, 
      :payment_status, 
      :order_status,
      :payment_method,
      :transaction_reference,
      :order_type,
      :branch_id,
      :delivery_address,
      :user_phone_number,
      :order_id)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_order as $key => $value) {
        $stm->bindValue($key,$value);
      }
      $stm->execute();
      // return $stm->rowCount() > 0 ? 'true' : 'false';
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
}
$dmlOrders = new Orders();