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

      <div class="categories__create mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">Update category</h4>
              </div>
              <div class="card-body">
                <form action="" method="POST">
                  <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                    <div class="form-group mb-3">
                      <label for="name">Name : <sup class="text-danger">*</sup></label>
                      <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                      <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
                    </div>
                    <div class="form-group mb-3">
                      <label for="description">Description : <sup class="text-danger">*</sup></label>
                      <textarea name="description" class="form-control form-control-lg <?php echo (!empty($data['description_error'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description']; ?></textarea>
                      <span class="invalid-feedback"><?php echo $data['description_error']; ?></span>
                    </div>
                    <div class="row mt-3 form__footer">
                      <div class="col form__footer__right">
                        <input type="submit" value="Update" class="btn btn-success d-block form__btn">
                      </div>
                    </div>
                  </form>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

<?php require APPROOT . '/views/admin/includes/footer.php' ?>