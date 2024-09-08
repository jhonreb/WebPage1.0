<?php
session_start();
include "includes/config.php";
include "includes/funciones.php";

if(isset($_SESSION['usuario'])) {
	header("Location: index.php");
}

ini_set('error_reporting',0);
?>




<style>
	html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
#form1{
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  max-width: 100%;

}
#form2{
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  max-width: 100%;

}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Sistema de Donaciones</title>
</head>
<body>
  <!-- form 1 login -->
<form id="form1" name="form1" method="post" action="" >
   <div class="box">
    <div class="container">
        <div class="top">
            <header>Ingresar</header>
        </div>
        <div class="input-field">
            <input type="text" class="input" name="usuario" placeholder="Username" id="">
            <i class='bx bx-user' ></i>
        </div>
        <div class="input-field">
            <input type="Password" class="input" name="contrasena" placeholder="Password" id="">
            <i class='bx bx-lock-alt'></i>
        </div>
        <div class="input-field">
            <input type="submit" class="submit" name="guardar"  value="Entrar" id="" onclick="return validarForm();">
        </div>
        <div class="input-field">
            <input type="submit" class="submit" name=""  value="Registrarse" id="registrarse">
        </div>
        <div class="two-col">
            <div class="one">
               
            </div>
            <div class="two">
                <label><a href="#">Forgot password?</a></label>
            </div>
        </div>
    </div>
</div>  
</form>
<!-- form 2 registro -->
<form id="form2" name="form2" method="post" action="login.php" style="display: none;">
   <div class="box">
    <div class="container">
        <div class="top">
            <header>Registrarse</header>
        </div>
        <div class="input-field">
            <input type="text" class="input" name="usuario" placeholder="Username" id="">
            <i class='bx bx-user' ></i>
        </div>
        <div class="input-field">
            <input type="Password" class="input" name="contrasena" placeholder="Password" id="">
            <i class='bx bx-lock-alt'></i>
        </div>
        <div class="input-field">
            <input type="submit" class="submit" name=""  value="Registrarse" id="registrarse" onclick="return validarForm2();">
        </div>
        <div class="two-col">
            <div class="one">
               
            </div>
            <div class="two">
                <label><a href="#">Forgot password?</a></label>
            </div>
        </div>
    </div>
</div>  
</form>
</body>
<script src="./js/index.js"></script>
</html>


<!--  -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $usuario = $_POST["usuario"];
    $contrasena = md5($_POST["contrasena"]); // Aplicar MD5 a la contraseña
    $avatar = "./images/avatar.jpg"; // Ruta del archivo de avatar predeterminado
    $fecha_reg = date("Y-m-d"); // Obtener la fecha actual

    // Consulta para insertar los datos en la tabla usuarios
    $sql = "INSERT INTO usuarios (usuario, contrasena, avatar, fecha_reg) VALUES ('$usuario', '$contrasena', '$avatar', '$fecha_reg')";

    // Ejecutar la consulta
    if (mysqli_query($connect, $sql)) {
      echo '<script>
      Swal.fire({
          icon: "success",
          title: "¡Registro exitoso!",
          text: "El registro se ha realizado correctamente.",
          confirmButtonText: "OK"
      });
  </script>';
    } else {
        echo "Error al registrar: " . mysqli_error($connect);
    }
}
?>

<?php
if(isset($_POST['guardar'])) {

	$usuario = clean($_POST['usuario']);
	$contrasena = md5($_POST['contrasena']);
	
	$query = mysqli_prepare($connect, "SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
    mysqli_stmt_bind_param($query, 'ss', $usuario, $contrasena);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
	
	$contar = mysqli_num_rows($result);
	
	if ($contar != 0) {
    
		while($row=mysqli_fetch_array($result)) {
		
			if($usuario == $row['usuario'] && $contrasena == $row['contrasena']) 
{
  echo "<script>
Swal.fire({
  title: '¡Usuario validado!',
  text: 'Bienvenido ' + '$usuario',
  icon: 'success',
  showConfirmButton: false,
  timer: 1500
}).then(() => {
  window.location.href = 'index.php';
});
</script>";
  $_SESSION['usuario'] = $usuario;
  $_SESSION['id'] = $row['id'];
  $_SESSION['rango'] = $row['rango'];
  
  
}
			
		} 
		
	} else { 
    echo "<script>
    Swal.fire({
      title: 'Error!',
      text: 'Usuario No existe',
      icon: 'error',
      confirmButtonText: 'OK'
    });
  </script>";
  }
	
}
?>
