<?php
    $title = "Bienvenue sur le site Abi";
    ob_start();
?>
<h1>Bienvenue du le site d'Abi</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dui orci, tempus ut placerat nec, accumsan eget lacus. Proin eu libero ligula. Vivamus id augue in mauris tincidunt maximus. Mauris sodales ac mauris id condimentum. Aliquam cursus non tellus sit amet egestas. Maecenas sit amet risus ut dui fringilla feugiat. Nam et libero id neque feugiat commodo vitae at nisl. Vestibulum et quam vitae ligula egestas placerat quis sit amet neque. Curabitur tincidunt tempor dui at sollicitudin. Sed mollis tincidunt urna, sit amet tempus magna fringilla ut.</p>



<?php 
 var_dump($user);

    $content = ob_get_clean();
    require('template.php');
?>
