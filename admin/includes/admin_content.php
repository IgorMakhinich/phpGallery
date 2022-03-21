<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid px-4">
         <h1 class="mt-4">Dashboard</h1>
         <?php
         // $user = new User();
         // $user->username = "petya";
         // $user->password = "123";
         // $user->first_name = "Patochnik";
         // $user->last_name = "Petrov";
         // $user->save();

         // $user = User::find_by_id(4);
         // $user->delete();
         // print_r($user);
         // $user->delete();

         // $users = User::find_all();
         // foreach ($users as $user){
         //    echo "{$user->username} | {$user->id} <br>";
         // }

         // $photo = new Photo();
         // $photo->title = "test_photo";
         // $photo->description = "test_photo_descr";
         // $photo->filename = "image2.jpg";
         // $photo->type = "image";
         // $photo->size = "10";
         // $photo->save();

         // $photo = Photo::find_by_id(6);
         // print_r($photo);
         // $photos = Photo::find_all();
         // foreach ($photos as $photo){
         //    echo "{$photo->title} | {$photo->id} <br>";
         // }

         // echo SITE_ROOT;
         // echo "<br>";
         // echo INCLUDES_PATH;
         ?>
         <!-- Dashboard info -->
         <div class="row">
            <div class="col-xl-3 col-md-6">
               <div class="card bg-primary text-white mb-4">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm-3">
                           <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-sm-9 text-end">
                           <div class="display-5"><?php echo $session->count; ?></div>
                           <div>New Views</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="#">Page View from Gallery</a>
                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card bg-success text-white mb-4">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm-3">
                           <i class="fa fa-image fa-5x"></i>
                        </div>
                        <div class="col-sm-9 text-end">
                           <div class="display-5"><?php echo Photo::count_all(); ?></div>
                           <div>Photos</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="photos.php">Total Photos in Gallery</a>
                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card bg-warning text-white mb-4">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm-3">
                           <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-sm-9 text-end">
                           <div class="display-5"><?php echo User::count_all(); ?></div>
                           <div>Users</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="users.php">Total Users</a>
                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card bg-danger text-white mb-4">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm-3">
                           <i class="fa fa-comment fa-5x"></i>
                        </div>
                        <div class="col-sm-9 text-end">
                           <div class="display-5"><?php echo Comment::count_all(); ?></div>
                           <div>Comments</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="comments.php">Total Comments</a>
                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div id="piechart" style="width: 900px; height: 500px;"></div>
         </div>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Blank page</a></li>
         </ol>
      </div>
   </main>
   <?php require_once "sub_footer.php"; ?>
</div>