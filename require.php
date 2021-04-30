<?php
    $arr = array(["folder"=>"user-side","file"=>"index"],
                 ["folder"=>"user-side","file"=>"index"]);

                 
    $require_icons = "
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    ";

    $require_plugins = "<script src='plugins/emojiPicker/fgEmojiPicker.js'></script>";
    $require_fonts = "";
    $require_css = "";
    $require_js = "";
    
    $require_css .= '<link rel="stylesheet" href="app/' . $arr[0]["folder"] . '/' . $arr[0]["file"] . '.css">';
    $require_js .= '<script src="app/' . $arr[1]["folder"] . '/' . $arr[1]["file"] . '.js"></script>';
