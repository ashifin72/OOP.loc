<?php
//начинаем с 1
$id = $params[1] ?? null;
$isAuth = isAuth()?? '';

if ($id === null || $id == '') {
    $msg = 'Ошибка параметоров, не переданно значение!';
}
elseif (сheck_id_post($id)) {
    $msg = 'Не коректные данные';
}
 else {
    $post = content_one($id);
    if($post === false){
        echo 'Не коректные данные 404';
        exit();
    }
}
$inner = template('v_post', [
    'post'=> $post ?? null,
    'id' =>$id,
    'login' => $login ?? null,
    'isAuth' => $isAuth ?? null,
    'msg' => $msg ?? null
]);
$title = $post['title_news'] ?? null;



