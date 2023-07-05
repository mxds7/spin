<!DOCTYPE html>
<html>
<head>
    <title>Ver Alumno</title>
    <style>
        body {
            background-image: url("https://i.pinimg.com/564x/9c/15/0d/9c150d9d9628dc37fd77917ae4550204.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        .info {
            font-size: 20px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ver Alumno</h1>
        <?php
        // Datos de conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "testphp";

        // Obtener el ID del alumno de la URL
        $id = $_GET["id"];

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $database);

        // Comprobar si la conexión fue exitosa
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta a la base de datos para obtener los datos del alumno
        $sql = "SELECT * FROM alumnes WHERE id = $id";
        $result = $conn->query($sql);

        // Mostrar los datos del alumno en la página web
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre = $row["nom"];
            $apellidos = $row["cognoms"];
            $telefono = $row["telefon"];

            echo "<p class='info'><strong>Nombre:</strong> $nombre</p>";
            echo "<p class='info'><strong>Apellidos:</strong> $apellidos</p>";
            echo "<p class='info'><strong>Teléfono:</strong> $telefono</p>";
        } else {
            echo "No se encontró el alumno en la base de datos.";
        }

        // Cerrar conexión
        $conn->close();
        ?>

        <form action="aplicativo.php">
            <input type="submit" value="Volver">
        </form>
    </div>
</body>
</html>
