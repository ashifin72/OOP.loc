<?php
function template($fname, $vars = [])
{
    extract($vars);// преобразуем ключи в перменные
    ob_start(); //посылаем данные в буфер обмена
    include "views/$fname.php";
    return ob_get_clean(); // выводим данные из буфера обменая
}

