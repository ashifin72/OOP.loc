<? if($err404):
    echo "Ошибка. Запрашиваемая статья не найдена.";
else: ?>
    <form method="post">
        Название<br>
        <input type="text" name="title" value="<?=$text['news_title']; ?>"><br>
        Контент<br>
        <textarea name="content"><?=$text['news_content']; ?></textarea><br>
        <a href="index.php" type="button">Отмена</a>
        <a href="index.php?auth=off" type="button">Выйти</a>
        <input type="submit" value="Сохранить"><br>
    </form>
    <a href="index.php">На главную</a><br><br>
<? endif; ?>
<?=$msg; ?>