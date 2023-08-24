<?php
    require'conexion.php';
    include "header.php";
    $id = $mysqli->real_escape_string($_GET['cedula']);

    $sql = "SELECT * FROM estudiantes WHERE cedula = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        // Resto del código
    } else {
        // No se encontraron registros con la cédula proporcionada
    }
    
    $stmt->close();
    $mysqli->close();


   /*$id= $mysqli->real_escape_string($_GET['cedula']);

    $sql="SELECT * FROM estudiantes
    WHERE cedula=$id";

    $resultado=$mysqli->query($sql);

    $fila = $resultado->fetch_assoc(); **/ 

?>


    <div class="container">  
        
        <div class="row">     
            <h1>Estudiantes</h1>
        </div> 
        
        <div class="row">  
            <form id="registro" name="registro" method="POST" action="editar2.php" autocomplete="off">
            <div class="form-group mb-3">
                <label for="cedula">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $fila['cedula'];?>" placeholder="Introduce el nombre"
                autofocus required>
               <!-- <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"/>-->
            </div>
            <div class="form-group mb-3">
                <label for="apellido1">Primer Apellido</label>
                <input type="text" class="form-control" id="apellido1" name="apellido1" value="<?php echo $fila['apellido1'];?>" placeholder="Introduce el nombre"
                autofocus required>
            </div>

            <div class="form-group mb-3">
                <label for="apellido2">Segundo Apellido</label>
                <input type="text" class="form-control" id="apellido2" name="apellido2" value="<?php echo $fila['apellido2'];?>"placeholder="Introduce el telefono"required>
            </div>

            <div class="form-group mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['nombre'];?>"placeholder="Introduce la fecha de nacimiento"required>
            </div>

            <div class="form-group mb-3">
                <label for="seccion">Sección</label>
                <input type="text" class="form-control" id="seccion" name="seccion" value="<?php echo $fila['seccion'];?>"placeholder="Introduce la fecha de nacimiento"required>
            </div>
            <div class="form-group mb-3">
                <label for="curso_lectivo">Curso Lectivo</label>
                <input type="text" class="form-control" id="curso_lectivo" name="curso_lectivo" value="<?php echo $fila['curso_lectivo'];?>"placeholder="Introduce la fecha de nacimiento"required>
            </div>
            <div class="form-group mb-3">
                <label for="tiene_beca">¿Tiene beca?</label>
                <input type="text" class="form-control" id="tiene_beca" name="tiene_beca" value="<?php echo $fila['tiene_beca'];?>"placeholder="Introduce la fecha de nacimiento"required>
            </div>
            <!---<div class="form-group">
                <label for="estado_civil">Estado civil</label>
                <select name="estado_civil" id="estado_civil" value=""class="form-control" required> 
                    <option value="soltero" <?php if ('SOLTERO'==$fila['estado_civil']){echo 'selected';} ?>>Soltero</option>
                    <option value="casado" <?php if ('CASADO'==$fila['estado_civil']){echo 'selected';} ?>>Casado</option>
                    <option value="otro<?php if ('OTRO'==$fila['estado_civil']){echo 'selected';} ?>">Otro</option>
                </select>
            </div>-->

            <div class="form-group">
               <button class="btn btn-primary mt-3" id="guarda" name="guarda" type="submit">Guarda</button>
            </div>
            
            </form>
        </div> 
  