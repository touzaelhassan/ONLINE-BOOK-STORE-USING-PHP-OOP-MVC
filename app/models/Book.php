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
    $this->db->prepare(
      "INSERT INTO books (category_id, publisher_id, author_id, title, description, image, price, copies) VALUES (:category_id, :publisher_id, :author_id, :title, :description, :image, :price, :copies)"
    );

    $this->db->bind(':category_id', $this->category_id);
    $this->db->bind(':publisher_id', $this->publisher_id);
    $this->db->bind(':author_id', $this->author_id);
    $this->db->bind(':title', $this->title);
    $this->db->bind(':description', $this->description);
    $this->db->bind(':image', $this->image);
    $this->db->bind(':price', $this->price);
    $this->db->bind(':copies', $this->copies);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_books()
  {
    $this->db->prepare("SELECT books.*, categories.*, publishers.*, authors.*, books.id as `book_id`, books.description as `book_description`,categories.id as `category_id`, categories.name as `category_name`, categories.description as `category_description`,publishers.id as `publisher_id`, publishers.name as `publisher_name`, publishers.address as `publisher_address`,authors.id as `author_id`, authors.name as `author_name` FROM books INNER JOIN categories ON categories.id = books.category_id INNER JOIN publishers ON publishers.id = books.publisher_id INNER JOIN authors ON authors.id = books.author_id 
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
    $this->db->prepare("UPDATE books SET category_id = :category_id, publisher_id = :publisher_id, author_id = :author_id, title = :title, description = :description, image = :image, price = :price, copies = :copies WHERE id = :id");

    $this->db->bind(':id', $id);
    $this->db->bind(':category_id', $this->category_id);
    $this->db->bind(':publisher_id', $this->publisher_id);
    $this->db->bind(':author_id', $this->author_id);
    $this->db->bind(':title', $this->title);
    $this->db->bind(':description', $this->description);
    $this->db->bind(':image', $this->image);
    $this->db->bind(':price', $this->price);
    $this->db->bind(':copies', $this->copies);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function update_copies($book_id, $copies)
  {
    $this->db->prepare("UPDATE books SET copies = :copies WHERE id = :book_id");

    $this->db->bind(':copies', $copies);
    $this->db->bind(':book_id', $book_id);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function get_books_by_category($category_id)
  {
    $this->db->prepare("SELECT books.*, categories.*, publishers.*, authors.*, books.id as `book_id`, books.description as `book_description`,categories.id as `category_id`, categories.name as `category_name`, categories.description as `category_description`,publishers.id as `publisher_id`, publishers.name as `publisher_name`, publishers.address as `publisher_address`,authors.id as `author_id`, authors.name as `author_name` FROM books INNER JOIN categories ON categories.id = books.category_id INNER JOIN publishers ON publishers.id = books.publisher_id INNER JOIN authors ON authors.id = books.author_id WHERE books.category_id = '$category_id'
    ");
    $this->db->execute();
    return $this->db->get_all();
  }


  public function delete_book()
  {
    $this->db->prepare("DELETE FROM books WHERE id = :id");

    $this->db->bind(':id', $this->id);

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
