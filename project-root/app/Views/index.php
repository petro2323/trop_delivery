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
    <link rel="icon" href="<?=base_url()?>/photos/tropicon.png" type="image/gif">
    <title>Trop Delivery</title>
    <script>
                const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
        Toast.fire({
        icon: "success",
        title: "Signed in successfully"
        });
    </script>
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src="photos/TropDeliveryLogo.png" alt="Trop Delivery">
        <span><a>Trop Delivery</a></span>
    </div>
    <ul class="nav-links">
        <div class="profile">
            <li class="services">
                    <?php $session = \Config\Services::session(); 
                    if($session->has('username')) {
                        echo "<p>";
                        echo 'Hello ' . $session->get('username');
                        echo '<br>';
                        echo '<a href="' . base_url('logout') . '">Logout</a>';
                        echo "</p>";
                    } else {
                        echo '<a href="' . base_url('login') . '">Login</a>';
                    }
                    ?>
            </li>
        </div>
    </ul>
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
                    <input autocomplete="username" id="search_bar" value="" type="text" name="search" class="form__input" placeholder="Type to search for food...">
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
        <div class="card">
            <img src="<?=base_url('photos/grill.jpg') ?>" alt="Restaurant">
            <div class="container">
                <h4>Tropicana Roštilj</h4>
                <p>BBQ and Steakhouse</p>
            </div>
        </div>
        <div class="card">
            <img src="<?=base_url('photos/nino-coffee.jpeg') ?>" alt="Restaurant">
            <div class="container">
                <h4>Coffee at Nino's</h4>
                <p>Single origin coffee</p>
            </div>
        </div>
        <div class="card">
            <img src="<?=base_url('photos/pepino-pizza.jpg') ?>" alt="Restaurant">
            <div class="container">
                <h4>Peppino's Pizza</h4>
                <p>Italian Pizza</p>
            </div>
        </div>
    </div>
</div>


<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
    </symbol>
</svg>
</body>
</html>