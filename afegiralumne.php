<!DOCTYPE html>
<html>
<head>
<style>

  .white-text {
  color: white;
}

</style>

  <link rel="stylesheet" type="text/css" href="estilos.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Mostrar el contenido de alumnos al cargar la página
      $("#alumnos-content").show();
    });
  </script>
</head>
<body>
  <header class="header">
    <h1>SPIN</h1>
  </header>

  <nav>
    <ul class="menu">
      <li><a id="menu-alumnos" href="#">Alumnos</a></li>
      <li><a href="#">Test</a></li>
    </ul>
  </nav>

  <div id="alumnos-content" style="display: none;">
    <?php
      // Datos de conexión a la base de datos
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "testphp";

      // Obtener los datos del formulario
      $nombre = $_POST["nombre"];
      $apellidos = $_POST["apellidos"];
      $telefono = $_POST["telefono"];

      // Crear conexión
      $conn = new mysqli($servername, $username, $password, $database);

      // Comprobar si la conexión fue exitosa
      if ($conn->connect_error) {
          die("Error de conexión: " . $conn->connect_error);
      }

      // Insertar el nuevo alumno en la base de datos
      $sql = "INSERT INTO alumnes (nom, cognoms, telefon) VALUES ('$nombre', '$apellidos', '$telefono')";
      if ($conn->query($sql) === TRUE) {
          echo "<p style='color: white; font-size: 20px;'>Alumno agregado correctamente</p>";
          echo "<br><br>";
          echo "<a href='aplicativo.php' class='btn btn-primary white-text'>Volver al menú principal</a>";
        } else {
          echo "Error al agregar el alumno: " . $conn->error;
      }

      // Cerrar conexión
      $conn->close();
    ?>

    <form action="afegiralumne.php" method="POST">
      <h3>Añadir nuevo alumno</h3>
      <input type="text" name="nombre" placeholder="Nombre" required>
      <input type="text" name="apellidos" placeholder="Apellidos" required>
      <input type="number" name="telefono" placeholder="Teléfono" required>
      <button type="submit" name="agregar">Agregar</button>
    </form>
  </div>
</body>
</html>
