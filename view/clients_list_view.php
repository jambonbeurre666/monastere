<?php
    ob_start();
?>
<div class="container">

<?php
if (isset($_SESSION['nomclient']) && $_SESSION['nomclient'] !== "") {
    $client = $_SESSION['nomclient'];
    $phrase = $_SESSION['phrase'];
    unset($_SESSION['nomclient'], $_SESSION['phrase']);
?>

<div class="alert alert-success" role="alert">
        <strong>Holy guacamole!</strong> Le client <?= $client . ' ' . $phrase ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
    }
?>
<div class="jumbotron jumbotron-fluid">
    <div class="bck-jumbo" style="background-image:url('https://source.unsplash.com/900x400/?<?= $keywords ?>')">
      <div class="grey-mask"></div>
    </div>
    <div class="container p-5">
      <h1 class="display-4">Liste des clients</h1>
    </div>
  </div>
<div class="table-responsive">
    <table class="table table-striped list-clients">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Raison Sociale</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($results as $result) {
            $url = generateRewritedUrl($result['idClient'], $result['RaisonSociale']);
            echo '<tr>';
            echo '<td>'. $result['RaisonSociale'] .'</td>';
            echo '<td>'. $result['Telephone'].'</td>';
            echo '<td>'. $result['MailClient'].'</td>';
            echo '<td>';
            echo '<div class="btn-hover">';
            echo '<a href="/consulter-client/'. $url .'" class="btn btn-outline-success"><i class="fas fa-eye"></i></a> ';
            echo '<a href="/modifier-client/'. $url .'" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a> ';
            echo '<a href="/supprimer-client/'. $url .'" class="btn btn-outline-danger" data-toggle="modal" data-name="'. $result['RaisonSociale'] .'" data-url="/supprimer-client/'. $url .'"><i class="fas fa-trash-alt"></i></a>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }
        ?>

        </tbody>
    </table>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteConf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-light bg-dark">
        <h5 class="modal-title">Demande de confirmation</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Voulez-vous vraiment supprimer le client <strong class="customers-name"></strong> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
        <a href="#" class="btn btn-danger delete-btn">Supprimer</a>
      </div>
    </div>
  </div>
</div>
<?php 
    $content = ob_get_clean();
    require('template.php');
?>