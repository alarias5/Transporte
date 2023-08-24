<?php
require 'conexion.php';
include "header.php";

$cedula = $mysqli->real_escape_string($_POST['cedula']);
$apellido1 = $mysqli->real_escape_string($_POST['apellido1']);
$apellido2 = $mysqli->real_escape_string($_POST['apellido2']);
$nombre = $mysqli->real_escape_string($_POST['nombre']);
$seccion = $mysqli->real_escape_string($_POST['seccion']);
$curso_lectivo = $mysqli->real_escape_string($_POST['curso_lectivo']);
$tiene_beca = $mysqli->real_escape_string($_POST['tiene_beca']);

$sql = "INSERT INTO estudiantes (cedula, apellido1, apellido2, nombre, seccion, curso_lectivo, tiene_beca)
        VALUES ('$cedula', '$apellido1', '$apellido2', '$nombre', '$seccion', '$curso_lectivo', '$tiene_beca')";

if ($mysqli->query($sql)) {
    echo "<script>
            Swal.fire({
                title: 'Registro Agregado',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'listaBecados.php';
                }
            });
          </script>";
} else {
    echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'Error al agregar: " . $mysqli->error . "',
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'listaBecados.php';
                }
            });
          </script>";
}


$mysqli->close();
?>
