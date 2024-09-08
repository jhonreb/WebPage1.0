<?php
$host = "localhost";
$dbuser = "root";
$dbpwd = "";
$dbname = "donaciones";
$charset = "utf8mb4";

// Establece la conexión a la base de datos
$connect = mysqli_connect($host, $dbuser, $dbpwd, $dbname);

// Verifica si la conexión fue exitosa
if (!$connect) {
    die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());
}

// Establece el conjunto de caracteres para la conexión
mysqli_set_charset($connect, $charset);
?>
