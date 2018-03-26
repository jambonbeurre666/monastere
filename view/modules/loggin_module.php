<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    ?>
    <p>Bienvenue <?= $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></p>
    <a href="index.php?action=disconnect">Déconnexion</a>
<?php
} else {
        ?>
    <form action="index.php?action=loggin" method="post">
        <label for="mail">email :</label>
        <input type="text" name="mail">
        <label for="pass">Mot de passe :</label>
        <input type="password" name="pass">
        <input name="Valider" type="submit" value="Valider" class="btn-loggin" />
    </form>
<?php
    } ?>