<?php

$crudModel = new Model();

if (isset($_POST['name'], $_POST['description'], $_POST['dificulty'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $dificulty = $_POST['dificulty'];

    // Assuming you have a method to add data in your Model class
    $agregado = $crudModel->insert($name, $description, $dificulty);

    if ($agregado) {
        echo 'done';
    } else {
        echo 'failed to add data';
    }

    // Redirect to prevent form resubmission
    header('Location: ./index.php');
    exit; // Make sure to exit after redirecting
} else {
    echo 'no';
}
