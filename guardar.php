<?php
    if(!isset($_POST["apellido"]) && !isset($_POST["nombre"]) && !isset($_POST["dni"]) && !isset($_POST["especialidad"]) && isset($_POST["id_profesor"])) exit();
    include_once "conexion.php";
    $id_profesor = $_POST["id_profesor"];
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $dni = $_POST["dni"];
    $especialidad = $_POST["especialidad"];
    $sentencia = $bd->prepare("UPDATE profesor SET apellido=?,nombre=?,dni=?,especialidad=? WHERE id_profesor=?;");
    $resultado = $sentencia->execute([$apellido,$nombre,$dni,$especialidad,$id_profesor]);
    if($resultado===FALSE){
        echo "Error al modificar datos";
        exit();
    }
?>
<?php
    header("refresh: 2;url=https://localhost/bd6/listar.php");
    echo "Datos Guardados, Espere unos momentos...";
?>