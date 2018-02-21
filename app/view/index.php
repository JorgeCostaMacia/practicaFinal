<?php
    include_once "../config/loader.php";
    $dependency = new Dependency();
    $dependency->getSession();
    ?>

<!DOCTYPE html>
<html lang="en">
    <head><?php $dependency->getIncludes()->phpHeadController($dependency); ?></head>
    <body>
        <div id="mensajes"></div>
        <?php $dependency->getIncludes()->phpPriController($dependency); ?>
        <?php //$dependency->getIncludes()->phpFooter(); ?>
    </body>
</html>