<?php
require_once("Manager.php");
class SearchManager extends Manager
{
    public function search($row, $query, $start, $offset)
    {
        $req = $this->conn->prepare('SELECT * FROM `clients` WHERE '. $row .' LIKE :query ORDER BY RaisonSociale ASC LIMIT '.$start.','.$offset.'');
        $req->execute(array(':query' => '%' . $query . '%'));
        $results = $req->fetchAll();
        $req->closeCursor();
        return (!$results) ? false : $results;
    }

    public function count($row, $query)
    {
        $req = $this->conn->prepare('SELECT count(*) FROM (SELECT * FROM `clients` WHERE '. $row .' LIKE :query) src');
        $req->execute(array(':query' => '%' . $query . '%'));
        $result = $req->fetch();
        $req->closeCursor();
        return $result["count(*)"];
    }
}
