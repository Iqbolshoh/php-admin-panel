<?php
function active($Page, $Menu)
{ ?>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item has-treeview <?php echo ($Page === 'dashboard') ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo ($Page === 'dashboard') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./" class="nav-link <?php echo ($Menu === 'dashboard') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/messages.php" class="nav-link <?php echo ($Menu === 'messages') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Messages</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item has-treeview <?php echo ($Page === 'tables') ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo ($Page === 'tables') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Tables
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="table.php" class="nav-link <?php echo ($Menu === 'datatable') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Table</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-header">EXAMPLES</li>


                    <li class="nav-item has-treeview <?php echo ($Page === 'alerts') ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo ($Page === 'alerts') ? 'active' : ''; ?>">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p>
                                Alerts
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="alert.php" class="nav-link <?php echo ($Menu === 'alert') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Alert</p>
                                </a>
                            </li>

                        </ul>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

<?php
}
?>

<?php
function pagePath($pageTitle, $breadcrumb)
{
?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $pageTitle; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($breadcrumb as $item) : ?>
                            <?php if ($item['url'] === '#') : ?>
                                <li class="breadcrumb-item active"><?php echo $item['title']; ?></li>
                            <?php else : ?>
                                <li class="breadcrumb-item"><a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>

<?php
}
