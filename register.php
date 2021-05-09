<?php 
    ini_set('display_errors',1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");
    include "database/autoloader.php";
    $get = new Controller;
    $get->register("dachi","123");