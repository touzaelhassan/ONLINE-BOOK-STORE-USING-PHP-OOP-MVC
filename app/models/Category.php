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
    $this->db->prepare("INSERT INTO categories (name, description) VALUES ('$this->name', '$this->description')");
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
}
