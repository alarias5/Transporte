<?php
require_once 'class/paciente.php';
require_once 'conexion.php';
$link = $mysqli;
include "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dia_actual = date("d-m-Y");
    $name = $_POST['name'];

    if (!empty($name)) {
        $objestudiante = new Paciente();
        $estudiante = $objestudiante->estudiante_id($name);

        if ($estudiante->num_rows > 0) {
            $estudiante = $estudiante->fetch_assoc();
            $objasistencia = new Paciente();
            $asistencia = $objasistencia->verificar_almuerzo($name, $dia_actual);

            if ($asistencia->num_rows == 0) {
                $tiene_beca = $estudiante['tiene_beca'];
                $query = "INSERT INTO t_asistencia (cedula, fecha, tiene_beca) VALUES ('".$estudiante['cedula']."', '".$dia_actual."', '".$estudiante['tiene_beca']."')";

                $link->query($query);
                mysqli_close($link);

                if ($tiene_beca == "Si") {
                    echo "<script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'El estudiante tiene beca',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El estudiante no tiene beca.',
                            
                        });
                    </script>";
                }
            } else {
                echo "<script>
                   Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El estudiante ya almorzó.',
                            
                        });
                    </script>";
            }
        } else {
            echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'El estudiante no existe',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Favor digitar un valor',
                showConfirmButton: false,
                timer: 1500
            });
        </script>";
    }
}
?>

<body>
<h2 class="lead"></h2>
        
<div class="jumbotron">
    <!--<h1>Sistema  de Comedor</h1>
    <p>Favor seleccionar la opción del menú deseada</p>-->

</div>

<div class="container text-center">
    <h1>Verificar Almuerzo</h1>

    <script>
        window.onload = function() {
            document.getElementById("name").focus();
        };
    </script>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="name" id="name" autofocus>
        <input type="submit" name="submit" value="Verificar"><br>
    </form>

    <div class="mt-5"></div>
        
    <!-- Insert an image in the main section -->
    <div class="row justify-content-center">
        <div class="col-6">
            <img src="images/comedor.png" alt="Image" class="img-fluid">
        </div>
    </div>
</div>

   
                        
