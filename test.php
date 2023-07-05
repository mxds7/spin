<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
</head>
<body>
    <h1>Avalua els teus coneixements</h1>
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

    // Verificar si la tabla "preguntes1" ya existe
    $sql = "SHOW TABLES LIKE 'preguntes1'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // La tabla no existe, crearla
        $sql = "CREATE TABLE preguntes1 (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            pregunta VARCHAR(255) NOT NULL,
            tema VARCHAR(50) NOT NULL,
            vertader_fals VARCHAR(5) NOT NULL
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Taula 'preguntes1' creada amb èxit.<br>";
        } else {
            echo "Error en crear la taula: " . $conn->error;
        }
    }

    // Preguntas y respuestas
    $preguntes1 = array(
        array("JavaScript és un llenguatge de programació?", "JavaScript", "vertader"),
        array("PHP és un llenguatge de marcatge?", "PHP", "fals"),
        array("HTML és un llenguatge d'estil?", "HTML", "fals"),
        array("JavaScript permet afegir interactivitat a les pàgines web?", "JavaScript", "vertader"),
        array("PHP és un llenguatge interpretat?", "PHP", "vertader"),
        array("HTML és un llenguatge de marcatge estructural?", "HTML", "vertader"),
        array("JavaScript és compatible amb tots els navegadors web moderns?", "JavaScript", "vertader"),
        array("PHP és un acrònim de Personal Home Page?", "PHP", "vertader"),
        array("HTML és un estàndard de la World Wide Web Consortium?", "HTML", "vertader"),
        array("JavaScript permet manipular i modificar els elements HTML d'una pàgina web?", "JavaScript", "vertader"),
        array("PHP s'utilitza principalment per desenvolupar aplicacions de servidor?", "PHP", "vertader"),
        array("HTML permet definir l'estructura i el contingut d'una pàgina web?", "HTML", "vertader"),
        array("JavaScript pot ser utilitzat tant en el costat del client com en el costat del servidor?", "JavaScript", "vertader"),
        array("PHP pot ser integrat amb diversos sistemes de gestió de bases de dades?", "PHP", "vertader"),
        array("HTML és un llenguatge de programació?", "HTML", "fals")
    );

    // Insertar preguntas y respuestas en la tabla
    foreach ($preguntes1 as $pregunta) {
        $pregunta_texto = $pregunta[0];
        $tema = $pregunta[1];
        $vertader_fals = $pregunta[2];

        // Escapar las comillas simples en la pregunta
        $pregunta_texto = $conn->real_escape_string($pregunta_texto);

        $sql = "INSERT INTO preguntes1 (pregunta, tema, vertader_fals)
            VALUES ('$pregunta_texto', '$tema', '$vertader_fals')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error en inserir la pregunta: " . $conn->error;
        }
    }

    echo "Preguntes inserides amb èxit.";

    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>


