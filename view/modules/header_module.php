<header class="mb-5">
    <div class="pre-header">
    <div class="container">
    <img src="/public/images/logo_abi.jpg" alt="Logo_page" title="Accueil" class="logo-main" />
    <?php require_once('loggin_module.php'); ?>
    </div>
    </div>
    <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    require_once('menu_module.php');
} ?>
</header>

<?php 
require_once('notifications_module.php');
?>