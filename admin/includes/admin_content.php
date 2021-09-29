<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Blank page</a></li>
            </ol>
            <?php 
            
            $sql = "SELECT * FROM users";
            $result = $database->query($sql);
            $user_found = mysqli_fetch_assoc($result);
            print_r($user_found);
            ?>
        </div>
    </main>
    <?php include "sub_footer.php"; ?>
</div>