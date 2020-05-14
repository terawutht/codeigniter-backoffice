<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url(); ?>backoffice/dashboard" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo PROJECT_NAME; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo site_url(); ?>backoffice/profile" class="d-block"><?php echo $this->session->has_userdata('fullname')?$this->session->userdata('fullname'):'-' ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <?php if (!empty($menu_aside_group)) :
                    foreach ($menu_aside_group as $row_group) {
                        if (!empty($row_group->path)) { ?>

                            <li class="nav-item">
                                <a href="<?php echo site_url(); ?><?php echo !empty($row_group->path) ? $row_group->path : '-' ?>" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        <?php echo !empty($row_group->name) ? $row_group->name : '-' ?>
                                    </p>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-header"><?php echo !empty($row_group->name) ? $row_group->name : '-' ?></li>
                            <?php }
                        if (!empty($menu_aside_main)) :
                            foreach ($menu_aside_main as $row_main) {

                                if ($row_group->id === $row_main->group_id) :
                                    if (!empty($row_main->path)) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url(); ?><?php echo !empty($row_main->path) ? $row_main->path : '-' ?>" class="nav-link">
                                                <i class="nav-icon far fa-calendar-alt"></i>
                                                <p>
                                                    <?php echo !empty($row_main->name) ? $row_main->name : '-' ?>

                                                </p>
                                            </a>
                                        </li>
                                    <?php    } else {  ?>
                                        <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon far fa-calendar-alt"></i>
                                                <p>
                                                    <?php echo !empty($row_main->name) ? $row_main->name : '-' ?>
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <?php
                                                if (!empty($menu_aside_sub)) :
                                                    foreach ($menu_aside_sub as $row_sub) {
                                                        if ($row_main->id === $row_sub->menu_main_id) : ?>

                                                            <li class="nav-item">
                                                                <a href="<?php echo site_url(); ?><?php echo !empty($row_sub->path) ? $row_sub->path : '-' ?>" class="nav-link">
                                                                    <p class="ml-5"><?php echo !empty($row_sub->name) ? $row_sub->name : '-' ?></p>
                                                                </a>
                                                            </li>

                                                <?php endif;
                                                    }
                                                endif; ?>
                                            </ul>

                                    <?php 

                                    }
                                endif;
                                    ?>                         
                                        </li>
                        <?php     }
                        endif;
                    }
                endif; ?>

                        <li class="nav-item mt-5">
                            <a href="<?php echo site_url(); ?>backoffice/logout" class="nav-link">
                                <i class="nav-icon fas fa fa-sign-out"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>