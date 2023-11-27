<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url('admin/dasboard') ?>">Scan</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url('admin/documents') ?>">Edit Document</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url('admin/users') ?>">Edit User</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?= base_url('logout') ?>">Logout</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-danger border-bottom">
            <div class="container-fluid">
                <button class="btn" id="sidebarToggle">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="navbar-text" href="<?php echo base_url('admin/profile') ?>"> <!-- Add this anchor tag -->
                                <span style="font-size: 16px; font-weight: bold; color: white; text-transform: uppercase;">
                                    <i class="fa-solid fa-user"></i>
                                    <?php echo session()->get('first_name') ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</div>