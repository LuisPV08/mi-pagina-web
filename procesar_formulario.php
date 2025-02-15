<?php
echo "Iniciando script...<br>";

// Datos de conexión a la base de datos
$host = 'localhost'; // Servidor local
$dbname = 'formulario_contacto'; // Nombre de la base de datos
$user = 'root'; // Usuario por defecto de XAMPP
$password = ''; // Contraseña por defecto de XAMPP (vacía)

// Conectar a la base de datos
try {
    echo "Conectando a la base de datos...<br>";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa.<br>";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Procesando formulario...<br>";
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Insertar datos en la base de datos
    try {
        echo "Insertando datos en la base de datos...<br>";
        $stmt = $conn->prepare("INSERT INTO contactos (nombre, email, mensaje) VALUES (:nombre, :email, :mensaje)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mensaje', $mensaje);
        $stmt->execute();

        echo "Redirigiendo a la página de agradecimiento...<br>";
        header("Location: gracias.html");
        exit(); // Asegúrate de terminar la ejecución del script después de la redirección
    } catch (PDOException $e) {
        echo "Error al enviar el mensaje: " . $e->getMessage();
    }
}
?>