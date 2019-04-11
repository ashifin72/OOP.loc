<form method="post">
    Название<br>
    <input type="text" name="title" value="<?=$title; ?>"><br>
    Контент<br>
    <textarea name="content" ><?=$content; ?></textarea><br>
    <a href="index.php" type="button">Отмена</a>
    <a href="index.php?auth=off" type="button">Выйти</a>
    <input type="submit" value="Отправить"><br>
</form>
<a href="index.php">На главную</a><br><br>
<?=$msg; ?>