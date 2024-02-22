<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Verificar si los datos están seteados
    if (isset($_POST['data'])) {
        // Decodificar de base64
        $jsonData = base64_decode($_POST['data']);

        // Decodificar el JSON a un array PHP
        $data = json_decode($jsonData, true); // Usar true para obtener un array asociativo

        // Ahora puedes acceder a los datos como un array PHP
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    } else {
        echo "No se enviaron datos.";
    }
    ?>
    <form action="../../index.php" method="post">
        <label for="name">Name:</label>
        <br>
        <input type="text" id="name" placeholder="<?php $data['name'] ?>" name="name">
        <br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" maxlength="255"></textarea>
        <br>
        <label>Selecciona la dificultad:</label><br>
        <input type="radio" id="option1" name="dificulty" value="easy">
        <label for="option1">Principiante</label><br>
        <input type="radio" id="option2" name="dificulty" value="intermediate">
        <label for="option2">Intermedio</label><br>
        <input type="radio" id="option3" name="dificulty" value="hard">
        <label for="option3">Experto</label><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>