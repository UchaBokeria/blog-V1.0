<?php 
    include_once "../../module.php";

    $act = $_REQUEST["act"];
    $result = array();
    $result["content"] = "";

    

    switch ($act) {
        case 'post_details':
            $res = $get->posts(2,$_REQUEST["post_id"]);
            $result["content"] = htmlspecialchars_decode($res[0]["body"]);
            break;
        default:
            $res = $get->posts(2); // 2 means blog sections posts
            foreach ($res as $value) {
                $res_images = explode(",",$value["path"]);
                $count  = count($res_images);
                $result["content"] .= ' 
                            <div class="blogs-boxes" style="margin-bottom:8vh;" slide-id="'.$value["id"].'">
                                <div class="user-info">
                                    <h1>' . $value["nickname"] . '</h1>
                                    <p>'.$value["createdAt"].'</p>
                                </div>
        
                                <div class="Carousel-container">'; 
                if($count < 2 && $res_images[0] == ""){
                    $result["content"] .= '<img src="assets/uploads/logo.png"  class="mySlides" slide-id="'.$value["id"].'" data-id="'.$i.'">';
                }
                else{
                    for($i = 0; $i != $count;$i++){
                        $result["content"] .= '<img src="assets/uploads/'.$res_images[$i].'" class="mySlides" slide-id="'.$value["id"].'" data-id="'.$i.'">';
                    }
                    $result["content"] .= ' <button class="w3-black w3-display-right nextBut" slide-id="'.$value["id"].'">&#10095;</button>
                                            <button class="w3-black w3-display-left prevBut"  slide-id="'.$value["id"].'">&#10094;</button>';
                }
        
                $result["content"] .= 
                                '

                                </div>
                                
                                <div class="blog_text" see-id='.$value["id"].'>
                                    <p>' . htmlspecialchars_decode($value["body"]) . '</p>
                                </div> 
                                <h2 class="blog_see_more" see-id='.$value["id"].' >mehr...</h2>
                                
                                <!-- <div class="text">
                                    <h3 style="cursor:text;color:#575757;margin-bottom:2vh;" data-id="'.$value["id"].'" data-title="'.$value["title"].'" data-html-id="'.$value["id"].'">'.$value["title"].'</h3>
                                    <h1 style="cursor:pointer" data-id="'.$value["id"].'" data-title="'.$value["title"].'" data-html-id="'.$value["id"].'">Mehr sehen</h1>
                                </div> -->

                                <hr style="border-bottom:1px solid #C4C4C4; margin:1vh 0;">
                            </div>';
            }
            break;
    }
    
    
    echo json_encode($result);

// <div class="user-image">
//     <img src="assets/uploads/'.$value["profile_pic"].'" alt="1">
// </div>