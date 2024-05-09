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
                include('icons.php');
        } else {
            echo '<button onclick="window.location.href=\'' . base_url('login') . '\'">Get started</button>';
        }
            ?>
        </ul>
    </div>
</nav>