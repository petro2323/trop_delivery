<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url('css/global.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/main-page.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/history.css') ?>">
    <link rel="icon" href="<?= base_url() ?>/photos/tropicon.png" type="image/gif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Trop Delivery</title>
</head>

<body>
    
<nav class="tropnav">
    <div class="logo">
        <img src="photos/TropDeliveryLogo.png" alt="Trop Delivery">
        <span><a href="<?=base_url('/')?>">Trop Delivery</a></span>
    </div>
    <ul class="nav-links">
    <div class="collapse navbar-collapse" id="navbar-list-4">
        <ul class="navbar-nav">
            <?php
            $session = \Config\Services::session();
            if ($session->has('username')) {
            echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="' . base_url('/photos/user-icon.png') . '" width="40" height="40" class="rounded-circle">
                    </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="' . base_url('dashboard') . '">Dashboard</a>
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="' . base_url('logout') . '">Logout</a>
            </div>
                </li>';
        } else {
            echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="' . base_url('/photos/user-icon.png') . '" width="40" height="40" class="rounded-circle">
            </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="' . base_url('dashboard') . '">Dashboard</a>
        <a class="dropdown-item" href="#">Edit Profile</a>
        <a class="dropdown-item" href="' . base_url('history') . '">History</a>
        <a class="dropdown-item" href="' . base_url('login') . '">Login</a>
    </div>
        </li>';
        }
            ?>
        </ul>
    </div>
</nav>

    <div class="landing">
        <div class="main_container">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php include ("footer.php") ?>
</body>

</html>