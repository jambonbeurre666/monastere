<?php
if (isset($_SESSION['nomclient']) && $_SESSION['nomclient'] !== "") {
    $client = $_SESSION['nomclient'];
    $phrase = $_SESSION['phrase'];
    unset($_SESSION['nomclient'], $_SESSION['phrase']); ?>
<div class="container">
  <div class="alert alert-success" role="alert">
    <strong>Holy guacamole!</strong> Le client
    <?= $client . ' ' . $phrase ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  </div>
  <?php
}
?>