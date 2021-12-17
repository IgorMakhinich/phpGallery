<?php

class Db_object
{
   public $errors = array();
   public $uploads_error_array = array(
      0 => 'There is no error, the file uploaded with success',
      1 => 'Exceeds php.ini upload_max_filesize',
      2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
      3 => 'The uploaded file was only partially uploaded',
      4 => 'No file was uploaded',
      6 => 'Missing a temporary folder',
      7 => 'Failed to write file to disk.',
      8 => 'A PHP extension stopped the file upload.',
   );


   public function set_file($file)
   {
      if (empty($file) || !$file || !is_array($file)) {
         $this->errors[] = "There was no file upload here";
         return false;
      } elseif ($file['error'] != 0) {
         $this->errors[] = $this->uploads_error_array[$file['error']];
         return false;
      } else {
         $this->user_image = basename($file['name']);
         $this->tmp_path = $file['tmp_name'];
         $this->type = $file['type'];
         $this->size = $file['size'];
      }
   }

   
   public static function find_all()
   {
      //        global $database;
      //        return $database->query("SELECT * FROM users");
      return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
   }


   public static function find_by_id($id)
   {
      global $database;
      $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");
      //        if(!empty($the_result_array)){
      //            $first_item = array_shift($the_result_array);
      //            return $first_item;
      //        } else {
      //            return false;
      //        }
      return !empty($the_result_array) ? array_shift($the_result_array) : false;
   }


   public static function find_by_query($sql)
   {
      global $database;
      $result_set = $database->query($sql);
      $the_object_array = array();
      while ($row = mysqli_fetch_array($result_set)) {
         $the_object_array[] = static::instantiation($row);
      }
      return $the_object_array;
   }


   public static function instantiation($the_record)
   {
      $calling_class = get_called_class();
      $the_object = new $calling_class;

      foreach ($the_record as $property => $value) {
         if ($the_object->has_the_property($property)) {
            $the_object->$property = $value;
         }
      }
      return $the_object;
   }


   private function has_the_property($property)
   {
      $object_properties = get_object_vars($this);
      return array_key_exists($property, $object_properties);
   }


   protected function properties()
   {
      // return get_object_vars($this);
      $properties = array();

      foreach (static::$db_table_fields as $db_field) {
         if (property_exists($this, $db_field)) {
            $properties[$db_field] = $this->$db_field;
         }
      }
      return $properties;
   }


   protected function clean_properties()
   {
      global $database;

      $clean_properties = array();

      foreach ($this->properties() as $key => $value) {
         $clean_properties[$key] = $database->escape_string($value);
      }

      return $clean_properties;
   }


   public function save()
   {
      return isset($this->id) ? $this->update() : $this->create();
   }


   public function create()
   {
      global $database;

      $properties = $this->clean_properties();

      $sql = "INSERT INTO " . static::$db_table . " (" . implode(",", array_keys($properties)) . ")";
      $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";

      if ($database->query($sql)) {
         $this->id = $database->the_insert_id();
         return true;
      } else {
         return false;
      }
   }


   public function update()
   {
      global $database;

      $properties = $this->clean_properties();
      $properties_pairs = array();

      foreach ($properties as $key => $value) {
         $properties_pairs[] = "{$key} = '{$value}'";
      }

      $sql = "UPDATE " . static::$db_table . " SET " . implode(",", $properties_pairs) . " WHERE id = " . $database->escape_string($this->id);

      $database->query($sql);

      return (mysqli_affected_rows($database->connection) == 1) ? true : false;
   }


   public function delete()
   {
      global $database;

      $sql = "DELETE FROM " . static::$db_table . " WHERE id = " . $database->escape_string($this->id) . " LIMIT 1";
      $database->query($sql);

      return (mysqli_affected_rows($database->connection) == 1) ? true : false;
   }
}
