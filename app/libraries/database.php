<?php

class Database
{
  private $db_host = 'localhost';
  private $db_name = 'online_book_store';
  private $db_user = 'root';
  private $db_password = '';

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

  public function prepare($sql)
  {
    return $this->stmt = $this->connection->prepare($sql);
  }

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
}
