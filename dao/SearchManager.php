<?php
require_once("Manager.php");
class SearchManager extends Manager
{
    public function search($row, $query)
    {
        $req = $this->conn->prepare('SELECT * FROM `clients` WHERE '. $row .' LIKE :query');
        $req->execute(array(':query' => '%' . $query . '%'));
        $results = $req->fetchAll();
        $req->closeCursor();
        return (!$results) ? false : $results;
    }
}
