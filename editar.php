<?php
require 'conexion.php';
include "header.php";

if (isset($_POST['submit'])) {
    $cedula = $mysqli->real_escape_string($_POST['cedula']);
    $apellido1 = $mysqli->real_escape_string($_POST['apellido1']);
    $apellido2 = $mysqli->real_escape_string($_POST['apellido2']);
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $curso_lectivo = $mysqli->real_escape_string($_POST['curso_lectivo']);
    $tiene_beca = $mysqli->real_escape_string($_POST['tiene_beca']);

    $sql = "UPDATE estudiantes SET apellido1='$apellido1', apellido2='$apellido2', nombre='$nombre', curso_lectivo='$curso_lectivo', tiene_beca='$tiene_beca' WHERE cedula='$cedula'";

    $resultado = $mysqli->query($sql);

    if ($resultado > 0) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Registro Actualizado',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
          
        });
        </script>";

        // Obtener la información actualizada después de la modificación
        $sql = "SELECT * FROM estudiantes WHERE cedula = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $cedula);
        $stmt->execute();
        
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
        }

        $stmt->close();
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error al actualizar registro',
                text: 'Ocurrió un error durante la actualización',
            });
         </script>";
    }

    echo "<br/><a href='index.php' class='btn btn-primary'>Registrar</a>";
} else {
    $id = $mysqli->real_escape_string($_GET['cedula']);

    $sql = "SELECT * FROM estudiantes WHERE cedula = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
    } else {
        // No se encontraron registros con la cédula proporcionada
    }
    
    $stmt->close();
    $mysqli->close();
}
?>

<div class="container">  
    <div class="row">     
        <h1>Estudiantes</h1>
    </div> 
    
    <div class="row">  
        <form id="registro" name="registro" method="POST"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group mb-3">
                <label for="cedula">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $fila['cedula']; ?>" placeholder="Introduce la cédula" autofocus required>
            </div>
            <div class="form-group mb-3">
                <label for="apellido1">Primer Apellido</label>
                <input type="text" class="form-control" id="apellido1" name="apellido1" value="<?php echo $fila['apellido1']; ?>" placeholder="Introduce el primer apellido" autofocus required>
            </div>

            <div class="form-group mb-3">
                <label for="apellido2">Segundo Apellido</label>
                <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo $fila['apellido2']; ?>" placeholder="Introduce el segundo apellido" required>
            </div>

            <div class="form-group mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>" placeholder="Introduce el nombre" required>
            </div>

            <div class="form-group mb-3">
                <label for="curso_lectivo">Curso Lectivo</label>
                <input type="text" class="form-control" id="curso_lectivo" name="curso_lectivo" value="<?php echo $fila['curso_lectivo']; ?>" placeholder="Introduce el curso lectivo" required>
            </div>

            <div class="form-group mb-3">
                <label for="tiene_beca">¿Tiene beca?</label>
                <input type="text" class="form-control" id="tiene_beca" name="tiene_beca" value="<?php echo $fila['tiene_beca']; ?>" placeholder="Introduce si tiene beca" required>
            </div>

            <div class="form-group">
               <button class="btn btn-primary mt-3" id="guarda" name="submit" type="submit">Guardar</button>
            </div>
        </form>
    </div> 
</div>
