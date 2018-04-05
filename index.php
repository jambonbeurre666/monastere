<?php
define('ROOTPATH', __DIR__);
session_start();
require('controller/frontend.php');
isLogged();

try {
    if (isset($_GET['action']) && $_GET['action'] !== "") {
        switch ($_GET['action']) {
            case "login":
                verifyUser();
                break;
            case "disconnect":
                disconnect();
                break;
            case "error":
                pageErreur();
                break;
            case "customers-list":
                listClient(false);
                break;
            case "view-customer":
                viewCustomer(false);
                break;
            case "add-customer":
                addCustomer();
                break;
            case "create-customer":
                CreateCustomer(true);
                break;
            case "delete-customer":
                deleteCustomer();
                break;
            case "update-customer":
                viewCustomer(true);
                break;
            case "add-update-customer":
                CreateCustomer(false);
                break;
            case "change-list-size":
                changeListSize();
                break;
            case "search":
                search();
                break;
            case "search-result":
                listClient(true);
                break;
            default:
                http_response_code(404);
                //throw new Exception("{$_GET['action']} n'existe pas !");
                //header("location: index.php");
                break;
        }
    } else {
        homeController();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
