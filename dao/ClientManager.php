<?php

require_once("Manager.php");

class ClientManager extends Manager
{
    public function getAllCustomers()
    {
        $req = $this->conn->query('SELECT idClient, RaisonSociale, Telephone, MailClient FROM clients ORDER BY RaisonSociale ASC');
        $results = $req->fetchAll();
        return $results;
    }

    public function getCustomer($id)
    {
    }

    public function deleteCustomer($id)
    {
    }

    public function updateCustomer(Client $cust)
    {
    }
}
