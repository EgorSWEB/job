<?php

namespace Nordic\Test1;

class Test{
    public $speed = 50;
    public $weight = 1000;
    public function drive(){
        echo 'Я поехала со скоростью '.$this->speed.' км/ч!';
    }
    public function accelerate($speed){
        $this->speed = $speed;
    }
}