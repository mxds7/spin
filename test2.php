<!DOCTYPE html>
<html>
<head>
  <title>Ponte a prueba</title>
  <style>
    body {
        background-image: url("https://i.pinimg.com/564x/9c/15/0d/9c150d9d9628dc37fd77917ae4550204.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    h1 {
        color: black;
        text-align: center;
        background-color: rgba(255, 255, 255, 0.7); /* Fondo semitransparente */
        padding: 20px;
        border-radius: 5px;
    }
    form {
      margin: 0 auto; /* Para centrar el formulario */
      text-align: left;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }
    h3 {
      color: #007bff;
    }
    p {
      margin-bottom: 10px;
    }
    input[type="radio"] {
      margin-right: 5px;
    }
    button[type="submit"] {
      margin-top: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    button[type="submit"]:hover {
      background-color: #0056b3;
    }
    button[name="volver"] {
      margin-top: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    button[name="volver"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <h1>Ponte a prueba</h1>

  <form action="respuestas.php" method="POST">
    <?php
    // Establecer conexión con la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "testphp";

    $conn = new mysqli($servername, $username, $password, $database);

    // Comprobar conexión
    if ($conn->connect_error) {
        die("Connexió fallida: " . $conn->connect_error);
    }

    // Obtener las preguntas del test "preguntes1"
    $sql = "SELECT * FROM preguntes1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $questionNumber = 1;
        while ($row = $result->fetch_assoc()) {
            $pregunta = $row["pregunta"];
            $tema = $row["tema"];

            echo "<h3>Pregunta $questionNumber</h3>";
            echo "<p>$pregunta</p>";
            echo "<input type='hidden' name='tema$questionNumber' value='$tema'>";
            echo "<label><input type='radio' name='respuesta$questionNumber' value='verdadero'> Verdadero</label>";
            echo "<label><input type='radio' name='respuesta$questionNumber' value='falso'> Falso</label>";

            $questionNumber++;
        }
    } else {
        echo "No se encontraron preguntas en la base de datos.";
    }

    // Cerrar conexión
    $conn->close();
    ?>

    <br><br>
    <button type="submit">Enviar respuestas</button>
  </form>

  <form action="aplicativo.php" method="GET">
    <button type="submit" name="volver">Volver</button>
  </form>
</body>
</html>
