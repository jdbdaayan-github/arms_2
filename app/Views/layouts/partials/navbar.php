<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left Navbar -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link " data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i> <!-- Burger icon -->
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right Navbar (Username dropdown) -->
    <ul class="navbar-nav ml-auto">
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user"></i> <!-- User Icon -->
                <span>Username</span> <!-- Display username -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cogs"></i> Settings
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
