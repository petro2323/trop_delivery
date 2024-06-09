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

    <div class="history-landing">

        <div class="history-table-wrapper">
            <form action="">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th scope="col"># User ID</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Tip</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($users)): ?>
                        <?php 
                        $key = \Config\Encryption::$key;
                        $iv = \Config\Encryption::$iv;
                        $cipher = \Config\Encryption::$cipher;
                        $session = \Config\Services::session();
                        ?>
                        <?php foreach ($users as $user): ?>
                            <?php if ($user['username'] != $session->get('username')): ?>
                        <tr>
                            <th scope="row"><?= $user['id'] ?></th>
                            <td><?= openssl_decrypt($user['first_name'], $cipher, $key, 0, $iv) ?></td>
                            <td><?= openssl_decrypt($user['last_name'], $cipher, $key, 0, $iv) ?></td>
                            <td><?= openssl_decrypt($user['email'], $cipher, $key, 0, $iv) ?></td>
                            <td><?= openssl_decrypt($user['username'], $cipher, $key, 0, $iv) ?></td>
                            <td>
                                <select name="user-type" id="type">
                                    <option value='2' <?= ($user['user_type_id'] == 2) ? "selected" : "" ?>>Employee</option>
                                    <option value='3' <?= ($user['user_type_id'] == 3) ? "selected" : "" ?>>Client</option>
                                </select>
                            </td>
                        </tr>
                            <?php endif;?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="centered-button">
                    <input type="submit" value="Sačuvaj" class="submit-button">
                </div>
            </form>

        </div>
    </div>
    </div>


    <?php include ("footer.php") ?>
</body>

</html>