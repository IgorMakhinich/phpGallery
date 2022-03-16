<?php include "includes/header.php"; ?>

<?php
require_once("admin/includes/init.php");

if (empty($_GET['id'])) {
   redirect("index.php");
}

$photo = Photo::find_by_id($_GET['id']);

if (isset($_POST['submit'])) {
   $author = trim($_POST['author']);
   $body = trim($_POST['body']);
   $new_comment = Comment::create_comment($photo->id, $author, $body);

   if ($new_comment && $new_comment->save()) {
      redirect("photo.php?id={$photo->id}");
   } else {
      $message = "There was some problems saving";
   }
} else {
   $author = "";
   $body = "";
}

$comments = Comment::find_the_comments($photo->id);

?>

<div class="row">
   <!-- Blog entries-->
   <div class="col-lg-8">
      <div class="row">
         <!-- Featured blog post-->
         <div class="card mb-4">
            <a href="#!"><img class="card-img-top" src="admin/<?php echo $photo->picture_path(); ?>" alt="<?php echo $photo->title; ?>" /></a>
            <div class="card-body">
               <div class="small text-muted"><?php echo $photo->date; ?></div>
               <h2 class="card-title"><?php echo $photo->title; ?></h2>
               <p class="card-text"><?php echo $photo->caption; ?></p>
               <p class="card-text"><?php echo $photo->description; ?></p>
               <a class="btn btn-primary" href="#!">Read more →</a>
            </div>
            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
               <h4>Leave a Comment:</h4>
               <form role="form" method="POST">
                  <div class="form-group">
                     <label for="author">Author</label>
                     <input type="text" name="author" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="body">Comment</label>
                     <textarea class="form-control" name="body" rows="3"></textarea>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary mt-5">Submit</button>
               </form>
            </div>

            <hr>

            <!-- Posted Comments -->
            <?php foreach ($comments as $comment) : ?>
               <!-- Comment -->
               <div class="media d-flex">
                  <img class="align-self-start me-3" src="http://placehold.it/64x64" alt="">
                  <div class="media-body">
                     <div class="small text-muted"><?php echo date('d-m-Y H:i:s', strtotime($comment->date)); ?></div>
                     <h5 class="mt-0"><?php echo $comment->author; ?></h5>
                     <?php echo $comment->body; ?>
                  </div>
               </div>
               <hr>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
   <!-- Side widgets-->
   <div class="col-lg-4">
      <?php include "includes/sidebar.php" ?>
   </div>
</div>
</div>
<?php include "includes/footer.php"; ?>