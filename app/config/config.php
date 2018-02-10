<?php

define("_actualPath", ['', '../', '../../', '../../../', '../../../../', '../../../../../']);

/* PATHS LOADER PHP */
define("_controllerPathPHP", ['app/controller/class/']);
define("_modelPathPHP", ['app/model/db/', 'app/model/entities/', 'app/model/session/']);
define("_librariesPathPHP", ['app/libraries/', 'app/view/libraries/']);
define("_librariesFileNamePHP", ['mensajes']);

/* PATHS LOADER CSS */
define("_cssPath", 'practicaFinal/public/css/');
define("_cssFileName", ['bootstrap.min.css', 'style.min.css']);

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