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
      :delivery_charge,
      :order_type,
      :branch_id,
      :delivery_address,
      :user_phone_number,
      :order_id,
      :type_delivery,
      :info_facturation,
      :deliv_name,
      :deliv_dni,
      :deliv_ruc,
      :deliv_razonsocial,
      :t_payment,
      :t_amount_payment,
      :urbanization_id)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_order as $key => $value) {
        $stm->bindValue($key,$value);
      }
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  /*
  // -------------- ACTUALIZAR TODOS LOS PRODUCTOS CON "NO" EN EL CARRITO
  function getLatestOrderIdByIdClient($user_id){
      try{
        $sql = "UPDATE tbl_cartlist SET indicted = 'YES' WHERE id_client = :user_id ORDER BY id DESC LIMIT 1";
        $stm = $this->con->prepare($sql);
        $stm->bindValue(":user_id",$user_id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);  
      }catch(PDOException $e){
        return $e->getMessage();
      }
  }
  */
  // -------------- OBTENER EL ÚLTIMO ORDER_ID DE ORDERS
  function getLatestOrderIdByIdClient($user_id){
      try{
        $sql = "SELECT order_id FROM tbl_cartlist WHERE id_client = :user_id ORDER BY id DESC LIMIT 1";
        $stm = $this->con->prepare($sql);
        $stm->bindValue(":user_id",$user_id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);  
      }catch(PDOException $e){
        return $e->getMessage();
      }
  }
  // -------------- ACTUALIZAR LOS PRODUCTOS PENDIENTES
  function updateOrderIdTempCart_ByIdClient($id_cli, $orderid){
    try{
      $sql = "CALL sp_update_orderidTempCart_ByIdClient(:id,:orderid)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id",$id_cli);
      $stm->bindValue(":orderid",$orderid);
      $stm->execute();
      //return $stm->fetchAll(PDO::FETCH_ASSOC);
      return $stm->rowCount() > 0 ? 'true' : 'false';
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- ACTUALIZAR LOS PRODUCTOS PENDIENTES
  function updateStatusTempCart_ByIdClient($id_cli, $orderid, $status){
    try{
      $sql = "CALL sp_update_statusTempCart_ByIdClient(:id,:orderid,:status)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":id",$id_cli);
      $stm->bindValue(":orderid",$orderid);
      $stm->bindValue(":status",$status);
      $stm->execute();
      return $stm->rowCount() > 0 ? 'true' : 'false';
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- LISTAR TODOS LOS PRODUCTOS DEL TEMP_CART POR ID DEL CLIENTE - CARRITO DE COMPRAS
  function listTempCartByIdClient($idcli){
    try{
      $sql = "CALL sp_list_cart_ByIdTempCart(:idcli)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idcli", $idcli);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- LISTAR EL TOTAL EN EL CHECKOUT + VALOR DE DELIVERY
  function listTempCartForCheckoutByIdClient($idcli){
    try{
      $sql = "CALL sp_list_checkout_ByIdTempCart(:idcli)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idcli", $idcli);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- LISTAR TODOS LOS PRODUCTOS DEL TEMP_CART POR ID DEL CLIENTE - PERFIL DEL USUARIO
  function listTempCartByIdClientMyAccount($idcli){
    try{
      $sql = "CALL sp_list_cart_ByIdClientMyAccount(:idcli)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idcli", $idcli);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
}
$dmlOrders = new Orders();