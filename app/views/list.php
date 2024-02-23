<?php

use App\Controllers\Controller;

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
    <div class="main_display">

        <table class="table_container">
            <thead>
                <tr class="table_header">
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
                $controller = new Controller();
                $content = $controller->read();
                $erased = $controller->delete();
                if (!$content) {
                    die("Controller failed");
                } else {
                    foreach ($content as $row) {
                ?>
                        <tr class="row">
                            <td class="cells"><?php echo $row['nombre'] ?></td>
                            <td class="cells"><?php echo $row['descripcion'] ?></td>
                            <td class="cells"><?php echo $row['dificultad'] ?></td>

                            <td>
                                <form action="./app/views/form.php" method="post">
                                    <input type="hidden" name="row" value="<?php echo base64_encode(json_encode($row)); ?>">
                                    <button class="buttons" type="submit">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="./index.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button class="button-delete" type="submit">Borrar</button>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>