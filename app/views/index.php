<?php require APPROOT . '/views/includes/header.php' ?>

<section class="hero">
  <div class="hero__content">
    <h1 class="text-white">Find a Book</h1>
    <p class="text-white mt-3 mb-5">
      Lorem ipsum dolor sit amet consectetur adipisicn elit ration reprehend ipsam esse nostrum dolor odit vel adipisci eligendi eveniet dolor sitam amet perferendis ipsum dolon.
    </p>
    <form class="d-flex search__form" role="search">
      <input class="form-control me-2 py-2" type="search" placeholder="Find a book by title..." aria-label="Search">
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
    <div class="row g-5 books__content">
      <?php foreach ($data['books'] as $book) : ?>
        <div class="col-12 col-md-6 col-lg-3 book">
          <div class="card rounded-0">
            <img class="card-img-top rounded-0" src="<?php echo URLROOT; ?>/images/books/<?php echo $book->image; ?>" alt="<?php echo $book->title; ?>">
            <div class="card-body text-center">
              <h5 class="card-title book__title"><?php echo $book->title; ?></h5>
              <p class="card-text text-secondary m-0 author__name"><?php echo $book->author_name; ?></p>
              <div class="small-ratings">
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-secondary"></i>
              </div>
              <p class="book__price">$<?php echo $book->price; ?></p>
              <a href="<?php echo URLROOT; ?>/books/show/<?php echo $book->id; ?>" class="btn btn-success rounded-0">DETAILS</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require APPROOT . '/views/includes/footer.php' ?>