<?php
const TITLE_MAX = 50;
const CONTENT_MAX = 50000;
// подключаем базу данных
function db_connect(){
    static $db; // загоняем подключение в статическую переменную
    if ($db === null){// если подключение еще не было то подключаем со следующими параметрами
        $db = new PDO('mysql:host=localhost;dbname=phpblog', 'root', ''); //устанавливаем соединение с базой
        $db->exec('SET NAMES UTF8'); // устанавливаем кодировку UTF8
    }
    return $db; // отдаем подключение
}

// проверяем на ошибку подключения
function db_check_error($qwery){
    $info = $qwery->errorInfo(); // получаем масив с информацией о возможных ошибках по errorInfo

    if ($info[0] !== PDO::ERR_NONE) { //проверяем на ошибки по первому ключу
        echo 'Техническая ошибка на сайте!';
        exit();
    }
}
// Отправляем или получаем данные с базы данных
function db_qwery($sql, $params = []){
    $db = db_connect(); // берем подключение к базе
    $qwery = $db->prepare($sql); // запрос загоняем в переменную
    $qwery->execute($params); // выполняем отправку bkb получение данных
    db_check_error($qwery); // проверяем на ошибку
    return $qwery;
}
