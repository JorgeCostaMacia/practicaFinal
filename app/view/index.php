<?php
    include_once "../config/loader.php";
    $services = new Services();
    $services->getSession();
?>

<!DOCTYPE html>
<html lang="en">
    <head><?php $services->getIncludes()->phpHead($services); ?></head>      <!-- HEAD -->
    <body>
        <div id="mensajes"></div>
        <?php $services->getIncludes()->phpPriController($services); ?>   <!-- CONTROLADOR-->
        <?php $services->getIncludes()->phpFooter(); ?>           <!-- FOOTER -->
    </body>
</html>