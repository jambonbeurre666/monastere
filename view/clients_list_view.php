<?php
    $title = "Bienvenue sur le site Abi";
    ob_start();
?>
<div class="container">

<div class="table-responsive">
    <table class="table table-hover list-clients">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Raison Sociale</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($results as $result) {
    echo '<tr>';
    echo '<td>'. $result['RaisonSociale'] .'</td>';
    echo '<td>'. $result['Telephone'].'</td>';
    echo '<td>'. $result['MailClient'].'</td>';
    echo '<td>';
    echo '<div class="btn-hover">';
    echo '<a href="index.php?action=view-customer&id='.$result['idClient'].'" class="btn btn-outline-success"><i class="fas fa-eye"></i></a> ';
    echo '<a href="index.php?action=delete-customer&id='.$result['idClient'].'" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>';
    echo '</div>';
    echo '</td>';
    echo '</tr>';
}

        ?>

        </tbody>
    </table>
</div>
</div>
<?php 
    $content = ob_get_clean();
    require('template.php');
?>