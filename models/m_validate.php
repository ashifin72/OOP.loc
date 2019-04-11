<?php
/**
 * Валидация данных
 * User: Admin
 * Date: 28.03.2019
 * Time: 18:37
 */
// Проверка коректности данных формы
function сheck_name_form($name)
{
    return preg_match("/[^А-яа-яa-zA-Z0-9-]/i", $name);
}