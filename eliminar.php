<?php
    require 'conexion.php';
    include "header.php";

    $id = $mysqli->real_escape_string($_GET['cedula']);
    
    $sql = "DELETE FROM estudiantes WHERE cedula = '$id'";

    $resultado = $mysqli->query($sql);

    if($resultado > 0){
        // Registro eliminado con éxito
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>';
        echo 'Swal.fire({';
        echo '  title: "Registro Eliminado",';
        echo '  icon: "success",';
        echo '  showConfirmButton: false,';
        echo '  timer: 1500';
        echo '}).then(function() {';
        echo '  window.location.href = "index.php";';
        echo '});';
        echo '</script>';
    } else{
        // Error al eliminar el registro
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>';
        echo 'Swal.fire({';
        echo '  title: "Error al Eliminar",';
        echo '  icon: "error",';
        echo '  showConfirmButton: false,';
        echo '  timer: 1500';
        echo '}).then(function() {';
        echo '  window.location.href = "index.php";';
        echo '});';
        echo '</script>';
    }
?>
