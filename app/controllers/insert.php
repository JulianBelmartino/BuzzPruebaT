<?php

$crudModel = new Model();

if (isset($_POST['name'], $_POST['description'], $_POST['dificulty'])) {

    if ($crudModel->exists($id)) {
        $updated = $crudModel->update($id, $_POST);
        if ($updated) {
            echo "Record updated successfully";
        } else {
            echo "Failed to update record";
        }
    } else {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $dificulty = $_POST['dificulty'];

        $agregado = $crudModel->insert($name, $description, $dificulty);

        if ($agregado) {
            echo 'done';
        } else {
            echo 'failed to add data';
        }

        header('Location: ./index.php');
        exit;
    }
}
