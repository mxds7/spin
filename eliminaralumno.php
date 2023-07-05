<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .message-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .message-box {
      background-color: #f9f9f9;
      border: 1px solid #ccc;
      padding: 20px;
      text-align: center;
      font-size: 20px;
      color: #333;
      position: relative;
    }

    .close-button {
      position: absolute;
      top: 5px;
      right: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <header class="header">
      <h1>SPIN</h1>
    </header>

    <nav>
      <ul class="menu">
        <li><a id="menu-alumnos" href="#">Alumnos</a></li>
        <li><a href="test2.php">Test</a></li>
      </ul>
    </nav>

    <div id="alumnos-content">
      <div class="content-container">
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

        // Verificar si se recibió el ID del alumno a eliminar
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            // Consulta SQL para eliminar el alumno
            $sql = "DELETE FROM alumnes WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='message-overlay'>";
                echo "<div class='message-box'>Alumno eliminado correctamente<button class='close-button' onclick='closeMessage()'>×</button></div>";
                echo "</div>";
            } else {
                echo "Error al eliminar el alumno: " . $conn->error;
            }
        } else {
            echo "No se ha proporcionado un ID de alumno válido.";
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
                echo "<div class='btn-group'>";
                echo "<a href='veurealumne.php?id=$id' class='btn btn-primary'>Ver alumno</a>";
                echo "<a href='modificardades.php?id=$id' class='btn btn-secondary'>Modificar datos</a>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<button type='submit' class='btn btn-danger'>Eliminar alumno</button>";
                echo "</form>";
                echo "</div>";
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
      </div>
    </div>

    <div class="form-container">
      <h3>Añadir nuevo alumno</h3>
      <form action="afegiralumne.php" method="POST">
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
    </div>
  </div>

  <footer class="footer">
    Este aplicativo es propiedad de Max Diaz y fue creado en el año 2023.
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // Mostrar el contenido de alumnos al hacer clic en el enlace del menú
      $("#menu-alumnos").click(function() {
        $("#alumnos-content").slideToggle();
      });
    });

    function closeMessage() {
      $(".message-overlay").remove();
    }
  </script>
</body>
</html>

