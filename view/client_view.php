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

      <div class="border-right p-4">


        <form>

          <div class="form-group">
            <label for="raisonsociale">Raison sociale</label>
            <input type="text" class="form-control" placeholder="Raison sociale" name="raisonsociale" value="<?= $result['RaisonSociale'] ?>"
              disabled>


          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="typeclient">Type de client</label>
              <input type="text" class="form-control" placeholder="Type de client" name="typeclient" value="<?= $result['TypeClient'] ?>"
                disabled>
            </div>

            <div class="form-group col-md-6">
              <label for="DomaineActivitée">Domaine d'activitée</label>
              <input type="text" class="form-control" placeholder="1234 Main St" name="DomaineActivitée" value="<?= $result['DomaineActivitée'] ?>"
                disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="inputCity">N°</label>
              <input type="text" class="form-control" id="inputCity" value="<?= $result['numRueClient'] ?>"
                disabled>
            </div>
            <div class="form-group col-md-10">
              <label for="inputCity">Adresse</label>
              <input type="text" class="form-control" id="inputCity" value="<?= $result['nomRueClient'] ?>"
                disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputState">Code postal</label>
              <input type="text" class="form-control" id="inputZip" value="<?= $result['codePostClient'] ?>"
                disabled>
            </div>
            <div class="form-group col-md-8">
              <label for="inputZip">Ville</label>
              <input type="text" class="form-control" id="inputZip" value="<?= $result['villeClient'] ?>"
                disabled>
            </div>
          </div>


        </form>

      </div>



    </div>
    <div class="col">

      <?php

    $i =0;

    foreach ($result as $key => $value) {
        if ($key !== "keywords") {
            $keyformat = (array_key_exists($key, $fieldname)) ? $fieldname[$key] : $key ;


            echo '<div class="form-group row">';
            echo '<label for="'. $key .'" class="col-sm-2 col-form-label">'. $keyformat .'</label>';
            echo '<div class="col-sm-10">';
            echo '<input type="email" class="form-control" name="'. $key .'" placeholder="Email" value="'. $value .'" disabled>';
            echo '</div>';
            echo '</div>';
        }
    }
?>

    </div>
  </div>

</div>

<?php
$content = ob_get_clean();
require('view/template.php')
?>