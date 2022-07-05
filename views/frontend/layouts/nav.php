<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Cafeteria</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add Order</a>
                </li>

            </ul>
            <?php
            //login or not ? 
            use App\Models\Core\Auth;

            if (Auth::check()) { ?>
                <span class="navbar-text userimg">
                    <img src="<?= Auth::check()::$user['image'] ?>" alt="" height="50px" width="50px">
                </span>
                <span class="navbar-text username">
                    <?php if (Auth::check()::$user['role'] == '1') { ?>
                        <a href="dashboard.php">dashboard</a>
                    <?php } ?>
                    <a href="auth.php?page=logout">logout</a>
                </span>
            <?php } else { ?>
                <span class="navbar-text username">
                    <a href="auth.php?page=login">login</a>
                </span>
            <?php } ?>
        </div>
    </div>
</nav>