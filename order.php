<?php include "constants.php"; ?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Замовлення</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/style1.css" media="screen" rel="stylesheet">

</body>
</html>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .form-container {
            max-width: 1000px;
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
        select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
}
    </style>
</head>
<body>
    <h1>Додати замовлення</h1>
    <div class="form-container">
        <form action="add_order.php" method="post">
            <label for="customer_id">Оберіть покупця:</label>
            <select name="customer_id" id="customer_id" required>
            <?php
                $result = mysqli_query($link, "SELECT * FROM customers");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name_surname'] . "</option>";
                }
                ?>
            </select>

            <label for="car_id">Оберіть автомобіль:</label>
            <select name="car_id" id="car_id" required>
            <?php
    $result = mysqli_query($link, "SELECT * FROM car");
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['id'] . "'>" . $row['manufacturer'] . " " . $row['model'] . " (" . $row['body_type'] . ", " . $row['color'] . ", " . $row['year'] . ", " . $row['type_engine'] . ", " . $row['transmission'] . ", VIN: " . $row['vin_code'] . ")" . "</option>";
    }
    ?>
            </select>
            
            <label for="price">Ціна:</label>
            <input type="number" name="price" id="price" pattern="\d*" required>

            <label for="date_buy">Дата замовлення:</label>
            <input type="date" name="date_buy" id="date_buy" required>

            <label for="address_buy">Місце замовлення:</label>
            <input type="text" name="address_buy" id="address_buy" value="Tojiki Building, Tokyo 101-0032, Japan
" required>

            <label for="employees_id">Оберіть працівника:</label>
            <select name="employees_id" id="employees_id" required>
            <?php
                $result = mysqli_query($link, "SELECT * FROM employees");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name_surname'] . "</option>";
                }
                ?>
            </select>

            <button type="submit">Додати замовлення</button>
        </form>
    </div>
</body>
</html>

<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагувати замовлення</title>
    <style>
        /* Ваш стиль оформления */
    </style>
</head>
<body>
    <h1>Редагувати замовлення</h1>
    <div class="form-container">
        <form action="edit_order.php" method="post">
        <label for="order_id">Номер замовлення для редагування:</label>
            <input type="text" name="id" id="order_id" required>
            
            <label for="customer_id">Виберіть покупця:</label>
            <select name="customer_id" id="customer_id" required>
            <?php
                $result = mysqli_query($link, "SELECT * FROM customers");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name_surname'] . "</option>";
                }
                ?>
            </select>

            <label for="car_id">Виберіть автомобіль:</label>
            <select name="car_id" id="car_id" required>
            <?php
    $result = mysqli_query($link, "SELECT * FROM car");
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['id'] . "'>" . $row['manufacturer'] . " " . $row['model'] . " (" . $row['body_type'] . ", " . $row['color'] . ", " . $row['year'] . ", " . $row['type_engine'] . ", " . $row['transmission'] . ", VIN: " . $row['vin_code'] . ")" . "</option>";
    }
    ?>
            </select>

            <label for="price">Ціна:</label>
            <input type="number" name="price" id="price" pattern="\d*" required>

            <label for="date_buy">Дата замовлення:</label>
            <input type="date" name="date_buy" id="date_buy" required>

            <label for="address_buy">Місце замовлення:</label>
            <input type="text" name="address_buy" id="address_buy" value="Tojiki Building, Tokyo 101-0032, Japan
" required>

            <label for="employees_id">Оберіть працівника:</label>
            <select name="employees_id" id="employees_id" required>
            <?php
                $result = mysqli_query($link, "SELECT * FROM employees");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name_surname'] . "</option>";
                }
                ?>
            </select>

            <button type="submit">Зберегти зміни</button>
        </form>
    </div>
</body>
</html>

<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видалити замовлення</title>
    <style>
        /* Ваш стиль оформления */
    </style>
</head>
<body>
    <h1>Видалити замовлення</h1>
    <div class="form-container">
        <form action="delete_order.php" method="get" >
        <label for="id">Номер замовлення для видалення:</label>
            <input type="text" name="id" id="car_id" required>
            <button type="submit" onclick="return confirm('Ви впевнені, що хочете видалити це замовлення?')">Видалити замовлення</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список замовлень</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .container {
            max-width: 500px;
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

        .order.expanded {
            background-color: #f0f0f0;
        }

        .hidden {
            display: none;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>

    <script>
        function toggleDetails(orderId) {
            var orderDetails = document.getElementById('order_' + orderId);
            orderDetails.classList.toggle('expanded');
        }

        function toggleOrdersVisibility() {
            var orders = document.getElementsByClassName('order');
            for (var i = 0; i < orders.length; i++) {
                orders[i].classList.toggle('hidden');
            }

            var button = document.getElementById('toggleButton');
            button.textContent = (button.textContent === 'Показати всі замовлення') ? 'Сховати замовлення' : 'Показати всі замовлення';
        }
    </script>
</head>
<body>
    <h1>Список замовлень</h1>
    
    <button id="toggleButton" onclick="toggleOrdersVisibility()">Показати всі замовлення</button>

    <table>
        <thead>
            <tr>
                <th>ID замовлення</th>
                <th>Ім'я покупця</th>
                <th>Інформація про автомобіль</th>
                <th>Ціна</th>
                <th>Дата замовлення</th>
                <th>Місце замовлення</th>
                <th>Ім'я працівника</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($link, "SELECT o.id, c.name_surname, 
                                                CONCAT(car.manufacturer, ' ', car.model, ' (', car.body_type, ', ', car.color, ', ', car.year, ', ', car.type_engine, ', ', car.transmission, ', VIN: ', car.vin_code, ')') AS car_info,
                                                o.price, o.date_buy, o.address_buy, e.name_surname AS employee_name
                                            FROM `order` o
                                            JOIN customers c ON o.customer_check_id = c.id
                                            JOIN car ON o.car_id = car.id
                                            JOIN employees e ON o.employees_id = e.id");

            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr class='order hidden' id='order_" . $row['id'] . "'>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name_surname'] . "</td>";
                    echo "<td>" . $row['car_info'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['date_buy'] . "</td>";
                    echo "<td>" . $row['address_buy'] . "</td>";
                    echo "<td>" . $row['employee_name'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Помилка: " . mysqli_error($link);
            }
            ?>
        </tbody>
    </table>
</body>
</html>



