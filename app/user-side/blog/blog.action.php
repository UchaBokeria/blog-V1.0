<?php 
    // include_once "../../module.php";
    // $act = $_REQUEST["act"];
    // //$limit = $_REQUEST["post_limit"];
    // // if(!isset($_REQUEST["post_limit"]))

    // $limit = 10;
    // $result = array();
    // $result["content"] = "";
    // $res = $get->blog($limit);

    // foreach ($res as $value) {
    //     $result["content"] .= '  <div class="blog-boxes">

    //                                 <div class="user-info">
    //                                     <div class="user-image">
    //                                         <img src="assets/uploads/'.$value["profile_pic"].'" alt="1">
    //                                     </div>
    //                                     <div class="user-text">
    //                                         <h1>' . $value["nickname"] . '</h1>
    //                                         <p>2021-04-09</p>
    //                                     </div>
    //                                 </div>
                                
    //                                 <div class="Carousel-container">
    //                                     <div class="img-tmp">
    //                                         <img src="assets/uploads/' . $value["path"] . '">
    //                                     </div>
    //                                     <div class="img-tmp">
    //                                     <img src="assets/uploads/' . $value["path"] . '">
    //                                     </div>
    //                                     <div class="img-tmp">
    //                                         <img src="assets/uploads/' . $value["path"] . '">
    //                                     </div>
    //                                 </div>
                                
    //                                 <div class="text">
    //                                 <h1>' . $value["title"] . '</h1>
    //                                 <div>' . htmlspecialchars_decode($value["desc"]) . '</div>
    //                                 </div>
    //                                 <hr style="border-bottom:1px solid #C4C4C4; margin:6vh 0;">
    //                             </div>';
    // }
    
    // echo json_encode($result);



    include_once "../../module.php";
    $act = $_REQUEST["act"];
    //$limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))

    $limit = 10;
    $result = array();
    $result["content"] = "";
    $res = $get->blog($limit);
    $idCheck;
    
    foreach ($res as $value) {
        $res_images = explode(",",$value["path"]);

        $count  = count($res_images);
        $result["content"] .= ' 
                    <div class="blogs-boxes" style="margin-bottom:8vh;" slide-id="'.$value["id"].'">
                        <div class="user-info">
                            <div class="user-image">
                                <img src="assets/uploads/'.$value["profile_pic"].'" alt="1">
                            </div>
                            <div class="user-text">
                                <h1>' . $value["nickname"] . '</h1>
                                <p>'.$value["createdAt"].'</p>
                            </div>
                        </div>

                        <div class="Carousel-container">'; 

        for($i = 0; $i != $count;$i++){
            $showImg = "";
            if($i == 0){
                $showImg = ' id="slideImgActive" ';
            }
            $result["content"] .= '<img src="assets/uploads/'.$res_images[$i].'" class="mySlides" slide-id="'.$value["id"].'" data-id="'.$i.'" '.$showImg.' >';
        }

        $result["content"] .= 
                        '
                        <button class="w3-black w3-display-right nextBut" slide-id="'.$value["id"].'">&#10095;</button>
                        <button class="w3-black w3-display-left prevBut"  slide-id="'.$value["id"].'">&#10094;</button>

                        </div>

                        <div class="blog_text" see-id='.$value["id"].'>
                            <h1 class="blog_see_more" see-id='.$value["id"].'>See More</h1>
                            <p>' . htmlspecialchars_decode($value["desc"]) . '</p>
                        </div>
                        
                        <hr style="border-bottom:1px solid #C4C4C4; margin:6vh 0;">
                    </div>';
    }
    
    echo json_encode($result);