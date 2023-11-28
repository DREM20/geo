<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "login";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
/* $conexion = new mysqli("localhost", "root", "", "login"); */
/* $conexion->set_charset("utf8"); */
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}