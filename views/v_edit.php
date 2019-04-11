
          <?php if ($isAuth) {
              echo 'Приветсвую' . ' ' . $login;
              echo "<a href=\"/login\"> Выйти</a>";
          } else {
              echo "<a href=\"/login\"> Зайти на сайт</a>";
          }
          ?>
        <form method="post">
          Название статьи: <?= $title ?> <br>
          <input name="title" value="<?= $title ?>"/><br>
          Текст статьи: <br>
          <textarea name="content" rows="10" cols="40"/><?= $content ?></textarea><br><br>
          <input type="submit" name="save" value="Сохранить">
          <input type="submit" name="delete" value="Удалить">

        </form>
        <div>
            <?php
            echo $msg . '<br>';
            ?>
        </div>
        <a href="/login">Выйти</a>


