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
    $this->db->prepare("SELECT * FROM user_book WHERE user_id = $id");
    $this->db->execute();
    return $this->db->get_all();
  }
}
