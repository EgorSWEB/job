<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

echo \Nordic\Test\Beer::NAME;

echo "<br>";

echo \Nordic\Test\Ale::NAME;

echo "<br>-----------------<br>";


echo \Nordic\Test\Beer::getName();

echo "<br>";

echo \Nordic\Test\Ale::getName();

echo "<br>-----------------<br>";


echo \Nordic\Test\Beer::getStaticName();

echo "<br>";

echo \Nordic\Test\Ale::getStaticName();

//статические свойства и методы принадлежат КЛАССАМ а не ОБЪЕКТАМ

//статические методы и свойства вызываются в контексте от имени КЛАССА с помощью ::

//константы являются статическими переменными 

//создаем статические  с помощью ключевого слова static

//обратиться внутри класса к статике можно с помощью static и self

//static указывает на тот класс от которого вызывается 

//self указывает на тот класс внутри которого создан метод