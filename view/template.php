<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abi - <?= $title; ?></title>
    <link rel="stylesheet" href="/public/css/style.css">
    <?php
        if (isset($css_header) && $css_header !== "") {
            foreach ($css_header as $css) {
                echo '<link rel="stylesheet" href="'. $css .'">';
            }
        }
     ?>  
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php
        if (isset($scripts_header) && $scripts_header !== "") {
            foreach ($scripts_header as $script) {
                echo '<script src="'. $script .'"></script>';
            }
        }
     ?>  
</head>
<body <?= ($_SERVER['REQUEST_URI'] === '/') ? 'class="bg-body"' : '' ?>>
    <?php
        require_once('modules/header_module.php');

        echo $content;

        require_once('modules/footer_module.php');
        if (isset($scripts_footer) && $scripts_footer !== "") {
            ?>
        
        <script type="text/javascript">
            $( document ).ready(function() {
                <?php
                    foreach ($scripts_footer as $script) {
                        echo '$.getScript("'.$script.'");';
                    } ?>
            });
        </script>
    <?php
        } ?>  
</body>
</html>

