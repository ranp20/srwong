<?php 
require_once '../model/db/ext_connection.php';
class Urbanizations extends Connection{
	function list(){
		$idbranch = (isset($_POST['id_branch']) && $_POST['id_branch'] != "" && $_POST['id_branch'] != 0) ? $_POST['id_branch'] : "0";
		try{
			$sql = "SELECT id, id_branch, name FROM urbanizations WHERE id_branch = :idbranch ORDER BY id ASC";
			$stm = $this->con->prepare($sql);
			$stm->bindValue(":idbranch", $idbranch);
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
echo $urbanizations->list();