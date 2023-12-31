<?php include "constants.php" ?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Працівники</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/style1.css" media="screen" rel="stylesheet">

</body>
</html>
    <style>
        /* Ваш стиль оформления */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin: 30px;
            font-size: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add text shadow for the outline effect */
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Додати працівника</h1>
    <div class="form-container">
        <form action="add_employees.php" method="post">
        <label for="role_id">Посада:</label>
            <input type="text" name="role_id" id="role_id" required>

            <label for="name_surname">Імя та прізвище:</label>
            <input type="text" name="name_surname" id="name_surname" required>

            <label for="вirth_date">Дата народження:</label>
            <input type="date" name="вirth_date" id="вirth_date" required>

            <label for="phone_number">Телефон:</label>
            <input type="text" name="phone_number" id="phone_number" pattern="\d*" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="salary">Зарплата:</label>
            <input type="number" name="salary" id="salary" pattern="\d*" required>

            <label for="work_time">Робочий час:</label>
            <input type="time" name="work_time" id="work_time" required>

            <label for="dealership_id">Автосалон:</label>
            <select name="dealership_id" id="dealership_id" required>
            <?php
                $result = mysqli_query($link, "SELECT * FROM dealership");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </select>

            <button type="submit">Додати працівника</button>
        </form>
    </div>
</body>
</html>

<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагувати працівника</title>
    <style>
        /* Ваш стиль оформления */
    </style>
</head>
<body>
    <h1>Редагувати працівника</h1>
    <div class="form-container">
        <form action="edit_employees.php" method="post">
        <label for="id">ID працівника для редагування:</label>
            <input type="text" name="id" id="id" required>
            
            <label for="role_id">Посада:</label>
            <input type="number" name="role_id" id="role_id" required>

            <label for="name_surname">Імя та прізвище:</label>
            <input type="text" name="name_surname" id="name_surname" required>

            <label for="вirth_date">Дата народження:</label>
            <input type="date" name="вirth_date" id="вirth_date" required>

            <label for="phone_number">Телефон:</label>
            <input type="text" name="phone_number" id="phone_number" pattern="\d*" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="salary">Зарплата:</label>
            <input type="number" name="salary" id="salary" pattern="\d*" required>

            <label for="work_time">Робочий час:</label>
            <input type="time" name="work_time" id="work_time" required>

            <button type="submit">Зберегти зміни</button>
        </form>
    </div>
</body>
</html>

<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видалити працівника</title>
    <style>
        /* Ваш стиль оформления */
    </style>
</head>
<body>
    <h1>Видалити працівника</h1>
    <div class="form-container">
        <form action="delete_employees.php" method="post" onsubmit="return confirm('Ви впевнені, що хочете видалити цього працівника?');">
            <label for="id">ID працівника для видалення:</label>
            <input type="text" name="id" id="id" required>
            <button type="submit">Видалити</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список працівників</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            background-color: #fff;
        }

        th {
            background-color: #f2f2f2;
        }

        .hidden {
            display: none;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
}
    </style>

    <script>
        function toggleEmployeesVisibility() {
            var employees = document.getElementsByClassName('employee');
            for (var i = 0; i < employees.length; i++) {
                employees[i].classList.toggle('hidden');
            }

            var button = document.getElementById('toggleEmployeesButton');
            button.textContent = (button.textContent === 'Показати всіх працівників') ? 'Сховати працівників' : 'Показати всіх працівників';
        }
    </script>
</head>
<body>
    <h1>Список працівників</h1>

    <button id="toggleEmployeesButton" onclick="toggleEmployeesVisibility()">Показати всіх працівників</button>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID працівника</th>
                    <th>Посада</th>
                    <th>Ім'я та прізвище</th>
                    <th>Дата народження</th>
                    <th>Телефон</th>
                    <th>Email</th>
                    <th>Зарплата</th>
                    <th>Робочий час</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM employees");

                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr class='employee hidden'>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['role_id'] . "</td>";
                        echo "<td>" . $row['name_surname'] . "</td>";
                        echo "<td>" . $row['birth_date'] . "</td>";
                        echo "<td>" . $row['phone_number'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['salary'] . "</td>";
                        echo "<td>" . $row['work_time'] . "</td>";
                    }
                } else {
                    echo "Помилка: " . mysqli_error($link);
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php


 