<?php
require_once 'db/ext_connection.php';
class Users extends Connection
{
  private $table = "users";
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
  // -------------- LISTAR - TIPOS DE DOCUMENTOS
  function get_typeDocuments(){
    try{
      $sql = "SELECT * FROM tbl_type_document ORDER BY id ASC";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      $resultHTML = "";
      $resultHTML .= "<option value=''>Seleccione una opción</option>";
      foreach ($res as $k => $v){
        $resultHTML .= "
          <option value='{$v['id']}' required>{$v['type']}</option>
        ";
      }
      return $resultHTML;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- ACTUALIZAR USUARIO - DATOS PERSONALES
  function update_personalinfo($arr_update){
    try{
      $sql = "CALL sp_update_personalinfo(:f_name, :l_name, :telephone, :id_t_doc, :n_doc, :idcli)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_update as $key => $value){
        $stm->bindValue($key, $value);
      }
      $stm->execute();
      return $stm->rowCount() > 0 ? "true" : "false";
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
}
$dmlUsers = new Users();