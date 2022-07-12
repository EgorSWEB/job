<link rel='stylesheet' href='css/style.css'>
<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

    include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

    // include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Connect.php');
    // include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/UnitActions.php');
    // include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Unit.php');
    // include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/ShowArticleInfo.php');
    // include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Article.php');

    $result = (new \Nordic\Core\Article())->getElements();

    // $connect = new Connect();
    // $result = mysqli_query($connect->getConnection(), "SELECT * FROM `core_articles`");
    // var_dump($result);  
?>
<div class="flex-box">
    <? while($row = mysqli_fetch_assoc($result)){?>
        <? $article = new \Nordic\Core\Article($row['id']); ?>
        <div class='article' style='background-image:url(<?= $article->getField('photo') ?>)'>
            <div>
                <div>
                    <b>
                        <?= $article->title() ?>
                    </b>
                </div>
                <div>
                    <?= $article->getField('description') ?> 
                </div>
            </div>
        </div>
    <?}?>
</div>
