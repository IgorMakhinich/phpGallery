<?php

class Comment extends Db_object
{
   protected static $db_table = "comments";
   protected static $db_table_fields = array('id', 'photo_id', 'author', 'body');
   public $id;
   public $photo_id;
   public $author;
   public $body;
   public $last_name;


   public static function createComment($photo_id, $author = "Test", $body = "")
   {
      if (!empty($photo_id) && !empty($author) && !empty($body)) {
         $comment = new Comment();

         $comment->photo_id = (int) $photo_id;
         $comment->author = $author;
         $comment->body = $body;

         return $comment;
      }
   }
}
