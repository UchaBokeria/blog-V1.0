<?php
  session_start();
  class View extends Model{
    public function pages(){
      $sql = "SELECT 	pages.dir,
                      pages.title,
                      pages.menu_name
              FROM 		pages 
              WHERE 	pages.activated = 1; ";
      return $this->getAll($sql);
    }
    
    public function filter($category_id, $filterParams, $user_id){
      $filter = " AND posts.category_id IN(?) ";
      $param = array( ["attr"=>$category_id,  "type"=>PDO::PARAM_INT]);

      array_push($param,["attr"=>'%' . $filterParams["searchWord"] . '%', "type"=>PDO::PARAM_STR]);
      array_push($param,["attr"=>$filterParams["start_date"] . " 00:00",  "type"=>PDO::PARAM_STR]);
      array_push($param,["attr"=>$filterParams["end_date"] . " 23:59",    "type"=>PDO::PARAM_STR]);

      $filter .= " AND posts.title LIKE ? AND posts.createdAt BETWEEN ? AND ?  ";

      if($filterParams["status"] != 1){
        array_push($param,["attr"=>$filterParams["status"], "type"=>PDO::PARAM_INT]);
        $filter .= "  AND posts.status_id = ? ";
      }

      if($user_id != ""){
        array_push($param,["attr"=>$user_id, "type"=>PDO::PARAM_INT]);
        $filter .= "  AND posts.user_id = ? ";
      }   

      $sql = "SELECT      posts.id,
                          accounts.profile_pic,
                          accounts.nickname,
                          posts.title,
                          posts.body,
                          posts.`desc`,
                          posts.createdAt,
                          `status`.title AS `status`,
                          posts.status_id AS `status_id`,
                          GROUP_CONCAT(files.dir) AS `path`
                FROM      posts
                JOIN      accounts ON posts.user_id = accounts.id
                LEFT JOIN files ON files.post_id = posts.id
                LEFT JOIN `status` ON `status`.id = posts.status_id AND `status`.activated = 1
                WHERE     posts.activated = 1 $filter
                GROUP BY  posts.id
                ORDER BY  posts.createdAt DESC ";

      return $this->get($sql,$param);
    }

    public function posts($category_id,$post_id = "",$user_id = ""){
      $filter = "";

      // blog or home
      $param = array(["attr"=>$category_id,"type"=>PDO::PARAM_INT]);
      $filter .= " AND posts.category_id = ? ";

      // get all posts or only mine
      if($user_id != ""){
        array_push($param,["attr"=>$user_id,"type"=>PDO::PARAM_INT]);
        $filter .= " AND posts.user_id = ? ";
      }
      else{
        $public_status = 2; // public status in db
        array_push($param,["attr"=>$public_status,"type"=>PDO::PARAM_INT]);
        $filter .= " AND posts.status_id = ? ";
      }

      // get post details
      if($post_id != ""){
        array_push($param,["attr"=>$post_id,"type"=>PDO::PARAM_INT]);
        $filter .= " AND posts.id = ? ";
      }
      
      $sql = "SELECT      posts.id,
                          accounts.profile_pic,
                          accounts.nickname,
                          posts.title,
                          posts.body,
                          posts.`desc`,
                          posts.createdAt,
                          `status`.title AS `status`,
                          posts.status_id AS `status_id`,
                          GROUP_CONCAT(files.dir) AS `path`
                FROM      posts
                JOIN      accounts ON posts.user_id = accounts.id
                LEFT JOIN files ON files.post_id = posts.id
                LEFT JOIN `status` ON `status`.id = posts.status_id AND `status`.activated = 1
                WHERE     posts.activated = 1 $filter
                GROUP BY  posts.id
                ORDER BY  posts.createdAt DESC ";
      return $this->get($sql,$param);
    }

    public function about(){
      $sql = "SELECT	    users.id,
                          users.nickname,
                          users.profile_pic,
                          GROUP_CONCAT(roles.`name`) AS role,
                          users.description AS `desc`
                FROM 		  account_roles 
                LEFT JOIN accounts AS users ON users.id = account_roles.user_id
                LEFT JOIN role_details AS roles ON account_roles.role_id = roles.id
                WHERE     users.activated = 1
                GROUP BY  account_roles.user_id ";
      return $this->getAll($sql);
    }

    public function aboutAdmin(){
      $param = array(["attr"=>$_SESSION["user_id"],"type"=>PDO::PARAM_INT]);
      $sql = "SELECT  accounts.profile_pic, 
                      accounts.id,
                      accounts.username,  
                      accounts.description, 
                      DATE(accounts.birth_date) AS birth_date, 
                      accounts.nickname, 
                      accounts.email,
                      accounts.password
              FROM    accounts
              WHERE   accounts.id = ? ";
              
      return $this->get($sql,$param);
    }

    public function StatusList($except){
      if($except == ""){
        $sql = "SELECT  * FROM status WHERE activated = 1;";
        return $this->getAll($sql);
      }
      else{
        $param = array(["attr"=>$except,"type"=>PDO::PARAM_INT]);
        $sql = "SELECT  * FROM status WHERE id NOT IN(?,1) AND activated = 1";
        return $this->get($sql,$param);
      }
    }

    public function getPostId($title){
      
      $param = array(["attr"=>$title,"type"=>PDO::PARAM_INT]);

      $sql =" SELECT id
              FROM posts
              WHERE posts.title = ?";

      return $this->get($sql,$param);
    }
  }