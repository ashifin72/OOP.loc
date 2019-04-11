<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/font-awesome.css">
    <title>Document</title>
</head>
<body>
<? foreach ($articles as $article): ?>
    <a href="post.php?id=<?=$article['id_news'];?>"><?=$article['news_title'];?></a>
    <? if($isAuth): ?>
        &nbsp;<a href="edit.php?id=<?=$article['id_news'];?>"><i class="fa fa-pencil-square-o"></i></a>
        &nbsp;<a href="delete.php?id=<?=$article['id_news'];?>"><i class="fa fa-times"></i></a>
    <? endif; ?>
    <br>
<? endforeach;

if($isAuth): ?>
    <br>
    <a href="add.php">Добавить</a><br>
    <a href="index.php?auth=off" type="button">Выйти</a><br>
<? else: ?>
    <br>
    <a href="login.php">Войти</a>
<? endif; ?>
</body>
</html>