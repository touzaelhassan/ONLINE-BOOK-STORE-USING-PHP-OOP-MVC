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
    $this->db->prepare("INSERT INTO publishers (name, address) VALUES (:name, :address)");
    $this->db->bind(':name', $this->name);
    $this->db->bind(':address', $this->address);

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
    $this->db->prepare("SELECT * FROM publishers WHERE id = :id");
    $this->db->bind(':id', $id);
    $this->db->execute();
    return $this->db->get_one();
  }

  public function update_publisher()
  {
    $this->db->prepare("UPDATE publishers SET name = :name, address = :address WHERE id = :id");

    $this->db->bind(':name', $this->name);
    $this->db->bind(':address', $this->address);
    $this->db->bind(':id', $this->id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function delete_publisher()
  {
    $this->db->prepare("DELETE FROM publishers WHERE id = :id");
    $this->db->bind(':id', $this->id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
