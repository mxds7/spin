<!DOCTYPE html>
<html>
<head>
    <title>Listado de Alumnos</title>
    <!-- Agregar enlace a Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .table-dark {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>SPIN</h1>
    </header>

    <nav>
        <ul class="menu">
            <li><a href="llistaalumnes.php">Alumnos</a></li>
            <li><a href="#">Test</a></li>
        </ul>
    </nav>

    <h1>Listado de Alumnos</h1>
    <?php
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "testphp";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Comprobar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta a la base de datos para obtener los alumnos
    $sql = "SELECT * FROM alumnes";
    $result = $conn->query($sql);

    // Mostrar los alumnos en la página web
    if ($result->num_rows > 0) {
        echo "<table class='table table-dark'>";
        echo "<tr><th>Nombre</th><th>Apellidos</th><th>Acciones</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $nombre = $row["nom"];
            $apellido = $row["cognoms"];
            $telefono = $row["telefon"];
            $id = $row["id"];

            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$apellido</td>";
            echo "<td>";
            echo "<a href='veurealumne.php?id=$id' class='btn btn-primary'>Ver alumno</a>";
            echo "<a href='modificardades.php?id=$id' class='btn btn-secondary'>Modificar datos</a>";
            echo "<form action='eliminaralumno.php' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<button type='submit' class='btn btn-danger'>Eliminar alumno</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron alumnos en la base de datos.";
    }

    // Cerrar conexión
    $conn->close();
    ?>

    <h3>Añadir nuevo alumno</h3>
    <form action="agregar_alumno.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

    <!-- Agregar enlace a los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>