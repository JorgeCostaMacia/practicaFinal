<?php

class IncludesCSS {
    function getLinks(){
        foreach(_cssFileName as $name){
            foreach(_actualPath as $apath){
                $filePath = $apath . _cssPath . $name;
                if (file_exists($filePath) && is_file($filePath)) {
                    echo '<link rel="stylesheet" href="' . $filePath . '">';
                }
            }
        }
    }
}