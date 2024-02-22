<?php


$crudModel = new Model();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $selected = $crudModel->exists($id);
    return $selected;
    header("Location: ./app/vies/form.php");
    exit;
}
