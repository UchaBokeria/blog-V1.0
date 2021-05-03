<?php 
    include_once "../../module.php";
    $act = $_REQUEST["act"];
    //$limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))

    $limit = 10;
    $result = array();
    $result["content"] = "";
    $res = $get->blog($limit);

    foreach ($res as $value) {
        $result["content"] .= "
            <div class='exhibition-posts' data-id=".$value['id'].">
                <div class='post-text'>
                    <b>".$value['title']."</b>
                    <p>".$value['status']."</p>
                    <p>".$value['createdAt']."</p>
                </div>
                
                <div class='post-edit-delete'>
                    <i class='material-icons blog_edit'  data-id=".$value['id'].">edit</i>
                    <i class='material-icons blog_delete'  data-id=".$value['id'].">delete</i>
                </div>
                <i class='fa fa-angle-down blog_show_more' data-id=".$value['id']."></i>
                
                <div class='blog_post_body' data-id=".$value['id'].">
                ".$value['desc']."
                </div>
            </div>
            
            <div class='edit-window-ajax'  data-id=".$value['id']." >
                <i class='material-icons blog_close-ajax-edit' >close</i>
                <input type='text' name=".$value['title']." value='".$value['title']."'>
                
                <div class='edit-post-type-select'>
                    <i class='fa fa-angle-down blog_edit_post_types'></i>
                    <div data-type='1'>Alle</div>
                    <div data-type='2'>öffentlich</div>
                    <div data-type='3'>Privat</div>
                    <div data-type='4'>Projekt</div>
                </div>
            
                <!-- CKEditor  -->
                <div class='blog_post_body_edit'>".$value['desc']."</div>
            
                <button class='save-button' type='button'>speicher</button>
                <br>
                <button class='cancel-button' type='button'>abbrechen</button>
            </div>";
    }
    
    echo json_encode($result);








