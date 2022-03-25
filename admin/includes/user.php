<?php

class User extends Db_object
{
   protected static $db_table = "users";
   protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
   public $id;
   public $username;
   public $password;
   public $first_name;
   public $last_name;
   public $user_image;
   public $upload_directory = "images";
   public $tmp_path;
   // public $errors = array();
   // public $uploads_error_array = array(
   //    0 => 'There is no error, the file uploaded with success',
   //    1 => 'Exceeds php.ini upload_max_filesize',
   //    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
   //    3 => 'The uploaded file was only partially uploaded',
   //    4 => 'No file was uploaded',
   //    6 => 'Missing a temporary folder',
   //    7 => 'Failed to write file to disk.',
   //    8 => 'A PHP extension stopped the file upload.',
   // );
   public $image_placeholder = "https://via.placeholder.com/400/000000/FFFFFF?Text=image";


   public function image_path_placeholder()
   {
      return (empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image);
   }


   public static function verify_user($username, $password)
   {
      global $database;

      $username = $database->escape_string($username);
      $password = $database->escape_string($password);

      $sql = "SELECT * FROM " . self::$db_table . " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";

      $the_result_array = self::find_by_query($sql);
      return !empty($the_result_array) ? array_shift($the_result_array) : false;
   }


   public function save_user_photo()
   {
      if (!empty($this->errors)) {
         return false;
      }
      if (empty($this->user_image) || empty($this->tmp_path)) {
         $this->errors[] = "The file was not available";
         return false;
      }
      $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->user_image;
      if (file_exists($target_path)) {
         $this->errors[] = "The file {$this->user_image} already exists";
         return false;
      }
      if (move_uploaded_file($this->tmp_path, $target_path)) {
         if ($this->id) {
            $this->update();
         } elseif ($this->create()) {
            unset($this->tmp_path);
            return true;
         }
      } else {
         $this->erros[] = "The file directory probably does not have permission";
         return false;
      }
   }

   public function ajax_save_user_image($user_image, $user_id)
   {
      global $database;

      $user_image = $database->escape_string($user_image);
      $user_id = $database->escape_string($user_id);

      $this->user_image = $user_image;
      $this->id = $user_id;
      
      $sql = "UPDATE " . self::$db_table . " SET user_image = '{$this->user_image}' WHERE id = {$this->id}";
      $update_image = $database->query($sql);

      echo $this->image_path_placeholder();
   }
}
