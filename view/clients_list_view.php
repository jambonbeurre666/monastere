<?php
    $title = "Bienvenue sur le site Abi";
    ob_start();
    require('modules/loggin_module.php');
?>
    
    
<?php 
    $content = ob_get_clean();
    require('template.php');
?>