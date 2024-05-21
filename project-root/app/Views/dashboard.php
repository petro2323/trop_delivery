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
        <a href="<?=base_url('dashboard/best-selling')?>" <?= current_url(true)->getPath() === '/index.php/dashboard/best-selling' ? 'class="active"' : '' ?>>Najbolje prodavani</a>
        <a href="<?=base_url('dashboard/near-me')?>" <?= current_url(true)->getPath() === '/index.php/dashboard/near-me' ? 'class="active"' : '' ?>>Blizu mene</a>
        <a href="">Promocija</a>
        <a href="">Najbolje ocijenjeni</a>
        <a href="<?=base_url('dashboard')?>" <?= current_url(true)->getPath() === '/index.php/dashboard' ? 'class="active"' : '' ?>>Sve</a>
    </div>

    <div class="dashboard-content">
    <?php if(isset($foodRestaurants)): ?>
    <?php foreach ($foodRestaurants as $foodRestaurant): ?>
    <div class="dashboard-card">
        <img class="card-image" src="<?= base_url('food/' . $foodRestaurant['food_image']) ?>" alt="<?= $foodRestaurant['food_title'] ?>">
        <div class="card-detail">
            <h4 class="title"><?= $foodRestaurant['food_title'] ?> <span></span></h4>
            <p><?= $foodRestaurant['restaurant_title'] ?></p>
            <p><?= $foodRestaurant['location'] ?></p>
            <p class="price"><?= $foodRestaurant['price'] ?> €</p>
            <p class="card-time"><span class="fas fa-clock"> <?= $foodRestaurant['delivery_time'] ?> min</span></p>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    </div>

<div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>

<?php include("footer.php")?>

</body>
</html>