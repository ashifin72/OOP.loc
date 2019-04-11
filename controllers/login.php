<?php

logOff();

if (count($_POST) > 0) {
    $login = trim($_POST['login']);
    $password = myHash(trim($_POST['password']));
    $user = content_login($login);

    if ($login == $user['login_user'] && $password == $user['pass_user']) {
        $_SESSION['is_auth'] = true;
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;

        if (isset($_POST['remember'])) {
            setcookie('login', myHash($login), time() + 3600 * 24 * 7, '/');
            setcookie('password', myHash($password), time() + 3600 * 24 * 7, '/');
            $_SESSION['is_auth'] = true;
        }

        header('Location: index.php');
        exit();
    }
}
$inner = template('v_login',[

]);
$title = 'Авторизация';