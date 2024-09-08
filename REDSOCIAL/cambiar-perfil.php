<?php
// Establece la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donaciones";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica si la conexión fue exitosa
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Inicia la sesión
session_start();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['usuario'])) {
    // El usuario ha iniciado sesión
    $usuario_autenticado = true;
} else {
    // El usuario no ha iniciado sesión
    $usuario_autenticado = false;
}


// Obtiene el nombre del archivo subido
$nombreArchivo = $_FILES['archivo']['name'];


// Obtiene el ID del usuario a actualizar
$idUsuario = $_SESSION['id']; // Reemplaza con el ID del usuario que deseas actualizar

// Actualiza la información en la base de datos
$sql = "UPDATE usuarios SET avatar = './images/$nombreArchivo' WHERE id = '$idUsuario'";

if (mysqli_query($conn, $sql)) {
    // Si la consulta se ejecuta correctamente, guarda el archivo en el servidor
    $directorioDestino = "./images/"; // Ruta donde se guardará el archivo
    move_uploaded_file($_FILES['archivo']['tmp_name'], $directorioDestino . $nombreArchivo);

    // Elimina la imagen anterior si existe
    $rutaAnterior = "images/default.png"; // Ruta actual del avatar del usuario
    if (file_exists($rutaAnterior)) {
        unlink($rutaAnterior);
    }

    echo "La información se actualizó correctamente.";
    echo "<script>
      window.location.href = 'index.php';
    </script>";
} else {
    echo "Error al actualizar la información: " . mysqli_error($conn);
}

?>
