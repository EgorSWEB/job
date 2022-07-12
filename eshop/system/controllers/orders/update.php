<?php

//var_dump($_FILES['photo']);

$id = (int)$_POST['id'];

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

//подготовили массивы полей и значений

//разбираем все пришедшие данные
$str_update = '';
$str_update = $str_update.'order_status='.$_POST['order_status'].',';
$str_update = $str_update.'last_update='.(time()+7200).',';
$str_update = trim($str_update, ',');

//подключаемся к базе данных и записываем

$connect = new \Nordic\Core\Connect();  

echo "UPDATE `core_orders` SET $str_update WHERE `id` = $id";
$result = mysqli_query($connect->getConnection(), "UPDATE `core_orders` SET $str_update WHERE `id` = $id");
if($result){
    //echo "Товар создан";
    header("Location: ".$_SERVER['HTTP_REFERER']);
}else{
    echo "Что-то пошло не так";
}
    