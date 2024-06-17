<?php
    $password = "";
    $user = "root";

    try{
        $bd = new PDO("mysql:host=localhost;dbname=universidad", $user, $password);
    } catch(PDOException $e) {
        echo "Error al intentar la conexion->". $e->getMessage();
    }
?>