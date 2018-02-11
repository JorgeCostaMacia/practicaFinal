<?php
    include_once "../config/loader.php";
    $services = new Services();
    $services->getSession();
?>

<!DOCTYPE html>
<html lang="en">
    <head><?php $services->getIncludes()->phpHead($services); ?></head>
    <body>
        <div id="mensajes"></div>
        <?php $services->getIncludes()->phpPriController($services); ?>
        <?php $services->getIncludes()->phpFooter(); ?>
    </body>
</html>