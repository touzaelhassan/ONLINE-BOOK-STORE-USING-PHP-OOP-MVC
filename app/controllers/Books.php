<?php

class Books extends Controller
{

  public function __construct()
  {
    $this->bookModel = $this->model('Book');
    $this->authorModel = $this->model('Author');
    $this->categoryModel = $this->model('Category');
    $this->publisherModel = $this->model('Publisher');
  }

  public function index()
  {
    $books = $this->bookModel->get_books();
    $data = [
      'books' => $books
    ];
    $this->view('admin/books/index', $data);
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $data = [
        'category_id' => $_POST['category_id'],
        'publisher_id' => $_POST['publisher_id'],
        'author_id' => $_POST['author_id'],
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'image' => $_POST['image'],
        'price' => $_POST['price'],
        'copies' => $_POST['copies'],

        'category_id_error' => '',
        'publisher_id_error' => '',
        'author_id_error' => '',
        'title_error' => '',
        'description_error' => '',
        'image_error' => '',
        'price_error' => '',
        'copies_error' => '',
      ];

      if (empty($data['category_id'])) {
        $data['category_id_error'] = 'Category is required';
      }

      if (empty($data['publisher_id'])) {
        $data['publisher_id_error'] = 'Publisher is required';
      }

      if (empty($data['author_id'])) {
        $data['author_id_error'] = 'Author is required';
      }

      if (empty($data['title'])) {
        $data['title_error'] = 'Title is required';
      }

      if (empty($data['description'])) {
        $data['description_error'] = 'Description is required';
      }

      if (empty($data['image'])) {
        $data['image_error'] = 'Image is required';
      }

      if (empty($data['price'])) {
        $data['price_error'] = 'Price is required';
      }

      if (empty($data['copies'])) {
        $data['copies_error'] = 'Copies is required';
      }

      if (
        empty($data['category_id_error']) &&
        empty($data['publisher_id_error']) &&
        empty($data['author_id_error']) &&
        empty($data['title_error']) &&
        empty($data['description_error']) &&
        empty($data['image_error']) &&
        empty($data['price_error']) &&
        empty($data['copies_error'])
      ) {
        $this->bookModel->category_id = $data['category_id'];
        $this->bookModel->publisher_id = $data['publisher_id'];
        $this->bookModel->author_id = $data['author_id'];
        $this->bookModel->title = $data['title'];
        $this->bookModel->description = $data['description'];
        $this->bookModel->image = $data['image'];
        $this->bookModel->price = $data['price'];
        $this->bookModel->copies = $data['copies'];

        $this->bookModel->add_book();
        header('Location: ' . URLROOT . '/books');
      } else {
        $this->view('books/create', $data);
      }
    } else {

      $authors = $this->authorModel->get_authors();
      $categories = $this->categoryModel->get_categories();
      $publishers = $this->publisherModel->get_publishers();

      $data = [
        'title' => '',
        'description' => '',
        'image' => '',
        'price' => '',
        'copies' => '',
        'categories' => $categories,
        'publishers' => $publishers,
        'authors' => $authors,
      ];
      $this->view('admin/books/create', $data);
    }
  }
}
