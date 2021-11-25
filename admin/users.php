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
            <h1 class="mt-4">users</h1>
            <div class="col-md-12">
               <table class="table table-hover">
                  <thad>
                     <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Userame</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                     </tr>
                  </thad>
                  <tbody>
                     <?php
                     $users = User::find_all();
                     foreach ($users as $user) : ?>
                        <tr>
                           <td><?php echo $user->id; ?></td>
                           <td>
                              <img class="admin-user-thumbnail" src="<?php echo $user->user_image; ?>" alt="<?php echo $user->username; ?>">
                           </td>
                           <td>
                              <?php echo $user->username; ?>
                              <div class="action_links">
                                 <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                 <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                 <a href="">View</a>
                              </div>
                           </td>
                           <td><?php echo $user->first_name; ?></td>
                           <td><?php echo $user->last_name; ?></td>
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