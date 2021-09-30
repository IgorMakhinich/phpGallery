<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Dashboard</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="#">Blank page</a></li>
			</ol>
			<?php

			$result_set = User::find_all_users();

			while ($row = mysqli_fetch_array($result_set)) {
				echo "ID: " . $row['id'] . ", Name: " .$row['username'] . "<br>";
			}

			$user = User::find_user_by_id(2);
			echo "User id 2 is: <br>";
			print_r($user);

			?>
		</div>
	</main>
	<?php include "sub_footer.php"; ?>
</div>