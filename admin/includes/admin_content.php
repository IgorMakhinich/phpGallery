
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid px-4">
         <h1 class="mt-4">Dashboard</h1>
         <?php 
            // $user = new User();

            // $user->username = "Petya";
            // $user->password = "123";
            // $user->first_name = "Patochnik";
            // $user->last_name = "Petrov";

            // $user->save();

            $user = User::find_user_by_id(5);
            $user->username = "Mar'yan";
            $user->password = "123";
            $user->first_name = "Mar'yan";
            $user->last_name = "Testovich";
            $user->save();

         ?>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Blank page</a></li>
         </ol>
      </div>
   </main>
   <?php require_once "sub_footer.php"; ?>
</div>