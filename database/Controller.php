<?php
  class Controller extends Model{
    public function login($username,$password){
      $sql = "SELECT token, `password`, id from accounts WHERE username = ? ;";
      $param = array(["attr"=>$username,"type"=>PDO::PARAM_STR]);

      $results = $this->get($sql,$param);
      foreach ($results as $value)
        return  password_verify($password, $value["password"]) ? 
                ["token"=>$value["token"], "user_id"=>$value["id"], "result"=> true] : 
                ["token"=>0, "result"=> false] ;
    }

    public function register($user,$pwd){
      $password = password_hash($pwd,PASSWORD_DEFAULT);
      $token = "";

      while(true){
        //$token = bin2hex(random_bytes(32));

        $sql = "SELECT id FROM accounts WHERE token = ?";
        $param = array(["attr"=>$token,"type"=>PDO::PARAM_STR]);

        $resCount = $this->get($sql,$param);
        if(COUNT($resCount) < 1)
          break;
      }

      $sql = "INSERT INTO accounts SET username=?,password=?,token=?;";
      $param = array(["attr"=>$user,"type"=>PDO::PARAM_STR], 
                     ["attr"=>$password,"type"=>PDO::PARAM_STR], 
                     ["attr"=>$token,"type"=>PDO::PARAM_STR]);

      $this->set($sql,$param);
    }
    public function checkToken($token){
      $param = array(["attr"=>$token,"type"=>PDO::PARAM_STR]);
      $sql = "SELECT token FROM accounts WHERE token = ?";
      $res = $this->get($sql,$param);
      return COUNT($res) != 1 ? false : true;
    }
    public function updateAccount($userId,$username,$description,$birth_date,$nickname,$email,$password){
      $password_change = "";
      $params = array(
        ["attr"=>$username,"type"=> PDO::PARAM_STR],
        ["attr"=>$description,"type"=> PDO::PARAM_STR],
        ["attr"=>$birth_date,"type"=> PDO::PARAM_STR],
        ["attr"=>$nickname,"type"=> PDO::PARAM_STR],
        ["attr"=>$email,"type"=> PDO::PARAM_STR]
      );
      if($password != ""){
        $password = password_hash($password, PASSWORD_DEFAULT);
        array_push($params,["attr"=>$password,"type"=> PDO::PARAM_STR]);
        $password_change = ",`password` = ?";
      }

      array_push($params,["attr"=>$userId,"type"=> PDO::PARAM_INT]);
      $sql = "UPDATE  accounts
              SET     username = ?,
                      `description` = ?,
                      birth_date = ?,
                      nickname = ?,
                      email = ?
                      $password_change
              WHERE accounts.id = ?
              ";
      return $this->set($sql,$params);
    }
    public function uppdateAccountPicutre($userId,$profile_picture){

      $params = array(
        ["attr"=>$profile_picture,"type"=> PDO::PARAM_STR],
        ["attr"=>$userId,"type"=> PDO::PARAM_INT],
      );

      $sql = "UPDATE  accounts
              SET     profile_pic = ?
              WHERE   accounts.id = ?
              ";

      return $this->set($sql,$params);
    }
    public function createPost($title,$body,$desc,$user_id,$status_id,$category_id){

      $params = array(
        ["attr"=>$title,"type"=> PDO::PARAM_STR ],
        ["attr"=>$body,"type"=> PDO::PARAM_STR ],
        ["attr"=>$desc,"type"=> PDO::PARAM_STR ],
        ["attr"=>$user_id,"type"=> PDO::PARAM_INT],
        ["attr"=>$status_id,"type"=> PDO::PARAM_INT],
        ["attr"=>$category_id,"type"=> PDO::PARAM_INT]
      );

      $sql = "INSERT INTO posts 
                SET `title` 			= ?,
                    `body`				= ?,
                    `desc` 				= ?,
                    `user_id` 		= ?,
                    `status_id` 	= ?,
                    `category_id` = ?,
                    `createdAt`	 	= NOW();";

      return $this->set($sql,$params);
    }
    public function editPost($post_id,$title,$body,$desc,$user_id,$status_id,$category_id){
      $params = array(
        ["attr"=>$title,"type"=> PDO::PARAM_STR ],
        ["attr"=>$body,"type"=> PDO::PARAM_STR ],
        ["attr"=>$desc,"type"=> PDO::PARAM_STR ],
        ["attr"=>$user_id,"type"=> PDO::PARAM_INT],
        ["attr"=>$status_id,"type"=> PDO::PARAM_INT],
        ["attr"=>$category_id,"type"=> PDO::PARAM_INT],
        ["attr"=>$post_id,"type"=> PDO::PARAM_INT]
      );

      $sql = "UPDATE posts 
                SET `title` 			= ?,
                    `body`				= ?,
                    `desc` 				= ?,
                    `user_id` 		= ?,
                    `status_id` 	= ?,
                    `category_id` = ?,
                    `updatedAt`	 	= NOW()
              WHERE id = ?";

      return $this->set($sql,$params);
      
    }
    public function deletePost($id,$restorable = true){
      $params = array( ["attr"=>$id,"type"=> PDO::PARAM_INT ] );

      if($restorable){
        $sql = "UPDATE posts 
                  SET `activated` 			= 0,
                      `updatedAt`	 	= NOW()
                WHERE  id = ?;";
      }
      else
        $sql = "DELETE FROM posts WHERE id = ?";
      return $this->set($sql,$params);
    }
    public function addImage($dir,$post_id){
      $params = array(
        ["attr"=>$dir,"type"=> PDO::PARAM_STR],
        ["attr"=>$post_id,"type"=> PDO::PARAM_INT]
      );

      $sql = "INSERT INTO files(dir,post_id)
              VALUE(?,?)";
      
      return $this->set($sql,$params);
    }
    
    public function delImage($name){
      $params = array(
        ["attr"=>$name,"type"=> PDO::PARAM_STR ]
      );

      $sql = "DELETE FROM files WHERE dir = ?";
      
      return $this->set($sql,$params);
    }
  }
