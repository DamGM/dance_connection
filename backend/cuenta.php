<?php

require_once 'database.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $dance_style = $_POST['dance_style'];
    $user_type = $_POST['user_type'];

    // validar input
    if (empty($username) || empty($email) || empty($password) || empty($city) || empty($dance_style) || empty($user_type)) {
        $error = 'Please fill in all required fields.';
    } else {
        // Comprobar si el usuario ya existe
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->rowCount();
        if ($result > 0) {
            $error = 'Este susario ya existe.';
        } else {
            // Comprobar si el email ya existe
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->rowCount();
            if ($result > 0) {
                $error = 'Email ya está registrado.';
            } else {
                //  password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insertar usuario en la base de datos 
                $query = "INSERT INTO users (username, email, password, city, dance_style, user_type) VALUES (:username, :email, :password, :city, :dance_style, :user_type)";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->bindParam(':city', $city);
                $stmt->bindParam(':dance_style', $dance_style);
                $stmt->bindParam(':user_type', $user_type);
                $stmt->execute();

                // enviar a login pag
                header("Location:login.html");
                exit();
            }
        }
    }
}

// Cerrar conexión con la base de datos
$conn = null;

?>


<?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    