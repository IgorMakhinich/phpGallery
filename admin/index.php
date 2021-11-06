<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php include "includes/header.php"; ?>

<?php if (!$session->is_signed_in()) {
	redirect('login.php');
} ?>

<?php include "includes/top_nav.php"; ?>

<div id="layoutSidenav">
	<?php include "includes/side_nav.php"; ?>
	<?php include "includes/admin_content.php" ?>
</div>
<?php include "includes/footer.php"; ?>