<?php require APPROOT . '/views/includes/header.php' ?>

<section class="signup">
  <div class="row form__container">
    <div class="col-md-6 mx-auto mb-5">
      <div class="card card-body bg-light mt-5">
        <h2 class="text-center">Create An Account</h2>
        <p class="text-center">Please fill out this form to register with us</p>
        <form action="<?php echo URLROOT; ?>/users/signup" method="POST">
          <div class="form-group">
            <label for="user_name">Userame : <sup class="text-danger">*</sup></label>
            <input type="text" name="user_name" class="form-control form-control-lg <?php echo (!empty($data['user_name_error'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['user_name']; 
                                                                                                                                                                  ?>">
            <span class="invalid-feedback"><?php // echo $data['user_name_error']; 
                                            ?></span>
          </div>
          <div class="form-group">
            <label for="user_email">Email : <sup class="text-danger">*</sup></label>
            <input type="email" name="user_email" class="form-control form-control-lg <?php echo (!empty($data['user_email_error'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['user_email']; 
                                                                                                                                                                      ?>">
            <span class="invalid-feedback"><?php // echo $data['user_email_error']; 
                                            ?></span>
          </div>
          <div class="form-group">
            <label for="user_password">Password : <sup class="text-danger">*</sup></label>
            <input type="password" name="user_password" class="form-control form-control-lg <?php echo (!empty($data['user_password_error'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['user_password']; 
                                                                                                                                                                              ?>">
            <span class="invalid-feedback"><?php // echo $data['user_password_error']; 
                                            ?></span>
          </div>
          <div class="form-group">
            <label for="user_confirm_password">Confirm Password : <sup class="text-danger">*</sup></label>
            <input type="password" name="user_confirm_password" class="form-control form-control-lg <?php echo (!empty($data['user_confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?php // echo $data['user_confirm_password']; 
                                                                                                                                                                                              ?>">
            <span class="invalid-feedback"><?php // echo $data['user_confirm_password_error']; 
                                            ?></span>
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