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


// Función para actualizar y guardar la cantidad de "apoyados" en la base de datos
function actualizarApoyados($idUsuario, $cantidadApoyados, $conexion) {
  $query = "UPDATE apoyo SET apoyados = $cantidadApoyados WHERE id = $idUsuario";
  mysqli_query($conexion, $query);
}

// Actualizar la cantidad de "apoyados" cuando se hace clic en el botón de apoyar
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'apoyar') {
  $idUsuario = $_GET['id'];
  $query = "SELECT apoyados FROM apoyo WHERE id = $idUsuario";
  $result = mysqli_query($conexion, $query);
  $row = mysqli_fetch_assoc($result);
  $cantidadApoyados = $row['apoyados'] + 1;
  actualizarApoyados($idUsuario, $cantidadApoyados, $conexion);
}


?>

<!-- $apoyado = $_POST['myCheckbox']; -->
<!doctype html>
<html lang="es-ES">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Sistema de Donaciones</title>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
">
</head>
<style>
  a , i , span{
    text-decoration: none;
  }
</style>
<body>

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
              <span class="d-none d-md-block dropdown-toggle ps-2"></span><?php echo $_SESSION['usuario']; ?>
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
     
        
 
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar"> 

     <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item">
   <a class="nav-link " href="">
     <i class="bi bi-grid"></i>
     <span>Inicio</span>
   </a>
 </li> 
      
     <li class="nav-item">
   <a class="nav-link collapsed" href="dashboard.php">
     <i class="bi bi-grid"></i>
     <span>Dashboard</span>
   </a>
 </li> 

      

      


  <li class="nav-item"> 
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Logro</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span id = "counter">Apoyados : 0</span>
            </a>
          </li>
         
        </ul>
      </li> 



      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="bi bi-person"></i>
          <span>Perfil</span>
        </a>
      </li>

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
  <!-- end sliderbar -->

  <main id="main" class="main">

    <section class="section dashboard">
      
      <!-- aca -->
      <h1 class = "text-center">SISTEMA DE DONACIONES</h1>



<form name="form1" method="post" action="">
 <label for="textarea"></label>
 <center>
   <p>
     <textarea name="comentario" cols="80" rows="5" id="textarea"><?php if(isset($_GET['user'])) { ?><?php } ?> </textarea>
   </p>
   <p>
     <input type="submit" class="btn btn-primary" <?php if (isset($_GET['id'])) { ?>name="reply"<?php } else { ?>name="comentar"<?php } ?>value="Comentar">
   </p>
 </center>
</form>

<?php
   if(isset($_POST['comentar'])) {
       $query = mysqli_query($connect,"INSERT  INTO comentarios (comentario,usuario,fecha) value ('".$_POST['comentario']."','".$_SESSION['id']."',NOW())");	
       if($query) { header("Location: index.php"); }
   }
?>

<?php
   if(isset($_POST['reply'])) {
       $query = mysqli_query($connect,"INSERT INTO comentarios (comentario,usuario,fecha,reply) value ('".$_POST['comentario']."','".$_SESSION['id']."',NOW(),'".$_GET['id']."')");	
       if($query) { header("Location: index.php"); }
   }
?>

