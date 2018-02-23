<?php

define("_actualPath", ['', '../', '../../', '../../../', '../../../../', '../../../../../']);

/* PATHS PHP */
define("_controllerPathPHP", ['app/controller/system/', 'app/controller/crud/', 'app/controller/ajax/']);
define("_modelPathPHP", ['app/model/db/', 'app/model/entities/', 'app/model/session/']);
define("_librariesPathPHP", ['app/libraries/', 'app/view/libraries/']);
define("_librariesFileNamePHP", ['mensajes']);
define("_assetsPathPHP", 'assets/');
define("_layoutsPathPHP", 'layout/');

/* PATHS CSS */
define("_cssPath", 'practicaFinal/public/css/');
define("_cssComunFileName", ['bootstrap.min', 'comun.min']);
define("_cssClienteFileName", 'cliente.min');
define("_cssGestorFileName", 'gestor.min');

/* PATHS JS */
define("_jsPath", 'public/js/');
define("_jsJquery", 'jquery-3.3.1.min');
define("_jsBootstrap", 'bootstrap.min');
define("_jsComun", 'comun.min');


/* CONECTION PDO*/
define("_DBTYPE", "mysql");
define("_HOST", "localhost");
define("_DB", "trabajo_daw");
define("_CHARSET", "utf8");

define("_USSER_LIMITADO", "limitado");
define("_PASS_LIMITADO", "limitado");

define("_USSER_CLIENTE", "cliente");
define("_PASS_CLIENTE", "cliente");

define("_USSER_GESTOR", "gestor");
define("_PASS_GESTOR", "gestor");