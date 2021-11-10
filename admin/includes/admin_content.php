
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid px-4">
         <h1 class="mt-4">Dashboard</h1>
         <?php 
            $user = new User();

            $user->username = "Test_username1";
            $user->password = "Test_password1";
            $user->first_name = "Test_first_name1";
            $user->last_name = "Test_last_name1";

            $user->create();
         ?>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Blank page</a></li>
         </ol>
      </div>
   </main>
   <?php require_once "sub_footer.php"; ?>
</div>