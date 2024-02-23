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
    var_dump($_POST['row']);
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
    <div class="main_display">
        <div class="form">
            <form action="../../index.php" method="post">
                <label for="name">Nombre de tu ticket:</label>
                <br>
                <input type="text" <?php if (isset($nombre)) echo 'placeholder="' . $nombre . '"'; ?> id="name" name="name">
                <br>
                <label for="description">Descripcion:</label><br>
                <textarea id="description" <?php if (isset($descripcion)) echo 'placeholder="' . $descripcion . '"'; ?> name="description" maxlength="255"></textarea>
                <br>
                <label>Selecciona la dificultad:</label><br>
                <input type="radio" id="option1" name="dificulty" <?php if (isset($dificultad) && $dificultad == 'easy') echo 'checked'; ?> value="easy">
                <label for="option1">Principiante</label><br>
                <input type="radio" id="option2" name="dificulty" <?php if (isset($dificultad) && $dificultad == 'intermediate') echo 'checked'; ?> value="intermediate">
                <label for="option2">Intermedio</label><br>
                <input type="radio" id="option3" name="dificulty" <?php if (isset($dificultad) && $dificultad == 'hard') echo 'checked'; ?> value="hard">
                <label for="option3">Experto</label><br>
                <input type="hidden" name="add-form" value="true">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <?php
    require_once('footer.php')
    ?>
</body>

</html>