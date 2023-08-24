<?php
require_once 'conexion.php';

class Paciente extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    //*****************************************************************
    // LISTAMOS DE ESTUDIANTES
    //*****************************************************************
    
   public function estudiantes(){
        $resultado = $this->mysqli->query("SELECT * FROM estudiantes");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }

    //*****************************************************************
    // PACIENTE POR ID
    //*****************************************************************

    public function paciente_id($id){

        $consulta = sprintf("SELECT
           *
            FROM
            t_personal
            WHERE
            id = %s", 
            parent::comillas_inteligentes($id)
            );

        $resultado = $this->mysqli->query($consulta);
        $fila = $resultado->fetch_array();
        return $fila;
    }

     //*****************************************************************
    // Consulta estudiante
    //*****************************************************************

    public function estudiante_id($id){

        $consulta = sprintf("SELECT *
           
            FROM
            estudiantes
            WHERE
            cedula = %s ", 
            parent::comillas_inteligentes($id)
            );

        $resultado = $this->mysqli->query($consulta);
       // $check_user = num_rows($resultado);
        return $resultado;
        }
       //*****************************************************************
    // Consulta almuerzo
    //*****************************************************************

    public function verificar_almuerzo($id,$date){

        $consulta = sprintf("SELECT *
           
            FROM
            t_asistencia
            WHERE
            cedula = %s and fecha = %s",
            parent::comillas_inteligentes($id),
            parent::comillas_inteligentes($date)
            );

        $resultado = $this->mysqli->query($consulta);
        //$check_user = mysqli_num_rows($resultado);
        return $resultado;
        }    
   //*****************************************************************
    // Consulta becado
    //*****************************************************************

        public function becado_id($id){

            $consulta = sprintf("SELECT *
               
                FROM
                estudiantes_becados
                WHERE
                cedula = %s",
                parent::comillas_inteligentes($id)
                );
    
            $resultado = $this->mysqli->query($consulta);
            $check_user = mysqli_num_rows($resultado);
            return $check_user;
            }    


           //*****************************************************************
    // guardarbecado
    //*****************************************************************

    public function guardar_becado($id){

        $consulta = sprintf("SELECT *
           
            FROM
            estudiantes
            WHERE
            cedula = %s",
            parent::comillas_inteligentes($id)
            );

        $resultado = $this->mysqli->query($consulta);
        $fila = $resultado->fetch_array();
        return $fila;
        } 
            
    //*****************************************************************
    // ]Consulta Almuerzo
    //*****************************************************************

    public function consulta_almuerzo($fechaInicio, $fechaFin) {
       
            $fechaInicioSQL = date('d-m-y', strtotime($fechaInicio));
            $fechaFinSQL = date('d-m-y', strtotime($fechaFin));
        
            $consulta = "SELECT a.*, e.nombre, e.apellido1, e.apellido2, e.seccion
                         FROM t_asistencia a
                         INNER JOIN estudiantes e ON a.cedula = e.cedula
                         WHERE STR_TO_DATE(a.fecha, '%d-%m-%Y') BETWEEN STR_TO_DATE('$fechaInicioSQL', '%d-%m-%Y') AND STR_TO_DATE('$fechaFinSQL', '%d-%m-%Y')";
            $resultado = $this->mysqli->query($consulta);
        
            $estudiantes = array();
        
            while ($fila = $resultado->fetch_assoc()) {
                $fila['fecha'] = date('d-m-Y', strtotime($fila['fecha']));
                $estudiantes[] = $fila;
            }
        
            return $estudiantes;
        }
        
}