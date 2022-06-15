<?php require APPROOT . '/views/includes/header.php' ?>

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


<?php require APPROOT . '/views/includes/footer.php' ?>