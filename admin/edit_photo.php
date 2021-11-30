<?php include "includes/header.php"; ?>

<?php if (!$session->is_signed_in()) {
   redirect('login.php');
}
?>

<?php
if (empty($_GET['id'])) {
   redirect("photos.php");
} else {
   $photo = Photo::find_by_id($_GET['id']);
}


if (isset($_POST['update'])) {
   if ($photo) {
      $photo->title = $_POST['title'];
      $photo->caption = $_POST['caption'];
      $photo->alternate_text = $_POST['alternate_text'];
      $photo->description = $_POST['photo-description'];

      $photo->save();
   }
}
?>

<?php include "includes/top_nav.php"; ?>

<div id="layoutSidenav">
   <?php include "includes/side_nav.php"; ?>
   <div id="layoutSidenav_content">
      <main>
         <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Photo</h1>
            <form action="" method="POST">
               <div class="row">
                  <div class="col-md-8">
                     <div class="form-group">
                        <input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>">
                     </div>
                     <div class="form-group img-thumbnail d-flex justify-content-center">
                        <a href="#"><img src="<?php echo $photo->picture_path(); ?>" alt="<?php echo $photo->title; ?>"></a>
                     </div>
                     <div class="form-group">
                        <label for="caption">Caption</label>
                        <input type="text" name="caption" class="form-control" value="<?php echo $photo->caption; ?>">
                     </div>
                     <div class="form-group">
                        <label for="caption">Alternate Text</label>
                        <input type="text" name="alternate_text" class="form-control" value="<?php echo $photo->alternate_text; ?>">
                     </div>
                     <div class="form-group">
                        <label for="photo-description">Description</label>
                        <textarea name="photo-description" id="" cols="30" rows="10" class="form-control"><?php echo $photo->description; ?></textarea>
                        
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="photo-info-box">
                        <div class="info-box-header d-flex justify-content-between">
                           <h4>Save</h4>
                           <span id="toggle" class="float-right"><i class="fas fa-2x fa-angle-up"></i></span>
                        </div>
                        <div class="inside">
                           <div class="box-inner">
                              <p class="text">
                                 <i class="far fa-calendar-alt"></i> Uploaded on: April 22, 2030 @ 5:26
                              </p>
                              <p class="text ">
                                 Photo Id: <span class="data photo_id_box">34</span>
                              </p>
                              <p class="text">
                                 Filename: <span class="data">image.jpg</span>
                              </p>
                              <p class="text">
                                 File Type: <span class="data">JPG</span>
                              </p>
                              <p class="text">
                                 File Size: <span class="data">3245345</span>
                              </p>
                           </div>
                           <div class="info-box-footer d-flex justify-content-evenly">
                              <div class="info-box-delete">
                                 <a href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                              </div>
                              <div class="info-box-update">
                                 <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </main>
      <?php include "includes/sub_footer.php"; ?>
   </div>
</div>
<script src="ckeditor/ckeditor.js"></script>
<script>
   CKEDITOR.replace('photo-description');
</script>
<?php include "includes/footer.php"; ?>