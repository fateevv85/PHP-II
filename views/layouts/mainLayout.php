<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="/public/styles/main.css">
  <title>PHP - II</title>
</head>
<body>
<div class="content_wrapper">
  <header>
    <div class="storeLogo"></div>
    <ul class="menu">
      <li><a href="/public/main">Main</a></li>
      <!--      <li><a href="/project/public/gallery/gallery">Галерея</a></li>-->
      <li><a href="/public/product">Каталог</a></li>
        <?php if ((new \app\services\Sessions())->get('login')) : ?>
          <li><a href="/public/cart">Cart</a></li>
          <li>
            <div>You login as:
                <?= (new \app\services\Sessions())->get('login') ?>
            </div>
          </li>
        <?php else: ?>
          <li><a href="/public/login">Login</a></li>
        <?php endif; ?>
    </ul>
  </header>
  <div class="content"><?= $content ?></div>
  <footer>
    Fateev Vasiliy
    &copy; <?= date('Y') ?>
  </footer>
</div>
<!--<script src="/project/public/js/tabMenu.js"></script>-->
</body>
</html>
