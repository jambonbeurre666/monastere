<?php

require_once("Manager.php");

class ClientManager extends Manager
{
    public function getAllCustomers()
    {
        $req = $this->conn->query('SELECT idClient, RaisonSociale, Telephone, MailClient FROM `clients` ORDER BY RaisonSociale ASC');
        $results = $req->fetchAll();
        $req->closeCursor();
        return $results;


    }

    public function getCustomer($id)
    {
        $req = $this->conn->prepare('SELECT * FROM `clients` WHERE idClient = ?');
        $req->execute(array($id));
        $result = $req->fetch();
        $req->closeCursor();
        return $result;

        
    }

    public function addCustomer(Client $customer)
    {
        $req = $this->conn->prepare('INSERT INTO clients (RaisonSociale, TypeClient, DomaineActivitée, numRueClient, nomRueClient, codePostClient, villeClient, Nature, ChiffreAffaire, Effectifs, CommentaireClients, Telephone, MailClient, keywords) VALUES (:raisonSociale, :typeClient, :domaineActivite, :numRue, :nomRue, :codePostal, :ville, :nature, :ca, :effectif, :commentaire, :telephone, :adressemail, :keyword)');
        $result = $req->execute(array(
          'raisonSociale'=>$customer->getRaisonSociale(),
          'typeClient'=>$customer->getType(),
          'domaineActivite'=>$customer->getDomaineActivite(),
          'numRue'=>$customer->getNumRue(),
          'nomRue'=>$customer->getNomRue(),
          'codePostal'=>$customer->getCodePostal(),
          'ville'=>$customer->getVille(),
          'nature'=>utf8_encode($customer->getNature()),
          'ca'=>$customer->getCa(),
          'effectif'=>$customer->getEffectif(),
          'commentaire'=>$customer->getCommentaire(),
          'telephone'=>$customer->getTelephone(),
          'adressemail'=>$customer->getAdressemail(),
          'keyword'=>$customer->getKeyword()
        ));
        
        if(!$result) {
            throw new Exception($req->errorInfo());
        }
        $req->closeCursor();
        return $result;
    }

    public function deleteCustomer($id)
    {
    }

    public function updateCustomer(Client $cust)
    {
    }

    public function getCustomerNature()
    {
        $req = $this->conn->query('SELECT nom FROM `nature` ORDER BY id ASC');
        $result = $req->fetchAll();
        $req->closeCursor();
        return $result;
    }

    public function getCustomerType()
    {
        $req = $this->conn->query('SELECT nom FROM `type` ORDER BY id ASC');
        $result = $req->fetchAll();
        $req->closeCursor();
        return $result;
    }
}
