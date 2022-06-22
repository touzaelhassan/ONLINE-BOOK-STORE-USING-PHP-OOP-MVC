<?php

class Admin extends Controller
{

  public function __construct()
  {
    $this->categoryModel = $this->model('Category');
    $this->publisherModel = $this->model('Publisher');
    $this->authorModel = $this->model('Author');
    $this->bookModel = $this->model('Book');
    $this->cartModel = $this->model('Cart');
  }

  public function index()
  {

    if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] !== 1) {
      $this->redirect('/');
    }

    $categories = $this->categoryModel->get_categories();
    $publishers = $this->publisherModel->get_publishers();
    $authors = $this->authorModel->get_authors();
    $books = $this->cartModel->top__selling__books();

    $data = [
      'categories' => $categories,
      'publishers' => $publishers,
      'authors' => $authors,
      'books' => $books
    ];

    $this->view('admin/index', $data);
  }
}
