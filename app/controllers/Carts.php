<?php

class Carts extends Controller
{
  public function __construct()
  {
    $this->cartModel = $this->model('Cart');
    $this->bookModel = $this->model('Book');
  }

  public function index($id)
  {
    $carts = $this->cartModel->get_carts($id);

    $data = [
      'carts' => $carts
    ];

    $this->view('carts/index', $data);
  }

  public function create($id)
  {

    $book = $this->bookModel->get_book($id);

    $this->cartModel->user_id = $_SESSION["user_id"];
    $this->cartModel->book_id = $id;
    $this->cartModel->copies = 1;
    $this->cartModel->price = $book->price;
    $this->cartModel->bought = 0;
    $this->cartModel->add_cart();

    header('Location: ' . URLROOT . '/carts/index/' . $_SESSION["user_id"]);
  }
}
