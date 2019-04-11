<?php

if (!$isAuth){
    header('Location: login.php');
    exit();
}
if (count($_POST) > 0) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    if ($title === '' || $content === '') {
        $msg = 'Заполните все поля!';
    } elseif (mb_strlen($title) > TITLE_MAX) {
        $msg = 'Слишком большое название';
    }elseif (mb_strlen($content) > CONTENT_MAX) {
        $msg = 'Слишком большой текст статьи';
    } else {
        //сохраняем статью в базу данных  и отправляем на гланую
        $id = content_add($title, $content);
        header('Location: /');
        exit();
    }

} else $msg = '';
$title = '';
$content = '';

$inner = template('v_add', [
    'msg'=> $msg,
    'title' => $title,
    'content' => $content,
    'login' => $login,
    'isAuth' => $isAuth
]);
$title = 'Добавление новости';

