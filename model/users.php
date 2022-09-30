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
  function get_typeDocumentsByIdDoc($uprof_id_t_doc){
    try{
      $sql = "SELECT * FROM tbl_type_document ORDER BY id ASC";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      $resultHTML = "";
      if($uprof_id_t_doc == 0){
        $resultHTML .= "<select class='form-control one-hidden' aria-required='true' name='prof_usval-t-doc' id='prof_usval-t-doc' title='Tipo de documento' required>";
        $resultHTML .= "<option value=''>Seleccione una opción</option>";
        foreach ($res as $k => $v){
          if($v['id'] == $uprof_id_t_doc){
            $resultHTML .= "
              <option value='{$v['id']}' selected required>{$v['type']}</option>
            ";
          }else{
            $resultHTML .= "
              <option value='{$v['id']}' required>{$v['type']}</option>
            ";
          }
        }
        $resultHTML .= "</select>";
      }else{      
        $resultHTML .= "<select class='form-control' aria-required='true' name='prof_usval-t-doc' id='prof_usval-t-doc' title='Tipo de documento' required>";
        foreach ($res as $k => $v){
          if($v['id'] == $uprof_id_t_doc){
            $resultHTML .= "
              <option value='{$v['id']}' selected required>{$v['type']}</option>
            ";
          }else{
            $resultHTML .= "
              <option value='{$v['id']}' required>{$v['type']}</option>
            ";
          }
        }
        $resultHTML .= "</select>";
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