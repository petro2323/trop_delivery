<ul class="nav-links">

        <!-- cart button -->

        <input type="checkbox" id="cart">
        <label for="cart" class="label-cart"><span class="fas fa-shopping-cart"></span></label>

        <!-- dashboard za narudzbe -->
    <div class="dashboard-order">
        <h3>Order Menu</h3>
        <div class="order-address">
            <p>Adresa Dostave</p>
            <div id="addressContainer">
        
            </div>
        <button id="saveAddressBtn">Save</button>
        <button id="editAddressBtn" style="display:none">Edit</button>
        <button id="deleteAddressBtn" style="display:none">Delete</button>
        </div>

        <div class="order-wrapper" id="cart-items"></div>

    <!-- detalji cijene -->

    <hr class="divider">
    <div class="order-total">
        <p>Ukupna cijena: <span id="total-price">0 €</span></p>
        <p>PDV (10%): <span id="pdv">0 €</span></p>
        <p>Cijena dostave: <span id="delivery-price"></span></p>

        <div class="order-promo">
            <input type="text" class="input-promo" placeholder="Unesite vaučer..." id="trop_voucher">
            <button class="button-promo" id="voucher_button">Unesi vaučer</button>
        </div>
        <hr class="divider">
        <p>Konačna cijena: <span id="final-price">0 €</span></p>
    </div>
    <button class="checkout">
        Naruči
    </button>

  </div>

  <div class="collapse navbar-collapse " id="navbar-list-4">
    <ul class="navbar-nav">
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?= base_url('/photos/user-icon.png') ?>" width="40" height="40" class="rounded-circle">
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="<?= base_url('dashboard') ?>">Dashboard</a>
        <a class="dropdown-item" href="#">Edit Profile</a>
        <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
    </div>
</li>
</ul>
</div>
</ul>
<script src="<?=base_url('js/address.js')?>"></script>
<script src="<?=base_url('js/cart.js')?>"></script>