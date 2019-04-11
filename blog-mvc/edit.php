<?php
    session_start();

    include_once "model/auth.php";
    include_once "model/messages.php";

    $isAuth = isAuth();

    $id = $_GET['id'] ?? null;
    $err404 = false;

    // Проверка авторизации
    if(!$isAuth){
        $_SESSION['returnUrl'] = "edit.php?id=$id";
        header('Location: login.php?auth=off');
        exit();
    }

    if (!isset($id) || $id == '' || !preg_match('/^[0-9]+$/', $id)){
        $err404 = true;
    }

    $text = getOneMessage($id);

    if(!$text){
        $err404 = true;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $title = trim(strip_tags($_POST['title']));
        $content = trim(strip_tags($_POST['content']));

        if ($title == '' || $content == '') {

            $msg = 'Заполните все поля';

        } else {
            updateMessage($id, $title, $content);
            header('Location: index.php');
            exit();
        }

    }

    include "view/v_edit.php";


