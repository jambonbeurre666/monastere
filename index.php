<?php

require('controller/frontend.php');

try {
    $action = isset($_GET['action']) ? $_GET['action'] : null;

    if (isset($action)) {
        if ($action === "google" && $action !== "") {
            header('location:http://google.fr/');
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
