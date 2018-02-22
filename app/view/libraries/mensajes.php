<?php
function msjDanger($accion, $text){
    echo '<script>msjDanger("' . $accion .'","' . $text . '");</script>';
}

function msjSuccess($accion, $text){
    echo '<script>msjSucces("' . $accion .'","' . $text . '");</script>';
}