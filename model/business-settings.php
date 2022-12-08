<?php
require_once 'db/ext_connection.php';
class BusinessSettings extends Connection
{
  private $table = "business_settings";
  function __construct()
  {
    parent::__construct();
  }
  // -------------- OBTENER EL VALOR DE ATRIBUTO POR NOMBRE DE REGISTRO
  public function getValueByNameReg($name){
    try{
      $sql = "SELECT `value` FROM {$this->table} WHERE `key` = :name ORDER BY id ASC LIMIT 100";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":name", $name);
      $stm->execute();
      $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }catch(PDOException $e){
      return $e->getMessage();
    } 
  }
  // -------------- MOSTRAR LAS POLÍTICAS DE PRIVACIDAD
  public function getPrivacyPolicies(){
    try{
      $sql = "SELECT `value` FROM {$this->table} WHERE `key` = 'privacy_policy' ORDER BY id LIMIT 1;";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML = "";
      foreach ($res as $data){
        $resultHTML .= "
          <div class='mb-40'>
            {$data['value']}
          </div>
        ";
      }
      return $resultHTML;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- MOSTRAR LOS TÉRMINOS Y CONDICIONES
  public function getTermsAndConditions(){
    try{
      $sql = "SELECT `value` FROM {$this->table} WHERE `key` = 'terms_and_conditions' ORDER BY id LIMIT 1;";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML = "";
      foreach ($res as $data){
        $resultHTML .= "
          <div class='mb-40'>
            {$data['value']}
          </div>
        ";
      }
      return $resultHTML;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  
  // -------------- MOSTRAR LA DESCRIPCIÓN EN NOSOTROS
  public function getAboutUs(){
    try{
      $sql = "SELECT `value` FROM {$this->table} WHERE `key` = 'about_us' ORDER BY id LIMIT 1;";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML = "";
      foreach ($res as $data){
        $resultHTML .= "
          <div class='mb-40'>
            {$data['value']}
          </div>
        ";
      }
      return $resultHTML;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
  // -------------- MOSTRAR EL PRECIO DE DELIVERY
  public function getDeliveryCharge(){
    try{
      $sql = "SELECT `value` FROM {$this->table} WHERE `key` = 'delivery_charge' ORDER BY id LIMIT 1;";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }

  // -------------- OBTENER EL HORARIO SEMANAL
  public function getTimeSchedule(){
    try{
      $sql = "SELECT `day`, `opening_time`, `closing_time` FROM `time_schedules` ORDER BY id ASC";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }catch(PDOException $e){
      return $e->getMessage();
    } 
  }
}
$dmlBusinessSettings = new BusinessSettings();
