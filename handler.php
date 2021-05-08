<?php
    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    chmod('upload',0777);
    move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);
    $res = array();
    $res["uploaded"] = true;
    $res["url"] = $target_file;
    echo json_encode($res);