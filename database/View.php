<?php
  class View extends Model
  {
    public function chat($getter,$limit){
      $sender = 1;

      $params = array(
        ["attr"=>$sender,"type"=> PDO::PARAM_INT],
        ["attr"=>$getter,"type"=> PDO::PARAM_INT],
        ["attr"=>$getter,"type"=> PDO::PARAM_INT],
        ["attr"=>$sender,"type"=> PDO::PARAM_INT],
        ["attr"=>$limit ,"type"=> PDO::PARAM_INT]
      );
      $sql = "SELECT            sender.id AS sender_id,
                                getter.id AS getter_id,
                                sender.`username` AS sender,
                                sender.`profile_pic` AS sender_pic,
                                senderGenders.`name` AS sender_gender,
                                getter.`username` AS getter,
                                getter.`profile_pic` AS getter_pic,
                                getterGenders.`name` AS getter_gender,
                                chat.`title`,
                                chat.body,
                                chat.createdAt AS createdAt,
                                chat.seen
                    FROM        live_chat AS chat
                    JOIN        users AS sender ON sender.id = chat.sender_id
                    JOIN        users AS getter ON getter.id = chat.getter_id
                    LEFT JOIN   gender as senderGenders ON sender.gender_id = senderGenders.id
                    LEFT JOIN   gender as getterGenders ON getter.gender_id = getterGenders.id 
                    WHERE       (sender.id = ? AND getter.id = ?) OR 
                                (sender.id = ? AND getter.id = ?)
                    ORDER BY chat.createdAt DESC 
                    LIMIT ? ";
      return $this->get($sql,$params);
    }
    public function friends(){

    }
  }
