<?php
require_once 'db/ext_connection.php';
class Complaints_Book extends Connection
{
  private $table = "complaints__book";
  function __construct()
  {
    parent::__construct();
  }
  // -------------- AGREGAR AL LIBRO DE RECLAMACIONES
  function addComplaintsBook($arr_cmpbk){
    try{
      $sql = "CALL sp_add_complaints_book(
      :cmpbk_book_name,
      :cmpbk_book_seldistric,
      :cmpbk_book_addresshome,
      :cmpbk_book_dni,
      :cmpbk_book_telephone,
      :cmpbk_book_email,
      :st_cmpbook_age,
      :st_cmpbook_treason,
      :cmpbk_book_amount,
      :cmpbk_book_desc,
      :st_cmpbook_tdetailreason,
      :cmpbk_book_cli_details,
      :cmpbk_book_order,
      :cmpbk_book_prov_details)";
      $stm = $this->con->prepare($sql);
      foreach ($arr_cmpbk as $key => $value) {
        $stm->bindValue($key,$value);
      }
      $stm->execute();
      //return $stm->fetchAll(PDO::FETCH_ASSOC);
      return $stm->rowCount() > 0 ? 'true' : 'false';
    }catch(PDOException $e){
      return $e->getMessage();
    }
  }

}
$dmlComplaintsBook = new Complaints_Book();