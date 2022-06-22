<?php

class Database
{
  private $db_host = DB_HOST;
  private $db_name = DB_NAME;
  private $db_user = DB_USER;
  private $db_password = DB_PASSWORD;

  private $connection;
  private $stmt;
  private $error;

  public function __construct()
  {
    $dsn = "mysql:host=$this->db_host;dbname=$this->db_name";
    try {
      $this->connection = new PDO($dsn, $this->db_user, $this->db_password);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }

  // prepare statement is used to prepare the sql statement for execution and returns a statement object which can be used to execute the statement later. 
  public function prepare($sql)
  {

    return $this->stmt = $this->connection->prepare($sql);
  }

  // bindValue() is used to bind a value to a parameter it's alternative way to pass data to the database. Instead of putting data directly into SQL query
  public function bind($param, $value)
  {
    $this->stmt->bindValue($param, $value,);
  }

  // execute() is used to execute the prepared statement. 
  public function execute()
  {
    return $this->stmt->execute();
  }

  public function get_all()
  {
    return $this->stmt = $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function get_one()
  {
    return $this->stmt = $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function last_id()
  {
    return $this->connection->lastInsertId();
  }
}
