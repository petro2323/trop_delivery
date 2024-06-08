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
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
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

    <?php include ('header.php') ?>

    <div class="dashboard" id="history-advertizing">
        <div class="history-banner">
            <img src="<?= base_url('/food/nino-espresso-coffee-at-ninos.jpg') ?>" alt="burger">
            <div class="banner-promo">
                <h1><span>NOVO!!!</span>
                    <br>
                    Kupi kafu <br>
                    Dobij šolju! <br>
                </h1>
            </div>
        </div>
    </div>

    <div class="history-landing">

        <div class="history-table-wrapper">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col"># Tracking number</th>
                        <th scope="col">Ime</th>
                        <th scope="col">Prezime</th>
                        <th scope="col">Username</th>
                        <th scope="col">Naručene stavke</th>
                        <th scope="col">Status porudžbine</th>
                        <th scope="col">Ukupan iznos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Nebojša</td>
                        <td>Nedić</td>
                        <td>nnedic98</td>
                        <td></td>
                        <td>U tranzitu</td>
                        <td>8.59€</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Haris</td>
                        <td>Adrović</td>
                        <td>hakaizdzungle</td>
                        <td></td>
                        <td>Dostavljeno</td>
                        <td>14.60€</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Miloš</td>
                        <td>Sekulić</td>
                        <td>selesekac87</td>
                        <td></td>
                        <td>Otkazano</td>
                        <td>8.65€</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <?php include ("footer.php") ?>
</body>

</html>