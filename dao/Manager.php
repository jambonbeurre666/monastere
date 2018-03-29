<?php
require_once("Connection.php");

class Manager
{
    protected $conn;

    public function __construct()
    {
        $db = Connection::getInstance();
        $this->conn = $db->getDb();
    }

    public function getLastId()
    {
        return $this->conn->lastInsertId();
    }
}
