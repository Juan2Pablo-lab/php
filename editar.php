<?php
    if(!isset($_GET["id_profesor"])) exit();
    $id_profesor = $_GET["id_profesor"];
    include_once "conexion.php";
    $sentencia = $bd->prepare("SELECT * FROM profesor WHERE id_profesor=?");
    $sentencia->execute([$id_profesor]);
    $profesor = $sentencia->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        main {
            width: 20%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 12px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"],
        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            margin-right: 10px;
        }

        button {
            background-color: #008CBA;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #45a049;
        }

        input[type="submit"]:active,
        button:active {
            background-color: #3e8e41;
        }

        input[type="submit"]:focus,
        button:focus {
            outline: none;
        }
    </style>
    
</head>
<body>
    <main>
        <div>
            <h2>Editar Profesor</h2>
        </div>
        <div>
            <form action="guardar.php" method="POST">
                <input type="hidden" name="id_profesor" value="<?php echo $profesor->id_profesor ?>">
                <label for="apellido">Apellido: </label><br>
                <input type="text" name="apellido" required value="<?php echo $profesor->apellido ?>"><br>
                <label for="nombre">Nombre: </label><br>
                <input type="text" name="nombre" required value="<?php echo $profesor->nombre ?>"><br>
                <label for="dni">Dni: </label><br>
                <input type="number" name="dni" required value="<?php echo $profesor->dni ?>"><br>
                <label for="especialidad">Especialidad: </label><br>
                <input type="text" name="especialidad" required value="<?php echo $profesor->especialidad ?>"><br>
                <input type="submit" value="Modificar">
                <button onclick="location.href='https://localhost/bd6/listar.php'">Ir a Listar</button>
            </form>
        </div>
    </main>
</body>
</html>