<?php include "includes/header.php"; ?>

<?php if (!$session->is_signed_in()) {
   redirect('login.php');
} ?>

<?php
if (isset($_POST['update'])) {
   echo "it wprls123";
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
                        <input type="text" name="title" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="caption">Caption</label>
                        <input type="text" name="caption" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="caption">Alternate Text</label>
                        <input type="text" name="alternate_text" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="caption">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="photo-info-box">
                        <div class="info-box-header">
                           <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                        </div>
                        <div class="inside">
                           <div class="box-inner">
                              <p class="text">
                                 <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
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
                           <div class="info-box-footer" style="display: flex; justify-content: space-evenly;">
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
<?php include "includes/footer.php"; ?>