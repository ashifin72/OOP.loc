<?php
    session_start();

    include_once "model/auth.php";
    include_once "model/messages.php";

    $isAuth = isAuth();

    if(!$isAuth){
        $_SESSION['returnUrl'] = 'add.php';
        header('Location: login.php?auth=off');
        exit();
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $title = trim(strip_tags($_POST['title']));
        $content = trim(strip_tags($_POST['content']));

        if ($title == '' || $content == '') {

            $msg = 'Заполните все поля';

        } else {
            $id = addMessage($title, $content);
            header("Location: post.php?id=$id");
            exit();
        }

    } else {
        $title = '';
        $content = '';
        $msg = '';
    }

    include "view/v_add.php";
