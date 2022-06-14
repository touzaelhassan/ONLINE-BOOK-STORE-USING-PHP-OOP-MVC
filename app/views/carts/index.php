<?php require APPROOT . '/views/includes/header.php' ?>

<section class="carts">
  <div class="container">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
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
              <td><?php echo $cart->cart_price * $cart->cart_copies; ?></td>
              <td><?php echo $cart->cart_price; ?></td>
              <td><?php echo $cart->cart_copies; ?></td>
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