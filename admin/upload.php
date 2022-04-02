<?php include "includes/header.php"; ?>

<?php if (!$session->is_signed_in()) {
   redirect('login.php');
} ?>

<?php
$message = "";
if (isset($_FILES['file'])) {
   // echo "<h1>qwerty</h1>";
   $photo = new Photo();
   $photo->title = $_POST['title'];
   $photo->set_file($_FILES['file']);
   $photo->date = date('Y-m-d H:i:s');
   if ($photo->save()) {
      $message = "Photo upload succesfully";
   } else {
      $message = join("<br>" . $photo->errors);
   }
}
?>

<?php include "includes/top_nav.php"; ?>


<div id="layoutSidenav">
   <?php include "includes/side_nav.php"; ?>
   <div id="layoutSidenav_content">
      <main>
         <div class="container-fluid px-4">
            <h1 class="mt-4">Upload</h1>
            <div class="row">
               <div class="col-md-6">
                  <?php echo $message; ?>
                  <form action="upload.php" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                        <input type="text" name="title" class="form-control">
                     </div>
                     <div class="form-group">
                        <input type="file" name="file">
                     </div>
                     <input type="submit" name="submit" class="form-control">
                  </form>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <form action="upload.php" class="dropzone"></form>
               </div>
            </div>
         </div>
      </main>
      <?php include "includes/sub_footer.php"; ?>
   </div>
</div>
<?php include "includes/footer.php"; ?>