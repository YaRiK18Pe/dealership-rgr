<?php include "constants.php" ?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список автомобілів</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .container {
            max-width: 800px;
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
        }

        th {
            background-color: #f2f2f2;
        }

        .car.expanded {
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
        function toggleDetails(carId) {
            var carDetails = document.getElementById('car_' + carId);
            carDetails.classList.toggle('expanded');
        }

        function showAllCars() {
            var cars = document.getElementsByClassName('car');
            for (var i = 0; i < cars.length; i++) {
                cars[i].classList.remove('hidden');
            }
        }
    </script>
</head>
<body>
    <h1>Список автомобілів</h1>
    <div class="container">
        <button onclick="showAllCars()">Показати всі автомобілі</button>

        <table>
            <thead>
                <tr>
                    <th>ID автомобіля</th>
                    <th>Виробник</th>
                    <th>Модель</th>
                    <th>Кузов</th>
                    <th>Колір</th>
                    <th>Рік випуску</th>
                    <th>Тип двигуна</th>
                    <th>Трансмісія</th>
                    <th>VIN-code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM car");

                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr class='car hidden' id='car_" . $row['id'] . "'>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['manufacturer'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "<td>" . $row['body_type'] . "</td>";
                        echo "<td>" . $row['color'] . "</td>";
                        echo "<td>" . $row['year'] . "</td>";
                        echo "<td>" . $row['type_engine'] . "</td>";
                        echo "<td>" . $row['transmission'] . "</td>";
                        echo "<td>" . $row['vin_code'] . "</td>";
                        echo "<td><button onclick='toggleDetails(" . $row['id'] . ")'>Toggle Details</button></td>";
                        echo "</tr>";
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
