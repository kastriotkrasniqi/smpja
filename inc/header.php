<?php  if(isset($_GET['logout'])){
            session_destroy();
            header('location:login.php');
        } ?>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="img/smp_logo.png" alt="" id="logo" /></a>

        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active p-4" aria-current="page" href="index.php">Home</a>

                <?php if(isset($_SESSION['antariid'])): ?>
                <a class="nav-link p-4" href="antaret.php">Antaret</a>
                <a class="nav-link p-4" href="projektet.php">Projektet</a>
                <a class="nav-link p-4" href="punet.php">Punet</a>
                <?php endif; ?>
            </div>
        </div>
        <div>
            <?php if(isset($_SESSION['antariid'])): ?>
            <a href="?logout" class="btn btn-outline-primary rounded-2 px-4">Logout</a>
            <?php else: ?>
            <a href="login.php" class="btn btn-outline-primary rounded-2 px-4">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>