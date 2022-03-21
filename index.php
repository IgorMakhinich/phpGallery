<?php include "includes/header.php"; ?>

<?php
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo::count_all();
$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM photos LIMIT {$items_per_page} OFFSET {$paginate->offset()}";
$photos = Photo::find_by_query($sql);
?>



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
      <div class="row">
         <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
               <?php
               if ($paginate->page_total() > 1) {
                  if ($paginate->has_previous()) {
                     echo "<li class='page-item'><a class='page-link' href='index.php?page={$paginate->previous()}' tabindex='-1' aria-disabled='true'>Previous</a></li>";
                  }
                  for ($i = 1; $i <= $paginate->page_total(); $i++) {
                     if ($paginate->current_page == $i) {
                        echo "<li class='page-item active' aria-current='page'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                     } else {
                        echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                     }
                  }

                  if ($paginate->has_next()) {
                     echo "<li class='page-item'><a class='page-link' href='index.php?page={$paginate->next()}'>Next</a></li>";
                  }
               }
               ?>
            </ul>
         </nav>
      </div>
   </div>
   <!-- Side widgets-->
   <div class="col-lg-4">
      <?php include "includes/sidebar.php" ?>
   </div>
</div>
</div>
<?php include "includes/footer.php"; ?>