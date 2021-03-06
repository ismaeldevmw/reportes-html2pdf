<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta()."/modelo/dao/conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/modelo/beans/checkinoutBean.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/modelo/dao/procesaParametros.php';
require_once $_SERVER['DOCUMENT_ROOT'].ruta::getRuta().'/modelo/dao/checkinout/checkinoutSql.php';

class CheckinoutDao {

    private $conn ;

    function __construct() {
      $this->conn = Conexion::conectar();
    }
    function __destruct() {
      $this->conn->close();
    }

    function obtenerDatosPorIdDao($data){
      $dataArray = array ($data->userid);
      $sql = procesaParametros::PrepareStatement(CheckinoutSql::obtenerDatosPorIdSql(), $dataArray);
      $rs = $this->conn->query($sql);  
      $resultset = array();                        
      
      while ( $row = $rs->fetch_array() ) {
        $lista = new checkinoutBean();
        $lista->userid = $row['userid'];      
        $lista->name = $row['name'];    
        $lista->checktime = $row['checktime'];  
        $lista->deptname = $row['deptname']; 
        $lista->date = $row['date']; 
        $lista->day = $row['day']; 
        $lista->hour = $row['hour']; 
        array_push($resultset,$lista); 
      }

      return $resultset;
    }

    function obtenerDatosPorRangoFechasDao($data) {
      $dataArray = array ($data->fecha1, $data->fecha2, $data->userid);
      $sql = procesaParametros::PrepareStatement(CheckinoutSql::obtenerDatosPorRangoFechasSql(), $dataArray);
      $rs = $this->conn->query($sql);  
      $resultset = array();                        
      
      while ( $row = $rs->fetch_array() ) {
        $lista = new checkinoutBean();
        $lista->userid = $row['userid'];      
        $lista->name = $row['name'];    
        $lista->checktime = $row['checktime'];  
        $lista->deptname = $row['deptname']; 
        $lista->date = $row['date']; 
        $lista->day = $row['day']; 
        $lista->hour = $row['hour']; 
        array_push($resultset,$lista); 
      }

      return $resultset;
    }
}
?>
