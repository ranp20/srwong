<?php 
require_once '../model/db/ext_connection.php';
class BranchLocations extends Connection{
	function list(){
		try{
			$sql = "SELECT * FROM branches ORDER BY id DESC";
			if(isset($_POST['searchList'])){
				//$search = $this->con->real_escape_string($_POST['searchList']);
				$search = addslashes($_POST['searchList']);
				$sql = "SELECT * FROM branches 
								WHERE id LIKE '%".$search."%' OR
											name LIKE '%".$search."%' OR
											email LIKE '%".$search."%' OR
											address LIKE '%".$search."%'
								ORDER BY id DESC LIMIT 10";
			}
			$stm = $this->con->query($sql);
			$stm->execute();
			$data = $stm->fetchAll(PDO::FETCH_ASSOC); 
			$res = json_encode($data);
			echo $res;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}
$branch = new BranchLocations();
echo $branch->list();