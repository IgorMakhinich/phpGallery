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
            <h1 class="mt-4">Comments</h1>
            <p class="bg-success"><?php echo $message; ?></p>
            <div class="col-md-12">
               <table class="table table-hover">
                  <thad>
                     <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Date Added</th>
                     </tr>
                  </thad>
                  <tbody>
                     <?php
                     $comments = Comment::find_all();
                     foreach ($comments as $comment) : ?>
                        <tr>
                           <td><?php echo $comment->id; ?></td>
                           <td>
                              <?php 
                                 $photo = Photo::find_by_id($comment->photo_id);
                              ?>
                              <a href ="edit_photo.php?id=<?php echo $comment->photo_id; ?>">
                                 <img class="admin-user-thumbnail user_image" src="<?php echo $photo->picture_path(); ?>" alt="<?php echo $photo->title; ?>">
                              </a>
                           </td>
                           <td>
                              <?php echo $comment->author; ?>
                              <div class="action_links">
                                 <a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
                                 <a href="edit_comment.php?id=<?php echo $comment->id; ?>">Edit</a>
                              </div>
                           </td>
                           <td><?php echo $comment->body; ?></td>
                           <td><?php echo $comment->date; ?></td>
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