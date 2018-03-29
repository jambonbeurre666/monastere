<?php
ob_start();
?>
<div class="container">
  <?php
    if ($setvalue) {
        ?>
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
      <?php 
      if ($readonly) {
          $url = generateRewritedUrl($result['idClient'], $result['RaisonSociale']);
          echo '<a href="/modifier-client/'. $url. '" class="btn btn-primary">Modifier ce client</a>';
      } ?>
    </div>
  </div>
  <?php
    }
?>
  <div class="row">
    <?php require('view/modules/form_client_module.php'); ?>
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