<?php

require_once("Manager.php");

class ClientManager extends Manager
{
    public function getAllCustomers()
    {
        $req = $this->conn->query('SELECT idClient, RaisonSociale, Telephone, MailClient FROM `clients` ORDER BY RaisonSociale ASC');
        $results = $req->fetchAll();
        return $results;
    }

    public function getCustomer($id)
    {
        $req = $this->conn->prepare('SELECT * FROM `clients` WHERE idClient = ?');
        $req->execute(array($id));
        $result = $req->fetch();
        return $result;
    }

    public function deleteCustomer($id)
    {
    }

    public function updateCustomer(Client $cust)
    {
    }
}
