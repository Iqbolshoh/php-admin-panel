<?php
function pagePath($pageTitle, $breadcrumb)
{
    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <?php echo $pageTitle; ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($breadcrumb as $item): ?>
                            <?php if ($item['url'] === '#'): ?>
                                <li class="breadcrumb-item active"><?php echo $item['title']; ?></li>
                            <?php else: ?>
                                <li class="breadcrumb-item"><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="./" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"
                name="search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="#messages">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="#messages">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
        <img src="./src/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./src/images/default.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="./" class="d-block">Iqbolshoh Ilhomjonov</a>
            </div>
        </div>

        <?php
        $current_page = basename($_SERVER['SCRIPT_NAME']);

        $menu = [
            [
                "menu" => "Menu",
                "title" => "Menu",
                "icon" => "fas fa-tachometer-alt",
                "pages" => [
                    [
                        "title" => "Dashboard",
                        "url" => "index.php",
                    ],
                    [
                        "title" => "Alert",
                        "url" => "alert.php",
                    ],
                ],
            ],
        ];
        ?>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($menu as $item): ?>
                    <?php
                    $is_menu_open = false;
                    $is_active = false;
                    foreach ($item['pages'] as $page) {
                        if ($current_page === $page['url']) {
                            $is_menu_open = true;
                            $is_active = true;
                            break;
                        }
                    }
                    ?>
                    <li class="nav-item has-treeview <?= $is_menu_open ? 'menu-open' : '' ?>">
                        <a class="nav-link <?= $is_active ? 'active' : '' ?>">
                            <i class="nav-icon <?= $item['icon'] ?>"></i>
                            <p>
                                <?= $item['title'] ?>
                                <?php if (!empty($item['pages'])): ?>
                                    <i class="right fas fa-angle-left"></i>
                                <?php endif; ?>
                            </p>
                        </a>
                        <?php if (!empty($item['pages'])): ?>
                            <ul class="nav nav-treeview">
                                <?php foreach ($item['pages'] as $page): ?>
                                    <li class="nav-item">
                                        <a href="<?= $page['url'] ?>"
                                            class="nav-link <?= $current_page === $page['url'] ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?= $page['title'] ?></p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

</aside>