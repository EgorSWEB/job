<link rel='stylesheet' href='css/style.css'>
<?

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

?>

<? require_once('components/header/index.php');?>

<?
    if(isset($_GET['category_id'])){
       $category = new \Nordic\Core\Category($_GET['category_id']);
       $cat_name = $category->getField('title');
    }else{
        $cat_name = 'Все товары';
    }
?>

<div class="breadcrumps flex-box">
    <div>
        <a href="index.php">Главная</a>
    </div>
    /
    <div>
        <?=$cat_name?>
    </div>
</div>


<div class='filters flex-box'>
    <div>
        <div>Категории</div>
        <div>
            <ul>
                <li>
                    <a href = "?type=1<?= isset($_GET['category_id']) ? '&category_id='.$_GET['category_id'] : '' ?><?= isset($_GET['is_new']) ? '&is_new='.$_GET['is_new'] : '' ?>">Куртки</a>
                </li>
                <li>
                    <a href = "?type=2<?= isset($_GET['category_id']) ? '&category_id='.$_GET['category_id'] : '' ?><?= isset($_GET['is_new']) ? '&is_new='.$_GET['is_new'] : '' ?>">Джинсы</a>
                </li>
                <li>
                    <a href = "?type=3<?= isset($_GET['category_id']) ? '&category_id='.$_GET['category_id'] : '' ?><?= isset($_GET['is_new']) ? '&is_new='.$_GET['is_new'] : '' ?>">Обувь</a>
                </li>
            </ul>
        </div>
    </div>
    <div>
    </div>
    <div>
    </div>
</div>

<h1><?= $cat_name?></h1>

<!-- Сюда подгружаем товары-->
<div id='catalog'>
    
</div>
<?
    // $ch = crypt('1222');
    // echo (int)(hash_equals($ch,crypt('1222',$ch)));
    // echo time();
?> 

<div class="pagination flex-box flex-center">
    <?php
        $connect = new \Nordic\Core\Connect();

        $cat_str = '';

        $type_str = '';

        $new_str = '';

        $filter = '';
        //фильтрация по категория
        if(isset($_GET['category_id']) && $category_id = $_GET['category_id']){
            $filter .= " AND  category_id=$category_id ";

            $cat_str = "&category_id=$category_id";
        }

        //фильтрация по типу товара
        if(isset($_GET['type']) && $type_id = $_GET['type']){
            $filter .= " AND  type_id=$type_id ";

            $type_str = "&type=$type_id";
        }

        //фильтрация по новинкам
        if(isset($_GET['is_new']) && $is_new=$_GET['is_new']){
            $filter .= " AND  is_new=$is_new ";

            $new_str = "&is_new=$is_new";
        }


        $result = mysqli_query($connect->getConnection(), "SELECT COUNT(`id`) as num FROM `core_goods` WHERE id>0 $filter");
        $info = mysqli_fetch_assoc($result);
        $amount = $info['num'];
        $per_page = 2;
        $pages_amount = ceil($amount/$per_page);
        $page = 1;
        if(isset($_GET['page']))
            $page = $_GET['page'];
    ?>
    <? for($i = 1; $i<=$pages_amount; ++$i){?>
        <div class="box <? if($i == $page){echo 'page-active';}?>">
            <a href="?page=<?=$i.$cat_str.$type_str.$new_str?>">
            <?=$i ?>
        </a>
        </div>
    <? } ?>
</div>
<script src='js/script.js'></script>

<? require_once('components/footer/index.php');?>