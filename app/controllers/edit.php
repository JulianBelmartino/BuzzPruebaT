<?php


$crudModel = new Model();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $erased = $crudModel->delete($id);
    echo 'done';
} else {
    echo 'no';
}
