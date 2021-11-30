<?php include "includes/header.php"; ?>

<?php if (!$session->is_signed_in()) {
   redirect('login.php');
}
?>

<?php
if (empty($_GET['id'])) {
   redirect("users.php");
}

$user = User::find_by_id($_GET["id"]);

if (isset($_POST['update'])) {
   if ($user) {
      $user->username = $_POST['username'];
      $user->first_name = $_POST['first_name'];
      $user->last_name = $_POST['last_name'];
      $user->password = $_POST['password'];
      $user->set_file($_FILES['user_image']);
      $user->save_user_photo();

      if ($user->save()) {
         $message = "User edited succesfully";
      } else {
         // $message = join("<br>" . $user->errors);
      }
   }
}


?>

<?php
$message = "";
?>

<?php include "includes/top_nav.php"; ?>

<div id="layoutSidenav">
   <?php include "includes/side_nav.php"; ?>
   <div id="layoutSidenav_content">
      <main>
         <div class="container-fluid px-4">
            <h1 class="mt-4">Edit User</h1>

            <div class="row">
               <div class="col-md-6">
                  <img src="<?php echo $user->image_path_placeholder(); ?>" alt="" class="img-responsive">
               </div>
               <div class="col-md-6">
                  <form action="" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                        <input type="file" name="user_image">
                     </div>
                     <div class="form-group">
                        <label for="username">Userame</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" required>
                     </div>
                     <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" value="<?php echo $user->first_name; ?>" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" value="<?php echo $user->last_name; ?>" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>" required>
                     </div>
                     <div class="info-box-update">
                        <input type="submit" name="update" value="update" class="btn btn-primary float-end mt-2">
                        <span class="float-start"><?php echo $message; ?></span>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </main>
      <?php include "includes/sub_footer.php"; ?>
   </div>
</div>
<?php include "includes/footer.php"; ?>