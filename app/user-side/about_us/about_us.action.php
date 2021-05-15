<?php 
    include_once "../../module.php";
    $act = $_REQUEST["act"];

    $result = array();
    $result["content"] = "";
    $res = $get->about();

    foreach ($res as $value) {
        $result["content"] .= '<div class="admin-info">
                                    <div class="admin-header">
                                    <div class="header-info">
                                        <h1>' . $value["nickname"] . '</h1>
                                    </div>
                                    <i class="fa fa-angle-down toggle_info" data-id="'.$value["id"].'"></i>
                                    </div>
                                
                                    <div class="toggle" data-id="'.$value["id"].'">
                                    <div class="admin-desc">
                                        <p>' . $value["description"] . '</p>
                                    </div>
                                    </div>
                                </div>';
    }
    
    echo json_encode($result);
