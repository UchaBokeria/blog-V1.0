<?php
  class DBH
  {
    // private $DBhost = "localhost";
    // private $DBuser = "root";
    // private $DBpwd = "";
    // private $DBname = "api";
    // private $DBport = "3306";
    private $DBhost = "out27.keliweb.com";
    private $DBuser = "udkedhjd_dev";
    private $DBpwd = 'as@$asfaskjpjAFaks2';
    private $DBname = "udkedhjd_A7TETE12";
    private $DBport = "3306";

    protected function connect()
    {
      $conn = null;
      try {
        $conn = new PDO("mysql:host=" . $this->DBhost . ";dbname=" . $this->DBname,$this->DBuser,$this->DBpwd);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

      } catch (PDOException $e) {
        echo "<br><br> !!!! > Connection error in Database.php < !!!! <br><br>" . $e->getMessage();
      }

      return $conn;
    }
  }