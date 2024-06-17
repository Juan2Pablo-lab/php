<?php
    if(!isset($_POST["nombre"]) && !isset($_POST["creditos"]) && !isset($_POST["horas"]) && !isset($_POST["requisitos"]) && !isset($_POST["id_profesor"])) exit();
    include_once "conexion.php";
    $nombre = $_POST["nombre"];
    $creditos = $_POST["creditos"];
    $horas = $_POST["horas"];
    $requisitos = $_POST["requisitos"];
    $id_profesor = $_POST["id_profesor"];
    if($id_profesor===""){
        $sentencia = $bd->prepare("INSERT INTO curso(nombre, creditos, horas, requisitos, id_profesor) VALUES(?,?,?,?,NULL)");
        $resultado = $sentencia->execute([$nombre, $creditos, $horas, $requisitos]);
    }else{
        $sentencia = $bd->prepare("INSERT INTO curso(nombre, creditos, horas, requisitos, id_profesor) VALUES(?,?,?,?,?)");
        $resultado = $sentencia->execute([$nombre, $creditos, $horas, $requisitos, $id_profesor]);
    }
    if($resultado===TRUE) echo "Ejecutado correctamente.";
    else echo "Error al insertar datos.";
?>
<?php
    header("refresh: 2;url=https://localhost/bd6/listar_cursos.php");
    echo "<br>";
    echo "Espere unos segundos...";
?>