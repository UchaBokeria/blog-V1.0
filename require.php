<?php
    include_once "database/autoloader.php";
    $get = new View();
    $result = $get->pages();

    $require_js = ' <script src="app/user-side/index.js"></script>
                    <script src="app/admin-side/admin-index.js"></script>' ;
                    
    $require_css = '<link rel="stylesheet" href="assets/style/reset.css">
                    <link rel="stylesheet" href="app/user-side/index.css">
                    <link rel="stylesheet" href="app/admin-side/admin-index.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">' ;

    foreach($result AS $value){
        $require_css .= '<link rel="stylesheet" href="' . $value["dir"] . $value["title"] . '/' . $value["title"] . '.css">' ;
        $require_js .= '<script src="' . $value["dir"] . $value["title"] . '/' . $value["title"] . '.js"></script>' ;
    }

    $require_fonts = "";

    $require_icons = "
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    ";


    $require_plugins = "<script src='plugins/emojiPicker/fgEmojiPicker.js'></script>
                        <!-- <script src='https://cdn.ckeditor.com/ckeditor5/27.1.0/decoupled-document/ckeditor.js'></script> -->
                        <script src='plugins/ckeditor5/build/ckeditor.js'></script> ";


    $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    
    if(strpos($url,"admin")){
        if(!isset($_SESSION["token"]))
            header("Location:login.php");
        else
            $root = "app/admin-side/index.php";
    }
    else
        $root = "app/user-side/index.php";
