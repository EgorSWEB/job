<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

$test = new \Nordic\Test\Test();

$test->drive();

$good_from_library = new \Library\Good();
$good_from_library->showInfo();

$good_shop = new \Nordic\Core\Good(1);
echo $good_shop->price();
