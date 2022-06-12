<?php

class Book
{

  public $id;
  public $category_id;
  public $publisher_id;
  public $author_id;
  public $title;
  public $description;
  public $image;
  public $price;
  public $copies;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function add_book()
  {
    $this->db->prepare("INSERT INTO books (category_id, publisher_id, author_id, title, description, image, price, copies) VALUES ('$this->category_id', '$this->publisher_id', '$this->author_id', '$this->title', '$this->description', '$this->image', '$this->price', '$this->copies')");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
