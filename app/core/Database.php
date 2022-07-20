<?php

class Database {

  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;

  public function connect()
  {
    $conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    return $conn;
  }

}
