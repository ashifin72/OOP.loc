<?php
define('ROOT', '/');
session_start();
$login = $_SESSION['login'] ?? '';
include_once('models/m_content.php');
include_once('models/m_system.php');
include_once('models/m_validate.php');
$isAuth = isAuth();

$url = $_GET['php1chpu'] ?? '';

$params = explode('/' , $url); // загоняем название контроллера в переменную

$int = count($params)-1; // убираем из адреса последнее значение если оно пустое, наример /
if ($params[$int] === ''){
    unset($params[$int]);
}
//var_dump($params);
$controller = trim($params[0] ?? 'home');

    if(!file_exists("controllers/$controller.php") || сheck_id_post($controller)){
        header("Location: index.php?c=404");
        exit();
    }

include_once("controllers/$controller.php");

echo template('v_main', [
    'title' => $title,
    'content' => $inner,
    'login' => $login,
    'isAuth' => $isAuth,

]);



