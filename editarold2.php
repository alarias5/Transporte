<?php
    require 'conexion.php';
    include "header.php";
    $cedula = $mysqli->real_escape_string($_POST['cedula']);
    $apellido1 = $mysqli->real_escape_string($_POST['apellido1']);
    $apellido2 = $mysqli->real_escape_string($_POST['apellido2']);
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $curso_lectivo = $mysqli->real_escape_string($_POST['curso_lectivo']);
    $tiene_beca = $mysqli->real_escape_string($_POST['tiene_beca']);

    $sql= "UPDATE estudiantes SET apellido1='$apellido1',apellido2='$apellido2',nombre='$nombre',curso_lectivo='$curso_lectivo',tiene_beca='$tiene_beca' WHERE cedula='$cedula'";

    $resultado = $mysqli->query($sql);

    if($resultado>0){
        echo'Registro Actualizado';
        echo "<a href='index.php' class='btn btn-primary'>Registrar</a>";

    }else{
        echo'Error al actualizar registro';
    }

    echo "<br/><a href='index.php' class='btn btn-primary'>Registrar</a>";
?>