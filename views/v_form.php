
<form method="post">
          Ваше имя: <br>
          <input name="name" value="<?= $name ?>"/><br>
    Email: <br>
    <input name="email" value="<?= $email ?>"/><br>
          Сообщение: <br>
          <textarea name="message" rows="10" cols="40"/><?= $message ?></textarea><br><br>
<input type="submit" value="Отправить">
    <h4>
        <?= $msg ?>
    </h4>

</form>