<?php

function isLogged()
{
    if (isset($_GET['action'])) {
        $authorize = array("loggin", "disconnect");
        if (!in_array($_GET['action'], $authorize)) {
            if (!isset($_SESSION['logged'])) {
                header('location:index.php');
            } elseif ($_SESSION['logged'] !== true) {
                header('location:index.php');
            }
        }
    }
}

function homeController()
{
    require('view/home_view.php');
}

function verifyUser()
{
    require_once('dao/LogginManager.php');
    $logginManager = new LogginManager();
   
    if (isset($_POST['mail']) && isset($_POST['pass'])) {
        if (!empty($_POST['mail']) && !empty($_POST['pass'])) {
            $user = $logginManager->getUser($_POST['mail']);

            if ($_POST['mail'] === $user['mail'] && password_verify($_POST['pass'], $user['motdepasse']) === true) {
                $_SESSION['logged'] = true;
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['prenom'] = $user['prenom'];
    
                $arr = array('message' => 'Success !');
                returnReponse('200 OK', $arr);
            } else {
                $arr = array('message' => 'La combinaison email/mot de passe est incorrect'); //etc
                returnReponse('401 Unauthorized', $arr);
            }
        } else {
            $arr = array('message' => 'Merci de renseigner tous les champs'); //etc
            returnReponse('401 Unauthorized', $arr);
        }
    } else {
        $arr = array('message' => 'Merci de renseigner tous les champs'); //etc
        returnReponse('401 Unauthorized', $arr);
        //throw new Exception("Merci de renseigner tous les champs");
    }
}

function returnReponse($httpError, $array)
{
    header('HTTP/1.1 ' . $httpError);
    echo json_encode($array);
}

function disconnect()
{
    session_destroy();
    header('location:index.php');
}

function listClient()
{
    require_once('dao/ClientManager.php');
    $clientManager = new ClientManager();
    $results = $clientManager->getAllCustomers();

    require('view/clients_list_view.php');
}
