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

  public function get_books()
  {
    $this->db->prepare("SELECT books.*, categories.*, publishers.*, authors.*, books.id as `book_id`, books.description as `book_description`,categories.id as `category_id`, categories.name as `category_name`, categories.description as `category_description`,publishers.id as `publisher_id`, publishers.name as `publisher_name`, publishers.address as `publisher_address`,authors.id as `author_id`, authors.name as `author_name` FROM books INNER JOIN categories ON categories.id = books.category_id INNER JOIN publishers ON publishers.id = books.publisher_id INNER JOIN authors ON authors.id = books.author_id LIMIT 6
    ");
    $this->db->execute();
    return $this->db->get_all();
  }

  public function get_book($id)
  {
    $this->db->prepare("SELECT books.*, categories.*, publishers.*, authors.*, books.id as `book_id`, books.description as `book_description`,categories.id as `category_id`, categories.name as `category_name`, categories.description as `category_description`,publishers.id as `publisher_id`, publishers.name as `publisher_name`, publishers.address as `publisher_address`,authors.id as `author_id`, authors.name as `author_name` FROM books INNER JOIN categories ON categories.id = books.category_id INNER JOIN publishers ON publishers.id = books.publisher_id INNER JOIN authors ON authors.id = books.author_id WHERE books.id = '$id'
    ");

    $this->db->execute();
    return $this->db->get_one();
  }

  public function update_book($id)
  {
    $this->db->prepare("UPDATE books SET category_id = '$this->category_id', publisher_id = '$this->publisher_id', author_id = '$this->author_id', title = '$this->title', description = '$this->description', image = '$this->image', price = '$this->price', copies = '$this->copies' WHERE id = '$id'");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  public function delete_book()
  {
    $this->db->prepare("DELETE FROM books WHERE id = '$this->id'");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function search_books($search)
  {
    $this->db->prepare("SELECT books.*, categories.*, publishers.*, authors.*, books.id as `book_id`, books.description as `book_description`,categories.id as `category_id`, categories.name as `category_name`, categories.description as `category_description`,publishers.id as `publisher_id`, publishers.name as `publisher_name`, publishers.address as `publisher_address`,authors.id as `author_id`, authors.name as `author_name` FROM books INNER JOIN categories ON categories.id = books.category_id INNER JOIN publishers ON publishers.id = books.publisher_id INNER JOIN authors ON authors.id = books.author_id WHERE books.title LIKE '%$search%'
    ");
    $this->db->execute();
    return $this->db->get_all();
  }
}
