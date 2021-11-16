<?php include "includes/header.php"; ?>

<?php if (!$session->is_signed_in()) {
   redirect('login.php');
} ?>

<?php include "includes/top_nav.php"; ?>

<div id="layoutSidenav">
   <?php include "includes/side_nav.php"; ?>
   <div id="layoutSidenav_content">
      <main>
         <div class="container-fluid px-4">
            <h1 class="mt-4">Upload</h1>
            <div class="col-md-6">
               <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                     <input type="text" name="title" class="form-control">
                  </div>
                  <div class="form-group">
                     <input type="file" name="file_upload">
                  </div>
                  <input type="submit" name="submit" class="form-control">
               </form>
            </div>
         </div>
      </main>
      <?php include "sub_footer.php"; ?>
   </div>
</div>
<?php include "includes/footer.php"; ?>