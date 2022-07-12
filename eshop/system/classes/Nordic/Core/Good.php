<?php

namespace Nordic\Core;

class Good extends \Nordic\Core\Unit
{
    public static $has_good = 3;

    const HAS_GOOD = 1;
    const IS_REAL = 1;

    public static function getGoodStaticInfo()
    {
       return self::IS_REAL;
    }

    public static function getStaticVar(){
        return self::$has_good;
    }

    public static function getQuality()
    {
        if(self::getGoodStaticInfo()){
            $text = "Этот товар официальный";
        }else{
            $text = "Этот товар реплика";
        }
        //$text = "Этот товар официальный";
        echo $text;
    }

    public function setTable()
    {
        return 'core_goods';
    }

    public function price()
    {
        return $this->getField('price');
    }

    public function photo()
    {
        return $this->getField('photo');
    }

    public function getElements()
    {
        $connect = new \Nordic\Core\Connect();

        //фильтрация по категориям
        $filter = '';
        if(isset($_GET['category_id']) && $category_id = $_GET['category_id']){
            $filter .= "AND category_id=$category_id ";
        }

        //фильтрация по типу товара

        if(isset($_GET['type']) && $type_id = $_GET['type']){
            $filter .= "AND type_id=$type_id ";
        }
        
        //фильтрация по новинкам
        if(isset($_GET['is_new']) && $is_new = $_GET['is_new']){
            $filter .= "AND is_new=$is_new ";
        }

        //расчёт товаров по страницам
        $page = 1;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $limit = 2;
        $from = ($page-1)*$limit;
 
        $result = mysqli_query($connect->getConnection(), "SELECT * FROM ".$this->setTable()." WHERE id>0 $filter LIMIT $from, $limit");
        //echo "SELECT * FROM ".$this->setTable()." WHERE id>0 $filter LIMIT $from, $limit";
        return $result;
    }
}