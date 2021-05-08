<?php
  class Controller extends Model
  {

    public function login($user,$pwd)
    {

    }

    public function register($user,$pwd,$email,$role)
    {

    }
    
    public function updateAccount($userId,$username,$description,$birth_date,$nickname,$email){
      
      $params = array(
        ["attr"=>$username,"type"=> PDO::PARAM_STR],
        ["attr"=>$description,"type"=> PDO::PARAM_STR],
        ["attr"=>$birth_date,"type"=> PDO::PARAM_STR],
        ["attr"=>$nickname,"type"=> PDO::PARAM_STR],
        ["attr"=>$email,"type"=> PDO::PARAM_STR],
        ["attr"=>$userId,"type"=> PDO::PARAM_INT]
      );
      
      $sql = "UPDATE  accounts
              SET     username = ?,
                      `description` = ?,
                      birth_date = ?,
                      nickname = ?,
                      email = ?
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

    public function editPost($title,$body,$desc,$user_id,$status_id,$category_id){
      $params = array(
        ["attr"=>$title,"type"=> PDO::PARAM_STR ],
        ["attr"=>$body,"type"=> PDO::PARAM_STR ],
        ["attr"=>$desc,"type"=> PDO::PARAM_STR ],
        ["attr"=>$user_id,"type"=> PDO::PARAM_INT],
        ["attr"=>$status_id,"type"=> PDO::PARAM_INT],
        ["attr"=>$category_id,"type"=> PDO::PARAM_INT]
      );

      $sql = "UPDATE posts 
                SET `title` 			= ?,
                    `body`				= ?,
                    `desc` 				= ?,
                    `user_id` 		= ?,
                    `status_id` 	= ?,
                    `category_id` = ?,
                    `updatedAt`	 	= NOW();";

      return $this->set($sql,$params);
      
    }

    public function deletePost($id,$restorable = true){
      $params = array( ["attr"=>$id,"type"=> PDO::PARAM_INT ] );

      if($restorable){
        $sql = "UPDATE posts 
                  SET `activated` 			= 0,
                      `updatedAt`	 	= NOW()
                WHERE id = ?;";
      }
      else
        $sql = "DELETE FROM posts WHERE id = ?";
      return $this->set($sql,$params);
    }
  }
