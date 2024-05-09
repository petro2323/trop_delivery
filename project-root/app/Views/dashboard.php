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
    <link rel="icon" href="<?=base_url('/photos/tropicon.png')?>" type="image/gif">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Trop Delivery</title>
</head>
<body>

<?php include('header.php') ?>

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
            <img class="card-image" src=" <?=base_url('photos/trop-pizza.jpg')?> " alt="trop-pizza">
            <div class="card-detail">
                <h4>Trop Pizza <span>4e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>15-30 min</p>
            </div>
        </div>

        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos/hakaton-sendvic.jpg')?>" alt="hakaton-sendvic">
            <div class="card-detail">
                <h4>Hakaton Sendvič <span>7e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>15-30 min</p>
            </div>
        </div>


    
        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos/markus-cevapi.jpg')?>" alt="markus-cevapi">
            <div class="card-detail">
                <h4>Markus ćevapi <span>3.80e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>10-20 min</p>
            </div>
        </div>
   

    
        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos/nino-espresso.jpg')?>" alt="nino-espresso">
            <div class="card-detail">
                <h4>Espresso Ninoslav blend <span>2e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>5-10 min</p>
            </div>
        </div>

        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos/trop-pizza.jpg')?>" alt="trop-pizza">
            <div class="card-detail">
                <h4>Trop Pizza <span>4e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>15-30 min</p>
            </div>
        </div>

        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos/hakaton-sendvic.jpg')?>" alt="hakaton-sendvic">
            <div class="card-detail">
                <h4>Hakaton Sendvič <span>7e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>15-30 min</p>
            </div>
        </div>


    
        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos/markus-cevapi.jpg')?>" alt="markus-cevapi">
            <div class="card-detail">
                <h4>Markus ćevapi <span>3.80e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>10-20 min</p>
            </div>
        </div>
   

    
        <div class="dashboard-card">
            <img class="card-image" src="<?=base_url('photos/nino-espresso.jpg')?>" alt="nino-espresso">
            <div class="card-detail">
                <h4>Espresso Ninoslav blend <span>2e</span></h4>
                <p>Sample text neki ne znam</p>
                <p class="card-time"><span class="fas fa-clock"></span>5-10 min</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>