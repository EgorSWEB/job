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
    //нужно найти элемент с таким значением и удалить его

    if(in_array($id,$basket)){
        for($i = 0; $i<count($basket); ++$i){
            //если нашли то удаляем
            if($basket[$i] == $id){
                unset($basket[$i]);
                break;
            }
        }
        //сортируем массив
        sort($basket);
    }

    $_SESSION['basket'] = $basket;

    echo count($_SESSION['basket']);
}
