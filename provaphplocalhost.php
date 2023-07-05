<html>
<body>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testphp";

    $conn = new mysqli ($servername, $username, $password, $dbname);


$query = "SELECT * from alumnes";
$stmt = $conn ->prepare ($query);
$stmt ->execute();
$res = $stmt->get_result();
$data = $res->fetch_all(MYSQLI_ASSOC);


?>
<pre>
<?php
print_r($data);
?>
</pre>
</body>
</html>