<?php
include("app\controllers\controller_read.php");
include(".\api.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styles.css" />
    <title>list of tickets</title>
</head>

<body>
    <div>
        <a href="./app/views/form.php">form</a>

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
                        <td class="gif"><?php echo displayRandomGif($row['dificultad']); ?></td>
                        <td>
                            <form action="./app/views/form.php" method="post">
                                <input type="hidden" name="id" value="<?php echo base64_encode(json_encode($row)); ?>">
                                <button class="test" type="submit">Editar</button>
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