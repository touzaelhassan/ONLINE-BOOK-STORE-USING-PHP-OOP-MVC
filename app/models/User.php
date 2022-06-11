<?php

class User
{

  public $db;

  public $id;
  public $name;
  public $email;
  public $password;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function create_user()
  {
    $this->db->prepare("INSERT INTO users (name, email, password) VALUES ('$this->name', '$this->email', '$this->password')");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function login($email, $password)
  {
    $this->db->prepare("SELECT * FROM users WHERE email = '$email'");
    $this->db->execute();
    $user = $this->db->get_one();


    if (password_verify($password, $user->password)) {
      return $user;
    } else {
      return false;
    }
  }
}
