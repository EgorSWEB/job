<footer>
    <div class="flex-box flex-between">
        <div>
            <div class="is-bold">КОЛЛЕКЦИИ</div>
            <?php
            $categories = mysqli_query($connect->getConnection(), "SELECT * FROM `categories`");
            while ($category = mysqli_fetch_assoc($categories)){
                $count = mysqli_query($connect->getConnection(), "SELECT COUNT(*) as num FROM `core_goods` WHERE category_id=".$category['id']);
                $info = mysqli_fetch_assoc($count);
                
                ?>
                <div>
                    <a href="catalog.php?category_id=<?= $category['id']?>">
                        <?=$category['title']?>(<?=$info['num']?>)
                    </a>
                </div>
            <?}?>
            <?php
                $count = mysqli_query($connect->getConnection(), "SELECT COUNT(*) as num FROM `core_goods` WHERE is_new=1");
                $info = mysqli_fetch_assoc($count);
            ?>
            <div>
                <a href="catalog.php?is_new=1">
                    Новинки (<?=$info['num']?>)
                </a>
                
            </div>
          
        </div>
        <div>
            <div class="is-bold">МАГАЗИН</div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div>
            <div class="is-bold">МЫ В СОЦСЕТЯХ</div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</footer>