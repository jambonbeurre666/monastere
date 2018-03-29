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

    public function getAllCustomersRange($start, $offset)
    {
        $req = $this->conn->query('SELECT idClient, RaisonSociale, Telephone, MailClient FROM `clients` ORDER BY RaisonSociale ASC LIMIT '.$start.','.$offset.'');
        $results = $req->fetchAll();

        if (!$results) {
            throw new Exception($req->errorInfo()[2]);
        }
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
        
        if (!$result) {
            throw new Exception($req->errorInfo()[2]);
        }
        $req->closeCursor();
        return $result;
    }

    public function deleteCustomer($id)
    {
        $req = $this->conn->prepare('DELETE FROM `clients` WHERE idClient = ?');
        $result = $req->execute(array($id));
        $req->closeCursor();
        if (!$result) {
            throw new Exception($req->errorInfo()[2]);
        }
        $req->closeCursor();
        return $result;
    }

    public function updateCustomer(Client $cust, $id)
    {
        $req = $this->conn->prepare('UPDATE `clients` SET RaisonSociale = :raisonSociale, TypeClient = :typeClient, DomaineActivitée = :domaineActivite, numRueClient = :numRue, nomRueClient = :nomRue, codePostClient = :codePostal, villeClient = :ville, Nature = :nature, ChiffreAffaire = :ca, Effectifs = :effectif, CommentaireClients = :commentaire, Telephone = :telephone, MailClient = :adressemail, keywords = :keyword WHERE idClient = :id');
        $result = $req->execute(array(
          'raisonSociale'=>$cust->getRaisonSociale(),
          'typeClient'=>$cust->getType(),
          'domaineActivite'=>$cust->getDomaineActivite(),
          'numRue'=>$cust->getNumRue(),
          'nomRue'=>$cust->getNomRue(),
          'codePostal'=>$cust->getCodePostal(),
          'ville'=>$cust->getVille(),
          'nature'=>utf8_encode($cust->getNature()),
          'ca'=>$cust->getCa(),
          'effectif'=>$cust->getEffectif(),
          'commentaire'=>$cust->getCommentaire(),
          'telephone'=>$cust->getTelephone(),
          'adressemail'=>$cust->getAdressemail(),
          'keyword'=>$cust->getKeyword(),
          'id'=> $id
        ));

        if (!$result) {
            throw new Exception($req->errorInfo()[2]);
        }
        $req->closeCursor();
        return $result;
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

    public function getKeyword()
    {
        $req = $this->conn->query('SELECT keywords FROM `clients` ORDER BY RAND() LIMIT 1');
        $result = $req->fetch();

        if (!$result) {
            throw new Exception($req->errorInfo()[2]);
        }
        $req->closeCursor();
        return $result;
    }

    public function rowCount()
    {
        $req = $this->conn->query('SELECT Count(*) FROM `clients`');
        $result = $req->fetchColumn();
        $req->closeCursor();
        return $result;
    }
}
