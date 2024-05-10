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
    <link rel="icon" href="<?= base_url() ?>/photos/tropicon.png" type="image/gif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Trop Delivery</title>
</head>

<body>

    <nav class="tropnav">
        <div class="logo">
            <img src="photos/TropDeliveryLogo.png" alt="Trop Delivery">
            <span><a href="<?= base_url('/') ?>">Trop Delivery</a></span>
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
            <h1>Find delicious food near you</h1>
            <div class="search">
                <form action="" class="login">
                    <div class="form__field">
                        <label for="login__username"><svg class="icon">
                                <use xlink:href="#icon-search"></use>
                            </svg><span class="hidden">Username</span></label>
                        <input autocomplete="username" id="search_bar" value="" type="text" name="search"
                            class="form__input" placeholder="Type to search for food...">
                    </div>
                </form>
            </div>
            <table id="search_result">

            </table>
        </div>
    </div>

    <div class="main_restaurants">
        <div class="recommended">
            <h1>Top picks by Trope</h1>

        </div>
        <div class="recommended_container">
            <div class="custom-card">
                <img src="<?= base_url('photos/grill.jpg') ?>" alt="Restaurant">
                <div class="container">
                    <h4>Tropicana Roštilj</h4>
                    <p>BBQ and Steakhouse</p>
                </div>
            </div>
            <div class="custom-card">
                <img src="<?= base_url('photos/nino-coffee.jpeg') ?>" alt="Restaurant">
                <div class="container">
                    <h4>Coffee at Nino's</h4>
                    <p>Single origin coffee</p>
                </div>
            </div>
            <div class="custom-card">
                <img src="<?= base_url('photos/pepino-pizza.jpg') ?>" alt="Restaurant">
                <div class="container">
                    <h4>Peppino's Pizza</h4>
                    <p>Italian Pizza</p>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->

    <footer class="footer">
        <div class="footer-container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h2 class="footer-heading"><a href="<?=base_url('/')?>" class="footer-logo">Trop Delivery</a></h2>
                    <p class="menu">
                        <a href="#">Home</a>
                        <a href="#">Agent</a>
                        <a href="#">About</a>
                        <a href="#">Listing</a>
                        <a href="#">Blog</a>
                        <a href="#">Contact</a>
                    </p>
                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
                                title="Twitter"><span class="ion-logo-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
                                title="Facebook"><span class="ion-logo-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
                                title="Instagram"><span class="ion-logo-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p class="copyright">
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved | This template
                        is made with <i class="ion-ios-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-search" viewBox="0 0 16 16">
            <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </symbol>
    </svg>
</body>

</html>