<?php
include("./database/connection.php");

class CrudModel
{
    public function read($db)
    {
        $query = "SELECT * FROM `tickets`";
        $result = mysqli_query($db, $query);

        if ($result) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo 'models says ok';
            return $data;
        } else {
            return false;
        }
    }
}
