<?php
include_once('../models/m_bd.php');

$qwery = db_qwery("SELECT * FROM chat ORDER BY chat_dt DESC"); // С помощью функции получаем и проверяем данные

$messages = $qwery -> fetchAll();
?>
<?php foreach ($messages as $message) { ?>
  <div>
    <em><?= $message['chat_dt'] ?></em>
    <strong><?= $message['chat_user'] ?></strong>
    <div><?= $message['chat_text'] ?></div>
  </div>
  <hr>
<?php } ?>
<a href="add.php">Добавить</a>
