<?php

class Books extends Controller
{

  public function __construct()
  {
    $this->bookModel = $this->model('Book');
    $this->authorModel = $this->model('Author');
    $this->categoryModel = $this->model('Category');
    $this->publisherModel = $this->model('Publisher');
    $this->cartModel = $this->model('Cart');
  }

  public function index()
  {
    $books = $this->bookModel->get_books();
    $carts = $this->cartModel->get_carts($_SESSION['user_id']);

    $data = [
      'books' => $books,
      'carts' => $carts,
    ];

    $this->view('admin/books/index', $data);
  }

  public function create()

  {
    if (!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== 1) {
      $this->redirect('/');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $data = [
        'category_id' => $_POST['category_id'],
        'publisher_id' => $_POST['publisher_id'],
        'author_id' => $_POST['author_id'],
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'image' => $_FILES['image']['name'],
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

        move_uploaded_file($_FILES['image']['tmp_name'], 'images/books/' . $data['image']);

        $this->redirect('/books');
      } else {
        $this->view('admin/books/create', $data);
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

  public function update($id)
  {
    if (!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== 1) {
      $this->redirect('/');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $data = [
        'category_id' => $_POST['category_id'],
        'publisher_id' => $_POST['publisher_id'],
        'author_id' => $_POST['author_id'],
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'image' => $_FILES['image']['name'],
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
        $this->bookModel->update_book($id);

        move_uploaded_file($_FILES['image']['tmp_name'], 'images/books/' . $data['image']);

        $this->redirect('/books');
      } else {
        $this->view('admin/books/update', $data);
      }
    } else {

      $book = $this->bookModel->get_book($id);

      $authors = $this->authorModel->get_authors();
      $categories = $this->categoryModel->get_categories();
      $publishers = $this->publisherModel->get_publishers();

      $data = [
        'id' => $id,
        'category_id' => $book->category_id,
        'publisher_id' => $book->publisher_id,
        'author_id' => $book->author_id,
        'title' => $book->title,
        'description' => $book->book_description,
        'image' => $book->image,
        'price' => $book->price,
        'copies' => $book->copies,
        'categories' => $categories,
        'publishers' => $publishers,
        'authors' => $authors,
      ];

      $this->view('admin/books/update', $data);
    }
  }

  public function show($id)
  {

    $book = $this->bookModel->get_book($id);
    $categories = $this->categoryModel->get_categories();
    $inCart = false;
    $carts = [];

    if (isset($_SESSION['user_id'])) {

      $user_id = $_SESSION['user_id'];

      $carts = $this->cartModel->get_carts($user_id);

      foreach ($carts as $cart) {
        if ($cart->book_id == $id) {
          $inCart = true;
        }
      }
    }

    $data = [
      'book' => $book,
      'carts' => $carts,
      'categories' => $categories,
      'inCart' => $inCart,
    ];

    $this->view('show', $data);
  }

  public function delete($id)
  {
    $this->bookModel->id = $id;
    $this->bookModel->delete_book();
    $this->redirect('/books');
  }

  public function category($category_id)
  {
    if (!isset($_SESSION["user_id"])) {
      $this->redirect('/users/login');
    }
    $carts = $this->cartModel->get_carts($_SESSION['user_id']);
    $books = $this->bookModel->get_books_by_category($category_id);
    $categories = $this->categoryModel->get_categories();

    $data = [
      'carts' => $carts,
      'books' => $books,
      'categories' => $categories,
    ];

    $this->view('category', $data);
  }

  public function mybooks($user_id)
  {
    $carts = $this->cartModel->get_carts($_SESSION['user_id']);
    $books = $this->cartModel->get_cart_by_user_id($user_id);
    $categories = $this->categoryModel->get_categories();

    $data = [
      'carts' => $carts,
      'books' => $books,
      'categories' => $categories,
    ];

    $this->view('mybooks', $data);
  }

  public function search()
  {

    if (!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== 1) {
      $this->redirect('/users/login');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $search = $_POST['search'];
      $books = $this->bookModel->search_books($search);
      $carts = $this->cartModel->get_carts($_SESSION['user_id']);

      $data = [
        'books' => $books,
        'carts' => $carts,
      ];

      $this->view('search', $data);
    } else {
      $this->redirect('/books');
    }
  }
}
