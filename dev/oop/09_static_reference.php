<?php

class Cars
{
	static $wheel_count = 4;

	static function car_info()
	{
		return self::$wheel_count . "\n";
	}
}

class Trucks extends Cars
{
	static function display()
	{
		echo parent::car_info();
	}
}

// echo Cars::$door_count . "\n";

// Cars::car_info();

Trucks::display();
