<?php

namespace App\Models;

class Model
{
    public function read()
    {
        $db = getDBConnection();
        $query = "SELECT * FROM `tickets`";
        $result = mysqli_query($db, $query);

        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $data;
        } else {
            return false;
        }
    }
    public function delete($id)
    {
        $db = getDBConnection();
        $query = "DELETE FROM `tickets` WHERE id = $id";
        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function insert($name, $description, $dificulty)
    {
        $db = getDBConnection();
        $query = "INSERT INTO tickets (nombre, descripcion, dificultad) VALUES ('$name', '$description', '$dificulty')";
        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function update($id, $name, $description, $dificulty)
    {
        $db = getDBConnection();


        $query = "UPDATE tickets SET nombre = ?, descripcion = ?, dificultad = ? WHERE id = ?";
        $stmt = mysqli_prepare($db, $query);

        mysqli_stmt_bind_param($stmt, "sssi", $name, $description, $dificulty, $id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
