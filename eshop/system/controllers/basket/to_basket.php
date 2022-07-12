<?php

session_start();

//считываем содержимое корзины в буфер
if(isset($_SESSION['basket'])){
    $basket = $_SESSION['basket'];
}else{
    $basket = [];
}

//получаем id товара
if($id = $_GET['id']){

    //если в корзине нет товара, то добавляем
    if(!in_array($id, $basket)){
        $basket[] = $id;
    }

    $_SESSION['basket'] = $basket;

    echo count($_SESSION['basket']);
}