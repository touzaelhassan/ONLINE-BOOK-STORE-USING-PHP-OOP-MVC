<?php require APPROOT . '/views/includes/header.php' ?>

<?php if ($data['carts']) : ?>
  <section class="carts">
    <div class="container">
      <div class="books__title">
        <i class="fa-solid fa-down-long"></i>
        <h4>Shopping Cart</h4>
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
            <?php foreach ($data['carts'] as $cart) : ?>
              <tr>
                <td>
                  <button type="submit" form="cart__form<?php echo $cart->cart_id; ?>" class="btn btn-success btn-sm">Apply</button>
                </td>
                <td><?php echo $cart->cart_price * $cart->cart_copies; ?></td>
                <td><?php echo $cart->cart_price; ?></td>
                <td>
                  <form action="<?php echo URLROOT; ?>/carts/update/<?php echo $cart->cart_id; ?>" method="POST" id="cart__form<?php echo $cart->cart_id; ?>">
                    <select name="cart_number" id="cart_number" data-id="<?php echo $cart->cart_id; ?>" class="cart_number">
                      <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <option value="<?php echo $i; ?>" <?php if ($cart->cart_copies == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                      <?php endfor; ?>
                    </select>
                  </form>
                </td>
                <td><?php echo $cart->title; ?></td>
                <td>
                  <img src="<?php echo URLROOT; ?>/images/books/<?php echo $cart->image; ?>" alt="<?php echo $cart->title; ?>" class="img-fluid" width="50">
                </td>
                <td class="text-center pt-3">
                  <a href="<?php echo URLROOT; ?>/carts/delete/<?php echo $cart->cart_id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section class="payment__section my-4">
    <div class="container">
      <div class="row payment__content">
        <div class="col-9 payment__amount">
          <span class="amount">10</span> <span>USD</span>
        </div>
        <div class="col-3 payment__buttons">
          <div id="paypal-button-container"></div>
        </div>
      </div>
    </div>

  </section>

  <section class="related__books">
    <div class="container">
      <div class="books__title">
        <i class="fa-solid fa-down-long"></i>
        <h4>Related Books</h4>
      </div>
      <div class="row">
        <?php foreach ($data['books'] as $key => $book) : ?>
          <?php if ($key < 4) : ?>

            <div class="col-12 col-md-6 col-lg-3 book">
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

          <?php endif ?>
        <?php endforeach; ?>
      </div>
    </div>

  </section>
<?php else : ?>
  <h1>Your Cart is Empty</h1>
<?php endif; ?>




<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=AbODSZBEHxL5og2_dTJIEmxW0wWqujzl2F2MIddFbfUtv4-wBe4VOjOfGKSIx0AvXi-zgX4KrmganHrJ&currency=USD"></script>
<!-- Set up a container element for the button -->
<script>
  paypal.Buttons({
    // Sets up the transaction when a payment button is clicked
    createOrder: (data, actions) => {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: document.querySelector('.amount').innerHTML
          }
        }]
      });
    },
    // Finalize the transaction after payer approval
    onApprove: (data, actions) => {
      return actions.order.capture().then(function(orderData) {
        // Successful capture! For dev/demo purposes:
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        const transaction = orderData.purchase_units[0].payments.captures[0];
        // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        // When ready to go live, remove the alert and show a success message within this page. For example:
        // const element = document.getElementById('paypal-button-container');
        // element.innerHTML = '<h3>Thank you for your payment!</h3>';
        URL: actions.redirect('<?php echo URLROOT; ?>/carts/updatebought');
      });
    }
  }).render('#paypal-button-container');
</script>

<?php require APPROOT . '/views/includes/footer.php' ?>