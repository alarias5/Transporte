
<?php
require 'conexion.php';
include "header.php";
require_once 'class/paciente.php';

// Obtener las fechas seleccionadas del formulario
$fechaInicio = $_GET['fecha_inicio'];
$fechaFin = $_GET['fecha_fin'];

$objpaciente = new Paciente();
$estudiantes = $objpaciente->consulta_almuerzo($fechaInicio, $fechaFin);
?>

<div class="container">  
    <div class="row">     
        <h1 class="display-4">Reporte de estudiantes que almorzaron</h1>
    </div> 

    <div class="row">
        <div class="col-12">
            <h3 class="text-primary">Fechas seleccionadas:</h3>
            <p class="lead">Fecha de inicio: <?php echo date('d-m-Y', strtotime($fechaInicio)); ?></p>
            <p class="lead">Fecha de fin: <?php echo date('d-m-Y', strtotime($fechaFin)); ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table id="tabla" class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Sección</th>
                        <th>Fecha</th>
                        <th>Tiene Beca</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($estudiantes as $fila) { ?>
                        <tr>
                            <td><?php echo $fila['cedula']; ?></td>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['apellido1']; ?></td>
                            <td><?php echo $fila['apellido2']; ?></td>
                            <td><?php echo $fila['seccion']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($fila['fecha'])); ?></td>
                            <td><?php echo $fila['tiene_beca']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-3">
            <h4>Resumen de estudiantes que almorzaron:</h4>
            <?php
                // Calculamos la suma de estudiantes que tienen beca y los que no
                $cantidadSi = 0;
                $cantidadNo = 0;

                foreach ($estudiantes as $fila) {
                    if ($fila['tiene_beca'] == 'si') {
                        $cantidadSi++;
                    } else {
                        $cantidadNo++;
                    }
                }

                // Mostramos la suma en la pantalla
                echo "<p>Estudiantes con beca: " . $cantidadSi . "</p>";
                echo "<p>Estudiantes sin beca: " . $cantidadNo . "</p>";
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-primary mt-3" onclick="imprimirReporte()">Imprimir Reporte</button>
        </div>
    </div>
</div>

<script>
    function imprimirReporte() {
        window.print();
    }
</script>

<?php
include "footer.php";
?>
