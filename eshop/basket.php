<?

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

require_once('components/header/index.php');

?>
<link rel='stylesheet' href='css/style.css'>
<div class="flex-box">
    <?if(isset($_SESSION['basket']) && count($_SESSION['basket'])){?>
        <? foreach($_SESSION['basket'] as $id){?>
            <? $good = new \Nordic\Core\Good($id); ?>
            <div class='item'>
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
                <div data-id="<?=$id?>"onclick="fromBasket()" class="good-delete">
                    x
                </div>
            </div>
        <?}?>
        <div>
            <a href="system/controllers/basket/clear_basket.php">Очистить</a>
        </div>

        <div>
            <form action="system/controllers/orders/create.php" method="get">
                <div>
                    <input type="text" name="first_name" placeholder="Ваше имя" >
                </div>
                <div>
                    <input type="email" name="email" placeholder="E-mail" >
                </div>
                <div>
                    <input type="tel" name="phone" placeholder="Телефон" >
                </div>
                <div>
                    <button>Заказать</button>
                </div>
            </form>
        </div>

    <?} else {?>
            Ваша корзина пуста
    <?}?>
</div>
<script src='js/script.js'></script>