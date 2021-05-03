<?php 
    include_once "../../module.php";
    $act = $_REQUEST["act"];
    $limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))

    $limit = 10;
    $result = array();
    $res = $get->about($limit);

    foreach ($res as $value) {
        $result["content"] .= '<div class="admin-info">
                                    <div class="admin-header">
                                    <div class="header-info">
                                        <img src="assets/uploads/' . $value["profile_pic"] . '" alt="">
                                        <h1>' . $value["nickname"] . '</h1>
                                    </div>
                                    <i id="toggle_info" class="fa fa-angle-down"></i>
                                    </div>
                                
                                    <div class="toggle">
                                    <div class="admin-desc">
                                        <p>' . $value["tipi_desc"] . '</p>
                                    </div>
                                    </div>
                                </div>';
    }
    
    echo json_encode($result);
