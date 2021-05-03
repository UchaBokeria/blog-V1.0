<?php 
    include_once "../../module.php";
    $act = $_REQUEST["act"];
    $limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))
    //     $limit = 1;
    $limit = 10;
    $result = array();

    $res = $get->blog($limit);

    foreach ($res as $value) {
        $result["content"] .= '  <div class="blog-boxes">
                                    <div class="user-info">
                                    <div class="user-image">
                                        <img src="https://cdn1.iconfinder.com/data/icons/app-user-interface-glyph/64/user_man_user_interface_app_person-512.png" alt="">
                                    </div>
                                    <div class="user-text">
                                        <h1>' . $value["nickname"] . '</h1>
                                        <p>2021-04-09</p>
                                    </div>
                                    </div>
                                
                                    <div class="Carousel-container">
                                        <div class="img-tmp">
                                            <img src="assets/uploads/' . $value["path"] . '">
                                        </div>
                                        <div class="img-tmp">
                                            <img src="assets/uploads/' . $value["path"] . '">
                                        </div>
                                        <div class="img-tmp">
                                            <img src="assets/uploads/' . $value["path"] . '">
                                        </div>
                                    </div>
                                
                                    <div class="text">
                                    <h1>' . $value["title"] . '</h1>
                                    <p>' . $value["desc"] . '</p>
                                    </div>
                                    <hr style="border-bottom:1px solid #C4C4C4">
                                </div>';
    }
    
    echo json_encode($result);