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
    $title = "Bienvenue sur le site Abi";
    $scripts_footer = array("public/js/ajax_home.js");
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

function listClient($search)
{
    $localrow = unserialize(SEARCHROWS);
    $scripts_footer = array('/public/js/select_pages.js','/public/js/modal_confirmation.js');
    require_once('dao/ClientManager.php');
    $clientManager = new ClientManager();
    if ($search) {
        require_once('dao/SearchManager.php');
        $searchmanager = new SearchManager();
        $results = $searchmanager->search($localrow[$_GET['row']]['value'], $_GET['query']);
    } else {
        $page = intval($_GET['page']);
        $offset = (isset($_SESSION['pages'])) ? $_SESSION['pages'] : 5;
        $start = ($page - 1) * $offset ;
        $results = $clientManager->getAllCustomersRange($start, $offset);
        $rowcount = $clientManager->rowCount();
        $pagestemp = floor($rowcount / $offset);
        $nbrpages = ($rowcount - $pagestemp == 0) ? $pagestemp : $pagestemp + 1;
    }
   
    $title = "Liste des clients";
   
    $keyword =$clientManager->getKeyword()['keywords'];
    require('view/clients_list_view.php');
}

function changeListSize()
{
    echo 'coucou';
    $_SESSION['pages'] = $_POST['pages'];
    header('location:/liste-clients/1/');
}

function viewCustomer($update)
{
    if (isset($_GET['id']) && $_GET['id'] != "" && is_numeric($_GET['id'])) {
        if ($update) {
            $css_header = array('/public/css/tagify.css');
            $scripts_header = array('/public/js/jQuery.tagify.min.js');
            $scripts_footer = array('/public/js/tag_init.js');
        }

        require_once('dao/ClientManager.php');
        $clientManager = new ClientManager();
        $result = $clientManager->getCustomer($_GET['id']);
        $nature = $clientManager->getCustomerNature();
        $type = $clientManager->getCustomerType();

        $title = "Fiche Client de " . $result['RaisonSociale'];
        $readonly = ($update) ? false : true;
        $setvalue = true;
        $keywordsarr = explode(',', $result['keywords']);
       
        require('view/client_view.php');
    } else {
        if ($_SESSION['logged'] === true) {
            header('location:/liste-clients/1/');
        }
    }
}

function addCustomer()
{
    require_once('dao/ClientManager.php');
    $css_header = array('/public/css/tagify.css');
    $scripts_header = array('/public/js/jQuery.tagify.min.js');
    $scripts_footer = array('/public/js/tag_init.js');

    $clientManager = new ClientManager();
    $nature = $clientManager->getCustomerNature();
    $type = $clientManager->getCustomerType();

    $readonly = false;
    $setvalue = false;
    $title = "Ajouter un client";

    require('view/client_view.php');
}

function createCustomer($new)
{
    require_once('model/Client.php');
    require_once('dao/ClientManager.php');

    $custarray = array(
        'raisonClient' => $_POST['raisonsociale'],
        'typeClient' => $_POST['typeclient'],
        'domaineActivitéClient' => $_POST['DomaineActivitée'],
        'numeroRueClient' => $_POST['numerorue'],
        'nomRueclient' => $_POST['adresse'],
        'codepostalClient' => $_POST['cp'],
        'villeClient' => $_POST['ville'],
        'natureClient' => $_POST['nature'],
        'effectifClient' => $_POST['effectifs'],
        'caClient' => $_POST['chiffreaffaire'],
        'commentaireClient' => $_POST['commentaire'],
        'telephoneClient' => $_POST['telephone'],
        'emailClient' => $_POST['mail'],
        'motsCle' => $_POST['keywords'],
    );

    $customer = new Client($custarray);
    $clientManager = new ClientManager();

    if ($new) {
        $valid = $clientManager->addCustomer($customer);
      
        $urlreturn = generateRewritedUrl($clientManager->getLastId(), $customer->getRaisonSociale());
    } else {
        $valid = $clientManager->updateCustomer($customer, $_POST['id']);
        $urlreturn = generateRewritedUrl($_POST['id'], $customer->getRaisonSociale());
    }
    
    if ($valid) {
        $_SESSION['nomclient'] = $_POST['raisonsociale'];
        $_SESSION['phrase'] = ($new) ? 'à bien été ajouté !' : 'à bien été modifié.';
        header('location:/consulter-client/'. $urlreturn);
    }
}

function deleteCustomer()
{
    require_once('dao/ClientManager.php');
    $clientManager = new ClientManager();
    $valid = $clientManager->deleteCustomer($_GET["id"]);
    if ($valid) {
        $_SESSION['nomclient'] = 'à bien été supprimé !';
        $_SESSION['phrase'] = '';
        header('location:/liste-clients/1/');
    }
}


function search()
{
    header('location:/resultat-recherche/' . $_POST['row'] . '/' . $_POST['search']);
}

function generateRewritedUrl($id, $name)
{
    $sep = "-";
    $nameclean = strtolower(stripAccents($name));
    $returnurl = $nameclean . $sep . $id . '.html';
    return $returnurl;
}

function stripAccents($str)
{
    return strtr(utf8_decode($str), utf8_decode(' _àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), '--aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

function spanAround($needle, $haystack)
{
    return preg_replace('/('.$needle.')/i', '<span class="bg-warning pt-1 pb-1">$1</span>', $haystack);
}
