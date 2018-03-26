<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php
        echo $content;
        if (isset($scripts_footer) && $scripts_footer !== "") {
            ?>
        <script type="text/javascript">
            $( document ).ready(function() {
                <?php
                    foreach ($scripts_footer as $script) {
                        echo '$.getScript("'.$script.'")';
                    } ?>
            });
        </script>
    <?php
        } ?>
</body>
</html>