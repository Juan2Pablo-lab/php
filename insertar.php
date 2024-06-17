<?php
    if(!isset($_POST["apellido"]) && !isset($_POST["nombre"]) && !isset($_POST["dni"]) && !isset($_POST["especialidad"])) exit();
    include_once "conexion.php";
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $dni = $_POST["dni"];
    $especialidad = $_POST["especialidad"];

    $sentencia = $bd->prepare("INSERT INTO profesor(apellido, nombre, dni, especialidad) VALUES(?,?,?,?)");
    $resultado = $sentencia->execute([$apellido, $nombre, $dni, $especialidad]);
    if($resultado===TRUE) echo "Ejecutado correctamente.";
    else echo "Error al insertae datos.";
?>
<?php
    header("refresh: 2;url=https://localhost/bd6/listar.php");
    echo "<br>";
    echo "Espere unos segundos...";
?>