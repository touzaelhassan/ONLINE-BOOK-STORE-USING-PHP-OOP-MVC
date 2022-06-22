<?php

class Authors extends Controller
{

  public function __construct()
  {
    if (!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== 1) {
      $this->redirect('/');
    }

    $this->authorModel = $this->model('Author');
  }

  public function index()
  {
    $authors = $this->authorModel->get_authors();
    $data = [
      'authors' => $authors
    ];
    $this->view('admin/authors/index', $data);
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),

        'name_error' => '',
        'email_error' => '',
      ];

      if (empty($data['name'])) {
        $data['name_error'] = 'Name is required';
      }

      if (empty($data['email'])) {
        $data['email_error'] = 'Email is required';
      }

      if (
        empty($data['name_error']) &&
        empty($data['email_error'])
      ) {

        $this->authorModel->name  = $data['name'];
        $this->authorModel->email = $data['email'];
        $this->authorModel->add_author();
        $this->redirect('/authors');
      } else {
        $this->view('admin/authors/create', $data);
      }
    } else {
      $data = [
        'name' => '',
        'email' => '',
        'name_error' => '',
        'email_error' => '',
      ];
      $this->view('admin/authors/create', $data);
    }
  }

  public function update($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),

        'name_error' => '',
        'email_error' => '',
      ];

      if (empty($data['name'])) {
        $data['name_error'] = 'Name is required';
      }

      if (empty($data['email'])) {
        $data['email_error'] = 'Email is required';
      }

      if (
        empty($data['name_error']) &&
        empty($data['email_error'])
      ) {

        $this->authorModel->id = $id;
        $this->authorModel->name  = $data['name'];
        $this->authorModel->email = $data['email'];
        $this->authorModel->update_author();
        $this->redirect('/authors');
      } else {
        $this->view('admin/authors/update', $data);
      }
    } else {
      $author = $this->authorModel->get_author_by_id($id);
      $data = [
        'id' => $id,
        'name' => $author->name,
        'email' => $author->email,
        'name_error' => '',
        'email_error' => '',
      ];
      $this->view('admin/authors/update', $data);
    }
  }

  public function delete($id)
  {
    $this->authorModel->id = $id;
    $this->authorModel->delete_author();
    $this->redirect('/authors');
  }
}
