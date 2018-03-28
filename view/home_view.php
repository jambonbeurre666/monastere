<?php
ob_start();
?>
<div class="container">
    <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11532.620038102687!2d7.27622078213091!3d43.728106620230065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDPCsDQzJzQxLjEiTiA3wrAxNycwNi4wIkU!5e0!3m2!1sfr!2sfr!4v1521626815988"
        width="50%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    </div>


<?php 
    $content = ob_get_clean();
    require('template.php');
?>
