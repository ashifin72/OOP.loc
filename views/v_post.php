
<?php if ($isAuth) {
                echo 'Приветсвую' . ' ' . $login;
                echo "<a href=\"index.php?c=login\"> Выйти</a>";
            } else {
                echo "<a href=\"index.php?c=login\"> Зайти на сайт</a>";
          }
          if($msg == ''){ ?>
            <em>Дата публикации <?= $post['data_news'] ?></em>
            <br>
            <strong> <?= $post['title_news'] ?></strong>

              <?= $post['content_news'] ?>


              <?php if ($isAuth): ?>
              <br>

              <a href="/edit/<?=$id ?>">Редактировать</a><br>
              <?php
              endif;?>

          <?php } else{
  echo '404';
          }

           ?>










