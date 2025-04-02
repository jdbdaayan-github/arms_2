<?php
$request = service('request');
$segment = $request->getUri()->getSegment(1);
?>

<!-- Sidebar -->
<aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link bg-info">
        <img src="<?= base_url('assets/adminlte/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Archival System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar border-right">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <!-- MAIN NAVIGATION -->
                <li class="nav-header">MAIN NAVIGATION</li>

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($segment == 'dashboard') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Records Management -->
                <li class="nav-item has-treeview <?= in_array($segment, ['records']) ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= in_array($segment, ['records']) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>Records Management <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('records/search') ?>" class="nav-link <?= ($segment == 'records' && $request->getUri()->getSegment(2) == 'search') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advanced Search</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('records/upload') ?>" class="nav-link <?= ($segment == 'records' && $request->getUri()->getSegment(2) == 'upload') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Upload Records</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- ADMINISTRATION -->
                <li class="nav-header">ADMINISTRATION</li>

                <!-- Users Management -->
                <li class="nav-item has-treeview <?= in_array($segment, ['users', 'roles']) ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?= in_array($segment, ['users', 'roles']) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users Management <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('users') ?>" class="nav-link <?= ($segment == 'users') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('roles') ?>" class="nav-link <?= ($segment == 'roles') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Directorates -->
                <li class="nav-item">
                    <a href="<?= base_url('directorates') ?>" class="nav-link <?= ($segment == 'directorates') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>Manage Directorates</p>
                    </a>
                </li>

                <!-- Offices -->
                <li class="nav-item">
                    <a href="<?= base_url('offices') ?>" class="nav-link <?= ($segment == 'offices') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Manage Offices</p>
                    </a>
                </li>

                <!-- Libraries -->
                <li class="nav-item">
                    <a href="<?= base_url('libraries') ?>" class="nav-link <?= ($segment == 'libraries') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Manage Libraries</p>
                    </a>
                </li>

                <!-- Activity Logs -->
                <li class="nav-item">
                    <a href="<?= base_url('logs') ?>" class="nav-link <?= ($segment == 'logs') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-history"></i>
                        <p>Activity Logs</p>
                    </a>
                </li>

                <!-- SETTINGS & LOGOUT -->
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a href="<?= base_url('settings') ?>" class="nav-link <?= ($segment == 'settings') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>System Settings</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
