
          <?php if($isAuth){
              echo 'Приветсвую' . ' ' . $login;
              echo "<a href=\"/login\"> Выйти</a>";
          } else{
              echo "<a href=\"/login\"> Зайти на сайт</a>";
          }
          ?>
        <form method="post">
          Название статьи: <br>
          <input name="title" value="<?= $title ?>"/><br>
          Текст статьи: <br>
          <textarea name="content" rows="10" cols="40"/><?= $content ?></textarea><br><br>
          <input type="submit" value="Сохранить">

        </form>

            <?php
            echo $msg;
            ?>


        <br>
        <a href="/login">Выйти</a>



