<?php require APPROOT . '/views/includes/header.php' ?>

<section class="hero">
  <div class="hero__content">
    <h1 class="text-white">Find a Book</h1>
    <p class="text-white mt-3 mb-5">
      Lorem ipsum dolor sit amet consectetur adipisicn elit ration reprehend ipsam esse nostrum dolor odit vel adipisci eligendi eveniet dolor sitam amet perferendis ipsum dolon.
    </p>
    <form action="<?php echo URLROOT; ?>/books/search" method="POST" class="d-flex search__form" role="search">
      <input class="form-control me-2 py-2" type="search" name="search" placeholder="Find a book by title..." aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
  </div>
</section>

<section class="books">
  <div class="container">
    <div class="books__title">
      <i class="fa-solid fa-down-long"></i>
      <h4>Discover your next book</h4>
    </div>
    <div class="row g-5 justify-content-center books__content">
      <?php foreach ($data['books'] as $book) : ?>
        <div class="col-12 col-md-6 col-lg-4 book">
          <div class="card rounded-0">
            <a href="<?php echo URLROOT; ?>/books/show/<?php echo $book->book_id; ?>">
              <img class="card-img-top rounded-0" src="<?php echo URLROOT; ?>/images/books/<?php echo $book->image; ?>" alt="<?php echo $book->title; ?>">
            </a>
            <div class="card-body text-center">
              <a href="<?php echo URLROOT; ?>/books/show/<?php echo $book->book_id; ?>">
                <h5 class="card-title book__title"><?php echo $book->title; ?></h5>
              </a>
              <p class="card-text text-secondary m-0 author__name"><?php echo $book->author_name; ?></p>
              <div class="small-ratings book__stars">
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star" style="color: #e1e4e8;"></i>
              </div>
              <p class="book__price">$<?php echo $book->price; ?></p>
              <a href="<?php echo URLROOT; ?>/books/show/<?php echo $book->book_id; ?>" class="btn  rounded-0 px-5 py-2 btn__details">DETAILS</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="top__selling">
  <div class="top__selling__heading text-center">
    <h4 class="text-capitalize">Top Selling Books Right Now</h4>
    <i class="fa-solid fa-down-long"></i>
  </div>
  <div class="top__selling__content">
    <div class="container">
      <div class="top__selling__container">
        <div class="top__selling__item">
          <div class="top__selling__image">
            <img src="<?php echo URLROOT; ?>/images/books/1.jpg" class="w-100">
          </div>
          <div class="top__selling__info">
            <h5 class="text-capitalize">Pursue Your Passion</h5>
            <p class="text-secondary">By Paulo Coelho</p>
          </div>
          <div class="top__selling__icon ms-auto">
            <i class="fa-solid fa-right-long"></i>
          </div>
        </div>
        <div class="top__selling__item">
          <div class="top__selling__image">
            <img src="<?php echo URLROOT; ?>/images/books/2.jpg" class="w-100">
          </div>
          <div class="top__selling__info">
            <h5 class="text-capitalize">Pursue Your Passion</h5>
            <p class="text-secondary">By Paulo Coelho</p>
          </div>
          <div class="top__selling__icon ms-auto">
            <i class="fa-solid fa-right-long"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<section class="newsletter">
  <div class="top__selling__heading text-center">
    <h4>Stay in Touch With Our Updates </h4>
    <i class="fa-solid fa-down-long"></i>
  </div>
  <form class="newsletter__form">
    <input type="text" placeholder="Enter Your Email Address">
    <button>SEND EMAIL</button>
  </form>
</section>

<?php require APPROOT . '/views/includes/footer.php' ?>