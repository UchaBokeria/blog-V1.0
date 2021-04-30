<?php
    include "../module.php";
    $result = "I am empty";
    
    $act = $_REQUEST["act"];
    $getter = $_REQUEST["getter"];
    $limit = $_REQUEST["limit"];

    // check ajax request
    if($act == "")
        $result = " No act injected ";
    if($getter == "")
        $result = " No getter injected ";
    if($limit == "")
        $limit = 10;
    
    switch ($act) {
        case 'get_chat':    
            $resultArr = $get->chat($getter,$limit);

            $html = "";
            foreach ($resultArr as $value) {
                $bool = ($value["sender_id"] == 1);
                $html .= '<div class="msg" style="text-align:';
                $html .= ( $bool ? 'left' : 'right') . ';"><img src="';
                $html .= $value["sender_pic"] . '"><p class="body">' . $value["body"] . '</p>
                <div class="date-tooltip" style="' . ($bool ? 'left:6vw' : 'right:6vw') . ';"> 
                ' . $value["createdAt"] . ' </div></div>';
            }

            $result = $html;
            break;
        case 'get_members':
            $resultArr = $get->friends();

            // some html
            break;
        case 'send_chat':
            # code...
            break;
        
        default:
            $result = " act injected as default ";
            break;
    }

    // fetch the result
    echo ($result);