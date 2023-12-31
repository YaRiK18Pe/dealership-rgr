<?php include "constants.php" ?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон</title>
    <link href="css/style1.css" media="screen" rel="stylesheet">
    <style>
        /* Ваш стиль оформления */
    </style>
</head>
<body>
    <h1>Додати автосалон</h1>
    <div class="container">
        <form action="process_dealership.php" method="post">
            <label for="name">Назва автосалону:</label>
            <input type="text" name="name" id="name" required>

            <label for="place">Місцезнаходження:</label>
            <input type="text" name="place" id="place" required>

            <label for="parking_spaces">Кількість парковочних місць:</label>
            <input type="number" name="parking_spaces" id="parking_spaces" required>

            <label for="access">Доступ:</label>
            <input type="number" name="access" id="access" required>

            <label for="employees_id">Кількість працівників:</label>
            <input type="number" name="employees_id" id="employees_id" required>

            <label for="car_id">Кількість автомобілів:</label>
            <input type="number" name="car_id" id="car_id" required>

            <button type="submit">Додати автосалон</button>
        </form>
    </div>
</body>
</html>

<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагувати автосалон</title>
    <style>
        /* Ваш стиль оформления */
    </style>
</head>
<body>
    <h1>Редагувати автосалон</h1>
    <div class="container">
        <form action="update_dealership.php" method="post">
            <label for="dealership_id">ID автосалону:</label>
            <input type="text" name="dealership_id" id="dealership_id" required>
            
            <label for="name">Назва автосалону:</label>
            <input type="text" name="name" id="name" required>

            <label for="place">Місцезнаходження:</label>
            <input type="text" name="place" id="place" required>

            <label for="parking_spaces">Кількість парковочних місць:</label>
            <input type="number" name="parking_spaces" id="parking_spaces" required>

            <label for="access">Доступ:</label>
            <input type="number" name="access" id="access" required>

            <label for="employees_id">Кількість працівників:</label>
            <input type="number" name="employees_id" id="employees_id" required>

            <label for="car_id">Кількість автомобілів:</label>
            <input type="number" name="car_id" id="car_id" required>
            <button type="submit">Зберегти зміни</button>
        </form>
    </div>
</body>
</html>


<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видалити автосалон</title>
    <style>
        /* Ваш стиль оформления */
    </style>
</head>
<body>
    <h1>Видалити автосалон</h1>
    <div class="container">
        <form action="delete_dealership.php" method="post" onsubmit="return confirm('Ви впевнені, що хочете видалити цей автосалон?');">
            <label for="id">ID автосалону для видалення:</label>
            <input type="text" name="id" id="id" required>

            <p>Ви впевнені, що хочете видалити цей автосалон?</p>
            <button type="submit">Видалити</button>
        </form>
    </div>
</body>
</html>


