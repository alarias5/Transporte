<?php
session_start();

class Conexion {

   //*****************************************************************
   // FUNCION CONECTAR CON LOS DATOS DE CONEXION
   //*****************************************************************

   public function conectar(){
     
      $mysqli = new mysqli('localhost','root','','comedor',3306);

      if ($mysqli->connect_errno) {
         header('Location: /');
         exit; // Es recomendable agregar esta línea para detener la ejecución si hay un error en la conexión
      }

      // Establecer el conjunto de caracteres UTF-8
      $mysqli->set_charset("utf8");

      return $mysqli;
   }


   //*****************************************************************
   // FUNCION RUTA PARA TRAER IMAGENES, CSS, JS
   //*****************************************************************

   /*public static function ruta() {
      return "http://localhost:5433/descargar-historial-medico-con-fpdf-php/";
   }*/

   public function comillas_inteligentes($valor) {
      // Retirar las barras
     // if (get_magic_quotes_gpc()) {
     //    $valor = stripslashes($valor);
     // }
      // Colocar comillas si no es entero
      //if (!is_numeric($valor)) {
         $valor = "'" . $this->mysqli->real_escape_string($valor) . "'";
      //}
      return $valor;
   }

}