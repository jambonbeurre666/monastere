<?php
$title = "Erreur " . $_GET['ernum'] . ' - ' . $error;
//$title = "Fiche Client : " . $result['raisonSociale'];
ob_start();
?>
<div class="container">
    <div class="d-flex justify-content-center align-items-center">
        <div class="p-2">
            <div class="round-grad">
                <img src="https://media.giphy.com/media/jWexOOlYe241y/giphy.gif" class="d-inline-block text-center">
            </div>
        </div>
        <div class="p-4">
            <h1 class="display-3">Erreur <span class="badge badge-danger"><?= $_GET['ernum']; ?></span></h1>
            <h3 class="text-center"><?= $error ?></h3>
            <br>
            <a href="/" class="btn btn-light btn-sm">Retour à la page d'accueil</a>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require('view/template.php')
?>