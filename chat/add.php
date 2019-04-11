<?php
include_once('../models/m_bd.php');
$db = db_connect();

if (count($_POST) > 0) {
    $name = trim($_POST['name']);
    $text = trim($_POST['text']);
    if ($name == '' || $text == '') {
        $msg = 'Заполните все поля!';
    } else {
        db_qwery("INSERT INTO chat (chat_user, chat_text) VALUES (:n, :t)",[
            'n' => $name,
            't' => $text
              ]);
        header("Location: index.php");
        exit();
    }
} else {
    $name = '';
    $text = '';
    $msg = '';
}

?>
<form method="post">
  Имя <br>
  <input type="text" name="name" value="<?= $name ?>"> <br>
  Сообщение<br>
  <textarea name="text" cols="30" rows="10"><?= $text ?></textarea>
  <br>
  <input type="submit" value="Отправить">

</form>
