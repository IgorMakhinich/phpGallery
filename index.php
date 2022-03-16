<?php include "includes/header.php"; ?>

<?php
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo::count_all();
?>

<!-- <?php $photos = Photo::find_all(); ?> -->

<div class="row">
   <!-- Blog entries-->
   <div class="col-lg-8">
      <div class="thumbnails row">
         <?php foreach ($photos as $photo) : ?>
            <div class="col-xs-6 col-md-3">
               <a href="photo.php?id=<?php echo $photo->id; ?>" class="thumbnail">
                  <img class="img-responsive home_page_photo" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
               </a>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
   <!-- Side widgets-->
   <div class="col-lg-4">
      <?php include "includes/sidebar.php" ?>
   </div>
</div>
</div>
<?php include "includes/footer.php"; ?>