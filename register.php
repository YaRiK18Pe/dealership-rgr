<?php
require "constants.php";

$data = $_POST;

if (isset($data['do_register'])) {
    $errors = array();

    if (trim($data['login']) == '') {
        $errors[] = 'Введіть логін!';
    }

    if (trim($data['email']) == '') {
        $errors[] = 'Введіть email!';
    }

    if ($data['password'] == '') {
        $errors[] = 'Введіть пароль!';
    }

    if ($data['password2'] != $data['password']) {
        $errors[] = 'Паролі не співпадають!';
    }

    if (R::count('users', "login = ?", array($data['login'])) > 0) {
        $errors[] = 'Цей логін занятий!';
    }

    if (R::count('users', "email = ?", array($data['email'])) > 0) {
        $errors[] = 'Цей email занятий!';
    }

    if (empty($errors)) {
        // $rdb = R::setup('mysql:host=localhost;dbname=train_station', 'root', '');

        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style="color: green;">Успіх!</div><hr>';
    } else {
        echo '<div style="color: red;">' . print_r($errors, true) . '</div>';
    }
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="css/style1.css" media="screen" rel="stylesheet">

<meta charset="UTF-8">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<form action="register.php" method="POST" class="form-register text-center">
    <div class="form-container">
        <label for="login">Логін</label>
        <input type="text" class="form-control" id="login" name="login" placeholder="Введіть логін">
    </div>

    <div class="form-container">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Введіть email">
    </div>

    <div class="form-container">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Введіть пароль">
    </div>

    <div class="form-container">
        <label for="password2">Введіть пароль ще раз</label>
        <input type="password" class="form-control" id="password2" name="password2" placeholder="Повторіть пароль">
    </div>

    <button type="submit" name="do_register" class="btn button">Зареєструватися</button>
    <a href="index.php">
        <button type="button" class="btn button">Головне меню</button>
    </a>
</form>
