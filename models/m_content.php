<?php
/**
 * функции выода контента
 * User: Admin
 */
include_once('m_bd.php');
 // получаем всю таблицу news по дате
 function content_all(){
     $qwery = db_qwery("SELECT * FROM news ORDER BY data_news DESC");

     return $qwery -> fetchAll();
 }
// получаем одну новость из табоицы news по id
function content_one($id){
    $qwery = db_qwery("SELECT * FROM news WHERE id_news = :id", ['id' => $id ]);
    return $qwery->fetch();
}
// получаем данные пользователя по логину
function content_login($login){
    $qwery = db_qwery("SELECT * FROM user WHERE login_user = :login", ['login' => $login ]);
    return $qwery->fetch();
}
// записываем новость в базу
function content_add($title, $content){
    db_qwery("INSERT INTO news (title_news, content_news) VALUES (:title, :content)",[
        'title' => $title,
        'content' => $content,

    ]);
}
// редактирование-обновление статьи
function content_edit($id, $title, $content){
    $query = db_qwery("UPDATE news SET title_news = :title, content_news = :content WHERE id_news = :id", [
        'id' => $id,
        'title' => $title,
        'content' => $content
    ]);
    return $query;
}
//удаляем новость по id
function content_delete($id){
    db_qwery("DELETE FROM news WHERE id_news = :id", [
        'id' => $id

    ]);
}

//проверяем корректность id
function сheck_id_post($id)
{
    return preg_match("/[^a-zA-Z0-9-]/i", $id);
}

function myHash($str)
{
    return hash('sha256', $str . '843htongf');
}

// Авторизация
function isAuth(){
    $isAuth = false;
     //если сесия открыта то авторизация true
    if(isset($_SESSION['is_auth']) && $_SESSION['is_auth']){

        $isAuth = true;

    }elseif(isset($_COOKIE['login']) && isset($_COOKIE['password'])){// если есть куки то сравниваем их с данными в базе
        $login = trim($_COOKIE['login']);
        $password = trim($_COOKIE['password']);
        $user = content_login($login);// данные из базы берем по пользоваттелю
        if ($login == $user['login_user'] && $password == $user['pass_user']){ // если данные совпадают то авторизация отрыта и открывыаем сесию
            $isAuth = true;
            $_SESSION['is_auth'] = true;

        }

    }
    return $isAuth;
}

// Деавторизация
function logOff()
{
    $_SESSION['is_auth'] = false;
    setcookie('admin', '', 1, '/');
    setcookie('password', '', 1, '/'); // закрываем и сесию и перезаписываем куки
}