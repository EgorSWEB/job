<?php

namespace Nordic\Core;

class Order extends \Nordic\Core\Unit 
{
    public function setTable(){
        return 'core_orders';
    }
}