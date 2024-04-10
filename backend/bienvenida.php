<?php
session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}

// Mostrar la página de bienvenida
echo "¡Bienvenido, " . $_SESSION["username"] . "! Has iniciado sesión correctamente.";
?>
