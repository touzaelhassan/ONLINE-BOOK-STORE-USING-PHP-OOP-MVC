<?php require APPROOT . '/views/includes/header.php' ?>

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

<?php require APPROOT . '/views/includes/footer.php' ?>