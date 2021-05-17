<?php  
    include_once "../../module.php";

    $act = $_REQUEST["act"];
    $result["content"] = "";
    $result = array();

    $res = $get->posts(1,184);
    foreach ($res as $value) {
        $res_images = explode(",",$value["path"]);
        $count  = count($res_images);
        $result["content"] .= ' 
                    <div class="exhibition" style="margin-bottom:8vh;" slide-id="'.$value["id"].'">
                        <h1 class="Title_home">' . $value["title"] . '</h1>
                        <div class="home-Carousel-container">'; 

        for($i = 0; $i != $count;$i++){
            $showImg = "";
            if($i == 0){
                $showImg = ' id="slideImgActive" ';
            }
            $result["content"] .= '<div class="mySlides" slide-id="'.$value["id"].'" data-id="'.$i.'" '.$showImg.' ><img src="assets/uploads/'.$res_images[$i].'" ></div>';
        }

        $result["content"] .=   
                        '
                        <button class="w3-black w3-display-right nextBut" slide-id="'.$value["id"].'">&#10095;</button>
                        <button class="w3-black w3-display-left prevBut"  slide-id="'.$value["id"].'">&#10094;</button>

                        </div>

                        <div class="text see_more_height" see-id='.$value["id"].'>
                            <br>
                            <p>' . htmlspecialchars_decode($value["desc"]) . '</p>
                        </div>
                        <h1 class="see_more" see-id='.$value["id"].'>weniger...</h1>
                    </div>';
    }
    $res = $get->posts(1); // 1 means home sections posts
    
    foreach ($res as $value) {
        if($value["id"] != 184){
            $res_images = explode(",",$value["path"]);
            $count  = count($res_images);
            $result["content"] .= ' 
                        <div class="exhibition" style="margin-bottom:8vh;" slide-id="'.$value["id"].'">
                            <h1 class="Title_home">' . $value["title"] . '</h1>
                            <div class="home-Carousel-container">'; 
    
            for($i = 0; $i != $count;$i++){
                $showImg = "";
                if($i == 0){
                    $showImg = ' id="slideImgActive" ';
                }
                $result["content"] .= '<div class="mySlides" slide-id="'.$value["id"].'" data-id="'.$i.'" '.$showImg.' ><img src="assets/uploads/'.$res_images[$i].'" ></div>';
            }
    
            $result["content"] .=   
                            '
                            <button class="w3-black w3-display-right nextBut" slide-id="'.$value["id"].'">&#10095;</button>
                            <button class="w3-black w3-display-left prevBut"  slide-id="'.$value["id"].'">&#10094;</button>
    
                            </div>
    
                            <div class="text" see-id='.$value["id"].'>
                                <h1 class="see_more" see-id='.$value["id"].'>mehr...</h1>
                                <br>
                                <p>' . htmlspecialchars_decode($value["desc"]) . '</p>
                            </div>
                        </div>';

        }
    }
    
    echo json_encode($result);