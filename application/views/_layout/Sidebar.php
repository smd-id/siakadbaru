<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-3">
    
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link">
        <img src="<?= base_url('assets/'); ?>img/logo/logo-only.png" alt="School Logo" class="brand-image elevation-3">
        <span class="brand-text font-weight-light"><?= $detail->nama_portal; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel-->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/'); ?>img/profilpic/<?= $userdata->profile_picture; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url(); ?>" class="d-block"><?= $userdata->name; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Menu List</li>
                
                <?= menu_listing(); ?>

                <li class="nav-header">Setting Account</li>
                
                <li class="nav-item">
                    <a href="<?= base_url('auth/changeprofile'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>