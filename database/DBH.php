<?php
  class DBH
  {
    // // // SO THIS IS PIZZI CONF
    // private $DBhost = "out27.keliweb.com";
    // private $DBuser = "udkedhjd_dev";
    // private $DBpwd = 'as@$asfaskjpjAFaks2';
    // private $DBname = "udkedhjd_test";
    // private $DBport = "3306";

    // // // SO THIS IS VULVENTEMPEL HOSTINGER CONF NEW!!!!
    // private $DBhost = "nl-srv-web447.main-hosting.eu";
    // private $DBuser = "u205928446_WacheDesTemp";
    // private $DBpwd = 'MsDZ1G#AF1sA$as1';
    // private $DBname = "u205928446_Blog";
    // private $DBport = "3306";

    // // // FOR TESTING VULVENTEMPEL HOSTINGER CONF NEW!!!!
    private $DBhost = "nl-srv-web447.main-hosting.eu";
    private $DBuser = "u205928446_test";
    private $DBpwd = 'MsDZ1G#AF1sA$as1';
    private $DBname = "u205928446_Testing_space";
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