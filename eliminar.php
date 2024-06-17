<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        div {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div>
        <h2>Profesor Eliminado</h2>
        <?php
        if(!isset($_GET["id_profesor"])) exit();
        $id_profesor = $_GET["id_profesor"];
        include_once "conexion.php";

        $sentencia2 = $bd->query("SELECT * FROM curso WHERE id_profesor=$id_profesor");
        $cursos = $sentencia2->fetchAll(PDO::FETCH_OBJ);
        $sentencia4 = $bd->prepare("SELECT * FROM profesor WHERE id_profesor=?");
        $sentencia4->execute([$id_profesor]);
        $profesor = $sentencia4->fetch(PDO::FETCH_OBJ);

        foreach($cursos as $curso){
            if($curso->id_profesor === $profesor->id_profesor){
                $sentencia3 = $bd->prepare("UPDATE curso SET id_profesor=NULL WHERE id_profesor=?");
                $resultado1 = $sentencia3->execute([$id_profesor]);
            }
        }
        $sentencia = $bd->prepare("DELETE FROM profesor WHERE id_profesor=?;");
        $resultado = $sentencia->execute([$id_profesor]);
        if($resultado===TRUE) echo "Eliminado correctamente.";
        else echo "Error al eliminar datos.";
        
        ?><br><br>
        <button onclick="location.href='https://localhost/bd6/listar.php'">Ir a Buscar</button>
        <button onclick="location.href='https://localhost/bd6/index.html'">Ir a Registrar</button>
    </div>
</body>
</html>