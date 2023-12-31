<?php include "constants.php";
$isUserLoggedIn = isset($_SESSION['logged_user']); ?>

<!DOCTYPE html>
<html lang="ua">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/style1.css" media="screen" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<?php if ($isUserLoggedIn) : ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand p-0" href="index.php">Головна сторінка</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link order-1" aria-current="page" href="all.php">Автосалон</a>
                        <a class="nav-link order-2" href="car.php">Машини</a>
                        <a class="nav-link order-3" href="customers.php">Покупці</a>
                        <a class="nav-link order-4" href="employees.php">Працівники</a>
                        <a class="nav-link order-5" href="order.php">Замовлення</a>
                    </div>
                </div>
            </div>
        </nav>
    <?php endif; ?>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<style>
        .rounded-img {
            width: 100%;
            border-radius: 3%;
            box-shadow: 0 0 50px rgba(26, 9, 9, 0.5);
            padding: 1em;
        }
        h1 {
            font-size: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin-top: 50px;
            margin-bottom: 10px;
        }

    </style>

    <div class="container text-center">
        <div class="row">
            <div class="col-lg-7 mx-auto">
            <h1>БАЗА ДАНИХ "АВТОСАЛОН"</h1>
                <img class="rounded-img" src="s1.jpg" alt="Картинка не відображена" />
                <h1>Головна сторінка</h1>
                <h2>Вітаємо, <?= isset($_SESSION['logged_user']) ? $_SESSION['logged_user']->login : "Гість"; ?>!</h2>
                <div class="container">
                    <p class="lead text-muted col-lg-10 mx-auto">База даних розроблена студентами:</p>
                    <p class="lead text-muted col-lg-10 mx-auto">Петриченко Я.Є., Довженко Л.П., Білоус М.В.</p>
                </div>

                <?php if (isset($_SESSION['logged_user'])) : ?>
                    <hr>
                    <a href="all.php" class="btn btn-danger">Головне меню</a><br>
                    <a href="logout.php" class="btn btn-logout">Вийти</a>
                <?php else : ?>
                    <a class="nav-link" href="register.php">Реєстрація</a>
                    <a class="nav-link" href="login.php">Вхід</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>
