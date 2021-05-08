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
  }
