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

  public function pages(){
    $sql = "SELECT 	pages.dir,
                    pages.title,
                    pages.menu_name
            FROM 		pages 
            WHERE 	pages.activated != 0; ";
    return $this->getAll($sql);
  }
  
  public function filter($limit,$filterParams,$category_id){
    $param = array( ["attr"=>'%' . $filterParams["searchWord"] . '%',"type"=>PDO::PARAM_STR],
                    ["attr"=>$filterParams["start_date"] . " 00:00","type"=>PDO::PARAM_STR],
                    ["attr"=>$filterParams["end_date"] . " 23:59",  "type"=>PDO::PARAM_STR],
                    ["attr"=>$category_id,  "type"=>PDO::PARAM_INT] );

    $filter = " AND posts.title LIKE ? AND posts.createdAt BETWEEN ? AND ? AND posts.category_id IN(?) ";
    if($filterParams["status"] != 1){
      array_push($param,["attr"=>$filterParams["status"],    "type"=>PDO::PARAM_INT]);
      $filter .= "  AND posts.status_id = ? ";
    }
    $filter .=" GROUP BY posts.id";
                
    $sql = "SELECT  posts.id,
                    accounts.profile_pic,
                    accounts.nickname,
                    posts.title,
                    posts.`desc`,
                    posts.createdAt,
                    `status`.title AS `status`,
                    posts.status_id AS `status_id`,
                    CONCAT(files.dir,file_types.extension) AS path
                    
                  FROM
                    posts
                    JOIN accounts ON posts.user_id = accounts.id
                    LEFT JOIN files ON files.post_id = posts.id
                    LEFT JOIN file_types ON files.type_id = file_types.id
                    LEFT JOIN `status` ON `status`.id = posts.status_id
                  WHERE posts.activated = 1 " . $filter;
    //echo $sql;
    return $this->get($sql,$param);
  }

  public function home($limit="",$id=""){
    if($limit == ""){
      $limit = 1;
    }
    if($id == ""){
      $param = array(["attr"=>$limit,"type"=>PDO::PARAM_INT]);
      $sql = "SELECT    posts.id,
                        accounts.profile_pic,
                        accounts.nickname,
                        posts.title,
                        posts.`desc`,
                        posts.createdAt,
                        `status`.title AS `status`,
                        posts.status_id AS `status_id`,
                        GROUP_CONCAT(CONCAT(files.dir,file_types.extension)) AS `path`
                      FROM
                        posts
                        JOIN      accounts ON posts.user_id = accounts.id
                        LEFT JOIN files ON files.post_id = posts.id
                        LEFT JOIN file_types ON files.type_id = file_types.id
                        LEFT JOIN `status` ON `status`.id = posts.status_id
                      WHERE     category_id = 1 AND posts.activated = 1
                        GROUP BY  posts.id
                        ORDER BY  posts.createdAt DESC
                        LIMIT ? ";
    }
    else{
      $param = array(["attr"=>$id,"type"=>PDO::PARAM_INT]);

      $sql = "SELECT  posts.id,
                      accounts.profile_pic,
                      accounts.nickname,
                      posts.title,
                      posts.`desc`,
                      posts.createdAt,
                      `status`.title AS `status`,
                      posts.status_id AS `status_id`,
                      GROUP_CONCAT(CONCAT(files.dir,file_types.extension)) AS `path`
                      
                    FROM
                      posts
                      JOIN accounts ON posts.user_id = accounts.id
                      LEFT JOIN files ON files.post_id = posts.id
                      LEFT JOIN file_types ON files.type_id = file_types.id
                      LEFT JOIN `status` ON `status`.id = posts.status_id
                    WHERE
                      category_id = 1 AND posts.activated = 1 AND posts.id = ? GROUP BY posts.id";

    }
    return $this->get($sql,$param);
  }

  public function blog($limit=1){
    if($limit == ""){
      $limit = 1;
    }
    $param = array(["attr"=>$limit,"type"=>PDO::PARAM_INT]);
    $sql = "SELECT  posts.id,
                    accounts.profile_pic,
                    accounts.nickname,
                    posts.title,
                    posts.`desc`,
                    posts.createdAt,
                    `status`.title AS `status`,
                    GROUP_CONCAT(CONCAT(files.dir,file_types.extension)) AS `path`
                    
                  FROM
                    posts
                    JOIN accounts ON posts.user_id = accounts.id
                    LEFT JOIN files ON files.post_id = posts.id
                    LEFT JOIN file_types ON files.type_id = file_types.id
                    LEFT JOIN `status` ON `status`.id = posts.status_id
                  WHERE
                    category_id = 2 AND posts.activated = 1
                  GROUP BY  
                    posts.id
                  ORDER BY
                    posts.createdAt DESC
                  LIMIT ? ";
    return $this->get($sql,$param);
  }
    public function about(){
      $sql = "SELECT	users.id,
                      users.nickname,
                      users.profile_pic,
                      GROUP_CONCAT(roles.`name`) AS role,
                      users.description AS `desc`
                FROM 		account_roles 
                LEFT JOIN 		accounts AS users ON users.id = account_roles.user_id
                LEFT JOIN 		role_details AS roles ON account_roles.role_id = roles.id
                GROUP BY account_roles.user_id
                ";
      return $this->getAll($sql);
    }

    public function aboutAdmin($limit=1){
      $sql = "SELECT  accounts.profile_pic, 
                      accounts.id,
                      accounts.username,  
                      accounts.description, 
                      DATE(accounts.birth_date) AS birth_date, 
                      accounts.nickname, 
                      accounts.email,
                      accounts.password
              FROM accounts
              WHERE accounts.id = 2
              ";
      return $this->getAll($sql);
    }

    public function StatusList($except){
      if($except == ""){
        $sql = "SELECT  * FROM status";
        return $this->getAll($sql);
      }
      else{
        $param = array(["attr"=>$except,"type"=>PDO::PARAM_INT]);
        $sql = "SELECT  * FROM status WHERE id NOT IN(?,1) AND activated = 1";
        return $this->get($sql,$param);
      }
    }
  }