<?php

if (!$isAuth) {
    header('Location: login.php');
    exit();
}
$msg = '';
$id = $params[1] ?? null;

if ($id === null) {
    echo 'Ошибка 404, статья с таким именем не существует!';
    //выход
    exit();
} elseif ($id == '') {
    echo 'Ошибка 404, укажите название статьи!';
    // выход
    exit();
} elseif (сheck_id_post($id)) {
    echo 'Ошибка 404, нежелательный код в id!'; //защищаем от взлома
    // выход
    exit();
} else {
    // читаем данные из базы
    $list = content_one($id);
    $title = $list['title_news'];
    $content = $list['content_news'];

}
if (isset($_POST{'save'})) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    if ($title === '' || $content === '') {
        $msg = 'Заполните все поля!';
    } elseif (mb_strlen($title) > TITLE_MAX) {
        $msg = 'Слишком большое название';
    } else {
        //сохраняем статью в базу данных  и отправляем на гланую
        content_edit($id, $title, $content);
        header("Location: /post/$id");
        exit();
    }
    // выводим ошибку если есть
    echo $msg;

}

if (isset($_POST['delete'])) {
    content_delete($id);
    header("Location: /index.php");
    exit();
}
$inner = template('v_edit', [
    'msg'=> $msg,
    'title' => $title,
    'content' => $content,
    'login' => $login,
    'isAuth' => $isAuth

]);
$title = 'Редактирование статьи';