<?php
require "libs/rb.php"; // подключаем библиотеку.

R::setup('mysql:host=localhost;dbname=IT-CLUB', 'root', ''); // подключаем БД

session_start();

function showError($errors){
    return array_shift($errors);
}