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
        $this->redirect('/categories');
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

  public function update($id)
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
        $this->categoryModel->id  = $id;
        $this->categoryModel->name  = $data['name'];
        $this->categoryModel->description = $data['description'];
        $this->categoryModel->update_category();
        $this->redirect('/categories');
      } else {
        $this->view('admin/categories/update', $data);
      }
    } else {
      $category = $this->categoryModel->get_category_by_id($id);
      $data = [
        'id' => $category->id,
        'name' => $category->name,
        'description' => $category->description,
        'name_error' => '',
        'description_error' => '',
      ];

      $this->view('admin/categories/update', $data);
    }
  }

  public function delete($id)
  {
    $this->categoryModel->id = $id;
    $this->categoryModel->delete_category();
    $this->redirect('/categories');
  }
}
