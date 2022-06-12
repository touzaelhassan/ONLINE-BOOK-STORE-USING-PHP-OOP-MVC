<?php

class Author
{

  public $id;
  public $name;
  public $email;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function add_author()
  {
    $this->db->prepare("INSERT INTO authors (name, email) VALUES ('$this->name', '$this->email')");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_authors()
  {
    $this->db->prepare("SELECT * FROM authors");
    $this->db->execute();
    return $this->db->get_all();
  }

  public function get_author_by_id($id)
  {
    $this->db->prepare("SELECT * FROM authors WHERE id = $id");
    $this->db->execute();
    return $this->db->get_one();
  }


  public function update_author()
  {
    $this->db->prepare("UPDATE authors SET name = '$this->name', email = '$this->email' WHERE id = $this->id");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function delete_author()
  {
    $this->db->prepare("DELETE FROM authors WHERE id = $this->id");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
