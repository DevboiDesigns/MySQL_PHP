<?php

use function PHPSTORM_META\type;

class Database {
  // Connection & Authentication 
  private $host  = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $dbname = 'testblog';

  // Database handler 
  private $dbh;
  private $error;
  // Statment
  private $stmt;

  // Constructor - create connection 
  public function __construct() {
    // Set DSN - connection string
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

    // Set options
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
    } catch(PDOException $e) {
      $this->error = $e->getMessage();
    }
  }

  // Query
  public function query($query) {
    $this->stmt = $this->dbh->prepare($query);
  }

  // Bind - to bind data
  public function bind($param, $value, $type = null) {
    if(is_null($type)) {
      switch(true) {
        case is_int($value):
        $type = PDO::PARAM_INT;
        break;

        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;

          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;

            default:
            $type = PDO::PARAM_STR;
      }
    }
    $this->stmt->bind($param, $value, $type);
  }

  // Execute bind function
  public function execute() {
    return $this->stmt->execute();
  }

  // Result Set
  public function resultset() {
    $this->execute();
    // ------------------------ fetch associated array 
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}

?>