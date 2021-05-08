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
            $birth_date = $_REQUEST['birth_date'];
            $nickname = $_REQUEST['nickname'];
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];
            echo $birth_date;
            $res = $set->updateAccount($userid,$username,$description,$birth_date,$nickname,$email); //passord unda gaetanos da sheicvalos

            $result['content'] .= "<p>Good</p>";
            
            break;

        case 'get_posts':
            $res = $get->aboutAdmin($limit);
            foreach ($res as $value) {
                    $result["content"] .= '
                        <div class="left-side-content">
                            <input type="hidden" name="id" id="id" value="'.$value["id"].'">

                            <div class="upload_image">
                                <div class="upload_form">                                
                                    <input type="file" id="file" name="file" />
                                    <label for="file"><img src="assets/images/upload.png"></label>
                                </div>

                                <div class="profile_pic">
                                    <img src="assets/uploads/test.jpg" id="user_image">
                                </div>
                            </div>

                            <p>Beschreibung</p>
                            <textarea type="text" name="description"  id="description">'.$value["description"].'</textarea>
                        </div>
                
                        <div class="right-side-content">
                            <div>
                                <label for="nickname">Benutzer</label>
                                <input type="text" name="ickname"value="'.$value["nickname"].'"  id="Nickname" data-name="Nickname">
                                <i class="material-icons" data-type="done" data-name="Nickname">done</i>
                            </div>
                            
                            <div>
                                <label for="fullname">Vorname Nachname</label>
                                <input type="text" name="fullname" value="'.$value["username"].'" id="Fullname">
                                <i class="material-icons" data-type="error">done</i>
                            </div>
                
                            <div>
                                <label for="Email">Email</label>
                                <input type="text" name="Email" value="'.$value["email"].'" id="Email" data-name="Email">
                                <i class="material-icons" data-type="done" data-name="Email">done</i>
                            </div>
                
                            <div>
                                <label for="password">Passwort</label>
                                <input type="text" name="password" value="'.$value["password"].'" id="Password" data-name="Password">
                                <i class="material-icons" data-type="done" data-name="Password">done </i>
                            </div>
                
                            <div id="pas_repeat">
                                <label for="repassword">Wiederholen</label>
                                <input type="password" name="repassword" id="Repeat">
                                <i class="material-icons" data-type="done">done</i>
                            </div>
                
                            <div>
                                <p>Geburtsdatum</p>
                                <input type="date" name="birthdate" value="'.$value["birth_date"].'" id="birthdate">
                            </div>
                            <p  id="alert_text">Fields are not ready to update</p>
                            <div>  
                                <button type="button" name="save" class="save" id="saveProfile">Speicher</button>
                                <button type="button" name="discard" class="discard">Abbrechen</button>
                            </div>
                        </div>
                        ';
            }
            break;
        case 'upload_image':
            if(isset($_FILES['file']['name'])){
                $name = $_FILES['file']['name'];
            
                $dir = "../../../assets/uploads/".$name;
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
                    echo "There is a problem and file is not uploaded";
                }
                
                $get_image = $get->aboutAdmin(1);
                
                $userid = 2;
            
                foreach($get_image as $value){
                    $img_var =  $value["profile_pic"]; //aq vigeb dbshi ra qvia img(tu ra tqma unda carieli araa);
                }
            
                if(empty($img_var)){ //Tu DB shi profile_pic ari carieli mashin sheva ifshi da dbshic atvirtavs da foldershic chaagdebs
                    $set->uppdateAccountPicutre($userid,$name);
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$dir)){
                        $response = $dir;
                    }
                }
                else{ // Tu db shi aris profile_pic mashin assetshi sheva mag profile picis name rasac aq washlis da magis names daarqmevs axal potos 
                    $dir = "../../../assets/uploads/".$img_var;
                    if(file_exists($dir)){
                        unlink($dir);
                        $response = $dir;
                    }
                    move_uploaded_file($_FILES['file']['tmp_name'],$dir);
                    $response = $dir;
                    
                }
                echo $response;
                exit;
            }
            echo 0;
            break;
        case 'tmp_upload':
            $name = $_FILES['file']['name'];
        
            $dir = "../../../assets/uploads/tmp/".$name;
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
                echo "There is a problem and file is not uploaded";
            }
            
            
            $userid = 2;

        
            if(move_uploaded_file($_FILES['file']['tmp_name'],$dir)){
                $response = $dir;
            }

            echo $response;
            exit;
            echo 0;
            break;
    }

    
    
    echo json_encode($result);








