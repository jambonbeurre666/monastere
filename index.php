<?php
define('ROOTPATH', __DIR__);
session_start();
require('controller/frontend.php');
isLogged();
try {
    if (isset($_GET['action']) && $_GET['action'] !== "") {
        if ($_GET['action'] === "loggin") {
            verifyUser();
        } elseif ($_GET['action'] === "disconnect") {
            disconnect();
        } elseif ($_GET['action'] === "error") {
            pageErreur();
        } elseif ($_GET['action'] === "customers-list") {
            listClient();
        } elseif ($_GET['action'] === "view-customer") {
            viewCustomer();
        } else {
            //throw new Exception("{$_GET['action']} n'existe pas !");
            http_response_code(404);

            //header("location: index.php");
        }
    } else {
        homeController();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
