<?php

use App\Controllers\Controller;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/styles.css" />
</head>

<body>
    <?php
    require_once('navbar.php');

    if (isset($_POST['row'])) {
        // Decodificar la información de la fila desde base64
        $encodedRow = $_POST['row'];
        $decodedRow = json_decode(base64_decode($encodedRow), true);

        // Utilizar los datos de la fila según sea necesario
        $id = $decodedRow['id'];
        $nombre = $decodedRow['nombre'];
        $descripcion = $decodedRow['descripcion'];
        $dificultad = $decodedRow['dificultad'];
    }
    ?>
    <div class="form_display">
        <div class="form">
            <form id="ticketForm" action="../../index.php" method="post" onsubmit="return validateForm()">
                <label for="name">Nombre de tu ticket:</label><br>
                <input class="form_row" type="text" <?php if (isset($nombre)) echo 'placeholder="' . $nombre . '"'; ?> id="name" name="name"><br>
                <label for="description">Descripcion:</label><br>
                <textarea class="form_row" id="description" <?php if (isset($descripcion)) echo 'placeholder="' . $descripcion . '"'; ?> name="description" maxlength="255"></textarea><br>
                <label>Selecciona la dificultad:</label><br>
                <input type="radio" id="option1" name="dificulty" <?php if (isset($dificultad) && $dificultad == 'easy') echo 'checked'; ?> value="easy">
                <label for="option1">Principiante</label><br>
                <input type="radio" id="option2" name="dificulty" <?php if (isset($dificultad) && $dificultad == 'intermediate') echo 'checked'; ?> value="intermediate">
                <label for="option2">Intermedio</label><br>
                <input type="radio" id="option3" name="dificulty" <?php if (isset($dificultad) && $dificultad == 'hard') echo 'checked'; ?> value="hard">
                <label for="option3">Experto</label><br>
                <?php if (isset($id)) : ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <?php endif; ?>
                <div class="button_container">
                    <input class="buttons in-form" type="submit" value="SUBMIT">
                </div>
            </form>
        </div>
    </div>
    <?php
    require_once('footer.php')
    ?>
    <script>
        function validateForm() {
            var name = document.getElementById('name').value.trim();
            var description = document.getElementById('description').value.trim();
            var difficulty = document.querySelector('input[name="dificulty"]:checked');

            if (name === '' || description === '' || !difficulty) {
                alert('Por favor, completa todos los campos antes de enviar el formulario.');
                return false;
            }

            return true;
        }
    </script>
    <!-- Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Nuevo ticket creado</p>
            <button id="confirmBtn">Confirmar</button>
        </div>
    </div>
    <script>
        function validateForm() {
            var name = document.getElementById('name').value.trim();
            var description = document.getElementById('description').value.trim();
            var difficulty = document.querySelector('input[name="dificulty"]:checked');

            if (name === '' || description === '' || !difficulty) {
                alert('Por favor, completa todos los campos antes de enviar el formulario.');
                return false;
            }

            // If all fields are filled, show the modal
            document.getElementById('myModal').style.display = 'block';

            return false; // Prevent form submission
        }

        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName('close')[0];

        // Get the confirm button
        var confirmBtn = document.getElementById('confirmBtn');

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = 'none';
        };

        // When the user clicks on Confirm, hide the modal and submit the form
        confirmBtn.onclick = function() {
            modal.style.display = 'none';
            document.getElementById('ticketForm').submit(); // Submit the form
        };
    </script>
</body>

</html>