<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CTP PITAL</title>

  <!-- Bootstrap 
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>-->

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

 <!-- jQuery y jQuery UI local -->
 <script src="js/jquery-3.6.4.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>

 <!-- SweetAlert2 CSS y JS local -->
 <link rel="stylesheet" href="css/sweetalert2.min.css">
  <script src="css/sweetalert2.all.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="images/restaurantlogo.png" alt="Logo" width="80px" height="80px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Reportes
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="listaBecados.php">Lista estudiantes</a></li>
              <li><a class="dropdown-item" href="#">Estudiantes por día</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="ConsultaRango.php">Rango</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <p></p>
    <div class="panel panel-default">
      <div class="panel-body">
      </div>
    </div>
  </div>

</body>
</html>
