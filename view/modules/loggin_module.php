<div class="login">
<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    ?>
     <div class="btn btn-outline-primary mr-2" >Bienvenue <?= $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></div>
    <a class="btn btn-primary " href="/deconnexion/">Déconnexion</a>
<?php
} else {
        ?>
    <form action="connexion.html" method="post" class="form-inline">

  <div class="form-group mb-2">
    <label for="mail" class="sr-only">Email</label>
    <input type="text" class="form-control" name="mail" placeholder="Email">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="pass" class="sr-only">Password</label>
    <input type="password" class="form-control" name="pass" placeholder="Mot de passe">
  </div>
  <button type="submit" class="btn btn-primary mb-2 btn-loggin">Se connecter</button>
    </form>
<?php
    } ?>
        </div>