<?php

//var_dump($_FILES['photo']);

$id = (int)$_POST['id'];

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

//подготовили массивы полей и значений
$arr_fields = [];
$arr_values = [];

//разбираем все пришедшие данные
foreach($_POST as $key => $value){
    if($key != 'password'){
        if($key != 'id'){
            $arr_fields[] = $key;
            $arr_values[] = "'".$value."'";
        }
    }else {
        if($value != ''){
            $arr_fields[] = $key;
            $arr_values[] = "'".crypt($value)."'";
        }
    }
}

$str_update = '';
for($i = 0; $i < count($arr_fields); ++$i){
    $str_update = $str_update.$arr_fields[$i].'='.$arr_values[$i].',';
}

$str_update = trim($str_update, ',');

$login = $_POST['login'];
$email = $_POST['email'];

//подключаемся к базе данных и записываем

$connect = new \Nordic\Core\Connect();  

$amount = $id;
$result = mysqli_query($connect->getConnection(), "SELECT `id` as num FROM `core_users` WHERE `login` = '$login' OR `email` = '$email'");
while($info = mysqli_fetch_assoc($result))
    if($info['num'] != $id) $amount = $info['num'];

if($amount != $id){
    echo 'Такой логин или email уже существуют';
}else{
    //создаём новую строчку в таблице
    $result = mysqli_query($connect->getConnection(), "UPDATE `core_users` SET $str_update WHERE `id` = $id");
    if($result){
        //echo "Товар создан";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else{
        echo "Что-то пошло не так";
    }
    
}