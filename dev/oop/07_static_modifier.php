<?php

class Cars
{
    static $wheel_count = 4;
    static $door_count = 5;

    static function get_info()
    {
        echo Cars::$wheel_count . "\n";
        echo Cars::$door_count . "\n";
    }
}

$car = new Cars();

// echo $car->wheel_count . "\n";
// echo $car->door_count . "\n";

echo Cars::$door_count . "\n";
echo Cars::get_info();
