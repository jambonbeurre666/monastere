<div class="nav-bar bg-primary">

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary pl-0 pr-0">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
</nav>
</div>
    </div>