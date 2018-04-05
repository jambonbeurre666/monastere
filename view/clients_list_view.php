<?php
    ob_start();
?>
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="bck-jumbo" style="background-image:url('https://source.unsplash.com/900x400/?<?= $keyword ?>')">
            <div class="grey-mask"></div>
        </div>
        <div class="container p-5">
            
            <?php if (isset($offset) && $offset !== "") {
    ?> 
            <h1 class="display-4">Liste des clients</h1>
            <?php
} else {
        ?>
                   <h1 class="display-4">Recherche <span class="text-primary">"<?= $_GET['query']; ?>"</span></h1>
            <p class="lead">dans "<?= $_GET['row']; ?>"</p>
            <?php
    } ?>
        </div>
    </div>
    <?php if (isset($offset) && $offset !== "") {
        ?>
    <div>
        <form class="form-inline mb-4 pcf" method="post" action="/change-list-size/">

            <label class="mr-sm-2" for="inlineFormCustomSelect">Nombre de clients par page</label>
            <select class="form-control mx-sm-3 pages" name="pages">
                <option <?=($offset==="5") ? 'selected' : ''; ?> value="5">5</option>
                <option <?=($offset==="10") ? 'selected' : ''; ?> value="10">10</option>
                <option <?=($offset==="20") ? 'selected' : ''; ?> value="20">20</option>
            </select>
        </form>
    </div>
    <?php
    } ?>
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
                if (!$results) {
                    echo '<tr class="h-50-r"><td colspan="4" class="text-center"><p class="h5">Aucune résultats concernant votre recherche</p></td></tr>';
                } else {
                    foreach ($results as $result) {
                        $url = generateRewritedUrl($result['idClient'], $result['RaisonSociale']);

                        if (isset($offset) && $offset !== "") {
                            $rs = $result['RaisonSociale'];
                            $tel = $result['Telephone'];
                            $mail = $result['MailClient'];
                        } else {
                            $rs =($_GET['row'] === 'raison-sociale') ? spanAround($_GET['query'], $result['RaisonSociale']) : $result['RaisonSociale'];
                            $tel = ($_GET['row'] === 'telephone') ? spanAround($_GET['query'], $result['Telephone']) : $result['Telephone'];
                            $mail = ($_GET['row'] === 'email') ? spanAround($_GET['query'], $result['MailClient']) : $result['MailClient'];
                        }
                            
                        echo '<tr>';
                        echo '<td>'. $rs . '</td>';
                        echo '<td>'. $tel .'</td>';
                        echo '<td>'. $mail .'</td>';
                        echo '<td>';
                        echo '<div class="btn-hover">';
                        echo '<a href="/consulter-client/'. $url .'" class="btn btn-outline-success"><i class="fas fa-eye"></i></a> ';
                        echo '<a href="/modifier-client/'. $url .'" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a> ';
                        echo '<a href="/supprimer-client/'. $url .'" class="btn btn-outline-danger" data-toggle="modal" data-name="'. $result['RaisonSociale'] .'" data-url="/supprimer-client/'. $url .'"><i class="fas fa-trash-alt"></i></a>';
                        echo '</div>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
        ?>
            </tbody>
        </table>
        <?php if (isset($offset) && $offset !== "") {
            ?>
        <div class="text-center">
            <?php
                for ($i = 1; $i <= $nbrpages; $i++) {
                    $active = ($_GET['page'] == $i) ? 'active' : '';
                    echo '<a href="/liste-clients/'.$i.'/" role="button" class="btn btn-outline-secondary '.$active.'">'.$i.'</a> ';
                } ?>
        </div>
        <?php
        } ?>
    </div>
</div>
<?php 
    require('modules/modale_module.php');
    $content = ob_get_clean();
    require('template.php');
?>