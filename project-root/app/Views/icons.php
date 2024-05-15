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

        <div class="order-wrapper">
            <div class="order-card">
                <img src="<?=base_url('photos/trop-pizza.jpg')?>" alt="trop-pizza" class="order-image">
                <div class="order-detail">
                    <p>Trop pizza</p>
                    <div class="input-group">
                        <button class="btn btn-outline-primary" onclick="decrement()">-</button>
                        <input type="text" class="form-control text-center number-field" value="1" id="numberField" readonly>
                        <button class="btn btn-outline-primary" onclick="increment()">+</button>
                    </div>
                </div>
                <h4 class="order-price">3.99e</h4>
            </div>
    </div>

    <!-- detalji cijene -->

    <hr class="divider">
    <div class="order-total">
        <p>Ukupna cijena: <span>420e</span></p>
        <p>PDV (10%): <span>42e</span></p>
        <p>Cijena dostave: <span>2e</span></p>

        <div class="order-promo">
            <input type="text" class="input-promo" placeholder="Unesite vaučer...">
            <button class="button-promo">Unesi vaučer</button>
        </div>
        <hr class="divider">
        <p>Konačna cijena: <span>462e</span></p>
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
<script>
    function increment() {
      let numberField = document.getElementById("numberField");
      let currentValue = parseInt(numberField.value);
      numberField.value = currentValue + 1;
    }

    function decrement() {
      let numberField = document.getElementById("numberField");
      let currentValue = parseInt(numberField.value);
      if (currentValue > 1) {
        numberField.value = currentValue - 1;
      }
    }
</script>