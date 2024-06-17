<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        main {
            width: 50%;
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
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="serch"] {
            width: 100%;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .button-container {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <main>
        <div>
            <h2>Buscar Profesores</h2>
            <form action="" method="GET">
                <label for="serch">Buscar: </label><br>
                <input type="serch" name="serch" id="serch"><br><br>
                <input type="submit" value="Buscar">
                <input type="submit" value="Ver profesores"><br>
            </form>
        </div>
        <?php
            if(!isset($_GET["serch"])) exit();
            $serch = $_GET["serch"];
            include_once "conexion.php";
            if($serch == ""){
                $sentencia = $bd->query("SELECT * FROM profesor");
                $profesores = $sentencia->fetchAll(PDO::FETCH_OBJ);
            }else{
                $sentencia = $bd->query("SELECT * FROM profesor WHERE nombre LIKE '%$serch%' OR apellido LIKE '%$serch%' OR dni LIKE '%$serch%' OR especialidad LIKE '%$serch%'");
                $profesores = $sentencia->fetchAll(PDO::FETCH_OBJ);
            }  
        ?>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Dni</th>
                        <th>Especialidad</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($profesores as $profesor) { ?>
                        <tr>
                            <td><?php echo $profesor->id_profesor ?></td>
                            <td><?php echo $profesor->apellido . " " . $profesor->nombre ?></td>
                            <td><?php echo $profesor->dni ?></td>
                            <td><?php echo $profesor->especialidad ?></td>
                            <td><a href="<?php echo "editar.php?id_profesor=" . $profesor->id_profesor ?>">Editar</a></td>
                            <td><a href="<?php echo "eliminar.php?id_profesor=" . $profesor->id_profesor ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table><br><br>
            <button onclick="location.href='https://localhost/bd6/index.html'">Ir a Registrar</button>
            <button onclick="location.href='https://localhost/bd6/listar_cursos.php'">Ir a Listar Cursos</button>
        </div>
    </main>
</body>
</html>