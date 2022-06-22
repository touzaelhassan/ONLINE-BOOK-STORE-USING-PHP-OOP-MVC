<?php

class Category
{
  public $id;
  public $name;
  public $description;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function add_category()
  {
    $this->db->prepare("INSERT INTO categories (name, description) VALUES (:name, :description)");
    $this->db->bind(':name', $this->name);
    $this->db->bind(':description', $this->description);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_categories()
  {
    $this->db->prepare("SELECT * FROM categories");
    $this->db->execute();
    return $this->db->get_all();
  }

  public function get_category_by_id($id)
  {
    $this->db->prepare("SELECT * FROM categories WHERE id = :id");
    $this->db->bind(':id', $id);
    $this->db->execute();
    return $this->db->get_one();
  }

  public function update_category()
  {
    $this->db->prepare("UPDATE categories SET name = :name, description = :description WHERE id = :id");
    
    $this->db->bind(':id', $this->id);
    $this->db->bind(':name', $this->name);
    $this->db->bind(':description', $this->description);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function delete_category()
  {
    $this->db->prepare("DELETE FROM categories WHERE id = :id");
    $this->db->bind(':id', $this->id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
