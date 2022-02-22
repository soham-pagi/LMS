<nav class="navbar navbar-expand-lg bg-dark fixed-top">
    <div class="container">
        <a href="home.php" class="navbar-brand"><i class="fas fa-home"></i> Home</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="myprofile.php" class="nav-link"><i class="fas fa-user"></i> My Profile</a>
            </li>
            <li class="nav-item">
                <a href="allbooks.php" class="nav-link"><i class="fas fa-book"></i> Books</a>
            </li>
            <li class="nav-item">
                <a href="about.php" class="nav-link"><i class="fas fa-address-card"></i> About</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
            <input class="form-control mr-sm-2" name="search" style="display: inline; width: 200px" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" style="border-color: #27aae1; color: #27aae1" type="search">Search</button>
        </form>
        <ul class="navbar-nav ml-auto">
            <?php
                if($_SESSION['loggedin'] == 1) {
                    echo '<li class="nav-item">
                    <a href="logout.php" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>';
                } else {
                    echo '<li class="nav-item">
                    <a href="login.php" class="nav-link text-success"></a>
                    </li>';
                }
            ?>
        </ul>
    </div>
</nav>