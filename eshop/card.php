<link rel='stylesheet' href='css/style.css'>

<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

$good = new \Nordic\Core\Good($_GET['id']);
?>

<? require_once('components/header/index.php');?>

<?
    $category = new \Nordic\Core\Category($good->getField('category_id'));
    $cat_name = $category->getField('title');

    $type = new \Nordic\Core\Type($good->getField('type_id'));
    $type_name = $type->getField('title');
?>

<div class="breadcrumps flex-box">
    <div>
        <a href="index.php">Главная</a>
    </div>
    /
    <div>
        <a href="catalog.php?category_id=<?= $good->getField('category_id')?>">
            <?=$cat_name?>
        </a>
    </div>
    /
    <div>
        <a href="catalog.php?category_id=<?= $good->getField('category_id')?>&type=<?= $good->getField('type_id')?>">
            <?=$type_name?>
        </a>
    </div>
    /
    <div>
        <?=$good->title()?>
    </div>
</div>

<div class="flex-box">
    <div class='item'>
        <div class='item-photo'>
            <img src='<?= $good->photo()?>'>
        </div>
        <div>
            <b>
                <?=$good->title()?>
            </b>
        </div>
        <div>
            Артикул: <?=$good->getField('articul')?>
        </div>
        <div>
            <?=$good->price()?> руб.
        </div>
        <div>
            <?=$good->getField('description')?>
        </div>
        <div onclick="toBasket()" class="btn-busket">
            В корзину
        </div>
    </div>
</div>
<script src='js/script.js'></script>