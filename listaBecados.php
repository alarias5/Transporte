<?php
require("class/paciente.php");
include "header.php";
    
$objpaciente = new Paciente();
$estudiantes = $objpaciente->estudiantes();
?>

<div class="container">  
    <div class="row">     
        <h1>Lista de Estudiantes con Beca</h1>
    </div> 

    <div class="row mb-3">     
        <a href="nuevo.php" class="btn btn-primary">Registrar</a>
    </div> 
        
    <?php if (sizeof($estudiantes) > 0) { ?>
        <table id="tabla" class="table table-striped">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Apellidos</th>
                    <th>Nombre</th>
                    <th>Sección</th>
                    <th>Curso Lectivo</th>
                    <th>Beca</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $fila) { ?>
                    <tr>
                        <td><?php echo $fila['cedula']; ?></td>
                        <td><?php echo $fila['apellido1'].' '.$fila['apellido2']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['seccion']; ?></td>
                        <td><?php echo $fila['curso_lectivo']; ?></td>
                        <td><?php echo $fila['tiene_beca']; ?></td>
                        <td>
                            <a href="editar.php?cedula=<?php echo $fila['cedula']; ?>" class="btn btn-warning">Editar</a>
                            <a href="eliminar.php?cedula=<?php echo $fila['cedula']; ?>" class="btn btn-danger ms-1" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar</a>
                           
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay resultados...</p>
    <?php } ?>
</div>

<?php include "footer.php"; ?>
