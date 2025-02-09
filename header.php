<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$pageTitle = "";

$menuItems = [
    [
        "menuTitle" => "Menu",
        "icon" => "fas fa-home",
        "pages" => [
            ["title" => "Home", "url" => "index.php"]
        ],
    ],
    [
        "menuTitle" => "Logout",
        "icon" => "fas fa-sign-out-alt",
        "pages" => [
            ["title" => "Logout", "url" => "javascript:void(0)", "onclick" => "logout()"]
        ],
    ],
];

$breadcrumbItems = [];
foreach ($menuItems as $menuItem) {
    foreach ($menuItem['pages'] as $page) {
        if ($currentPage === $page['url']) {
            $breadcrumbItems[] = ["title" => $menuItem['menuTitle'], "url" => "#"];
            $breadcrumbItems[] = ["title" => $page['title'], "url" => $page['url']];
            $pageTitle = $page['title'];
            break;
        }
    }
}
?>

<head>
    <title><?= $pageTitle ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="./" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="javascript:void(0)" onclick="logout()" class="nav-link"><i class="fas fa-sign-out-alt"></i>
                Logout</a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="./" class="brand-link">
        <img src="./src/images/logo.png" alt="Admin Panel Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./src/images/default.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="./" class="d-block">Iqbolshoh Ilhomjonov</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <?php foreach ($menuItems as $menuItem): ?>
                    <li class="nav-item">
                        <a href="<?= $menuItem['pages'][0]['url'] ?>"
                            onclick="<?= $menuItem['pages'][0]['onclick'] ?? '' ?>" class="nav-link">
                            <i class="nav-icon <?= $menuItem['icon'] ?>"></i>
                            <p><?= $menuItem['menuTitle'] ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</aside>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function logout() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log me out!'
        }).then((result) => {
            if (result.value) {
                window.location.href = './logout/';
            }
        });
    }
</script>