<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
  <title>Book Store</title>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg bg-light py-4">
      <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo URLROOT; ?>">FINDBOOK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar__collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Who we are</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Design</a></li>
                <li><a class="dropdown-item" href="#">Coding</a></li>
                <li><a class="dropdown-item" href="#">Marketing</a></li>
              </ul>
            </li>
          </ul>
          <?php if (isset($_SESSION["user_role"])) : ?>

            <?php if ($_SESSION["user_role"] === 1) : ?>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/admin">Dashboard</a></li>
                    <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>
                  </ul>
                </li>
              </ul>
            <?php else : ?>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <span>Cart</span>
                    <span>0</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION["user_name"]; ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">My Books</a></li>
                    <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>
                  </ul>
                </li>
              </ul>
            <?php endif; ?>

          <?php else : ?>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/signup">Signup</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
              </li>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </nav>
  </header>