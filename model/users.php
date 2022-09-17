<?php
require_once 'db/connection.php';
class Users extends Connection
{
  private $table = "tbl_users";
  function __construct()
  {
    parent::__construct();
  }
  // -------------- VALIDAR EL USUARIO
  function verify_email($email){
    try{
      $sql = "SELECT * FROM {$this->table} WHERE email = :email";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(':email', $email);
      $stm->execute();
      return $stm->rowCount() > 0 ? 'true' : 'false';
    }catch(PDOEXception $e){
      return $e->getMessage();
    }
  }
  // -------------- AGREGAR USUARIO
  function add($arr_userdata){
    try {
      $sql = "CALL sp_add_user(:_token, :username, :email, :password)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_userdata as $key => $value){
        $stm->bindValue($key, $value);
      }
      $stm->execute();
      return $stm->rowCount() > 0 ? "true" : "false";
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
  // -------------- LISTAR USUARIO - PARA VALIDAR INICIO DE SESIÓN
  function get_usersverifylogin($email){
    try{
      $sql = "SELECT password FROM {$this->table} WHERE email = :email";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(':email', $email);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- LISTAR - USERS
  function get_users($email){
    try{
      $sql = "SELECT * FROM {$this->table} WHERE email = :email";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(':email', $email);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
}