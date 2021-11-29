<?php include "includes/header.php"; ?>

<?php if (!$session->is_signed_in()) {
   redirect('login.php');
}
?>

<?php
$user = new User();

if (isset($_POST['add'])) {
   if ($user) {
      $user->username = $_POST['username'];
      $user->first_name = $_POST['first_name'];
      $user->last_name = $_POST['last_name'];
      $user->password = $_POST['password'];
      if ($user->save()) {
         redirect('users.php');
      }
   }
}
?>

<?php include "includes/top_nav.php"; ?>

<div id="layoutSidenav">
   <?php include "includes/side_nav.php"; ?>
   <div id="layoutSidenav_content">
      <main>
         <div class="container-fluid px-4">
            <h1 class="mt-4">Add User</h1>
            <form action="" method="POST" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-8">
                     <div class="form-group">
                        <label for="username">Userame</label>
                        <input type="text" name="username" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control">
                     </div>
                  </div>
                  <div class="info-box-update">
                     <input type="submit" name="add" value="Add" class="btn btn-primary btn-lg ">
                  </div>
               </div>
            </form>
         </div>
      </main>
      <?php include "includes/sub_footer.php"; ?>
   </div>
</div>
<?php include "includes/footer.php"; ?>