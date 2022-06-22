<?php require APPROOT . '/views/includes/header.php' ?>

<section class="signup">
  <div class="row form__container">
    <div class="col-md-6 mx-auto mb-5">
      <div class="card card-body bg-light mt-5">

        <h2 class="text-center">Create An Account</h2>

        <p class="text-center">Please fill out this form to register with us</p>

        <form action="<?php echo URLROOT; ?>/users/signup" method="POST">

          <div class="form-group mb-3">
            <label for="name">Name : <sup class="text-danger">*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
          </div>

          <div class="form-group mb-3">
            <label for="email">Email : <sup class="text-danger">*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
          </div>

          <div class="form-group mb-3">
            <label for="password">Password : <sup class="text-danger">*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
          </div>

          <div class="form-group mb-4">
            <label for="confirm_password">Confirm Password : <sup class="text-danger">*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_error']; ?></span>
          </div>

          <div class="row mt-3 form__footer">
            <div class="col form__footer__right">
              <input type="submit" value="Signup" class="btn btn-success d-block form__btn">
            </div>
            <div class="col form__footer__left">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light">Have an
                account ? <span class="text-success text-decoration-underline">Login</span></a>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</section>

<?php require APPROOT . '/views/includes/footer.php' ?>