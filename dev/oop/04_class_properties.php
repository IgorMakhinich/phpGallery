<?php

class Cars
{
	var $wheel_count = 4;
	var $door_count = 4;

	function car_detail()
	{
		return "This car has " . $this->wheel_count . " wheels";
	}
}

$bmw = new Cars();
$mercedes = new Cars();

echo $bmw->wheel_count = 10;
echo "\n";
echo $mercedes->wheel_count;
echo "\n";
echo $bmw->car_detail();
