<?php

$crudModel = new Model();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $erased = $crudModel->delete($id);
    header('Location: ./index.php');
    exit;
}
