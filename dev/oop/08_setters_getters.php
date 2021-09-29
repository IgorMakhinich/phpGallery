<?php

class Cars
{
	private $door_count = 5;

	function get_values()
	{
		echo $this->door_count;
	}

	function set_values($door)
	{
		$this->door_count = $door;
	}
}

$car = new Cars();

echo $car->get_values() . "\n";
echo $car->set_values(50);
echo $car->get_values() . "\n";

