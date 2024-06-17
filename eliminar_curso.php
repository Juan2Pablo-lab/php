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
        <h2>Curso Eliminado</h2>
        <?php
        if(!isset($_GET["id_curso"])) exit();
        $id_curso = $_GET["id_curso"];
        include_once "conexion.php";
        $sentencia = $bd->prepare("DELETE FROM curso WHERE id_curso=?;");
        $resultado = $sentencia->execute([$id_curso]);
        if($resultado===TRUE) echo "Eliminado correctamente.";
        else echo "Error al eliminar datos.";
        ?><br><br>
        <button onclick="location.href='https://localhost/bd6/listar_cursos.php'">Ir a Buscar</button>
        <button onclick="location.href='https://localhost/bd6/registro_curso.php'">Ir a Registrar</button>
    </div>
</body>
</html>