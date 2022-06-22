<?php

class Publishers extends Controller
{

  public function __construct()
  {
    if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] !== 1) {
      $this->redirect('/');
    }

    $this->publisherModel = $this->model('Publisher');
  }

  public function index()
  {
    $publishers = $this->publisherModel->get_publishers();
    $data = [
      'publishers' => $publishers
    ];
    $this->view('admin/publishers/index', $data);
  }

  public function create()
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $data = [
        'name' => trim($_POST['name']),
        'address' => trim($_POST['address']),

        'name_error' => '',
        'address_error' => '',
      ];

      if (empty($data['name'])) {
        $data['name_error'] = 'Name is required';
      }

      if (empty($data['address'])) {
        $data['address_error'] = 'Address is required';
      }

      if (
        empty($data['name_error']) &&
        empty($data['address_error'])
      ) {

        $this->publisherModel->name  = $data['name'];
        $this->publisherModel->address = $data['address'];

        $this->publisherModel->add_publisher();

        $this->redirect('/publishers');
      } else {
        $this->view('admin/publishers/create', $data);
      }
    } else {
      $data = [
        'name' => '',
        'address' => '',
        'name_error' => '',
        'address_error' => '',
      ];

      $this->view('admin/publishers/create', $data);
    }
  }

  public function update($id)
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $data = [
        'name' => trim($_POST['name']),
        'address' => trim($_POST['address']),

        'name_error' => '',
        'address_error' => '',
      ];

      if (empty($data['name'])) {
        $data['name_error'] = 'Name is required';
      }

      if (empty($data['address'])) {
        $data['address_error'] = 'Address is required';
      }

      if (
        empty($data['name_error']) &&
        empty($data['address_error'])
      ) {

        $this->publisherModel->id = $id;
        $this->publisherModel->name  = $data['name'];
        $this->publisherModel->address = $data['address'];

        $this->publisherModel->update_publisher($id);

        $this->redirect('/publishers');
      } else {
        $this->view('admin/publishers/update', $data);
      }
    } else {
      $publisher = $this->publisherModel->get_publisher_by_id($id);

      $data = [
        'id' => $id,
        'name' => $publisher->name,
        'address' => $publisher->address,
        'name_error' => '',
        'address_error' => '',
      ];

      $this->view('admin/publishers/update', $data);
    }
  }

  public function delete($id)
  {
    $this->publisherModel->id = $id;
    $this->publisherModel->delete_publisher();
    $this->redirect('/publishers');
  }
}
