<?php
require_once 'db/ext_connection.php';
class FooterSettings extends Connection
{
  private $table = "footers";
  function __construct()
  {
    parent::__construct();
  }
  // -------------- MOSTRAR LA INFORMACIÓN DE CONTACTO
  public function getInfoOfContact(){
    try{
      $sql = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 100";
      $stm = $this->con->prepare($sql);
      $stm->execute();
      $res = $stm->fetchAll();
      $resultHTML = "";
      foreach ($res as $data){
        
        $foot_address = $data["foot_address"];
        $foot_telephone = $data["foot_telephone"];
        $foot_email = $data["foot_email"];
        
        $foot_schedule_MtoF_o = strtotime($data['foot_schedule_MtoF_o']);
        $foot_schedule_MtoF_o_format = date('h:i a', $foot_schedule_MtoF_o);
        $foot_schedule_MtoF_o_format_upper = strtoupper($foot_schedule_MtoF_o_format);
        $foot_schedule_MtoF_c = strtotime($data['foot_schedule_MtoF_c']);
        $foot_schedule_MtoF_c_format = date('h:i a', $foot_schedule_MtoF_c);
        $foot_schedule_MtoF_c_format_upper = strtoupper($foot_schedule_MtoF_c_format);
        
        $foot_schedule_SatAndSund_o = "";
        $foot_schedule_SatAndSund_o_format = "";
        $foot_schedule_SatAndSund_o_format_upper = "";
        $foot_schedule_SatAndSund_c = "";
        $foot_schedule_SatAndSund_c_format = "";
        $foot_schedule_SatAndSund_c_format_upper = "";
        
        $format_scheduleSatandSund = "";
        if($data['foot_schedule_SatAndSund_o'] == 0 || $data['foot_schedule_SatAndSund_o'] == "00.00" || $data['foot_schedule_SatAndSund_c'] == 0 || $data['foot_schedule_SatAndSund_c'] == "00.00"){
            $format_scheduleSatandSund = "<span>".$data['foot_schedule_MtoF_text']."</span>";
        }else{
            $foot_schedule_SatAndSund_o = strtotime($data['foot_schedule_SatAndSund_o']);
            $foot_schedule_SatAndSund_o_format = date('h:i a', $foot_schedule_SatAndSund_o);
            $foot_schedule_SatAndSund_o_format_upper = strtoupper($foot_schedule_SatAndSund_o_format);
            $foot_schedule_SatAndSund_c = strtotime($data['foot_schedule_SatAndSund_c']);
            $foot_schedule_SatAndSund_c_format = date('h:i a', $foot_schedule_SatAndSund_c);
            $foot_schedule_SatAndSund_c_format_upper = strtoupper($foot_schedule_SatAndSund_c_format);
            $format_scheduleSatandSund = "Abierto: <span>".$foot_schedule_SatAndSund_o_format_upper."</span> - Cerrado: <span>".$foot_schedule_SatAndSund_c_format_upper."</span>";
        }
        
        $message_subject = "Información sobre SrWong";
        $l_break = "%0D%0A";
        $message_body = "Hola, mucho gusto.{$l_break}Desearía más información sobre la plataforma SrWong";

        $resultHTML .= "
          <div class='footer-widget mb-40'>
            <div class='footer-title mb-22'>
              <h4>INFORMACIÓN DE CONTACTO</h4>
            </div>
            <div class='footer-contact'>
              <ul>
                <li>{$foot_address}</li>
                <li>Teléfonos: <a href='tel:{$foot_telephone}'>{$foot_telephone}</a> </li>
                <li>Email: <a href='mailto:{$foot_email}?subject={$message_subject}&body={$message_body}'>{$foot_email}</a></li>
              </ul>
            </div>
            <div class='mt-35 footer-title mb-22'>
              <h4>Horarios</h4>
            </div>
            <div class='footer-time'>
              <ul>
                <li>Abierto:  <span>{$foot_schedule_MtoF_o_format_upper}</span> - Cerrado: <span>{$foot_schedule_MtoF_c_format_upper}</span></li>
                <li>Sábado y Domingo: {$format_scheduleSatandSund}</li>
              </ul>
            </div>
          </div>
        ";
      }
      return $resultHTML;
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }
}
$dmlFooterSettings = new FooterSettings();
