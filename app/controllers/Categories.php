<?php

class Categories extends Controller
{
  public function __construct()
  {
    $this->categoryModel = $this->model('Category');
  }

  public function index()
  {
    $categories = $this->categoryModel->get_categories();
    $data = [
      'categories' => $categories
    ];
    $this->view('admin/categories/index', $data);
  }

  public function create()
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        'name' => trim($_POST['name']),
        'description' => trim($_POST['description']),

        'name_error' => '',
        'description_error' => '',
      ];

      if (empty($data['name'])) {
        $data['name_error'] = 'Name is required';
      }

      if (empty($data['description'])) {
        $data['description_error'] = 'Description is required';
      }

      if (
        empty($data['name_error']) &&
        empty($data['description_error'])
      ) {
        $this->categoryModel->name  = $data['name'];
        $this->categoryModel->description = $data['description'];
        $this->categoryModel->add_category();
      } else {
        $this->view('admin/categories/create', $data);
      }
    } else {
      $data = [
        'name' => '',
        'description' => '',
        'name_error' => '',
        'description_error' => '',
      ];

      $this->view('admin/categories/create', $data);
    }
  }
}
