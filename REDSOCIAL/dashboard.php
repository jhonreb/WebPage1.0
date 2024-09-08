<?php
session_start();
include "includes/config.php";
include "includes/funciones.php";

if(!isset($_SESSION['usuario'])) {
	header("Location: login.php");
}

ini_set('error_reporting',0);

?>

    <?php
    // Establecer la conexión con la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "donaciones";

    $conexion = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Realizar la consulta para obtener la cantidad de usuarios
    $query = "SELECT COUNT(*) as total FROM usuarios";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
    $totalUsuarios = $row['total'];


    // Realizar la consulta para obtener la cantidad de comentarios
$queryComentarios = "SELECT COUNT(*) as totalComentarios FROM comentarios";
$resultComentarios = mysqli_query($conexion, $queryComentarios);
$rowComentarios = mysqli_fetch_assoc($resultComentarios);
$totalComentarios = $rowComentarios['totalComentarios'];



    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Enlaces a los archivos CSS de Bootstrap, FontAwesome y Chart.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Sistema de Comentarios</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" type="text/css" href="header.css">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- sweet alert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.css" integrity="sha512-g3zSBZIwNp5i5Ny5NjK8XV7B/RiLyitU6QDbslWxhUKCOSl0j+zi2Qtp/a13F9q0d4AHoYjrvlCofNxJzgXTw==" crossorigin="anonymous" />
  <!-- Box icon -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
">
</head>
<body>   
<div class="d-flex justify-content-center">
    <div class="container" style="position: relative; top: 70px; right: -300px;">
        <h1>Dashboard de Usuarios</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cantidad de Usuarios</h5>
                        <p class="card-text">
                            <span class="icon"><i class="fas fa-users"></i></span>
                            <span class="user-count"><?php echo $totalUsuarios; ?></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cantidad de Comentarios</h5>
                        <p class="card-text">
                            <span class="icon"><i class="fas fa-comments"></i></span>
                            <span class="comment-count"><?php echo $totalComentarios; ?></span>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <canvas id="userChart"></canvas>
            </div>
        </div>
    </div>
</div>


<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container">
      <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
          <img src="logo.png" alt="" >
          <span class="d-none d-lg-block">Sistema de<br>Donaciones</span>
        </a>
           
      </div>
      <span class="toggle-sidebar-btn">
        <i class='bx bx-menu'></i>
      </span>


      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle" href="#">
              <i class="bi bi-search"></i>
            </a>
          </li>

        
          <?php
   
   // Consulta para obtener la ruta del avatar del usuario
   $consulta = "SELECT avatar FROM usuarios WHERE usuario = '".$_SESSION['usuario']."'";

   $resultado = mysqli_query($connect, $consulta);

   if (mysqli_num_rows($resultado) > 0) {
     $fila = mysqli_fetch_assoc($resultado);
     $ruta_avatar = $fila['avatar'];
   }
 ?>

          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="<?php echo $ruta_avatar; ?>" alt="Profile" class="rounded-circle" >
              <span class="d-none d-md-block"></span><?php echo $_SESSION['usuario']; ?>
            </a>

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?php echo $_SESSION['usuario']; ?></h6>
                <span>Web Designer</span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bi bi-gear"></i>
                  <span>Account Settings</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
     
        
 
  </header>

  <aside id="sidebar" class="sidebar"> 

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
   <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="index.php">
     <i class="bi bi-grid"></i>
     <span>Inicio</span>
   </a>
 </li> 

 <li class="nav-item">
   <a class="nav-link " href="dashboard.php">
     <i class="bi bi-grid"></i>
     <span>Dashboard</span>
   </a>
 </li> 





 <li class="nav-heading">Pages</li>


 <li class="nav-item">
   <a class="nav-link collapsed" href="mailto:luisc0230@hotmail.com">
     <i class="bi bi-envelope"></i>
     <span>Contactarnos</span>
   </a>
 </li>
 

 <li class="nav-item">
   <a class="nav-link collapsed" href="logout.php">
     <i class="bi bi-box-arrow-in-right"></i>
     <span>Ingreso</span>
   </a>
 </li> 


</ul> 

</aside>
  


<script>
   // Obtener el contexto del lienzo de la gráfica
   var ctx = document.getElementById('userChart').getContext('2d');

// Crear la gráfica de barras
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Usuarios', 'Comentarios'],
        datasets: [{
            label: 'Cantidad',
            data: [<?php echo $totalUsuarios; ?>, <?php echo $totalComentarios; ?>],
            backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                stepSize: 1
            }
        }
    }
});
</script>
<!-- Vendor JS Files -->
  <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="./assets/js/main.js"></script>
  <script src = "./js/index.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.min.js" integrity="sha512-dq3kF/4nDh/jiAafJf7dZJiklZmzJGpsHSAdphnC9OFnADk1EwiYbYgqb+sTsv8uJWFn1v2Og6fyD0xt7tyX9A==" crossorigin="anonymous"></script>
  <script src="./assets/js/barra.js"></script>

</body>
</html>
