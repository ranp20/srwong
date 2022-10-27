<?php 
require_once '../model/db/ext_connection.php';
class Urbanizations extends Connection{
	function listAll(){
		try{
			$sql = "SELECT id, id_branch, name, urb_latitud, urb_longitud FROM urbanizations ORDER BY id ASC";
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
$urbanizations = new Urbanizations();
echo $urbanizations->listAll();