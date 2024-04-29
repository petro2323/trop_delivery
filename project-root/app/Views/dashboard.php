<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url('css/global.css') ?>">
    <link rel="stylesheet" href="<?=base_url('css/login.css') ?>">
    <link rel="stylesheet" href="<?=base_url('css/main-page.css') ?>">
    <link rel="stylesheet" href="<?=base_url('css/dashboard.css') ?>">
    <link rel="icon" href="<?=base_url()?>/photos/tropicon.png" type="image/gif">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Trop Delivery</title>
</head>
<body>
    
<nav class="tropnav">
    <div class="logo">
        <img src="photos/TropDeliveryLogo.png" alt="Trop Delivery">
        <span><a href="<?=base_url('/')?>">Trop Delivery</a></span>
    </div>
    <ul class="nav-links">
    <!-- cart button -->
    <input type="checkbox" id="cart">
    <label for="cart" class="label-cart"><span class="fas fa-shopping-cart"></span></label>

    <div class="collapse navbar-collapse " id="navbar-list-4">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?=base_url('/photos/user-icon.png')?>" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <a class="dropdown-item" href="#">Edit Profile</a>
                    <a class="dropdown-item" href="<?=base_url('logout')?>">Log Out</a>
                </div>
            </li>   
        </ul>
  </div>
    </ul>
</nav>


<div class="dashboard">
    <div class="dashboard-banner">
        <img src="<?=base_url('photos/burger.jpg') ?>" alt="burger">
        <div class="banner-promo">
            <h1><span>50% POPUSTA</span>
                <br>
                Ukusna Hrana <br> 
                Na tvom dlanu 
            </h1>
        </div>
    </div>

    <h3 class="dashboard-title">Preporučujemo Vam</h3>
    <div class="dashboard-menu">
        <a href="">Omiljeni</a>
        <a href="">Najbolje prodavani</a>
        <a href="">Blizu mene</a>
        <a href="">Promocija</a>
        <a href="">Najbolje ocijenjeni</a>
        <a href="">Sve</a>
    </div>

    <div class="dashboard-content">
        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos\trop-pizza.jpg')?>" alt="">
            <div class="card-detail">
                <h4>Trop Pizza <span>4e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>15-30 min</p>
            </div>
        </div>

        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos\hakaton-sendvic.jpg')?>" alt="">
            <div class="card-detail">
                <h4>Hakaton Sendvič <span>7e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>15-30 min</p>
            </div>
        </div>


    
        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos\markus-cevapi.jpg')?>" alt="">
            <div class="card-detail">
                <h4>Markus ćevapi <span>3.80e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>10-20 min</p>
            </div>
        </div>
   

    
        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos\nino-espresso.jpg')?>" alt="">
            <div class="card-detail">
                <h4>Espresso Ninoslav blend <span>2e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>5-10 min</p>
            </div>
        </div>
    </div>

</div>

<div class="landing">
    <div class="main_container">
            <h1>Find delicious food near you</h1>
        <div class="search">
            <form action="" class="login">
                <div class="form__field">
                    <label for="login__username"><svg class="icon">
                            <use xlink:href="#icon-search"></use>
                        </svg><span class="hidden">Username</span></label>
                    <input autocomplete="username" id="search_bar" value="" type="text" name="search" class="form__input" placeholder="Type to search for food...">
                </div>
            </form>
        </div>
        <table id="search_result">

        </table>
    </div>
</div>


</body>
</html>