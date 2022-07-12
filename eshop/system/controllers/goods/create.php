<?php

//var_dump($_FILES['photo']);

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

//подготовили массивы полей и значений
$arr_fields = [];
$arr_values = [];

//разбираем все пришедшие данные
foreach($_POST as $key => $value){
    $arr_fields[] = $key;
    $arr_values[] = "'".$value."'";
}

$file_name_info = explode('.',$_FILES['photo']['name']);

//чистое название файла
$file_pure_name = $file_name_info[0];
//расширение файла
$file_ext = $file_name_info[1];
//уникально сгенерированная строка
$hash = md5($file_pure_name.time());

//новое уникальное имя файла
$file_new_name = $file_pure_name.'_'.$hash.'.'.$file_ext;

$file_full_path = "img/catalog/".$file_new_name;

//загрузка на сервер
move_uploaded_file($_FILES['photo']['tmp_name'], "../../../".$file_full_path);

$arr_fields[] = 'photo';
$arr_values[] = "'".$file_full_path."'";

//преобразовали массивы к строкам
$str_fields = implode(',',$arr_fields);
$str_values = implode(',',$arr_values);



//подключаемся к базе данных и записываем
$connect = new \Nordic\Core\Connect(); 

$result = mysqli_query($connect->getConnection(), "INSERT INTO `core_goods`($str_fields) VALUES($str_values)");
if($result){
    //echo "Товар создан";
    header("Location: ".$_SERVER['HTTP_REFERER']);
}else{
    echo "Что-то пошло не так";
}