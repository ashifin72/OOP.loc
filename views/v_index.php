
<?php
$list = content_all();
$title = 'Главная';

foreach ($list as $post) { ?>
  <div class="post">
    <h3> <?= $post['title_news'] ?></h3>
    <em>Дата публикации <?= $post['data_news'] ?></em>
    <div><a href="<?=ROOT ?>post/<?= $post['id_news'] ?>">Читать далее</a>
    </div>
  </div>
<?php } ?>