<?php

function homeController()
{
    require_once('model/LogginManager.php');

    $logginManager = new LogginManager();
    $user = $logginManager->getUser("admin@abi.fr");

    require('view/homeView.php');
}
