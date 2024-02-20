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
    <table>
        <thead>

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
                        <td>Editar</td>
                        <td>Borrar</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>