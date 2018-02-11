<?php
function msjDanger($accion, $text){
    echo '<div class="modal fade bd-example-modal-lg" id="warning" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">' .
        '<div class="modal-dialog modal-lg">' .
        '<div class="modal-content">' .
        '<div class="modal-header modal-header-warning">' .
        '<h1>' . $accion . '</h1>' .
        '</div>' .
        '<div class="modal-body">' . $text . '</div>' .
        '<div class="modal-footer">' .
        '<button type="button" class="btn btn-default pull-rigth" data-dismiss="modal">Cerrar</button>' .
        '</div>' .
        '</div>' .
        '</div>' .
        '</div>';

    echo '<script>$("#warning").modal("show");</script>';
}