<?php

    include_once "../inc/config.php";

    // Подключение к бд
    function db_connect(){
        static $db;

        if($db === null){
            $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME , LOGIN, PASS);
            $db->exec('SET NAMES UTF8');
        }

        return $db;
    }

    // Запросы к бд
    function db_query($sql, $params = []){
        $db = db_connect();

        $query = $db->prepare($sql);
        $query->execute($params);

        db_check_error($query);

        return $query;
    }

    // Проверка ошибок в бд
    function db_check_error($query){
    $info = $query->errorInfo();

    if($info[0] != PDO::ERR_NONE){
        exit($info[2]);
    }
}