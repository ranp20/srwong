<?php
require_once '../model/db/ext_connection.php';
class BranchListById extends Connection{
  function list(){
    $idbranch = (isset($_POST['idbranch']) && $_POST['idbranch'] != "") ? $_POST['idbranch'] : '';
    date_default_timezone_set('America/Lima');
    $dateCurrent = date('d/m/Y');
    try{
      $sql = "CALL sp_list_branch_byIdBranch(:idbranch)";
      $stm = $this->con->prepare($sql);
      $stm->bindValue(":idbranch", $idbranch);
      $stm->execute();
      $data = $stm->fetchAll(PDO::FETCH_ASSOC);
      foreach($data as $k => $v){
        $data[$k]['razon_social'] = "LIANG INVERSIONES SOCIEDAD ANONIMA CERRADA - LIANG INVERSIONES S.A.C.";
        $data[$k]['ruc'] = "20553277699";
        $data[$k]['fecha'] = $dateCurrent;
      }
      $res = json_encode($data);
      echo $res;
    }catch(PDOException $e){
      return $e->getMessage();
    } 
  }
}
$branchlist = new BranchListById();
echo $branchlist->list();