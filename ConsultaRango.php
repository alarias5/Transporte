<?php
require 'conexion.php';
include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center mb-4">Generar Reporte</h2>
            <form method="GET" action="reporte.php">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de inicio:</label>
                    <input type="text" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="dd-mm-yy" required>
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de fin:</label>
                    <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="dd-mm-yy" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Generar Reporte</button>
            </form>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-4 offset-md-4">
            <img src="images/comedor.png" class="img-fluid" alt="Imagen de ejemplo">
        </div>
    </div>
</div>


<script>
  $(document).ready(function() {
    $("#fecha_inicio, #fecha_fin").datepicker({
      dateFormat: "dd-mm-yy"
    });
  });
</script>
