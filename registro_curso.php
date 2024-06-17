<?php
    include_once "conexion.php";
    $sentencia = $bd->query("SELECT * FROM profesor");
    $profesores = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Curso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        div {
            width: 20%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-top: 0;
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
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #fff;
        }

        option {
            padding: 10px;
            background-color: #fff;
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
    </style>
</head>
<body>
    <div>
        <h2>Registro de Curso</h2>
        <form action="insertar_curso.php" method="post">
            <label for="nombre">Nombre: </label><br>
            <input type="text" name="nombre" required id="nombre"><br>
            <label for="creditos">Creditos: </label><br>
            <input type="number" name="creditos" required id="creditos"><br>
            <label for="horas">Horas: </label><br>
            <input type="number" name="horas" required id="horas"><br>
            <label for="requisitos">Requisitos: </label><br>
            <input type="text" name="requisitos" required id="requisitos"><br><br>
            <label for="id_profesor">Profesor: </label>
            <select name="id_profesor" id="id_profesor">
                <option value="">--Profesor--</option>
                <?php foreach($profesores as $profesor) {?>
                <option value="<?php echo $profesor->id_profesor ?>"><?php echo $profesor->apellido . " " . $profesor->nombre ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Registrar">
            <button onclick="location.href='https://localhost/bd6/listar_cursos.php'">Ir a Listar</button>
        </form>
    </div>
</body>
</html>