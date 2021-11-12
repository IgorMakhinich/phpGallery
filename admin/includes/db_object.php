<?php

class Db_object
{
   public static function find_all()
   {
      //        global $database;
      //        return $database->query("SELECT * FROM users");
      return self::find_this_query("SELECT * FROM " . self::$db_table . " ");
   }


   public static function find_by_id($id)
   {
      $the_result_array = self::find_this_query("SELECT * FROM " . self::$db_table . " WHERE id = $id LIMIT 1");
      //        if(!empty($the_result_array)){
      //            $first_item = array_shift($the_result_array);
      //            return $first_item;
      //        } else {
      //            return false;
      //        }
      return !empty($the_result_array) ? array_shift($the_result_array) : false;
   }


   public static function find_this_query($sql)
   {
      global $database;
      $result_set = $database->query($sql);
      $the_object_array = array();
      while ($row = mysqli_fetch_array($result_set)) {
         $the_object_array[] = self::instantiation($row);
      }
      return $the_object_array;
   }


   public static function instantiation($the_record)
   {
      $the_object = new self;

      foreach ($the_record as $property => $value) {
         if ($the_object->has_the_property($property)) {
            $the_object->$property = $value;
         }
      }
      return $the_object;
   }
}
