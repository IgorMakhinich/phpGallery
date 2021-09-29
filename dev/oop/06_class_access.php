<?php
class Cars
{
	public $wheel_count = 4;
	private $door_count = 5;
	protected $seat_count = 3;

	function info()
	{
		echo $this->wheel_count . "\n";
		echo $this->door_count . "\n";
		echo $this->seat_count . "\n";
	}
}

$car = new Cars();

echo "echo " . $car->wheel_count . "\n";
// echo "echo " . $car->door_count . "\n";
echo "echo " . $car->seat_count . "\n";

$car->info();

