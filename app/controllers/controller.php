<?php
include("app\models\models.php");
require_once("./database/connection.php");

$db = getDBConnection();

$crudModel = new CrudModel();
$content = $crudModel->read($db);

if ($content) {
    echo 'controller says ok';
    return $content;
} else {
    echo 'Error reading data from database.';
}
