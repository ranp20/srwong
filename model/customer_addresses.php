<?php
require_once 'db/ext_connection.php';
class CustomerAddress extends Connection
{
  private $table = "customer_addresses";
  function __construct()
  {
    parent::__construct();
  }
  // -------------- LISTAR CATEGORIAS POR ID_CATEGORY DE PRODUCTOS
  function addCustomerAddress($arr_customer_addresses){
    try{
      $sql = "CALL sp_add_address_first_time(:address_type, :contact_person_number, :address, :latitude, :longitude, :user_id, :contact_person_name, :n_dni)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_customer_addresses as $key => $value) {
        $stm->bindValue($key,$value);
      }
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- LISTAR LA ÚLTIMA DIRECCIÓN DE ENVÍO POR ID DE CLIENTE
  function listlastestaddressbyIdClient($idclient){
    try{
      $sql = "SELECT contact_person_number, address, contact_person_name, n_dni FROM customer_addresses WHERE contact_person_number != '' AND n_dni != 'No especificado' AND user_id = :idclient ORDER BY id DESC LIMIT 1";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idclient",$idclient);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- LISTAR LA ÚLTIMA DIRECCIÓN DE ENVÍO POR ID DE CLIENTE
  function listAlllastestaddressbyIdClient($idclient){
    try{
      $sql = "SELECT contact_person_number, address, contact_person_name, n_dni FROM {$this->table} WHERE user_id = :idclient ORDER BY id DESC";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idclient",$idclient);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
}
$dmlCustomerAddress = new CustomerAddress();

