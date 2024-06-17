<?php
    if(!isset($_POST["nombre"]) && !isset($_POST["creditos"]) && !isset($_POST["horas"]) && !isset($_POST["requisitos"]) && isset($_POST["id_curso"])) exit();
    include_once "conexion.php";
    $id_curso = $_POST["id_curso"];
    $nombre = $_POST["nombre"];
    $creditos = $_POST["creditos"];
    $horas = $_POST["horas"];
    $requisitos = $_POST["requisitos"];
    $id_profesor = $_POST["id_profesor"];
    if($id_profesor===""){
        $sentencia = $bd->prepare("UPDATE curso SET nombre=?,creditos=?,horas=?,requisitos=?,id_profesor=NULL WHERE id_curso=?;");
        $resultado = $sentencia->execute([$nombre,$creditos,$horas,$requisitos,$id_curso]);
    }else{
        $sentencia = $bd->prepare("UPDATE curso SET nombre=?,creditos=?,horas=?,requisitos=?,id_profesor=? WHERE id_curso=?;");
        $resultado = $sentencia->execute([$nombre,$creditos,$horas,$requisitos,$id_profesor,$id_curso]);
    }
    
    if($resultado===FALSE){
        echo "Error al modificar datos";
        exit();
    }
?>
<?php
    header("refresh: 2;url=https://localhost/bd6/listar_cursos.php");
    echo "Datos Guardados, Espere unos momentos...";
?>