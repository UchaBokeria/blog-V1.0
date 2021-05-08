<?php 
    include_once "../../module.php";
    $act = $_REQUEST["act"];

    //$limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))

    $limit = 10;
    $result = array();
    $result["content"] = "";
    $res = $get->aboutAdmin($limit);

    switch($act){
        case 'SetAdmin':
            $userid = $_REQUEST['userid'];
            $username = $_REQUEST['username']; 
            $description = $_REQUEST['description'];
            $birthdate = $_REQUEST['birthdate'];
            $nickname = $_REQUEST['nickname'];
            $email = $_REQUEST['email'];
            var_dump($description);
            $res = $set->updateAccount($userid,$username,$description,$birthdate,$nickname,$email);

            $result['content'] .= "<p>Good</p>";
            
            break;

        case 'get_posts':
            $res = $get->aboutAdmin($limit);
            foreach ($res as $value) {
                    $result["content"] .= '
                        <div class="left-side-content">
                            <input type="hidden" name="id" id="id" value="'.$value["id"].'">
                            <div class="profile_pic">
                                <img src="assets/uploads/test.jpg" id="user_image">
                            </div>

                            <div class="upload_image">
                                <input type="file" id="file" name="file" />
                                <label for="file"><img src="assets/images/upload.png"></label>
                                <input type="submit" value="Upload" id="but_upload"> 
                            </div>
                            <p>Beschreibung</p>
                            <input type="text" name="description" value="'.$value["description"].'" id="description">
                        </div>
                
                        <div class="right-side-content">
                            <div>
                                <label for="nickname">Benutzer</label>
                                <input type="text" name="ickname"value="'.$value["nickname"].'" durmishxan-id="2" id="Nickname">
                                <i class="material-icons" data-type="done">done</i>
                            </div>
                            
                            <div>
                                <label for="fullname">Vorname Nachname</label>
                                <input type="text" name="fullname" value="'.$value["username"].'" id="Fullname">
                                <i class="material-icons" data-type="error">done</i>
                            </div>
                
                            <div>
                                <label for="Email">Email</label>
                                <input type="text" name="Email" value="'.$value["email"].'" id="Email">
                                <i class="material-icons" data-type="done">done</i>
                            </div>
                
                            <div>
                                <label for="password">Passwort</label>
                                <input type="password" name="password" value="" id="Password">
                                <i class="material-icons" data-type="done">done</i>
                            </div>
                
                            <div>
                                <label for="repassword">Wiederholen</label>
                                <input type="password" name="repassword" id="Repeat">
                                <i class="material-icons" data-type="done">done</i>
                            </div>
                
                            <div>
                                <p>Geburtsdatum</p>
                                <input type="date" name="birthdate" id="birthdate">
                            </div>
                
                            <div>  
                                <button type="button" name="save" class="save" id="saveProfile">Speicher</button>
                                <button type="button" name="discard" class="discard">Abbrechen</button>
                            </div>
                        </div>
                        ';
        }
            break;

    }

    
    
    echo json_encode($result);








