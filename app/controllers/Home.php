<?php

class Home extends Controller
{

  public function __construct()
  {
    $this->bookModel = $this->model('Book');
    $this->cartModel = $this->model('Cart');
  }

  public function index()
  {
    $books = $this->bookModel->get_books();

    if (isset($_SESSION["user_id"])) {
      $carts = $this->cartModel->get_carts($_SESSION["user_id"]);
    } else {
      $carts = [];
    }


    $data = [
      'books' => $books,
      'carts' => $carts
    ];


    $this->view('index', $data);
  }
}
