<? session_start(); ?>
<header>
    <div class="flex-box">
        <div>
            <div class="logo"></div>
            <div class="top-menu flex-box">
                <div>
                    <a class="<?if(isset($_GET['category_id']) && $_GET['category_id'] == 1){?> is-bold <?}?>" href="catalog.php?category_id=1">Женщинам</a>
                </div>
                <div>
                    <a class="<?if(isset($_GET['category_id']) && $_GET['category_id'] == 2){?> is-bold <?}?>" href="catalog.php?category_id=2">Мужчинам</a>
                </div>
                <div>
                    <a class="<?if(isset($_GET['category_id']) && $_GET['category_id'] == 3){?> is-bold <?}?>" href="catalog.php?category_id=3">Детям</a>
                </div>
                <div>
                    <a href="#">Новинки</a>
                </div>
                <div>
                    <a href="#">О нас</a>
                </div>
            </div>
        </div>
        <div class="flex-box">
            <div class="user">
                <?
                if(isset($_COOKIE['user_id'])) {?>
                    
                    Привет, <?=(new \Nordic\Core\User($_COOKIE['user_id']))->getField('login');?>(<a href="system/controllers/users/logout.php">Выйти</a>)
                <? } else { ?>
                    <a href="auth/index.php">
                        Вход
                    </a>
                <?}?>
            </div>
            <div class="basket">
                <a href="basket.php">
                    Корзина (<span id = "basket-count"><?= count($_SESSION['basket'])?></span>)
                </a>
            </div>
        </div>
    </div>
</header>