<br>

   <div id="container">
       <ul id="comments">
       
       <?php
       
       $comentarios = mysqli_query($connect,"SELECT * FROM comentarios WHERE reply = 0 ORDER BY id DESC");
       while($row=mysqli_fetch_array($comentarios)) {
           
           $usuario = mysqli_query($connect,"SELECT * FROM usuarios WHERE id = '".$row['usuario']."'");
           $user = mysqli_fetch_array($usuario);

       ?>
       
       <li class="cmmnt">
            	<div class="avatar">
                <img src="<?php echo $user['avatar']; ?>" height="55" width="55">
                </div>
                <div class="cmmnt-content">
                	<header>
                    <a href="#" class="userlink"><?php echo $user['usuario']; ?></a> - <span class="pubdate"><?php echo $row['fecha']; ?></span>
                    </header>
                    <p>
                    <?php echo $row['comentario']; ?>
                    </p>
                    <span>
                    <a href="index.php?user=<?php echo $user['usuario']; ?>&id=<?php echo $row['id']; ?>">
                    Responder
                    </a>
                    <input type="checkbox" name="myCheckbox" value="1" onclick="updateCounter()">APOYADO  
                    </span>
                    <script>
          var counter = 0;
var previousValue = false;

function updateCounter() {
  var checkboxes = document.getElementsByName('myCheckbox');
  var counter = 0;

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      counter++;
    }
  }

  document.getElementById('counter').innerHTML = 'Apoyados: ' + counter;
  if (counter === 4) {
    // Mostrar el pop-up
    alert("Has alcanzado el límite de apoyo.");
  } 
}

        </script>
               </div>
               
               <?php
               $contar = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM comentarios WHERE reply = '".$row['id']."'"));
               if($contar != '0') {
                   
                   $reply = mysqli_query($connect,"SELECT * FROM comentarios WHERE reply = '".$row['id']."' ORDER BY id DESC");
                   while($rep=mysqli_fetch_array($reply)) {
                       
                   $usuario2 = mysqli_query($connect,"SELECT * FROM usuarios WHERE id = '".$rep['usuario']."'");
                   $user2 = mysqli_fetch_array($usuario2);
               ?>
               
               <ul class="replies">
                   <li class="cmmnt">
                       <div class="avatar">
               <img src="<?php echo $user2['avatar']; ?>" height="55" width="55">
               </div>
                   <div class="cmmnt-content">
                       <header>
                       <a href="#" class="userlink"><?php echo $user2['usuario']; ?></a> - <span class="pubdate"><?php echo $rep['fecha']; ?></span>
                       </header>
                       <p>
                       <?php echo $rep['comentario']; ?>
                       </p>
                   </div>
                   
                   </li>
               </ul>
               
               <?php } } } ?>
               
               
           </li>        
       
       </ul>
   </div>
</div>

    </section>

  </main><!-- End #main -->

  <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2" id="staticBackdropLabel">Cambio de Perfil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="text-center mb-2">

      <img src="<?php echo $ruta_avatar; ?>"  alt="Profile" class="mx-auto w-50 img-fluid d-block rounded-circle" id="avatar" >
      
      </div>
      <div class="text-center mb-4">
      <li class = "mb-4" id="cambiar_perfil">CAMBIAR FOTO DE PERFIL</li>
      <input type="file" id="archivo" name = "archivo" class = "mb-2" accept="image/jpeg, image/png, image/jpg" onchange="mostrarImagen()"/>

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="guardarCambios()">Confirmar</button>
      </div>
    </div>
  </div>
</div> 
<script> 
formData.append('avatar', archivo.files[0]);

// Obtener la imagen cargada
var imagen = document.getElementById('avatar');

// Establecer la altura y el ancho de la imagen a 100px
imagen.style.height = '150px';
imagen.style.width = '150px'; 

function mostrarImagen() {
  var archivo = document.getElementById("archivo").files[0];
  var reader = new FileReader();

  reader.onload = function(e) {
    document.getElementById("avatar").setAttribute('src', e.target.result);
  }

  reader.readAsDataURL(archivo);
}

function guardarCambios() {
  var archivo = document.getElementById("archivo").files[0];
  var reader = new FileReader();

  reader.onload = function(e) {
    var formData = new FormData();
    formData.append('archivo', archivo);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'cambiar-perfil.php', true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        console.log('Imagen actualizada');

        Swal.fire({
      title: 'Cambio Realizado!',
      text: '',
      icon: 'success',
      confirmButtonText: 'OK'
    });
    setTimeout(function() {
  window.location.href = "index.php";
}, 2000); 
      } else {
        console.log('Error al actualizar la imagen');
      }
    };
    xhr.send(formData);
  }

  reader.readAsDataURL(archivo);
}

</script>
<style> 

#cambiar_perfil{
  font-family: 'Patua One', sans-serif;
  list-style-type: none ;
}

</style>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Sistema de Donaciones</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  

  <!-- Template Main JS File -->
  <script src="./assets/js/main.js"></script>
  <script src = "./js/index.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.min.js" integrity="sha512-dq3kF/4nDh/jiAafJf7dZJiklZmzJGpsHSAdphnC9OFnADk1EwiYbYgqb+sTsv8uJWFn1v2Og6fyD0xt7tyX9A==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="./assets/js/barra.js"></script>

  
</body>

</html>
