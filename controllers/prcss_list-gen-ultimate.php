<?php
require_once '../model/db/ext_connection.php';
class List_ultimate_codegen extends Connection{
	function list(){
		try{
			$sql = "CALL sp_list_ultimate_codegen_complaints_book()";
			$stm = $this->con->prepare($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC);
			$res = json_encode($data);
      echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$complaintsbook = new List_ultimate_codegen();
echo $complaintsbook->list();