<?php
session_start();
require('controller/frontend.php');
isLogged();
try {
    $action = isset($_GET['action']) ? $_GET['action'] : null;

    if (isset($action) && $action !== "") {
        if ($action === "loggin") {
            verifyUser();
        } elseif ($action === "disconnect") {
            disconnect();
        } else {
            throw new Exception("{$_GET['action']} n'existe pas !");
            //header("location: index.php");
        }
    } else {
        homeController();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
