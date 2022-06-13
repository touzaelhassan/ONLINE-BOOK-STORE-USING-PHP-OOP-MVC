<?php

class Home extends Controller
{

  public function __construct()
  {
    $this->bookModel = $this->model('Book');
  }

  public function index()
  {
    $books = $this->bookModel->get_books();

    $data = [
      'books' => $books
    ];

    $this->view('index', $data);
  }
}
