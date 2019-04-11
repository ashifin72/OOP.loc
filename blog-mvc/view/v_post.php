<?php

if($err404){
    echo 'Ошибка №404. Страница не найдена.';
}else{
    echo $content['news_content'];
}

?>
    <br>
    <a href="index.php">Назад</a>
<? if($isAuth): ?>
    <a href="index.php?auth=off">Выход</a>
<? endif; ?>