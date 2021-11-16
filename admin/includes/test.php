<?php

class Mango
{
   function classname()
   {
      return __CLASS__;
   }

   function selfname()
   {
      return self::classname();
   }

   function staticname()
   {
      return static::classname();
   }
}

class Orange extends Mango
{
   function parentname()
   {
      return parent::classname();
   }

   function classname()
   {
      return __CLASS__;
   }
}

class Apple extends Orange
{
   function parentname()
   {
      return parent::classname();
   }

   function classname()
   {
      return __CLASS__;
   }
}

$apple = new Apple();
echo $apple->selfname() . "\n";
echo $apple->parentname() . "\n";
echo $apple->staticname();
