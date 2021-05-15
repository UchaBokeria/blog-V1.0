<?php 
    session_start();
    if(!isset($_SESSION["token"]))
        header("Location:../../../assets/wildcard.php"); 
    include_once "../../module.php";

    $act = $_REQUEST["act"];
    $result = array(); 
    $result["content"] = "";
    $result["error"] = "";

    $user_id = $_SESSION["user_id"];
    $_SESSION['image'] = array();
    $counter;
    $i = 0;
    switch ($act) {
        case 'get_posts':
            if(json_decode($_REQUEST["data"]) != null){
                $filterParameters = json_decode($_REQUEST["data"],true);
                $res = $get->filter(1,$filterParameters,$user_id);
            }
            else
                $res = $get->posts(1,"",$user_id);
                
            
            foreach ($res as $value) {
                $result["content"] .= " <div class='exhibition-posts' data-id=".$value['id'].">
                                            <div class='post-text'>
                                                <b data-id=".$value['id'].">".$value['title']."</b>
                                                <p>".$value['status']."</p>
                                                <p>".$value['createdAt']."</p>
                                            </div>
                                            
                                            <div class='post-edit-delete'>
                                                <i class='material-icons edit'  data-id='".$value['id']."'>edit</i>
                                                <i class='material-icons delete'  data-id=".$value['id'].">delete</i>
                                            </div>
                                            <i class='fa fa-angle-down show_more'  data-id=".$value['id']."></i>
                                            
                                            <div class='post_body' data-id=".$value['id'].">
                                            ". htmlspecialchars_decode($value['desc']) ."
                                            </div>
                                        </div>
                                        
                                        ";
            }
            break;
        case 'get_edit':
            $id = $_REQUEST["id"];
            $res = $get->posts(1,$id,$user_id);
            $j=0;
            if(count($res) != 1){
                $result["error"] = " მოთხოვნილი პოსტის აიდი არის განმეორებული ვაი ვაი როგორ შეიძლება";
                echo $result["error"];
                break;
            }

            foreach ($res as $value) {
                if(empty($value["path"])){
                    $imgNumb = 0;
                }
                else{
                    $imgNumb = explode(",",$value["path"]);
                    $counter = count($imgNumb);
                }
                $result["content"].="<div class='edit-window-ajax'  data-id=".$value['id']." >
                                        <i class='material-icons close-ajax-edit' data-id=".$value['id']." >close</i>
                                        <h1 class='edit_desc'>Description</h1>
                                        <h1 class='edit_img'>Photo</h1>
                                        <input type='text' id='new_title' name=".$value['title']." value='".$value['title']."'>
                                        
                                        <div class='edit-post-type-select'>
                                            <i class='fa fa-angle-down ' id='edit_post_types' style='top:1vh;'></i>";
                
                $selectedStatus = " hey i am empty cuz i was bron as error";
                $selectedStatus = " <div data-type='" .$value["status_id"]. "' id='activated'>".$value["status"]."</div>";
                
                // get all statuses except this post status id
                $elseStatuses = $get->StatusList($value["status_id"]);
                foreach ($elseStatuses as  $status) { 
                    $selectedStatus .= " <div data-type='" .$status["id"]. "' >".$status["title"]."</div>";
                }
                $result["content"].= $selectedStatus;                          
                $result["content"].="   </div>
                                        <!-- CKEditor  -->
                                        <div class='post_body_edit' data-id='".$value['id']."'>
                                            <div class='editor-head' data-id=".$value['id']."></div>
                                            <div class='editor-body' data-id=".$value['id']." id='text_fix_cke'>" . htmlspecialchars_decode($value['desc']) . "</div>
                                        </div>
                                        <div class='edit_upload_image'>
                                            <div class='home_upload_form'>  
                                                <form id='mmmm' enctype='multipart/form-data'>                           
                                                    <input type='file' id='post_file' name='file[]' multiple>
                                                    <label for='post_file'><img src='assets/images/upload.png'></label>
                                                </form>
                                            </div>
                                            
                                            <div class='images_output'>";
                                                foreach ($imgNumb as $test){
                                                    $i++;
                                                    $result["content"].="<div class='img_output_div' del-id='".($i+50)."'> 
                                                                            <img src='assets/uploads/".$test."' > 
                                                                            <i class='material-icons delete_image' del-id='".($i+50)."' data-type=1 data-path='".$test."'>close</i>
                                                                        </div>";
                                                }

                         $result["content"].=" </div>  
                                        </div>
                                        <button class='save-button' type='button' id='".$value['id']."'>speicher</button>
                                        <br>
                                        <button class='cancel-button' type='button'>abbrechen</button>
                                    </div>";
            }
            //echo $result["content"];
            break;
        case 'get_new':
                $result["content"] .="<div class='edit-window-ajax' id='newpost'>
                                        <i class='material-icons close-ajax-edit' >close</i>

                                        <h1 class='add_desc'>Description</h1>
                                        <h1 class='add_img'>Photo</h1>

                                        <input type='text' placeholder='Erstelle neu' id='new_title'>
                                        
                                        <div class='edit-post-type-select-new'>
                                            <i class='fa fa-angle-down ' id='edit_post_types-new' style='top:1vh;'></i>
                                            <div data-type='2' id='activated'>öffentlich</div>
                                            <div data-type='3'>Privat</div>
                                            <div data-type='4'>Projekt</div>
                                        </div>
                                    
                                        <!-- CKEditor  -->
                                        <div class='post_body_edit'>
                                            <div class='editor-head'></div>
                                            <div class='editor-body'></div>
                                        </div>

                                        <div class='edit_upload_image'>
                                            <div class='home_upload_form'>  
                                                <form id='mmmm' enctype='multipart/form-data'>                           
                                                    <input type='file' id='post_file' name='file[]' multiple>
                                                    <label for='post_file'><img src='assets/images/upload.png'></label>
                                                </form>
                                            </div>

                                            <div class='images_output'>
                                            </div>  
                                        </div>
                                        <button class='add-save-button' type='button'>speicher</button>
                                        <br>
                                        <button class='cancel-button' type='button'>abbrechen</button>
                                    </div>";
            
            
            break;
        case 'get_delete_dialog':
                $result["content"] = "<p id='delete_dialog_text'>Möchten Sie diesen Beitrag wirklich löschen?</p>
                                      <button id='delete_dialog_yes'>Ja</button>
                                      <button id='delete_dialog_no'>Nein</button>";
            break;



        case 'create_post':
            $title = $_REQUEST["title"];
            $body = $_REQUEST["body"];
            $desc = $_REQUEST["desc"];
            $status_id = $_REQUEST["status_id"];
            $category_id = $_REQUEST["category_id"];
            $set->createPost($title,"",htmlspecialchars($desc),$user_id,$status_id,$category_id);
            break;
        case 'delete_post':
            $id = $_REQUEST["id"];
            $set->deletePost($id);
            break;
        case 'edit_post':            
            $title = $_REQUEST["title"];
            $body = "";
            $desc = $_REQUEST["desc"];
            $post_id = $_REQUEST["id"];
            $status_id = $_REQUEST["status_id"];
            $category_id = $_REQUEST["category_id"];
            $set->editPost($post_id,$title,htmlspecialchars($body),htmlspecialchars($desc),$user_id,$status_id,$category_id);
            break;
        case 'add_post':
            $title = $_REQUEST["title"];
            $body = "";
            $desc = $_REQUEST["desc"];
            $status_id = $_REQUEST["status_id"];
            $category_id = $_REQUEST["category_id"];
            $set->createPost($title,htmlspecialchars($body),htmlspecialchars($desc),$user_id,$status_id,$category_id);
            break;
        case 'tmp_upload':
            $img_counter = count($_FILES["file"]["name"]);
            $imgArra = array();
            $counter = $counter + $img_counter;
            for($i=0;$i!=$img_counter;$i++){
                $name = $_FILES['file']['name'][$i];

                $dir = "../../../assets/uploads/tmp/".$name;

                $global_div = $dir;
                $imageFileType = pathinfo($dir,PATHINFO_EXTENSION);
                $imgType = strtolower(pathinfo($dir,PATHINFO_EXTENSION));   
            
                //type
                if($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "gif"){
                    echo "This ile is not an image";
                }
                if(file_exists($dir)){
                    $withoutExtension = pathinfo($dir);
                    $dir = $withoutExtension["dirname"] . '/' . $withoutExtension["filename"] . $user_id .'.'. $withoutExtension["extension"];
           
                }
                if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$dir)){
                    array_push($imgArra,$name);
                }
                
                $result["content"] .= "<div class='img_output_div'  del-id='".$i."'> 
                                        <img src='assets/uploads/tmp/".$name."' data-path='".$name."' class='test_img_gtxov' >
                                        <i class='material-icons delete_image' data-type='2' del-id='".$i."' data-path='".$name."'>close</i>
                                    </div>";
            }

            $result["tmp_upload"] = $imgArra;
            $result["count"] += $counter + $img_counter;
            break;
        case 'edit_post_img':
            $dir = $_REQUEST["test"];
            $id = $_REQUEST["id"];  
            for($i=0;$i!=count($dir);$i++){
                for ($j=0; $j < count($dir[$i]); $j++) { 
                    rename("../../../assets/uploads/tmp/".$dir[$i][$j],"../../../assets/uploads/".$dir[$i][$j]);
                    $set->addImage($dir[$i][$j],$id);
                }
            }
            break;
        case 'add_post_img':

            $dir = $_REQUEST["test"];
            $title = $_REQUEST["title"];
            $new_id = $get->lastInsertId('posts');  
            //print_r($dir);
            for($i=0;$i!=count($dir);$i++){
                for ($j=0; $j < count($dir[$i]); $j++) { 
                    rename("../../../assets/uploads/tmp/".$dir[$i][$j],"../../../assets/uploads/".$dir[$i][$j]);
                    $set->addImage($dir[$i][$j],$new_id);
                }
            }
            break;
        case 'delete_image':
            $id = $_REQUEST["id"];
            $path = $_REQUEST["path"];
            $name = $_REQUEST["name"];
            unlink($path);
            if($id == 1){
                $set->delImage($name);
            }
            break;
        case 'delete_tmp_folder':
            $path = $_REQUEST["path"];
        
            for($i=0;$i!=count($path);$i++){
                for ($j=0; $j < count($path[$i]); $j++) { 
                    $dir = "../../../assets/uploads/tmp/".$path[$i][$j];
                    unlink($dir); 
                }
            }
        default:
            # code...
            break;
    }
    echo json_encode($result);

    
// <div class='image_counter'>
//     <h1 class='counter'>".$counter."</h1>
// </div>







