<?php

include_once "../../module.php";

if(isset($_FILES['file']['name'])){
    $name = $_FILES['file']['name'];

    $dir = "../../../assets/uploads/".$name;
    $imageFileType = pathinfo($dir,PATHINFO_EXTENSION);


    $imgType = strtolower(pathinfo($dir,PATHINFO_EXTENSION));

    $response = 0;

    //size
    if($_FILES["file"]["size"] > 50000){
        echo "File is too big";
        $response = 1;
    }

    //type
    if($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "gif"){
        echo "This ile is not an image";
        $response = 1;
    }

    //if failed
    if($response == 1){
        echo "There is a problem and file is not uploaded";
    }
    
    $get_image = $get->aboutAdmin(1);
    
    $userid = 2;

    foreach($get_image as $value){
        $img_var =  $value["profile_pic"]; //aq vigeb dbshi ra qvia img(tu ra tqma unda carieli araa);
    }

    if(empty($img_var)){ //Tu DB shi profile_pic ari carieli mashin sheva ifshi da dbshic atvirtavs da foldershic chaagdebs
        $set->uppdateAccountPicutre($userid,$name);
        if(move_uploaded_file($_FILES['file']['tmp_name'],$dir)){
            $response = $dir;
        }
    }
    else{ // Tu db shi aris profile_pic mashin assetshi sheva mag profile picis name rasac aq washlis da magis names daarqmevs axal potos 
        $dir = "../../../assets/uploads/".$img_var;
        if(file_exists($dir)){
            unlink($dir);
            $response = $dir;
        }
        move_uploaded_file($_FILES['file']['tmp_name'],$dir);
        $response = $dir;
        
    }
    echo $response;
    exit;
}

echo 0;