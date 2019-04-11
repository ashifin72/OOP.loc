<?php

session_start();

include_once "model/auth.php";
include_once "model/messages.php";

$isAuth = isAuth();
unset($_SESSION['returnUrl']);

if(!$isAuth){
    header('Location: login.php?auth=off');
    exit();
}

$id = $_GET['id'] ?? null;

if (!isset($id) || $id == '' || !preg_match('/^[0-9]+$/', $id)){
    echo "Такой статьи не существует!";
}else{
    deleteMessage($id);
    header('Location: index.php');
    exit();
}