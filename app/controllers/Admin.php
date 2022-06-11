<?php

class Admin extends Controller
{

  public function __construct()
  {
  }

  public function index()
  {
    $data = [
      'title' => 'Admin',
      'description' => 'Admin',
      'keywords' => 'Admin',
    ];

    $this->view('admin/index', $data);
  }
}
