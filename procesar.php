<?php

require("class/paciente.php");

$cedula = $_POST['cedula'];

// Verificar si la cédula está vacía
if (empty($cedula)) {
	
		echo '<script language = javascript>
		alert("usuario no autenticado")
		self.location = "index.php"
		</script>';
}


// Obtenemos el id del paciente
//$estudiante_id= $_POST['cedula'];

// Creamos nuestro objeto paciente
$objestudiante = new Paciente();
// obtenemos los datos del paciente por el id
$estudiante = $objestudiante->estudiante_id($cedula);

if($estudiante>0) {
	echo '<script language = javascript>
	alert("El usuario ya registró ")
	self.location = "index.php"
	</script>';
} else {
  //$message = "El estudiante " . $cedula. " " . $cedula . " no existe.";
  echo '<script language = javascript>
  alert("El usuario no existe ")
  self.location = "index.php"
  </script>';
}

/*

// Consultar si el estudiante existe en la tabla de estudiantes
$sql = "SELECT * FROM estudiantes WHERE cedula = '$cedula'";

$resultado = $mysqli->query($sql);

// Verificar si se encontró algún registro
if ($resultado > 0) {
	echo "El estudiante con cédula $cedula no está registrado";
	exit();
}

// Obtener el registro del estudiante
$estudiante = mysqli_fetch_assoc($resultado);

// Consultar si el estudiante ha almorzado hoy
$hoy = date('Y-m-d');
$sql = "SELECT * FROM almuerzo WHERE cedula = '$cedula' AND fecha = '$hoy'";
$resultado = $mysqli->query($sql);

// Verificar si se encontró algún registro
if ($resultado > 0) {
	echo "El estudiante con cédula $cedula almorzó hoy";
	exit();
}

// Guardar el registro del almuerzo del estudiante
$sql = "INSERT INTO almuerzo (cedula, fecha) VALUES ('$cedula', '$hoy')";
$resultado = $mysqli->query($sql);

if ($resultado) {
	echo "El estudiante con cédula $cedula no había almorzado hoy. Se registró el almuerzo correctamente.";
} else {
	echo "Error al registrar el almuerzo: ";
}

 Cerrar la conexión a la base de datos */

?>

<!DOCTYPE html>
<html>
<head>
	<title>Resultado de verificación de estudiante</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<h2>Resultado de verificación de estudiante</h2>
	<p><?php echo $message; ?></p>
</div>

</body>
</html>