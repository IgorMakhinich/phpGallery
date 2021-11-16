<?php

class Photo extends Db_object
{
   protected static $db_table = "photos";
   protected static $db_table_fields = array('photo_id', 'title', 'description', 'filename', 'type', 'size');
   public $photo_id;
   public $title;
   public $description;
   public $filename;
   public $type;
   public $size;

   public $tmp_path;
   public $upload_directory = "images";
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

   // Passing $_FILES['upload_file'] as an argument 

   public function set_file($file)
   {
      if (empty($file) || !$file || is_array($file)) {
         $this->errors[] = "There was no file upload here";
         return false;
      } elseif ($file['error'] != 0) {
         $this->errors[] = $this->uploads_error_array[$file['error']];
         return false;
      } else {
         $this->filename = basename($file['name']);
         $this->tmp_path = $file['tmp_name'];
         $this->type = $file['type'];
         $this->size = $file['size'];
      }
   }

   public function save()
   {
      if ($this->photo_id) {
         $this->update();
      } else {
         if (!empty($this->errors)) {
            return false;
         }
         if (empty($this->filename) || empty($this->tmp_path)) {
            $this->errors[] = "The file was not available";
            return false;
         }
         $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->filename;
         if (file_exists($target_path)) {
            $this->errors[] = "The file {$this->filename} already exists";
            return false;
         }
         if (move_uploaded_file($this->tmp_path, $target_path)) {
            if ($this->create()) {
               unset($this->tmp_path);
               return true;
            }
         } else {
            $this->erros[] = "The file directory probably does not have permission";
            return false;
         }
      }
   }
}