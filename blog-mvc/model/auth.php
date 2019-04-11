<?php

include_once "inc/config.php";

// Хэширование
function myHash($str){
    return hash('sha256', $str . SALT);
}

// Авторизация
function isAuth(){
    $isAuth = false;

    if(isset($_SESSION['is_auth']) && $_SESSION['is_auth']){

        $isAuth = true;

    }elseif(isset($_COOKIE['login']) && isset($_COOKIE['password'])){

        if ($_COOKIE['login'] == myHash($_SESSION['login']) && $_COOKIE['password'] == myHash($_SESSION['password'])) {

            $_SESSION['is_auth'] = true;
            $isAuth = true;
        }
    }
    return $isAuth;
}

// Деавторизация
function logOff(){
    $_SESSION['is_auth'] = false;
    setcookie('admin', '', 1, '/');
    setcookie('password', '', 1, '/');
}