<?php 
    include_once "../../module.php";
    $act = $_REQUEST["act"];
    //$limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))

    $limit = 10;
    $result = array();
    $result["content"] = "";
    $result["error"] = "";

    switch ($act) {
        case 'get_posts':
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
                                        <input type='text' name=".$value['title']." value='".$value['title']."'>
                                        
                                        <div class='edit-post-type-select'>
                                            <i class='fa fa-angle-down ' id='edit_post_types' style='top:1vh;'></i>";
                
                $selectedCategory = " hey i am empty cuz i was bron as error";
                $selectedCategory = " <div data-type='" .$value["category_id"]. "' id='activated'>öffentlich</div>";
                for ($i=1; $i < 5; $i++) { 
                    
                }


                $result["content"].= $selectedCategory;                          
                $result["content"].="   </div>
                                    
                                        <!-- CKEditor  -->
                                        <div class='post_body_edit' data-id='".$value['id']."'>
                                            <div class='editor-head' data-id=".$value['id']."></div>
                                            <div class='editor-body' data-id=".$value['id']." id='text_fix_cke'>" .htmlspecialchars_decode($value["desc"]). "</div>
                                        </div>
                                    
                                        <button class='save-button'   type='button' id='".$value['id']."'>speicher</button>
                                        <br>
                                        <button class='cancel-button' type='button'>abbrechen</button>
                                    </div>";
            }
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
            break;
   
        default:
            # code...
            break;
    }
    echo json_encode($result);








