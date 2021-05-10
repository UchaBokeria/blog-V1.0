<?php 
    include_once "../../module.php";
    $act = $_REQUEST["act"];
    //$limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))

    $limit = 10;
    $result = array();
    $result["content"] = "";
    $res = $get->home($limit);
    $idCheck;
    
    foreach ($res as $value) {
        $res_images = explode(",",$value["path"]);

        $count  = count($res_images);
        $result["content"] .= ' 
                    <div class="exhibition" style="margin-bottom:8vh;" slide-id="'.$value["id"].'">
                        <h1>' . $value["title"] . '</h1>
                        <div class="home-Carousel-container">'; 

        for($i = 0; $i != $count;$i++){
            $showImg = "";
            if($i == 0){
                $showImg = ' id="slideImgActive" ';
            }
            $result["content"] .= '<div class="mySlides" '.$showImg.' slide-id="'.$value["id"].'" data-id="'.$i.'" ><img src="assets/uploads/'.$res_images[$i].'"></div>';
        }

        $result["content"] .=   
                        '
                        <button class="w3-black w3-display-right nextBut" slide-id="'.$value["id"].'">&#10095;</button>
                        <button class="w3-black w3-display-left prevBut"  slide-id="'.$value["id"].'">&#10094;</button>

                        </div>

                        <div class="text" see-id='.$value["id"].'>
                            <h1 class="see_more" see-id='.$value["id"].'>See More</h1>
                            <p>' . htmlspecialchars_decode($value["desc"]) . '</p>
                        </div>
                    </div>';
    }
    
    echo json_encode($result);