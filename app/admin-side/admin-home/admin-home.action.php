<?php 
    session_start();
    if(!isset($_SESSION["token"]))
        header("Location:../../../assets/wildcard.php"); 
    include_once "../../module.php";
    $act = $_REQUEST["act"];
    //$limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))

    $limit = 1000;
    $result = array();
    $result["content"] = "";
    $result["error"] = "";
    $img_counter = 0;
    switch ($act) {
        case 'get_posts':
            if(json_decode($_REQUEST["data"]) != null){
                $filterParameters = json_decode($_REQUEST["data"],true);
                $res = $get->filter($limit,$filterParameters,1);
            }
            else
                $res = $get->home($limit);
                
            
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
            $res = $get->home($limit,$id);

            if(count($res) != 1){
                $result["error"] = " მოთხოვნილი პოსტის აიდი არის განმეორებული ვაი ვაი როგორ შეიძლება";
                echo $result["error"];
                break;
            }

            foreach ($res as $value) {
                $result["content"].="<div class='edit-window-ajax'  data-id=".$value['id']." >
                                        <i class='material-icons close-ajax-edit' data-id=".$value['id']." >close</i>
                                        <h1 class='edit_desc'>Description</h1>
                                        <h1 class='edit_img'>Photo</h1>
                                        <input type='text' name=".$value['title']." value='".$value['title']."'>
                                        
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
                                            <div class='upload_form'>                                
                                                <input type='file' id='file' name='file' >
                                                <label for='file'><img src='assets/images/upload.png'></label>
                                            </div>
                                            <div class='image_counter'>
                                                <h1>".$img_counter."</h1>
                                            </div>
                                            <div class='images_output'>
                                                <img src='assets/uploads/blog1.jpg' >
                                            </div>
                                        </div>
                                        <button class='save-button'   type='button' id='".$value['id']."'>speicher</button>
                                        <br>
                                        <button class='cancel-button' type='button'>abbrechen</button>
                                    </div>";
            }
            //echo $result["content"];
            break;
        case 'get_new':
                $result["content"] .="<div class='edit-window-ajax' id='newpost'>
                                        <i class='material-icons close-ajax-edit' >close</i>
                                        <input type='text' placeholder='Erstelle neu' id='new_title'>
                                        
                                        <div class='edit-post-type-select'>
                                            <i class='fa fa-angle-down ' id='edit_post_types' style='top:1vh;'></i>
                                            <div data-type='2'>öffentlich</div>
                                            <div data-type='3'>Privat</div>
                                            <div data-type='4'>Projekt</div>
                                        </div>
                                    
                                        <!-- CKEditor  -->
                                        <div class='post_body_edit'>
                                            <div class='editor-head'></div>
                                            <div class='editor-body'></div>
                                        </div>
                                    
                                        <button class='save-button' type='button'>speicher</button>
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
            //$user_id = $SESSION["user_id"];
            $user_id = 1;
            $status_id = $_REQUEST["status_id"];
            $category_id = $_REQUEST["category_id"];
            $set->createPost($title,htmlspecialchars($body),htmlspecialchars($desc),$user_id,$status_id,$category_id);
            break;
        case 'delete_post':
            $id = $_REQUEST["id"];
            $set->deletePost($id);
            break;
        case 'edit_post':            
            $title = $_REQUEST["title"];
            $body = $_REQUEST["body"];
            $desc = $_REQUEST["desc"];
            //$user_id = $SESSION["user_id"];
            $user_id = 1;
            $status_id = $_REQUEST["status_id"];
            $category_id = $_REQUEST["category_id"];
            $set->editPost($title,htmlspecialchars($body),htmlspecialchars($desc),$user_id,$status_id,$category_id);
            break;
        case 'tmp_upload':
            $name = $_FILES['file']['name'];

            $dir = "../../../assets/uploads/tmp/".$name;

            $global_div = $dir;
            $imageFileType = pathinfo($dir,PATHINFO_EXTENSION);
        
            $imgType = strtolower(pathinfo($dir,PATHINFO_EXTENSION));
        
            $response = 0;
        
            //size
            if($_FILES["file"]["size"] > 50000){
                echo "File is too big";
                $response = 1;
            }
        
            //type
            if($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "gif"){
                echo "This ile is not an image";
                $response = 1;
            }
        
            //if failed
            if($response == 1){
                echo "There is a problem and post_file is not uploaded";
            }
            
            
            $userid = 2;

        
            if(move_uploaded_file($_FILES['file']['tmp_name'],$dir)){
                $response = $dir;
                $_SESSION['image'] = $dir;
            }

            echo $response;
            exit;
            echo 0;
            break;
        default:
            # code...
            break;
    }
    echo json_encode($result);








