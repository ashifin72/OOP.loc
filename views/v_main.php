<!doctype html>
<html>
<head>
  <title><?= $title?></title>
  <link rel="stylesheet" href="/css/main.min.css">
</head>
<body>
<header>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="<?= ROOT ?>img/logo-ash.png" alt="logo" class="logo">
      </div>
      <div class="col-md-9">
        <h1>Блог на PHP</h1>
        <nav>
          <a href="<?= ROOT ?>index.php">На главную</a>
          <a href="<?= ROOT ?>login">Вход на сайт</a>
          <a href="<?= ROOT ?>form">Обратная связь</a>
          <a href="<?= ROOT ?>chat/index.php"> Чат Перейти</a>
          <a href="<?= ROOT ?>oop/index.php">OOP</a>
        </nav>

      </div>
    </div>
  </div>
  <hr>
</header>
<section>
  <div class="container">
    <div class="row">
      <div class="col-9">
        <h2>
            <?= $title ?>
        </h2>
          <?= $content ?>



        <br>


      </div>
      <div class="col-3">
          <?php if ($isAuth): ?>
            <img src="/img/ash1.jpg" class="user" alt="user">
              <?php
              echo 'Приветсвую' . ' ' . $login;
              echo "<a href=\"/login\"> Выйти</a> <br> <a href=\"/add\">Добавить новость</a>";
          else:
              echo "<a href=\"/login\"> Зайти на сайт</a>";
          endif; ?>

      </div>
    </div>
  </div>

</section>
<footer>

  <div class="container">

    <div class="row">
      <div class="col-12">
        Сайт работает на php <br>
        Тестирование и отработка функций
      </div>
    </div>
  </div>
</footer>


</body>
</html>

