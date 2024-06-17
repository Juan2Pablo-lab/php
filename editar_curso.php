<?php
    if(!isset($_GET["id_curso"])) exit();
    $id_curso = $_GET["id_curso"];
    include_once "conexion.php";
    $sentencia = $bd->prepare("SELECT * FROM curso WHERE id_curso=?");
    $sentencia->execute([$id_curso]);
    $curso = $sentencia->fetch(PDO::FETCH_OBJ);
    $sentencia = $bd->query("SELECT * FROM profesor");
    $profesores = $sentencia->fetchALl(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
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
            <form action="guardar_curso.php" method="POST">
                <input type="hidden" name="id_curso" value="<?php echo $curso->id_curso ?>">
                <label for="nombre">Nombre: </label><br>
                <input type="text" name="nombre" required value="<?php echo $curso->nombre ?>"><br>
                <label for="creditos">Creditos: </label><br>
                <input type="number" name="creditos" required value="<?php echo $curso->creditos ?>"><br>
                <label for="horas">Horas: </label><br>
                <input type="number" name="horas" required value="<?php echo $curso->horas ?>"><br>
                <label for="requisitos">Requisitos: </label><br>
                <input type="text" name="requisitos" required value="<?php echo $curso->requisitos ?>"><br>
                <label for="id_profesor">Profesor: </label>
                <select name="id_profesor" id="id_profesor">
                    <option value="">--Profesor--</option>
                    <?php foreach($profesores as $profesor){ ?>
                        <option value="<?php echo $profesor->id_profesor ?>" 
                        <?php echo $curso->id_profesor === $profesor->id_profesor ? "selected='selected'": "" ?>>
                        <?php echo $profesor->apellido . " " . $profesor->nombre ?>
                        </option>
                    <?php } ?>
                </select>
                <input type="submit" value="Modificar">
                <button onclick="location.href='https://localhost/bd6/listar_cursos.php'">Ir a Listar</button>
            </form>
        </div>
    </main>
</body>
</html>