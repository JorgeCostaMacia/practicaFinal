<?php
    include_once "../config/loader.php";
    $services = new Services();
    $session = $services->getSession();
    $includesCSS = $services->getIncludesCSS();
    $includesJS = $services->getIncludesJS();
    $page = $services->getPage();
?>

<!DOCTYPE html>
<html lang="en">
    <head><?php include_once "layout/head.php"; ?></head>       <!-- HEAD -->
    <body>
        <div id="mensajes"></div>
        <?php include_once "../controller/primary.php"; ?>   <!-- CONTROLADOR-->
        <?php include_once "layout/footer.php"; ?>              <!-- FOOTER -->
    </body>
</html>