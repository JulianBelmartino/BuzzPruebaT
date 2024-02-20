<?php
include '../database/connection.php';
class CrudModel
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function read($id)
    {
        $query = "SELECT * FROM DATABASE WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
