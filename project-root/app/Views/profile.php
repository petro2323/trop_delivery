<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url('css/global.css') ?>">
    <link rel="stylesheet" href="<?=base_url('css/register.css') ?>">
    <link rel="icon" href="<?=base_url()?>/photos/tropicon.png" type="image/gif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Edit Profile</title>
</head>
<body class="align">

<div class="logo-trop">
    <img src="photos/engine.png" height="250rem" id="profile-engine">
</div>

<div class="grid">

    <?= session()->getFlashdata('error') ? '<p>' . session()->getFlashdata('error') . '</p>' : '' ?>
    <?= session()->getFlashdata('success') ? '<p>' . session()->getFlashdata('success') . '</p>' : '' ?>

    <form class="form register">

        <div class="form__field">
            <label for="profile__fName"><svg class="icon">
                    <use xlink:href="#icon-user"></use>
                </svg><span class="hidden">First Name</span></label>
            <input autocomplete="username" id="profile__fName" type="text" name="fName" class="form__input" placeholder="First Name">
        </div>

        <div class="form__field">
            <label for="profile__lName"><svg class="icon">
                    <use xlink:href="#icon-user"></use>
                </svg><span class="hidden">Last Name</span></label>
            <input autocomplete="username" id="profile__lName" type="text" name="lName" class="form__input" placeholder="Last Name">
        </div>

        <div class="form__field">
            <label for="profile__email"><svg class="icon">
                    <use xlink:href="#icon-envelope"></use>
                </svg><span class="hidden">Email</span></label>
            <input autocomplete="username" id="profile__email" type="email" name="email" class="form__input" placeholder="Email">
        </div>

        <div class="form__field">
            <label for="profile__phone"><svg class="icon">
                    <use xlink:href="#icon-phone"></use>
                </svg><span class="hidden">Phone</span></label>
            <input autocomplete="username" id="profile__phone" type="tel" name="phone" class="form__input" placeholder="Phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}">
        </div>

        <div class="form__field">
            <label for="profile__username"><svg class="icon">
                    <use xlink:href="#icon-user"></use>
                </svg><span class="hidden">Username</span></label>
            <input autocomplete="username" id="profile__username" type="text" name="username" class="form__input" placeholder="Username">
        </div>

        <div class="form__field">
            <label for="old_profile__password"><svg class="icon">
                    <use xlink:href="#icon-lock"></use>
                </svg><span class="hidden">Old Password</span></label>
            <input id="old_profile__password" type="password" name="old_password" class="form__input" placeholder="Old Password">
        </div>

        <div class="form__field">
            <label for="new_profile__password"><svg class="icon">
                    <use xlink:href="#icon-lock"></use>
                </svg><span class="hidden">New Password</span></label>
            <input id="new_profile__password" type="password" name="new_password" class="form__input" placeholder="New Password">
        </div>

        <div class="form__field">
            <input type="submit" value="Update changes" name="submit">
        </div>

    </form>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

</div>

<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
        <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
        <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
    <symbol id="icon-envelope" viewBox="0 0 24 24">
        <path d="M21 6.41L12.71 15.71c-.39.39-1.02.39-1.41 0L3 6.41V18h18V6.41zM20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-8 7L4.5 5h15L12 11zm0 2l3.5-3.5H8.5L12 13z"/>
    </symbol>
    <symbol id="icon-phone" viewBox="0 0 512 512">
        <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
    </symbol>
</svg>

</body>
</html>