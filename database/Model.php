<?php
  class Model extends DBH
  {
    protected function get($sql,$params){
      $stmt = $this->connect()->prepare($sql);
      $length = count($params);

      for ($i=0,$bindInd=0; $i < $length; $i++) {
        $bindInd++;
        $stmt->bindParam($bindInd, $params[$i]["attr"], $params[$i]["type"]);
      }
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    protected function getAll($sql){
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    protected function set($sql,$params){
      $stmt = $this->connect()->prepare($sql);
      $length = count($params);

      for ($i=0,$bindInd=0; $i < $length; $i++) {
        $bindInd++;
        $stmt->bindParam($bindInd, $params[$i]);
      }
      $stmt->execute();
    }
  }
