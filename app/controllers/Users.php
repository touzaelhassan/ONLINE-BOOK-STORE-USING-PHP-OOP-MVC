<?php

class Users extends Controller
{

  public function __construct()
  {
  }

  public function signup()
  {
    $data = [
      'title' => 'Signup'
    ];
    $this->view('users/signup', $data);
  }

  public function login()
  {
    $data = [
      'title' => 'Login'
    ];
    $this->view('users/login', $data);
  }
}
