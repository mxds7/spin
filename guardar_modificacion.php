<!DOCTYPE html>
<html>
<head>
    <title>Modificar Datos</title>
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
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Modificar Datos</h1>
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

        // Consulta a la base de datos para obtener los datos actuales del alumno
        $sql = "SELECT * FROM alumnes WHERE id = $id";
        $result = $conn->query($sql);

        // Mostrar el formulario para modificar los datos del alumno
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre = $row["nom"];
            $apellidos = $row["cognoms"];
            $telefono = $row["telefon"];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos modificados del formulario
                $nombre_modificado = $_POST["nombre"];
                $apellidos_modificados = $_POST["apellidos"];
                $telefono_modificado = $_POST["telefono"];

                // Consulta SQL para actualizar los datos del alumno
                $sql_update = "UPDATE alumnes SET nom='$nombre_modificado', cognoms='$apellidos_modificados', telefon='$telefono_modificado' WHERE id=$id";

                if ($conn->query($sql_update) === TRUE) {
                    echo "Los datos se han modificado correctamente.<br>";
                    echo "<a href='aplicativo.php' style='color: white;'>Volver al inicio</a>";
                } else {
                    echo "Error al modificar los datos: " . $conn->error;
                }
            } else {
                echo "<form action='guardar_modificacion.php?id=$id' method='POST'>";
                echo "<p><label>Nombre:</label> <input type='text' name='nombre' value='$nombre'></p>";
                echo "<p><label>Apellidos:</label> <input type='text' name='apellidos' value='$apellidos'></p>";
                echo "<p><label>Teléfono:</label> <input type='text' name='telefono' value='$telefono'></p>";
                echo "<p><input type='submit' value='Guardar cambios'></p>";
                echo "</form>";
            }
        } else {
            echo "No se encontraron datos del alumno en la base de datos.";
        }

        // Cerrar conexión
        $conn->close();
        ?>
    </div>
</body>
</html>
