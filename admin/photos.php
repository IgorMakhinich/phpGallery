<?php include "includes/header.php"; ?>

<?php include "includes/top_nav.php"; ?>

<div id="layoutSidenav">
   <?php include "includes/side_nav.php"; ?>
   <div id="layoutSidenav_content">
      <main>
         <div class="container-fluid px-4">
            <h1 class="mt-4">Photos</h1>
            <div class="col-md-12">
               <table class="table table-hover">
                  <thad>
                     <tr>
                        <th>Photo</th>
                        <th>Id</th>
                        <th>File Name</th>
                        <th>Title</th>
                        <th>Size</th>
                     </tr>
                  </thad>
                  <tbody>
                     <?php
                           $photos = Photo::find_all();
                           foreach ($photos as $photo) : ?>
                              <tr>
                                 <td><?php echo $photo->filename; ?></td>
                                 <td><?php echo $photo->photo_id; ?></td>
                                 <td><?php echo $photo->filename; ?></td>
                                 <td><?php echo $photo->title; ?></td>
                                 <td><?php echo $photo->size; ?></td>
                              </tr>
                        <?php endforeach;?>
                        
                  </tbody>
               </table>
            </div>
         </div>
      </main>
      <?php include "includes/sub_footer.php"; ?>
   </div>
</div>
<?php include "includes/footer.php"; ?>