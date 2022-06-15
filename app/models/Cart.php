<?php

class Cart
{
  public $id;
  public $user_id;
  public $book_id;
  public $copies;
  public $price;
  public $bought;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function add_cart()
  {
    $this->db->prepare("INSERT INTO user_book (user_id, book_id, copies, price, bought) VALUES ('$this->user_id', '$this->book_id', '$this->copies', '$this->price', '$this->bought')");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  public function get_carts($id)
  {
    $this->db->prepare("SELECT user_book.*, books.*, user_book.id as `cart_id`, user_book.copies as `cart_copies`, user_book.price as `cart_price`, books.id as `book_id`, books.price as `book_price`, books.copies as `book_copies`  FROM user_book INNER JOIN books ON books.id = user_book.book_id WHERE user_book.user_id = $id AND user_book.bought = 0");
    $this->db->execute();
    return $this->db->get_all();
  } 

  public function update_cart()
  {
    $this->db->prepare("UPDATE user_book SET copies = '$this->copies' WHERE id = '$this->id'");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function delete_cart()
  {
    $this->db->prepare("DELETE FROM user_book WHERE id = '$this->id'");
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
