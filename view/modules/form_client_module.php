<div class="col">
        <form action="<?= (isset($update) && $update) ? '/maj-client/' : '/creer-client/' ?>" method="post">
          <input type="hidden" name="id" value="<?= (isset($result['idClient'])) ? $result['idClient'] : '' ?>">
          <h5 class="text-primary mb-3 pb-3 border-bottom">Informations client</h5>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="raisonsociale">Raison sociale</label>
              <input type="text" class="form-control" placeholder="Raison sociale" name="raisonsociale" value="<?= ($setvalue) ? $result['RaisonSociale'] : ""; ?>"
                <?= ($readonly) ? "readonly" : "" ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
                <label for="typeclient">Type de client</label>
                <select class="custom-select" name="typeclient" <?= ($readonly) ? "disabled" : "" ?>>
                <?php
                foreach ($type as $typ) {
                    $selected = ($setvalue && $result['TypeClient'] === $typ['nom']) ? "selected" : "";
                    echo '<option '. $selected .' value="'.strtolower($typ['nom']).'">'.$typ['nom'].'</option>';
                }
                ?>
                </select>
            </div>
            <div class="form-group col-md-4">
              <label for="DomaineActivitée">Domaine d'activitée</label>
              <input type="text" class="form-control" placeholder="Domaine d'activité" name="DomaineActivitée" value="<?= ($setvalue) ? $result['DomaineActivitée'] : ""; ?>"
              <?= ($readonly) ? "readonly" : "" ?>>
            </div>

             <div class="form-group col-md-4">
             <label for="nature">Nature</label>
            <select class="custom-select" name="nature" <?= ($readonly) ? "disabled" : "" ?>>
            <?php
            foreach ($nature as $nat) {
                $selected = ($setvalue && $result['Nature'] === $nat['nom']) ? "selected" : "";
                echo '<option '. $selected .' value="'.strtolower($nat['nom']).'">'.$nat['nom'].'</option>';
            }
            ?>
            </select>
            </div>
            </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="chiffreaffaire">Chiffre d'affaire</label>
              <input type="text" class="form-control" placeholder="Chiffre d'affaire" name="chiffreaffaire" value="<?= ($setvalue) ? $result['ChiffreAffaire'] : ""; ?>"
              <?= ($readonly) ? "readonly" : "" ?>>
            </div>
            <div class="form-group col-md-6">
              <label for="effectifs">Effectifs</label>
              <input type="text" class="form-control" placeholder="Effectifs" name="effectifs" value="<?= ($setvalue) ? $result['Effectifs'] : ""; ?>"
              <?= ($readonly) ? "readonly" : "" ?>>
            </div>
          </div>
          <h5 class="mt-3 text-primary mb-3 pb-3 border-bottom">Coordonnées</h5>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="mail">Email</label>
              <input type="text" class="form-control" placeholder="Email" name="mail" value="<?= ($setvalue) ? $result['MailClient'] : ""; ?>"
              <?= ($readonly) ? "readonly" : "" ?>>
            </div>
            <div class="form-group col-md-6">
              <label for="telephone">Téléphone</label>
              <input type="text" class="form-control" placeholder="Téléphone" name="telephone" value="<?= ($setvalue) ? $result['Telephone'] : ""; ?>"
              <?= ($readonly) ? "readonly" : "" ?>>
            </div>
            <div class="form-group col-md-2">
              <label for="numerorue">N°</label>
              <input type="text" class="form-control" placeholder="N°" name="numerorue" value="<?= ($setvalue) ? $result['numRueClient'] : ""; ?>"
              <?= ($readonly) ? "readonly" : "" ?>>
            </div>
            <div class="form-group col-md-10">
              <label for="adresse">Adresse</label>
              <input type="text" class="form-control" placeholder="Adresse" name="adresse" value="<?= ($setvalue) ? $result['nomRueClient'] : ""; ?>"
              <?= ($readonly) ? "readonly" : "" ?>>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="cp">Code postal</label>
              <input type="text" class="form-control" placeholder="Code postal" name="cp" value="<?= ($setvalue) ? $result['codePostClient'] : ""; ?>"
              <?= ($readonly) ? "readonly" : "" ?>>
            </div>
            <div class="form-group col-md-8">
              <label for="ville">Ville</label>
              <input type="text" class="form-control" placeholder="Ville" name="ville" value="<?= ($setvalue) ? $result['villeClient'] : ""; ?>"
              <?= ($readonly) ? "readonly" : "" ?>>
            </div>
          </div>
          <h5 class="mt-3 text-primary mb-3 pb-3 border-bottom">Autre</h5>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="commentaire">Commentaire</label>
              <textarea class="form-control" placeholder="Commentaire" name="commentaire" rows="6" <?= ($readonly) ? "readonly" : "" ?>><?= ($setvalue) ? $result['CommentaireClients'] : ""; ?></textarea>
            </div>

            <?php if ($readonly) {
                echo '<div class="form-group col-md-12">';
                echo '<p>Mots clefs image</p>';
                foreach ($keywordsarr as $keyword) {
                    echo '<span class="badge badge-primary mr-2 p-2"><span class="h6">' . $keyword . '</span></span>';
                }
                echo '</div>';
            } else {
                ?>
            <div class="form-group col-md-12">
              <label for="keywords">Mots clefs image</label>
              <input type="hidden" class="form-control" placeholder="Mots clefs image" name="keywords" rows="6" value="<?= ($setvalue) ? $result['keywords'] : ""; ?>" <?= ($readonly) ? "readonly" : "" ?>>
            </div>
            <?php
            } ?>

            
          </div>
          <?php if (!$readonly) {
                ?>
                
            <button type="submit" class="btn btn-primary float-right"><?= (isset($update) && $update) ? 'Modifier' : 'Ajouter' ?> ce client</button>
        
          <?php
            } ?>
          </form>
    </div>
