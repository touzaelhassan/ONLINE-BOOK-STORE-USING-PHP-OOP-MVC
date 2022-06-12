<?php

class Publisher
{
  public $id;
  public $name;
  public $address;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function add_publisher()
  {
    $this->db->prepare("INSERT INTO publishers (name, address) VALUES ('$this->name', '$this->address')");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_publishers()
  {
    $this->db->prepare("SELECT * FROM publishers");
    $this->db->execute();
    return $this->db->get_all();
  }

  public function get_publisher_by_id($id)
  {
    $this->db->prepare("SELECT * FROM publishers WHERE id = $id");
    $this->db->execute();
    return $this->db->get_one();
  }

  public function update_publisher()
  {
    $this->db->prepare("UPDATE publishers SET name = '$this->name', address = '$this->address' WHERE id = $this->id");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function delete_publisher()
  {
    $this->db->prepare("DELETE FROM publishers WHERE id = $this->id");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
