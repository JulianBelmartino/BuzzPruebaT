<?php
include("app\controllers\controller.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of tickets</title>
</head>

<body>
    <div>
        <form action="./index.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" maxlength="255"></textarea><br>

            <label>Selecciona la dificultad:</label><br>
            <input type="radio" id="option1" name="dificulty" value="option1">
            <label for="option1">Principiante</label><br>
            <input type="radio" id="option2" name="dificulty" value="option2">
            <label for="option2">Intermedio</label><br>
            <input type="radio" id="option3" name="dificulty" value="option3">
            <label for="option3">Experto</label><br>

            <input type="submit" value="Submit">
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Dificultad</td>
                <td>Estado</td>
                <td>Editar</td>
                <td>Borrar</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!$content) {
                die("Controller failed");
            } else {
                foreach ($content as $row) {
            ?>
                    <tr>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['dificultad'] ?></td>
                        <td>Pendiente</td>
                        <td>
                            <form action="./index.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="./index.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit">Borrar</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>