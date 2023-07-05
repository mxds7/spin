<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .table-dark {
      background-color: #343a40;
      color: #fff;
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

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $respuestas = $_POST;
      $puntuacion = 0;

      // Comprobar cada respuesta
      if (isset($respuestas['respuesta1']) && $respuestas['respuesta1'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta2']) && $respuestas['respuesta2'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta3']) && $respuestas['respuesta3'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta4']) && $respuestas['respuesta4'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta5']) && $respuestas['respuesta5'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta6']) && $respuestas['respuesta6'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta7']) && $respuestas['respuesta7'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta8']) && $respuestas['respuesta8'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta9']) && $respuestas['respuesta9'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta10']) && $respuestas['respuesta10'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta11']) && $respuestas['respuesta11'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta12']) && $respuestas['respuesta12'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta13']) && $respuestas['respuesta13'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta14']) && $respuestas['respuesta14'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta15']) && $respuestas['respuesta15'] === 'verdadero') {
        $puntuacion++;
      }
      if (isset($respuestas['respuesta16']) && $respuestas['respuesta16'] === 'verdadero') {
        $puntuacion++;
      }

      echo "<h3>Tu puntuación: $puntuacion / 16</h3>";
    }
    ?>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // Mostrar u ocultar el contenido de alumnos al hacer clic en el enlace del menú
      $("#menu-alumnos").click(function() {
        $("#alumnos-content").slideToggle();
      });
    });
  </script>

</body>
</html>
