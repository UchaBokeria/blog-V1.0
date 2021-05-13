<?php
    session_start();
    include "database/autoloader.php";
    $get = new Controller();

    // if(isset($_POST["token"])){
    //     $get->checkTOKEN($token);
    // }
    //check username
    if(!isset($_POST["username"]) || !isset($_POST["password"]))
        header("Location:assets/wildcard.php");
    else{
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = $get->login($username, $password);

        if($result["result"] == true){
            $_SESSION["token"] = $result["token"];
            $_SESSION["user_id"] = $result["user_id"];
            header("Location:index.php?admin");
        }
        else 
            header("Location:login.php?error='Benutzername oder Passwort ist falsch'");
   
    }

