<?php

    session_start();

    include_once "model/auth.php";
    include_once "model/messages.php";

    $isAuth = isAuth();
    unset($_SESSION['returnUrl']);

    if($_GET['auth'] == 'off'){
        logOff();
        header('Location: index.php');
        exit();
    }

    $articles = getAllMessages();

    include "view/v_index.php";