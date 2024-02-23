<?php

namespace App\Controllers;

use App\Models\Model;

class Controller
{
    public function read()
    {
        $crudModel = new Model();
        $content = $crudModel->read();

        if ($content) {
            return $content;
        } else {
            echo 'Error reading data from database.';
        }
    }
    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
            $id = $_POST['id'];
            $crudModel = new Model();
            $success = $crudModel->delete($id);

            if ($success) {
                header('Location: ./index.php');
                exit;
            } else {
                // Handle deletion failure
                // For example, display an error message
                echo "Error deleting record";
            }
        }
    }
    public function insert($name, $description, $dificulty)
    {
        $crudModel = new Model();
        $agregado = $crudModel->insert($name, $description, $dificulty);

        if ($agregado) {
            echo '<meta http-equiv="refresh" content="0.1; URL=./index.php">';
            exit;
        } else {
            echo 'failed to add data';
        }
    }
}
