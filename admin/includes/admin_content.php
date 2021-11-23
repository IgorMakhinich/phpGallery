
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

            $photo = Photo::find_by_id(4);
            print_r($photo);
            // $photos = Photo::find_all();
            // foreach ($photos as $photo){
            //    echo "{$photo->title} | {$photo->id} <br>";
            // }

            // echo SITE_ROOT;
            // echo "<br>";
            // echo INCLUDES_PATH;

            

         ?>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Blank page</a></li>
         </ol>
      </div>
   </main>
   <?php require_once "sub_footer.php"; ?>
</div>