<?php require APPROOT . '/views/includes/header.php' ?>

<?php if ($data['books']) : ?>
  <section class="carts">
    <div class="container">
      <div class="books__title">
        <i class="fa-solid fa-down-long"></i>
        <h4>My Books</h4>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Apply</th>
              <th>Total</th>
              <th>Price</th>
              <th>Number</th>
              <th>Title</th>
              <th>Image</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['books'] as $book) : ?>
              <tr>
                <td>
                  <button type="submit" form="cart__form<?php echo $book->cart_id; ?>" class="btn btn-success btn-sm">Apply</button>
                </td>
                <td class="book-price"><?php echo $book->cart_price * $book->cart_copies; ?></td>
                <td><?php echo $book->cart_price; ?></td>
                <td>
                  <form action="<?php echo URLROOT; ?>/carts/update/<?php echo $book->cart_id; ?>" method="POST" id="cart__form<?php echo $book->cart_id; ?>">
                    <select name="cart_number" id="cart_number" data-id="<?php echo $book->cart_id; ?>" class="cart_number">
                      <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <option value="<?php echo $i; ?>" <?php if ($book->cart_copies == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                      <?php endfor; ?>
                    </select>
                  </form>
                </td>
                <td><?php echo $book->title; ?></td>
                <td>
                  <img src="<?php echo URLROOT; ?>/images/books/<?php echo $book->image; ?>" alt="<?php echo $book->title; ?>" class="img-fluid" width="50">
                </td>
                <td class="text-center pt-3">
                  <a href="<?php echo URLROOT; ?>/carts/delete/<?php echo $book->cart_id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

<?php else : ?>
  <div class="login-success cart">
    <div class="login-success__content">
      <i class="fas fa-check-double"></i>
      <h4>Your Cart is Empty</h4>
      <a href="<?php echo URLROOT; ?>">HOME</a>
    </div>
  </div>
<?php endif; ?>






<?php require APPROOT . '/views/includes/footer.php' ?>