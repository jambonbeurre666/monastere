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
    <h1 class="display-4"><?= $result['RaisonSociale'] ?></h1>
    <p class="lead">Téléphone : <?= wordwrap($result['Telephone'], 2, " ", true); ?></p>
  </div>
</div>



<div class="row">
    <div class="col">

<div class="card" style="width: 100%;">
  <div class="card-body">

    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-row">
  <div class="form-group col-md-2">
      <label for="inputCity">N°</label>
      <input type="text" class="form-control" id="inputCity" value="<?= $result['numRueClient'] ?>">
    </div>
    <div class="form-group col-md-10">
      <label for="inputCity">Adresse</label>
      <input type="text" class="form-control" id="inputCity" value="<?= $result['nomRueClient'] ?>">
    </div>
    </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Code postal</label>
      <input type="text" class="form-control" id="inputZip" value="<?= $result['codePostClient'] ?>">
    </div>
    <div class="form-group col-md-8">
      <label for="inputZip">Ville</label>
      <input type="text" class="form-control" id="inputZip" value="<?= $result['villeClient'] ?>">
    </div>
  </div>
 
 
</form>
  </div>
</div>



</div>
<div class="col"></div>
</div>

</div>


<?php
/*
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
}*/
?>

<?php
$content = ob_get_clean();
require('view/template.php')
?>