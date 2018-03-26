<?php
session_start();
require('controller/frontend.php');
isLogged();

try {
    if (isset($_GET['action']) && $_GET['action'] !== "") {
        if ($_GET['action'] === "loggin") {
            verifyUser();
        } elseif ($_GET['action'] === "disconnect") {
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
