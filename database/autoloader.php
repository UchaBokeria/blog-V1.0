<?php
    spl_autoload_register("load");
    function load($className){
        $path = "../../database/".$className.".php";
        
        if(!file_exists($path))
            $path = "../database/".$className.".php";      

        if(!file_exists($path))
            $path = "database/".$className.".php";

        if(!file_exists($path))
            $path = $className.".php";
        
            
        include $path;
    }