<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

//получение данных

$login = $_GET['login'];
$password = $_GET['password'];

//подключаемся к базе данных и записываем

$connect = new \Nordic\Core\Connect();  

$result = mysqli_query($connect->getConnection(), "SELECT * FROM `core_users` WHERE (`login` = '$login' OR `email` = '$login')");
$user = mysqli_fetch_assoc($result);

if($user['id']){
    //начинаем проверку парлоя такак как юзер с таким логином есть
    if(hash_equals($user['password'], crypt($password, $user['password']))){
        setcookie('user_id', $user['id'],time()+3600,'/');
        header('Location: http://localhost:8080/eshop/catalog.php');
    }else{
        header('Location: '.$_SERVER['HTTP_REFERER'].'?wrong=1');
    }
}else{
    header('Location: '.$_SERVER['HTTP_REFERER'].'?wrong=1');
}
