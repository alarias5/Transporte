<?php
require_once 'conexion.php';
header("Content-type: application/pdf; charset=utf-8");
class Consulta extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS DE CONSULTAS
    //*****************************************************************

    public function consultasPaciente($id){
        $consulta = sprintf("SELECT
            id,
            nombre,
            apellido,
            fecha_nacimiento,
            nacionalidad
            FROM
            t_personal
            WHERE
            id = %s", 
           parent::comillas_inteligentes($id)
        );
        
        
        $resultado = $this->mysqli->query($consulta);

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
    }

}