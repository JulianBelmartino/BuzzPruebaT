<?php

namespace App\Models;

use Error;

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
    public function exists($id)
    {
        $db = getDBConnection();
        $query = "SELECT * FROM tickets WHERE id = $id";
        $result = mysqli_query($db, $query);
        return $result;
    }
    public function update($id, $data)
    {
        try {
            // Construct the SQL query for updating the record
            $db = getDBConnection();
            $sql = "UPDATE your_table SET column1 = :value1, column2 = :value2 WHERE id = :id";

            // Prepare the SQL statement
            $stmt = $this->$db->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':value1', $data['value1']);
            $stmt->bindParam(':value2', $data['value2']);
            // Repeat this for each column you want to update

            // Execute the SQL statement
            $stmt->execute();

            return true;
        } catch (Error) {
            return false;
        }
    }
}
