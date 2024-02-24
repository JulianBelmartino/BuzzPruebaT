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

        $encodedRow = $_POST['row'];
        $decodedRow = json_decode(base64_decode($encodedRow), true);


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
                <input type="radio" id="option1" name="dificulty" <?php if (isset($dificultad) && $dificultad == 'Easy') echo 'checked'; ?> value="Easy">
                <label for="option1">Principiante</label><br>
                <input type="radio" id="option2" name="dificulty" <?php if (isset($dificultad) && $dificultad == 'Intermediate') echo 'checked'; ?> value="Intermediate">
                <label for="option2">Intermedio</label><br>
                <input type="radio" id="option3" name="dificulty" <?php if (isset($dificultad) && $dificultad == 'Hard') echo 'checked'; ?> value="Hard">
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

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close"></span>
            <p class="modal-text">Nuevo ticket creado!</p>
            <button class="buttons" id="confirmBtn">CONFIRMAR</button>
        </div>
    </div>
    <script>
        function validateForm() {
            const name = document.getElementById('name').value.trim();
            const description = document.getElementById('description').value.trim();
            const difficulty = document.querySelector('input[name="dificulty"]:checked');

            if (name === '' || description === '' || !difficulty) {
                alert('Por favor, completa todos los campos antes de enviar el formulario.');
                return false;
            }

            const isNewTicket = !document.querySelector('input[name="id"]');

            if (isNewTicket) {
                document.getElementById('myModal').querySelector('.modal-text').innerText = 'Nuevo ticket creado!';
            } else {
                document.getElementById('myModal').querySelector('.modal-text').innerText = 'Nuevo ticket actualizado!';
            }

            document.getElementById('myModal').style.display = 'block';

            return false;
        }


        const modal = document.getElementById('myModal');
        const span = document.getElementsByClassName('close')[0];
        const confirmBtn = document.getElementById('confirmBtn');


        span.onclick = function() {
            modal.style.display = 'none';
        };


        confirmBtn.onclick = function() {
            modal.style.display = 'none';
            document.getElementById('ticketForm').submit();
        };
    </script>
</body>

</html>