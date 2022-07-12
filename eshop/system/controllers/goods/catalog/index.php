<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

    include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

    // include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Connect.php');
    // include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/UnitActions.php');
    // include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Unit.php');
    // include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Good.php');

    $result = (new \Nordic\Core\Good())->getElements();

    // $connect = new Connect();
    // $result = mysqli_query($connect->getConnection(), "SELECT * FROM `core_goods`");
    // var_dump($result);
    //mysqli_close($link);
    
?>

<div class="flex-box">
    <? while($row = mysqli_fetch_assoc($result)){?>
        <div class='item'>
        <? $good = new \Nordic\Core\Good($row['id']); ?>
            <div class='item-photo'>
                <img src='<?= $good->photo()?>'>
            </div>
            <div>
                <a href="card.php?id=<?= $good->getField('id')?>"> 
                    <b>
                        <?=$good->title()?>
                    </b>
                </a>
            </div>
            <div>
                <?=$good->price()?> руб.
            </div>
            <div>
                <?= \Nordic\Core\Good::getQuality(); ?>
            </div>
            <div>
                <? if(\Nordic\Core\Good::HAS_GOOD == 1){?>
                    товар в наличии
                <?} ?>
            </div>
            <div>
                <? if(\Nordic\Core\Good::$has_good){?>
                    товар в наличии <?= \Nordic\Core\Good::$has_good?>
                <?} ?>
            </div>
        </div>
    <?}?>
</div>
<script src='js/script.js'></script>

