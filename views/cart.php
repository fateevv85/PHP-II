<h5>Hello, <?= $userName ?>!</h5>
<div><?= $message ?></div>
<form action="http://php-ii/public/login/logout" method="post" name="logoutform">
  <input type="submit" value="Log out" name="logout">
</form>
<div>Your cart orders:</div>
<?php if ($booksFromDb): ?>
  <div>Ваши сохраненные заказы:</div>
    <?php foreach ($booksFromDb as $book) : ?>
    <div class="order_item">
      <ul class="desc_list">
          <?php foreach ($book as $key => $value) : ?>
              <?php if (!isset($key[$value])): ?>
              <li>
                <b><?= $key ?>: </b>
                <span data-type="<?= $key ?>"><?= $value ?></span>
              </li>
              <?php endif; ?>
          <?php endforeach; ?>
      </ul>
      <div>Количество:
        <input type="number" min="1" max="10" value="<?= $book->count ?>" class="count_item">
      </div>
      <div>Цена:
        <div class="cart_item_sum"><?= $book->price ?></div>
        рублей
      </div>
      <div class="delete_item" data-id="<?= $book->id ?>">Delete item</div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php if ((empty($books)) && (empty($booksFromDb))) : ?>
  <div>Cart is empty!</div>
<?php endif; ?>
<?php if ($books): ?>
<div>Ваши новые заказы:</div>
<div class="cart_orders">
    <?php foreach ($books as $book) : ?>
      <div class="order_item">
        <ul class="desc_list">
            <?php foreach ($book as $key => $value) : ?>
                <?php if (!isset($key[$value])): ?>
                <li>
                  <b><?= $key ?>: </b>
                  <span data-type="<?= $key ?>"><?= $value ?></span>
                </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <div>Количество:
          <input type="number" min="1" max="10" value="1" class="count_item">
        </div>
        <div>Цена:
          <div class="cart_item_sum"><?= $book->price ?></div>
          рублей
        </div>
        <div class="delete_item" data-id="<?= $book->id ?>">Delete item</div>
      </div>
    <?php endforeach; ?>
    <?php endif; ?>
  <div class="cart_total">Итого:
    <div class="cart_total_sum"></div>
    рублей
  </div>
  <div class="cart_buttons">
    <div class="clear_cart">Clear cart</div>
    <div class="save_cart">Save cart</div>
  </div>
</div>

<script src="../public/js/cartActivity.js"></script>
