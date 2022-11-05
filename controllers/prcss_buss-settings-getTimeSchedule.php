<?php 
require_once '../model/db/ext_connection.php';
class TimeSchedule extends Connection{
	function listAll(){
		try{
			$sql = "SELECT `day`, `opening_time`, `closing_time` FROM `time_schedules` ORDER BY id ASC";
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
$time_schedule = new TimeSchedule();
echo $time_schedule->listAll();