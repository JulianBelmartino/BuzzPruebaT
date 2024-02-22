<?php

$crudModel = new Model();
$content = $crudModel->read();

if ($content) {
    return $content;
} else {
    echo 'Error reading data from database.';
}
