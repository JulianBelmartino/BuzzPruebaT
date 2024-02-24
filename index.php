<?php

require_once './vendor/autoload.php';
require_once './database/connection.php';

$controller = new App\Controllers\Controller();

include "./app/views/navbar.php";
include "./app/views/list.php";
include "./app/views/footer.php";

if (isset($_POST['name'], $_POST['description'], $_POST['dificulty'], $_POST['id'])) {
    // Extract data from $_POST
    $name = $_POST['name'];
    $description = $_POST['description'];
    $dificulty = $_POST['dificulty'];
    $id = $_POST['id'];

    // Call update method on the controller
    $controller->update($id, $name, $description, $dificulty);
} else {
    // Check if insert data is provided
    if (isset($_POST['name'], $_POST['description'], $_POST['dificulty'])) {
        // Extract data from $_POST
        $name = $_POST['name'];
        $description = $_POST['description'];
        $dificulty = $_POST['dificulty'];

        // Call insert method on the controller
        $controller->insert($name, $description, $dificulty);
    }
}
