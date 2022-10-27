<?php 	
class Connection{

  // CONFIGURACIÓN - LOCALHOST
	protected $con = null;
	private $host = "localhost";
	private $dbname = "db_srwong";
	private $username = "root";
	private $password = "";
	private $charset = "utf8";
    
	// CONFIGURACIÓN - SERVIDOR (SERVIDOR TEMPORAL)
  /*
	protected $con = null;
	private $host = "108.160.152.119";
	private $dbname = "plataformacsscre_srwong_db_test";
	private $username = "plataformacsscre_srwong_user_test";
	private $password = "VK}?YO]@F,(V";
	private $charset = "utf8";
  */

	// CONFIGURACIÓN - SERVIDOR DE SRWONG(OFICIAL)
	/*
	protected $con = null;
	private $host = "108.160.152.119";
	private $dbname = "srwong_base23er";
	private $username = "srwong_user23er3";
	private $password = "^an9%oN&ErP!";
	private $charset = "utf8";
	*/

	public function __construct(){
		try{

			$this->con = new PDO("mysql:host={$this->host}; dbname={$this->dbname}; charset={$this->charset}", $this->username, $this->password);
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}catch(PDOException $err){
			echo "Error al conectar con la base de datos: ".$this->$dbname;
			die($err->getMessage());
		}
	}

	public function close(){
		if($this->con != null) $this->con = null;
	}
}