<?php

require_once './vendor/autoload.php';
require_once './database/connection.php';

$controller = new App\Controllers\Controller();

include "./app/views/navbar.php";
include "./app/views/list.php";
include "./app/views/footer.php";

if (isset($_POST['name'], $_POST['description'], $_POST['dificulty'], $_POST['id'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $dificulty = $_POST['dificulty'];
    $id = $_POST['id'];

    $controller->update($id, $name, $description, $dificulty);
} else {
    if (isset($_POST['name'], $_POST['description'], $_POST['dificulty'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $dificulty = $_POST['dificulty'];

        $controller->insert($name, $description, $dificulty);
    }
}
