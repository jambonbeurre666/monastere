<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=abi', 'root', '');
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_ASSOC);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req1 = $bdd->query('SELECT nom, prenom, mail, motdepasse FROM users WHERE mail = "?" ');
    
    $donnees = $req1->fetch();

    foreach($donnees as $row)
    {
     echo $row . '<br/>';
    }
    // var_dump($donnees);
}

catch(PDOException $e) {
echo 'Error: ' .$e->getMessage();

}

    

?>