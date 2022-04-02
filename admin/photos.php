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
            <h1 class="mt-4">Photos</h1>
            <p class="bg-success"><?php echo $message; ?></p>
            <div class="col-md-12">
               <table class="table table-hover">
                  <thad>
                     <tr>
                        <th>Photo</th>
                        <th>Id</th>
                        <th>File Name</th>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Comments</th>
                     </tr>
                  </thad>
                  <tbody>
                     <?php
                     $photos = Photo::find_all();
                     foreach ($photos as $photo) : ?>
                        <tr>
                           <td><img class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>" alt="<?php echo $photo->title; ?>">
                              <div class="action_links">
                                 <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                 <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                 <a href="../photo.php?id=<?php echo $photo->id; ?>" target="_blank" rel="noopener noreferrer">View</a>
                              </div>
                           </td>
                           <td><?php echo $photo->id; ?></td>
                           <td><?php echo $photo->filename; ?></td>
                           <td><?php echo $photo->title; ?></td>
                           <td><?php echo $photo->size; ?></td>
                           <td><?php
                                 $comments = Comment::find_the_comments($photo->id);  
                                 echo count($comments);
                              ?>
                              <a href="comment_photo.php?id=<?php echo $photo->id; ?>">Edit Comments</a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </main>
      <?php include "includes/sub_footer.php"; ?>
   </div>
</div>
<?php include "includes/footer.php"; ?>