<?php

class Cars
{
    public $wheel_count = 4;
    static $objects = 0;
    function __construct()
    {
        echo $this->wheel_count . " | ";
        echo ++self::$objects . "\n";
    }

    function __destruct()
    {
        echo --self::$objects . "\n";
    }
}

$car = new Cars();
$car1 = new Cars();
$car3 = new Cars();
