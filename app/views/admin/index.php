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
      <div class="mt-5">
        <div class="row">

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-4 border-primary  border-top-0 border-end-0 border-bottom-0 shadow h-100 p-4">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs fw-bold text-primary text-uppercase mb-3">
                      Categories
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php echo count($data['categories']); ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-secondary"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-4 border-success border-top-0 border-end-0 border-bottom-0 shadow h-100 p-4">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs fw-bold text-success text-uppercase mb-3">
                      Publishers
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php echo count($data['publishers']); ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa-solid fa-share-nodes fa-2x text-secondary"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-4 border-info border-top-0 border-end-0 border-bottom-0 shadow h-100 p-4">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs fw-bold text-info text-uppercase mb-3">
                      Authors
                    </div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php echo count($data['authors']); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa-solid fa-feather-pointed fa-2x text-secondary"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-4 border-warning  border-top-0 border-end-0 border-bottom-0 shadow h-100 p-4">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs fw-bold text-warning text-uppercase mb-3">
                      Books
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php echo count($data['books']); ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa-solid fa-book fa-2x text-secondary"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="top__selling__books mt-5 p-0">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <h4 class="p-2">Top Selling Books</h4>
                </div>
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="table-light">
                        <tr>
                          <th>#</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Price</th>
                          <th>Copies</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data['top_books'] as $book) : ?>
                          <tr>
                            <td><?php echo $book->book_id; ?></td>
                            <td class="text-center">
                              <img src="<?php echo URLROOT; ?>/images/books/<?php echo $book->image; ?>" alt="<?php echo $book->title; ?>" class="img-fluid" width="50">
                            </td>
                            <td><?php echo $book->title; ?></td>
                            <td><?php echo $book->price; ?></td>
                            <td><?php echo $book->copies; ?></td>
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