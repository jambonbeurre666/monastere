<?php $row = unserialize(SEARCHROWS); ?>

<div class="nav-bar bg-primary">

  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary pl-0 pr-0">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($_SERVER['REQUEST_URI'] === '/') ? 'active' : ''; ?>">
            <a class="nav-link" href="/">Accueil</a>
          </li>
          <li class="nav-item <?= (substr($_SERVER['REQUEST_URI'], 0, strlen('/liste-clients/')) === '/liste-clients/') ? 'active' : ''; ?>">
            <a class="nav-link" href="/liste-clients/1/">Liste des clients</a>
          </li>
          <li class="nav-item <?= ($_SERVER['REQUEST_URI'] === '/ajouter-client/') ? 'active' : ''; ?>">
            <a class="nav-link" href="/ajouter-client/">Ajouter un clients</a>
          </li>

        </ul>
        <form action="/recherche/" method="post" class="form-inline my-2 my-lg-0">
          <input class="form-control mr-2" type="search" placeholder="Rechercher" aria-label="Search" name="search" value="<?= (isset($_GET['query']) && $_GET['query'] !== '') ? $_GET['query'] : ''; ?>">
          <select class="form-control mr-sm-2" name="row">
    <?php 
    $current = isset($_GET['row']) ? $row[$_GET['row']]['value'] : 'RaisonSociale';
    foreach ($row as $key => $elem) {
        $selected = ($current === $elem['value']) ? 'selected' : '';
        echo '<option value="'. $key .'" '.$selected.'>'. $elem['text'] .'</option>';
    } ?>
            </select>
          <button class=" btn btn-outline-light my-2 my-sm-0 " type="submit ">
            <i class="fas fa-search "></i>
          </button>
        </form>
      </div>
    </nav>
  </div>
</div>