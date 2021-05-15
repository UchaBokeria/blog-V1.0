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
    $_SESSION["tmp_img_numb"];
    $all_img_numb = $_SESSION["numb"];
    
    switch ($act) {
        case 'get_posts':
            if(json_decode($_REQUEST["data"]) != null){
                $filterParameters = json_decode($_REQUEST["data"],true);
                $res = $get->filter(2,$filterParameters,$user_id);
            }
            else
                $res = $get->posts(2,"",$user_id);
                
            
            foreach ($res as $value) {
                $result["content"] .= " <div class='blog_exhibition-posts' data-id=".$value['id'].">
                                            <div class='blog_post-text'>
                                                <b data-id=".$value['id'].">".$value['title']."</b>
                                                <p>".$value['status']."</p>
                                                <p>".$value['createdAt']."</p>
                                            </div>
                                            
                                            <div class='blog_post-edit-delete'>
                                                <i class='material-icons blog_edit'  data-id='".$value['id']."'>edit</i>
                                                <i class='material-icons blog_delete'  data-id=".$value['id'].">delete</i>
                                            </div>
                                            <i class='fa fa-angle-down blog_show_more'  data-id=".$value['id']."></i>
                                            
                                            <div class='blog_post_body' data-id=".$value['id'].">
                                            ". htmlspecialchars_decode($value['body']) ."
                                            </div>
                                        </div>
                                        
                                        ";
            }
            break;
        case 'get_edit':
            $id = $_REQUEST["id"];
            $res = $get->posts(2,$id,$user_id);
            $j=0;
            if(count($res) != 1){
                $result["error"] = " მოთხოვნილი პოსტის აიდი არის განმეორებული ვაი ვაი როგორ შეიძლება";
                echo $result["error"];
                break;
            }

            foreach ($res as $value) {
                $imgNumb = explode(",",$value["path"]);
                $img_counter += count($imgNumb);
                $_SESSION["numb"] = $img_counter;
                $result["content"].="<div class='blog_edit-window-ajax'  data-id=".$value['id']." >
                                        <i class='material-icons blog_close-ajax-edit' data-id=".$value['id']." >close</i>
                                        <h1 class='blog_edit_desc'>Description</h1>
                                        <h1 class='blog_edit_img'>Photo</h1>
                                        <input type='text' id='blog_new_title' name=".$value['title']." value='".$value['title']."'>
                                        
                                        <div class='blog_edit-post-type-select'>
                                            <i class='fa fa-angle-down ' id='blog_edit_post_types' style='top:1vh;'></i>";
                
                $selectedStatus = " hey i am empty cuz i was bron as error";
                $selectedStatus = " <div data-type='" .$value["status_id"]. "' id='blog_activated'>".$value["status"]."</div>";
                
                // get all statuses except this post status id
                $elseStatuses = $get->StatusList($value["status_id"]);
                foreach ($elseStatuses as  $status) {
                    $selectedStatus .= " <div data-type='" .$status["id"]. "' >".$status["title"]."</div>";
                }
                $result["content"].= $selectedStatus;                          
                $result["content"].="   </div>
                                        <!-- CKEditor  -->
                                        <div class='blog_post_body_edit' data-id='".$value['id']."'>
                                            <div class='editor-head' data-id=".$value['id']."></div>
                                            <div class='editor-body' data-id=".$value['id']." id='blog_text_fix_cke'>" . htmlspecialchars_decode($value['body']) . "</div>
                                        </div>
                                        <div class='blog_edit_upload_image'>
                                            <div class='blog_upload_form'>  
                                            <form id='blog_mmmm' enctype='multipart/form-data'>                           
                                                <input type='file' id='blog_post_file' name='file[]' multiple>
                                                <label for='blog_post_file'><img src='assets/images/upload.png'></label>
                                            </form>
                                            </div>
                                            
                                            <div class='blog_images_output'>";
                                            for($i=0;$i != count($imgNumb); $i++){
                                                if(count($imgNumb) != 0){
                                                    if(file_exists("../../../assets/uploads/".$imgNumb[$i]) && $imgNumb[$i] != ""){
                                                        $result["content"].="<div class='blog_img_output_div' del-id='".($i+50)."'> 
                                                                                <img src='assets/uploads/".$imgNumb[$i]."' > 
                                                                                <i class='material-icons blog_delete_image' del-id='".($i+50)."' data-type='1' data-path='".$imgNumb[$i]."'>close</i>
                                                                            </div>";

                                                    }
                                                }
                                            }

                         $result["content"].=" </div>  
                                        </div>
                                        <button class='blog_save-button' type='button' id='".$value['id']."'>speicher</button>
                                        <br>
                                        <button class='blog_cancel-button' type='button'>abbrechen</button>
                                    </div>";
            }
            //echo $result["content"];
            break;
        case 'get_new':
                $result["content"] .="<div class='blog_edit-window-ajax' id='blog_newpost'>
                                        <i class='material-icons blog_close-ajax-edit' >close</i>

                                        <h1 class='blog_add_desc'>Description</h1>
                                        <h1 class='blog_add_img'>Photo</h1>

                                        <input type='text' placeholder='Erstelle neu' id='blog_new_title'>
                                        
                                        <div class='blog_edit-post-type-select-new'>
                                            <i class='fa fa-angle-down ' id='blog_edit_post_types-new' style='top:1vh;'></i>
                                            <div data-type='2' id='blog_activated'>öffentlich</div>
                                            <div data-type='3'>Privat</div>
                                            <div data-type='4'>Projekt</div>
                                        </div>
                                    
                                        <!-- CKEditor  -->
                                        <div class='blog_post_body_edit'>
                                            <div class='editor-head'></div>
                                            <div class='editor-body'></div>
                                        </div>

                                        <div class='blog_edit_upload_image'>
                                            <div class='blog_upload_form'>  
                                                <form id='blog_mmmm' enctype='multipart/form-data'>                           
                                                    <input type='file' id='blog_post_file' name='file[]' multiple>
                                                    <label for='blog_post_file'><img src='assets/images/upload.png'></label>
                                                </form>
                                            </div>

                                            <div class='blog_images_output'>
                                            </div>  
                                        </div>
                                        <button class='blog_add-save-button' type='button'>speicher</button>
                                        <br>
                                        <button class='blog_cancel-button' type='button'>abbrechen</button>
                                    </div>";
            
            
            break;
        case 'get_delete_dialog':
                $result["content"] = "<p id='blog_delete_dialog_text'>Möchten Sie diesen Beitrag wirklich löschen?</p>
                                      <button id='blog_delete_dialog_yes'>Ja</button>
                                      <button id='blog_delete_dialog_no'>Nein</button>";
            break;



        case 'create_post':
            $title = $_REQUEST["title"];
            $body = $_REQUEST["body"];
            $desc = $_REQUEST["desc"];
            $status_id = $_REQUEST["status_id"];
            $category_id = $_REQUEST["category_id"];
            $set->createPost($title,htmlspecialchars($body),"",$user_id,$status_id,$category_id);
            break;
        case 'delete_post':
            $id = $_REQUEST["id"];
            $set->deletePost($id);
            break;
        case 'edit_post':            
            $title = $_REQUEST["title"];
            $desc = "";
            $body = $_REQUEST["body"];
            $post_id = $_REQUEST["id"];
            $status_id = $_REQUEST["status_id"];
            $category_id = $_REQUEST["category_id"];
            $set->editPost($post_id,$title,htmlspecialchars($body),htmlspecialchars($desc),$user_id,$status_id,$category_id);
            break;
        case 'add_post':
            $title = $_REQUEST["title"];
            $desc = "";
            $body = $_REQUEST["body"];
            $status_id = $_REQUEST["status_id"];
            $category_id = $_REQUEST["category_id"];
            $set->createPost($title,htmlspecialchars($body),htmlspecialchars($desc),$user_id,$status_id,$category_id);
            break;
        case 'tmp_upload':
            $img_counter = count($_FILES["file"]["name"]);
            $imgArra = array();

            $_SESSION["tmp_img_numb"] = count($_FILES["file"]["name"]);;

            $all_img_numb += $img_counter;
            $result["count"] = $all_img_numb;
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
                
                $result["content"] .= "<div class='blog_img_output_div'  del-id='".$i."'> 
                                        <img src='assets/uploads/tmp/".$name."' data-path='".$name."' class='blog_test_img_gtxov' >
                                        <i class='material-icons blog_delete_image' data-type='2' del-id='".$i."' data-path='".$name."'>close</i>
                                    </div>";
            }

            $result["tmp_upload"] = $imgArra;
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








