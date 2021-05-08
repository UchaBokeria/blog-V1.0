<?php 
    include_once "../../module.php";
    $act = $_REQUEST["act"];
    //$limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))

    $limit = 10;
    $result = array();
    $result["content"] = "";
    $res = $get->home($limit);

    foreach ($res as $value) {
        $result["content"] .= ' <div id="exhibition" style="margin-bottom:8vh;">
                        <h1>' . $value["title"] . '</h1>
                        <div class="Carousel-container">
                            <div class="img-tmp">
                                <img src="' . $value["path"] . '">
                            </div>
                        </div>
                        <div class="text">
                            <p>' . htmlspecialchars_decode($value["desc"]) . '</p>
                        </div>
                    </div>';
    }
    
    echo json_encode($result);