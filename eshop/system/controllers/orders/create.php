<?php

session_start();

// var_dump($_GET);
// var_dump($_SESSION['basket']);

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

$arr_fields = [];
$arr_values = [];

foreach($_GET as $key => $value){
    $arr_fields[] = $key;
    $arr_values[] = "'".$value."'";
}

// $first_name = $_GET['first_name'];
// $email = $_GET['email'];
// $phone = $_GET['phone'];

$arr_fields[] = 'goods';
$arr_values[] = "'".json_encode($_SESSION['basket'])."'";

$arr_fields[] = 'publ_time';
$arr_values[] = "'".(time()+7200)."'";

$str_fields = implode(',',$arr_fields);
$str_values = implode(',',$arr_values);
// $goods = json_encode($_SESSION['basket']);
// $publ_time = time();

//подключаемся к базе данных и записываем
$connect = new \Nordic\Core\Connect(); 

// echo "INSERT INTO `core_orders`($str_fields) VALUES($str_values)";

$result = mysqli_query($connect->getConnection(), "INSERT INTO `core_orders`($str_fields) VALUES($str_values)");
if($result){
    echo "Ваш заказ успешно оформлен";
    $_SESSION['basket'] = [];
}else{
    echo "Что-то пошло не так";
}

//здесь место кода который отправит уведомление

//https://api.telegram.org/bot1420236915:AAETf-zAWeh6ynmX-tnvIdttk9fp-fStBpY/getUpdates

$chat_id = 648489483;

$text = 'Вам пришел заказ';
// sendMessage($chat_id,$text);

// $text = 'Всем привет';
// sendMessage($chat_id,$text);

// $text = 'Как дела?';
// sendMessage($chat_id,$text);


$photo = 'https://luxfon.com/images/201203/luxfon.com_1193.jpg';
// sendPhoto($chat_id, $photo);

$telegram = new \Nordic\Core\Telegram("1420236915:AAETf-zAWeh6ynmX-tnvIdttk9fp-fStBpY");

$telegram->sendMessage($chat_id, $text);

$telegram->sendPhoto($chat_id, $photo);

$telegram->sendLocation($chat_id, 90, 12.1);