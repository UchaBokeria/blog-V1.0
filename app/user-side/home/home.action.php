<?php 
    include_once "../../module.php";
    $act = $_REQUEST["act"];
    $limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))

    $limit = 10;
    $result = array();
    $res = $get->home($limit);

    foreach ($res as $value) {
        $result["content"] .= ' <div id="exhibition">
                        <h1>' . $value["title"] . '</h1>
                        <div class="Carousel-container">
                            <div class="img-tmp">
                                <img src="assets/uploads/' . $value["path"] . '">
                            </div>
                        </div>
                        <div class="text">
                        <p>' . $value["desc"] . '</p>
                        </div>
                    </div>';
    }
    
    echo json_encode($result);