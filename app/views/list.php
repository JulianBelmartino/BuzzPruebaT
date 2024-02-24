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
                if (!$content) {
                    die("Controller failed");
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
            <p>¿Está seguro que quiere borrar el ticket?</p>
            <div class="modal-buttons">
                <button id="confirmBtn">Confirmar</button>
                <button id="cancelBtn">Cancelar</button>
            </div>
        </div>
    </div>

    <script>
        // Obtener el modal
        var modal = document.getElementById("myModal");

        // Obtener el botón de borrar y el botón de cancelar del modal
        var confirmBtn = document.getElementById("confirmBtn");
        var cancelBtn = document.getElementById("cancelBtn");

        // Función para mostrar el modal al hacer clic en el botón de borrar
        function showModal() {
            modal.style.display = "block";
        }

        // Función para ocultar el modal al hacer clic en el botón de cancelar
        function hideModal() {
            modal.style.display = "none";
        }

        // Evento para mostrar el modal al hacer clic en el botón de borrar
        var deleteButtons = document.querySelectorAll('.button-delete');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                showModal();
                // Detener la acción predeterminada del formulario para evitar el envío accidental
                event.preventDefault();
            });
        });

        // Evento para ocultar el modal al hacer clic en el botón de cancelar
        cancelBtn.addEventListener('click', function() {
            hideModal();
        });

        // Puedes agregar un evento similar para el botón de confirmar si deseas realizar alguna acción adicional
        confirmBtn.addEventListener('click', function() {
            hideModal();
            var form = document.getElementById('delete'); // Replace 'yourFormId' with the actual ID of your form
            form.submit();

        });
        // También puedes considerar agregar un evento de escucha para cerrar el modal haciendo clic fuera de él si lo deseas
        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                hideModal();
            }
        });
    </script>
</body>

</html>