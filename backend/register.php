<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Definir las credenciales de usuario obtenidas de una base de datos
    $usuarios = array(
        "usuario1" => "contraseña1",
        "usuario2" => "contraseña2"
    );

    // Obtener el nombre de usuario y la contraseña enviados por el formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validar credenciales del usuario
    if (isset($usuarios[$username]) && $usuarios[$username] == $password) {
        // Iniciar sesión y redirigir al usuario a una página de bienvenida
        session_start();
        $_SESSION["username"] = $username;
        header("Location: bienvenida.php");
        exit();
    } else {
        // Si no son válidas, mostrar un mensaje de error
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

