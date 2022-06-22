<?php

class User
{

  public $id;
  public $name;
  public $email;
  public $password;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function get_users()
  {
    $this->db->prepare("SELECT * FROM users");
    $this->db->execute();
    return $this->db->get_all();
  }

  public function create_user()
  {
    $this->db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");

    $this->db->bind(':name', $this->name);
    $this->db->bind(':email', $this->email);
    $this->db->bind(':password', $this->password);

    if ($this->db->execute()) {
      $this->id = $this->db->last_id();
      return true;
    } else {
      return false;
    }
  }

  public function delete_user()
  {
    $this->db->prepare("DELETE FROM users WHERE id = :id");
    $this->db->bind(':id', $this->id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function login($email, $password)
  {
    $this->db->prepare("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $this->db->execute();
    $user = $this->db->get_one();

    if ($user) {
      if (password_verify($password, $user->password)) {
        return $user;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
