<?php

function isLogged() {

    if(isset($_GET['action'])) {
        if($action !== 'loggin' || $action !== 'disconnect') {
            if(!isset($_SESSION['logged'])) {
                header('location:index.php');
            } elseif($_SESSION['logged'] !== true) {
                header('location:index.php');
            }
        }
    } else {
        return true; 
    }
}

function homeController()
{
    require('view/home_view.php');
}

function verifyUser() {
    require_once('model/LogginManager.php');
    $logginManager = new LogginManager();
    $user = $logginManager->getUser($_POST['mail']);
    if(isset($_POST['mail']) && isset($_POST['pass'])) {
        if($_POST['mail'] === $user['mail'] && password_verify($_POST['pass'], $user['motdepasse']) === true) {
            $_SESSION['logged'] = true;
            header('location:index.php');
        } else {
            throw new Exception("La combinaison email/mot de passe est incorrect");
        }
    } else {
        throw new Exception("Merci de renseigner tous les champs");
    }
}

function disconnect() {
    session_destroy();
    header('location:index.php');
}
