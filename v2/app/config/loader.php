<?php

spl_autoload_register('classAutoLoader');
configLoader();
librariesLoader();

function configLoader(){
    $actualPath = ['', '../', '../../', '../../../', '../../../../', '../../../../../'];
    $configPath = ['app/config/'];
    $configFileName = ['config'];

    foreach($configFileName as $_configFileName){
        foreach($configPath as $path) {
            foreach ($actualPath as $apath) {
                $confPath = $apath . $path . $_configFileName . '.php';
                if (file_exists($confPath) && is_file($confPath)) {
                    include_once $confPath;
                }
            }
        }
    }
}

function classAutoLoader($className){
    foreach(_controllerPathPHP as $path){
        foreach(_actualPath as $apath){
            $classPath = $apath . $path . $className . '.php';
            if (file_exists($classPath) && is_file($classPath)) {
                include_once $classPath;
            }
        }
    }
    foreach(_modelPathPHP as $path){
        foreach(_actualPath as $apath){
            $classPath = $apath . $path . $className . '.php';
            if (file_exists($classPath) && is_file($classPath)) {
                include_once $classPath;
            }
        }
    }

}

function librariesLoader(){
    foreach(_librariesFileNamePHP as $name){
        foreach(_librariesPathPHP as $path){
            foreach(_actualPath as $apath){
                $utilsPath = $apath . $path . $name . '.php';
                if (file_exists($utilsPath) && is_file($utilsPath)) {
                    include_once $utilsPath;
                }
            }
        }
    }
}