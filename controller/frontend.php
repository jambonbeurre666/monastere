<?php

function isLogged()
{
    if (isset($_GET['action'])) {
        $authorize = array("loggin", "disconnect");
        if (!in_array($_GET['action'], $authorize)) {
            if (!isset($_SESSION['logged'])) {
                header('location:/');
            } elseif ($_SESSION['logged'] !== true) {
                header('location:/');
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

function pageErreur()
{
    switch ($_GET['ernum']) {
   case '400':
   $error = 'Échec de l\'analyse HTTP.';
   break;
   case '401':
   $error =  'Le pseudo ou le mot de passe n\'est pas correct !';
   break;
   case '402':
   $error = 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
   break;
   case '403':
   $error =  'Requête interdite !';
   break;
   case '404':
   $error =  'La page n\'existe pas ou plus !';
   break;
   case '405':
   $error =  'Méthode non autorisée.';
   break;
   case '500':
   $error =  'Erreur interne au serveur ou serveur saturé.';
   break;
   case '501':
   $error =  'Le serveur ne supporte pas le service demandé.';
   break;
   case '502':
   $error =  'Mauvaise passerelle.';
   break;
   case '503':
   $error =  ' Service indisponible.';
   break;
   case '504':
   $error =  'Trop de temps à la réponse.';
   break;
   case '505':
   $error =  'Version HTTP non supportée.';
   break;
   default:
   $error =  'Erreur !';
}

    require('view/error_view.php');
}

function returnReponse($httpError, $array)
{
    header('HTTP/1.1 ' . $httpError);
    echo json_encode($array);
}

function disconnect()
{
    session_destroy();
    header('location:/');
}

function listClient()
{
    require_once('dao/ClientManager.php');
    $clientManager = new ClientManager();
    $results = $clientManager->getAllCustomers();
    require('view/clients_list_view.php');
}

function viewCustomer()
{
    if (isset($_GET['id']) && $_GET['id'] != "" && is_numeric($_GET['id'])) {
        $fieldname = array(
            "RaisonSociale" => "Raison sociale",
            "TypeClient" => "Type client",
            "DomaineActivitée" => "Domaine d'activitée",
            "AdresseClient" => "Adresse client",
            "ChiffreAffaire" => "Chiffre d'affaire",
            "ContactClients" => "Contact clients",
            "CommentaireClients" => "Commentaire client",
            "MailClient" => "Mail Client",
            "nomRueClient" => "Rue",
            "villeClient" => "Ville",
            "codePostClient" => "Code postal",
            "numRueClient" => "Numero"
        );

        require_once('dao/ClientManager.php');
        $clientManager = new ClientManager();
        $result = $clientManager->getCustomer($_GET['id']);

       
        require('view/client_view.php');
    } else {
        if ($_SESSION['logged'] === true) {
            header('location:liste-clients.html');
        }
    }
}


function generateRewritedUrl($id, $name, $prefix, $sep)
{
    $returnurl = str_replace(' ', $sep, strtolower($name));
    $returnurl = '/consulter' . $sep . $prefix . '/' . $returnurl . $sep . $id . '.html';
    return $returnurl;
}
