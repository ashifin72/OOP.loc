<?php

if (count($_POST) > 0){
    $name = trim($_POST['name']) ?? null;
    $email = trim($_POST['email']) ?? null;
    $message = trim($_POST['message']) ?? null;
    if ($name == '' || $email == '' || $message == ''){
        $msg = 'Заполните все поля!';
    }elseif (!сheck_name_form($name) || !сheck_name_form($message)){
        $msg = 'Некоректное заполнение полей';
    }

    elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false){
        $msg = 'Введите правильный email!';
    }
    mail("ashfedor@gmail.com", " письмо от $email", "$message");
    $msg = ' Ваше письмо отправленно!';
}

$inner = template('v_form',[
    'name'=> $name ?? null,
    'email'=> $email ?? null,
    'message' => $message ?? null,
    'msg'=> $msg ?? null

]);
$title = 'Обратная связь';