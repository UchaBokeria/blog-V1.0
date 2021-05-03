<?php 
    include_once "../../module.php";
    $act = $_REQUEST["act"];
    //$limit = $_REQUEST["post_limit"];
    // if(!isset($_REQUEST["post_limit"]))

    $limit = 10;
    $result = array();
    $result["content"] = "";
    $res = $get->aboutAdmin($limit);

    foreach ($res as $value) {
        $result["content"] .= "
        <div class='left-side-content'>
            <div>
                <img src='assets/images/profile.png' id='profile_pic'>
                <img src='assets/images/upload.png' id='upload'>
            </div>
            <p>Beschreibung</p>
            <input type='text' value='".$value['description']."'>
        </div>

        <div class='right-side-content'>
            <div>
                <label for='nickname'>Benutzer</label>
                <input type='text' name='nickname' value='".$value['nickname']."' class='Nickname'>
                <i class='material-icons' data-type='done'>done</i>
            </div>
            
            <div>
                <label for='fullname'>Vorname Nachname</label>
                <input type='text' name='fullname' value='".$value['username']."' class='Fullname'>
                <i class='material-icons' data-type='error'>done</i>
            </div>

            <div>
                <label for='Email'>Email</label>
                <input type='text' name='Email' value='".$value['email']."' class='Email'>
                <i class='material-icons' data-type='done'>done</i>
            </div>

            <div>
                <label for='password'>Passwort</label>
                <input type='password' name='password' value='' class='Password'>
                <i class='material-icons' data-type='done'>done</i>
            </div>

            <div>
                <label for='repassword'>Wiederholen</label>
                <input type='password' name='repassword' class='Repeat'>
                <i class='material-icons' data-type='done'>done</i>
            </div>

            <div>
                <p>Geburtsdatum</p>
                <input type='date' name='birthdate' class='birthdate'>
            </div>

            <div>
                <button type='button' name='save' class='save'>Speicher</button>
                <button type='button' name='discard' class='discard'>Abbrechen</button>
            </div>
        </div>
        ";
    }
    
    echo json_encode($result);








