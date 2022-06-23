<?php require APPROOT . '/views/admin/includes/header.php' ?>

<div class="container-fluid">
  <div class="row">
    <?php require APPROOT . '/views/admin/includes/sidebar.php' ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>
      <div class="categories">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4>Books</h4>
                <a href="<?php echo URLROOT; ?>/books/create" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
              </div>
              <div class="card-body">

                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead class="table-light">
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Publisher</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Copies</th>
                        <th>Image</th>
                        <th>Upadate</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data['books'] as $book) : ?>
                        <tr>
                          <td><?php echo $book->book_id; ?></td>
                          <td><?php echo $book->title; ?></td>
                          <td><?php echo $book->category_name; ?></td>
                          <td><?php echo $book->publisher_name; ?></td>
                          <td><?php echo $book->author_name; ?></td>
                          <td><?php echo $book->price; ?></td>
                          <td><?php echo $book->copies; ?></td>
                          <td class="text-center">
                            <img src="<?php echo URLROOT; ?>/images/books/<?php echo $book->image; ?>" alt="<?php echo $book->title; ?>" class="img-fluid" width="50">
                          </td>
                          <td class="text-center pt-3">
                            <a href="<?php echo URLROOT; ?>/books/update/<?php echo $book->book_id; ?>" class="btn btn-primary btn-sm">
                              <i class="fa-solid fa-pencil"></i>
                            </a>
                          </td>
                          <td class="text-center pt-3">
                            <a href="<?php echo URLROOT; ?>/books/delete/<?php echo $book->book_id; ?>" class="btn btn-danger btn-sm">
                              <i class="fa-solid fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </main>
</div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php' ?>