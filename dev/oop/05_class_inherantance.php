<?php

class Cars
{
	function gretting()
	{
		echo "This class name is " . get_class($this) . "\n";
	}
}

$bmw = new Cars();

$bmw->gretting();

class Trucks extends Cars
{
}

$renault = new Trucks();

$renault->gretting();
