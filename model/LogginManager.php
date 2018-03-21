<?php
require_once("Manager.php");

class LogginManager extends Manager
{
    public function getUser($mail)
    {
        $req = $this->conn->prepare('SELECT nom, prenom, motdepasse, mail FROM users WHERE mail = ?');
        $req->execute(array($mail));
        $user = $req->fetch();
        return $user;
    }
}
