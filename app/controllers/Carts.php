<?php

class Carts extends Controller
{
  public function __construct()
  {
    $this->cartModel = $this->model('Cart');
    $this->bookModel = $this->model('Book');
    $this->categoryModel = $this->model('Category');
  }

  public function index($id)
  {
    $carts = $this->cartModel->get_carts($id);
    $books = $this->bookModel->get_books();
    $categories = $this->categoryModel->get_categories();

    $data = [
      'carts' => $carts,
      'books' => $books,
      'categories' => $categories,
    ];

    $this->view('carts/index', $data);
  }

  public function create($id)
  {

    if (!isset($_SESSION['user_id'])) {
      $this->redirect('/users/login');
    }

    $book = $this->bookModel->get_book($id);

    $this->cartModel->user_id = $_SESSION["user_id"];
    $this->cartModel->book_id = $id;
    $this->cartModel->copies = 1;
    $this->cartModel->price = $book->price;
    $this->cartModel->bought = 0;
    $this->cartModel->add_cart();

    $this->redirect('/carts/index/' . $_SESSION['user_id']);
  }

  public function delete($id)
  {
    $this->cartModel->id = $id;
    $this->cartModel->delete_cart();

    $this->redirect('/carts/index/' . $_SESSION["user_id"]);
  }

  public function update($id)
  {

    $this->cartModel->id = $id;
    $this->cartModel->copies = $_POST['cart_number'];
    $this->cartModel->update_cart();
    $this->redirect('/carts/index/' . $_SESSION["user_id"]);
  }


  public function updatebought()
  {
    $this->cartModel->user_id = $_SESSION["user_id"];
    $unpaid_books =  $this->cartModel->get_carts($_SESSION["user_id"]);

    foreach ($unpaid_books as $book) {
      $this->bookModel->update_copies($book->book_id, $book->copies - $book->cart_copies);
    }

    $this->cartModel->id = $book->id;
    $this->cartModel->bought = 1;
    $this->cartModel->update_bought();

    $this->view('carts/bought');
  }
}
