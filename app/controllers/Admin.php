<?php

class Admin extends Controller
{

  public function __construct()
  {
  }

  public function index()
  {
    $data = [];

    $this->view('admin/index', $data);
  }
}
