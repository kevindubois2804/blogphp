<?php require(__DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "init.php") ?>

<?php
$contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. </div>";
?>

<?php include_once(__DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "haut.php") ?>

<?php echo $contenu ?>

<?php include_once(__DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . "bas.php") ?>