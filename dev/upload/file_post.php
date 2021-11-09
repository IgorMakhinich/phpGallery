<?php
if (isset($_POST['submit'])) {

   function codeToMessage($code)
   {
      switch ($code) {
         case UPLOAD_ERR_INI_SIZE:
            $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
            break;
         case UPLOAD_ERR_FORM_SIZE:
            $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
            break;
         case UPLOAD_ERR_PARTIAL:
            $message = "The uploaded file was only partially uploaded";
            break;
         case UPLOAD_ERR_NO_FILE:
            $message = "No file was uploaded";
            break;
         case UPLOAD_ERR_NO_TMP_DIR:
            $message = "Missing a temporary folder";
            break;
         case UPLOAD_ERR_CANT_WRITE:
            $message = "Failed to write file to disk";
            break;
         case UPLOAD_ERR_EXTENSION:
            $message = "File upload stopped by extension";
            break;

         default:
            $message = "Unknown upload error";
            break;
      }
      return $message;
   }


   $temp_name = $_FILES['file_upload']['tmp_name'];
   $the_file = $_FILES['file_upload']['name'];
   $directory = "uploads";

   if (move_uploaded_file($temp_name, $directory . "/" . $the_file)) {
      $theMessage = "File uploaded succesfully";
   } else {
      $the_error = $_FILES['file_upload']['error'];
      $theMessage = codeToMessage($the_error);
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <title>Test</title>
</head>

<body>
   <form action="file_post.php" enctype="multipart/form-data" method="POST">
      <input type="file" name="file_upload">
      <h4>
         <?php
         if ($theMessage) {
            echo $theMessage;
         }
         ?>
      </h4>
      <input type="submit" name="submit">
   </form>
</body>

</html>