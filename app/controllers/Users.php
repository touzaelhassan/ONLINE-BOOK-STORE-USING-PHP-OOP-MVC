<?php

class Users extends Controller
{

  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->categoryModel = $this->model('Category');
  }

  public function index()
  {
    $users = $this->userModel->get_users();

    $data = [
      'users' => $users
    ];

    $this->view('admin/users/index', $data);
  }

  public function delete($id)
  {
    $this->userModel->id = $id;
    $this->userModel->delete_user();
    $this->redirect('/users');
  }

  public function signup()
  {
    $categories = $this->categoryModel->get_categories();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $data = [
        'categories' => $categories,

        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),

        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'confirm_password_error' => '',
      ];

      if (empty($data['name'])) {
        $data['name_error'] = 'Name is required';
      }

      if (empty($data['email'])) {
        $data['email_error'] = 'Email is required';
      } else {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
          $data['email_error'] = 'Email is invalid';
        }
      }

      if (empty($data['password'])) {
        $data['password_error'] = 'Password is required';
      } else {
        if (strlen($data['password']) < 6) {
          $data['password_error'] = 'Password must be at least 6 characters';
        }
      }

      if (empty($data['confirm_password'])) {
        $data['confirm_password_error'] = 'Confirm Password is required';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_error'] = 'Password does not match';
        }
      }

      if (
        empty($data['name_error']) &&
        empty($data['email_error']) &&
        empty($data['password_error']) &&
        empty($data['confirm_password_error'])
      ) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->userModel->name = $data['name'];
        $this->userModel->email = $data['email'];
        $this->userModel->password = $data['password'];

        if ($this->userModel->create_user()) {
          $this->view('users/signup_success');
        }
      } else {
        $this->view('users/signup', $data);
      }
    } else {

      $data = [
        'categories' => $categories,

        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',

        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'confirm_password_error' => '',
      ];

      $this->view('users/signup', $data);
    }
  }

  public function login()
  {
    $categories = $this->categoryModel->get_categories();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $data = [
        'categories' => $categories,

        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),

        'email_error' => '',
        'password_error' => '',
      ];

      if (empty($data['email'])) {
        $data['email_error'] = 'Email is required';
      } else {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
          $data['email_error'] = 'invalid Email';
        }
      }

      if (empty($data['password'])) {
        $data['password_error'] = 'Password is required';
      } else {
        if (strlen($data['password']) < 6) {
          $data['password_error'] = 'Password must be at least 6 characters';
        }
      }

      if (
        empty($data['email_error']) &&
        empty($data['password_error'])
      ) {

        $logged_in_user = $this->userModel->login($data['email'], $data['password']);

        if ($logged_in_user) {

          $_SESSION['user_id'] = $logged_in_user->id;
          $_SESSION['user_name'] = $logged_in_user->name;
          $_SESSION['user_email'] = $logged_in_user->email;
          $_SESSION["user_role"] = $logged_in_user->role;

          $this->view('users/login_success');
        } else {

          $data['password_error'] = 'Invalid password';
          $this->view('users/login', $data);
        }
      } else {
        $this->view('users/login', $data);
      }
    } else {

      $data = [
        'categories' => $categories,

        'email' => '',
        'password' => '',

        'email_error' => '',
        'password_error' => '',
      ];

      $this->view('users/login', $data);
    }
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION["user_role"]);

    session_destroy();

    $this->view('users/logout_success');
  }
}
