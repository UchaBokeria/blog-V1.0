<?php
    spl_autoload_register("load");
    function load($className){
        include "../../database/".$className.".php";
    }