<?php

    session_start();

    include_once "model/auth.php";
    include_once "model/messages.php";

    $isAuth = isAuth();

    $id = $_GET['id'] ?? null;
    $err404 = false;

    if ($id === null || $id == '' || !preg_match('/^[0-9]+$/', $id)) {
        $err404 = true;
    } else {
        $content = getOneMessage($id);

        if(!$content){
            $err404 = true;
        }
    }

    include "view/v_post.php";