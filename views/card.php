<h2>Товар каталога:</h2>
<div class="nameImg">
  <p class="goodsHeader">
    <b><?= $product->title ?></b>
    <br><?= $product->author ?>
  </p>
  <div class="imgBack">
    <a href="<?= $product->picture_url ?>" target="_blank">
      <img src="<?= $product->picture_small_url ?>" alt="small picture" class="imgGoods">
    </a>
  </div>
  <div class="shortDescription">
    <p class="goodsHeader">Краткое описание:</p>
    <div>Это хорошая книга!</div>
    <div class="price">Цена:</div>
    <div class="book_price"><?= $product->price ?></div>
    <div data-id="<?= $product->id ?>" class="buying">Купить</div>
  </div>
</div>
<div class="property">
  <p class="goodsHeader">Характеристики товара:</p>
  <ul class="propertyList">
    <li>ID товара: <?= $product->id ?></li>
    <li>Издательство: <?= $product->publisher ?></li>
    <li>Категория: <?= $product->category ?></li>
    <li>Год издания: 2014</li>
    <li>Кол-во страниц: 285</li>
    <li>ISBN: 9785170844210</li>
    <li>Тираж: 4000</li>
    <li>Формат: 20.5 x 13 x 1.6</li>
    <li>Тип обложки: Твердая бумажная</li>
    <li>Возрастные ограничения : 16+</li>
  </ul>
</div>
<div class="longDescription">
  <p class="goodsHeader">Описание товара:</p>
  <div>
      <?= $product->description ?>
  </div>
</div>
<script src='../js/addToCart.js'></script>