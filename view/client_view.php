<?php
$title = "Fiche Client : ";
$title = "Abi - Fiche Client de " . $result['RaisonSociale'];
ob_start();

?>



<div class="container">

  <div class="jumbotron jumbotron-fluid">
    <div class="bck-jumbo" style="background-image:url('https://source.unsplash.com/900x400/?<?= $result['keywords']; ?>')">
      <div class="grey-mask"></div>
    </div>
    <div class="container p-5">
      <h1 class="display-4">
        <?= $result['RaisonSociale'] ?>
      </h1>
      <p class="lead">Téléphone :
        <?= wordwrap($result['Telephone'], 2, " ", true); ?>
      </p>
    </div>
  </div>



  <div class="row">
    <div class="col">

      <div class="pr-4">


        <form>
          <h5 class="text-primary mb-3 pb-3 border-bottom">Informations client</h5>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="raisonsociale">Raison sociale</label>
              <input type="text" class="form-control" placeholder="Raison sociale" name="raisonsociale" value="<?= $result['RaisonSociale'] ?>"
                disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="typeclient">Type de client</label>
              <input type="text" class="form-control" placeholder="Type de client" name="typeclient" value="<?= $result['TypeClient'] ?>"
                disabled>
            </div>

            <div class="form-group col-md-4">
              <label for="DomaineActivitée">Domaine d'activitée</label>
              <input type="text" class="form-control" placeholder="1234 Main St" name="DomaineActivitée" value="<?= $result['DomaineActivitée'] ?>"
                disabled>
            </div>

            <div class="form-group col-md-4">
              <label for="nature">Nature</label>
              <input type="text" class="form-control" placeholder="Nature" name="nature" value="<?= $result['Nature'] ?>"
                disabled>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="chiffreaffaire">Chiffre d'affaire</label>
              <input type="text" class="form-control" placeholder="Chiffre d'affaire" name="chiffreaffaire" value="<?= $result['ChiffreAffaire'] ?>"
                disabled>
            </div>

            <div class="form-group col-md-6">
              <label for="effectifs">Effectifs</label>
              <input type="text" class="form-control" placeholder="Effectifs" name="effectifs" value="<?= $result['Effectifs'] ?>"
                disabled>
            </div>
          </div>


          <h5 class="mt-3 text-primary mb-3 pb-3 border-bottom">Coordonnées</h5>

          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="mail">Email</label>
              <input type="text" class="form-control" placeholder="Email" name="mail" value="<?= $result['MailClient'] ?>"
                disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="telephone">Téléphone</label>
              <input type="text" class="form-control" placeholder="Téléphone" name="telephone" value="<?= $result['Telephone'] ?>"
                disabled>
            </div>
            <div class="form-group col-md-2">
              <label for="numerorue">N°</label>
              <input type="text" class="form-control" placeholder="N°" name="numerorue" value="<?= $result['numRueClient'] ?>"
                disabled>
            </div>
            <div class="form-group col-md-10">
              <label for="adresse">Adresse</label>
              <input type="text" class="form-control" placeholder="Adresse" name="adresse" value="<?= $result['nomRueClient'] ?>"
                disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="cp">Code postal</label>
              <input type="text" class="form-control" placeholder="Code postal" name="cp" value="<?= $result['codePostClient'] ?>"
                disabled>
            </div>
            <div class="form-group col-md-8">
              <label for="ville">Ville</label>
              <input type="text" class="form-control" placeholder="Ville" name="ville" value="<?= $result['villeClient'] ?>"
                disabled>
            </div>
          </div>

          <h5 class="mt-3 text-primary mb-3 pb-3 border-bottom">Autre</h5>

          <div class="form-row">

            <div class="form-group col-md-12">
              <label for="commentaire">Commentaire</label>
              <textarea class="form-control" name="commentaire" rows="6" value="<?= $result['CommentaireClients
'] ?>" disabled></textarea>
            </div>
          </div>

        </form>
      </div>
    </div>


    
    <!--<div class="col">
      <div class="bg-light pl-4 pr-4">
      
      <h5 class="text-primary mb-3 pb-3">Autre</h5>

      
      
      </div>

    </div>-->
  </div>

</div>

<?php
$content = ob_get_clean();
require('view/template.php')
?>