<?php

namespace Nordic\Core;

abstract class Unit implements \Nordic\Interfaces\UnitActions
{
    private $id;
    private $data;

    public function __construct($id = NULL){
        $this->id = $id;
    }

    public function __get($name){
        echo "Произошел доступ к непубличным свойствам<br>".$name;
        return $this->$name;
    }

    public function __set($name, $value){
        echo "Попытка изменить непубличное свойство<br>".$name;
        $this->$name = $value;
    }
    // public function getElementByTitle($title){
    //     $link = mysqli_connect('localhost', 'root', '', 'eshop2');
    //     mysqli_set_charset($link, 'utf8');
    //     $result = mysqli_query($link, "SELECT `id` FROM ".$this->setTable()." WHERE `title` = '".$title."'");
    //     // var_dump($result);
    //     $row = mysqli_fetch_assoc($result);
    //     $this->id = $row['id']; //момент кеширования
    //     mysqli_close($link);
    // }

    public function getElements(){
        $connect = new \Nordic\Core\Connect();
        $result = mysqli_query($connect->getConnection(), "SELECT * FROM ".$this->setTable());
        return $result;
    }

    public function getData(){
        $link = mysqli_connect('localhost', 'root', '', 'eshop2');
        mysqli_set_charset($link, 'utf8');
        $result = mysqli_query($link, "SELECT * FROM ".$this->setTable()." WHERE `id` = ".$this->id);
        // var_dump($result);
        $row = mysqli_fetch_assoc($result);
        $this->data = $row; //момент кеширования
        mysqli_close($link);
    }

    public function getTable($table){
        $this->table = $table;
    }

    public function setTable(){
        return $this->table;
    }

    public function getField($field){
        if(!$this->data){
            $this->getData();
        }
        return ($this->data)[$field];
    }
    
    public function title(){
        return $this->getField('title');
    }
}