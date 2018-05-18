<h2>Каталог</h2>
<div>
  <form action="">
    <h6>
      <label for="category_select">
        Выбор категории
      </label>
    </h6>
    <select name="category" id="category_select">
        <?php foreach ($category as $value) : ?>
          <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Select">
  </form>
</div>
<br>
<div class="catalog">
    <?php foreach ($product as $item): ?>
      <div class="catalogGood">
        <a href="/public/product/card?id=<?= $item->id ?>">
          <img src="<?= $item->picture_small_url ?>" alt="small picture" class="imgCatalog">
          <br>
          <span class="descriptionLink"><?= $item->title ?>
            <br>
            <i><?= $item->author ?></i>
            <br>
            <b><mark><?= $item->price ?> rub</mark></b>
          </span>
        </a>
      </div>
    <?php endforeach; ?>
</div>
