<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"] ?? '';
    $apellidos = $_POST["apellidos"] ?? '';
    $edad = $_POST["edad"] ?? '';
    $email = $_POST["email"] ?? '';
    $contraseña = $_POST["contraseña"] ?? '';

    // Validar que los datos no estén vacíos
    if (empty($nombre) || empty($apellidos) || empty($edad) || empty($email) || empty($contraseña)) {
        die("Error: Todos los campos son obligatorios.");
    }

    $db_host = "localhost";
    $db_nombre = "ProyectoTienda";
    $db_usuario = "root";
    $db_pssw = "";

    // Conectar a la base de datos
    $conexion = new mysqli($db_host, $db_usuario, $db_pssw, $db_nombre);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Asegurar que la consulta es segura usando prepared statements
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, edad, email, contraseña) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("ssiss", $nombre, $apellidos, $edad, $email, $contraseña);

    if ($stmt->execute()) {
        echo "Usuario guardado correctamente";
    } else {
        echo "Error al guardar usuario: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Método no permitido";
}
?>
