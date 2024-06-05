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
    <link rel="stylesheet" href="<?=base_url('css/dashboard.css') ?>">
    <link rel="icon" href="<?= base_url() ?>/photos/tropicon.png" type="image/gif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <title>Trop Delivery</title>
</head>

<body>
    
<?php include('header.php') ?>

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

   <?php include("footer.php")?>


    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-search" viewBox="0 0 16 16">
            <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </symbol>
    </svg>
</body>

</html>
<script type="text/javascript">
    $(document).ready(() => {
    $("#search_bar").on("input", (e) => {
        e.preventDefault()

        let query = $("#search_bar").val()

        if (query.trim() !== "") {
            let request = {
                url: '<?php echo base_url('search-food') ?>',
                type: 'GET',
                data: {query: query},
                success: function(result) {
                    $("#search_result").html(result)
                },
                error: function(error) {
                    $("#search_result").html(error)
                }
            }
            $.ajax(request)
        } else {
            $("#search_result").html("")
        }
    })
})
</script>