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
    <title>TicketApp</title>
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
                if (!$content || $content === 'No hay resultados') {
                    echo "<tr><td colspan='6'><h1>No hay resultados</h1></td></tr>";
                } else {
                    foreach ($content as $row) {
                ?>
                        <tr class="row">
                            <td class="cells"><?php echo $row['nombre'] ?></td>
                            <td class="cells desc"><?php echo $row['descripcion'] ?></td>
                            <td class="cells"><?php echo $row['dificultad'] ?></td>
                            <td class="cells" class="gif"><?php echo displayRandomGif($row['dificultad']); ?></td>
                            <td>
                                <form action="./app/views/form.php" method="post">
                                    <input type="hidden" name="row" value="<?php echo base64_encode(json_encode($row)); ?>">
                                    <button class="buttons" type="submit">EDITAR</button>
                                </form>
                            </td>
                            <td>
                                <form id="delete" action="./index.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button class="button-delete" type="submit">BORRAR</button>
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
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p class="modal-text">¿Está seguro que quiere borrar el ticket?</p>
            <div class="modal-buttons">
                <button class="buttons" id="confirmBtn">Confirmar</button>
                <button class="buttons" id="cancelBtn">Cancelar</button>
            </div>
        </div>
    </div>
</body>

</html>