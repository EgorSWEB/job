<?php

//var_dump($_FILES['photo']);

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

//подготовили массивы полей и значений
$arr_fields = [];
$arr_values = [];

//разбираем все пришедшие данные
foreach($_POST as $key => $value){
    if($key != 'password'){
        $arr_fields[] = $key;
        $arr_values[] = "'".$value."'";
    }else {
        $arr_fields[] = $key;
        $arr_values[] = "'".crypt($value)."'";
    }
}

//преобразовали массивы к строкам
$str_fields = implode(',',$arr_fields);
$str_values = implode(',',$arr_values);

$login = $_POST['login'];
$email = $_POST['email'];

//подключаемся к базе данных и записываем

$connect = new \Nordic\Core\Connect();  

$result = mysqli_query($connect->getConnection(), "SELECT COUNT(id) as num FROM `core_users` WHERE `login` = '$login' OR `email` = '$email'");
$info = mysqli_fetch_assoc($result);
$amount = $info['num'];

if($amount > 0){
    echo 'Такой логин или email уже существуют';
}else{
    //создаём новую строчку в таблице
    $result = mysqli_query($connect->getConnection(), "INSERT INTO `core_users` ($str_fields) VALUES ($str_values)");
    if($result){
        //echo "Товар создан";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else{
        echo "Что-то пошло не так";
    }
    
}