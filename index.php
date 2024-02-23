<?php

require_once './vendor/autoload.php';
require_once './database/connection.php';



include "./app/views/navbar.php";
include "./app/views/list.php";
include "./app/views/footer.php";

if (isset($_POST['name'], $_POST['description'], $_POST['dificulty'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $dificulty = $_POST['dificulty'];

    $controller->insert($name, $description, $dificulty);
}
