<?php
require 'conexion.php';
include "header.php";
require_once 'class/paciente.php';
?>

<div class="container">  
    <div class="row">     
        <h1>Estudiantes</h1>
    </div> 

    <div class="row">
        <form id="registro" name="registro" method="POST" action="guarda.php" autocomplete="off">
            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Introduce la cédula" autofocus required>
            </div>

            <div class="form-group">
                <label for="apellido1">Primer apellido</label>
                <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Introduce el apellido" required>
            </div>

            <div class="form-group">
                <label for="apellido2">Segundo apellido</label>  
                <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Introduce el apellido" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce el nombre" required>
            </div>

            <div class="form-group">
                <label for="seccion">Sección</label>
                <input type="text" class="form-control" id="seccion" name="seccion" placeholder="Introduce la sección"required>
            </div>

            <div class="form-group">
                <label for="curso_lectivo">Curso lectivo</label>
                <input type="text" class="form-control" id="curso_lectivo" name="curso_lectivo" placeholder="Introduce el curso lectivo" required>
            </div>

            <div class="form-group">
                <label for="tiene_beca">Tiene beca</label>
                <select name="tiene_beca" id="tiene_beca" class="form-control" required> 
                    <option value="si">Si</option>
                    <option value="no">No</option>
                  
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" id="guarda" name="guarda" type="submit">Guardar</button>
            </div>
        </form>
    </div> 
</div>
