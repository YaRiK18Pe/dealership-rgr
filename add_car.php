<?php
include "constants.php";

// Обробка даних форми та вставка в базу даних
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Перевіряємо, чи існують ключі "manufacturer", "model", "dealership_id", "body_type" і "color" у масиві $_POST
    $manufacturer = isset($_POST['manufacturer']) ? mysqli_real_escape_string($link, $_POST['manufacturer']) : '';
    $model = isset($_POST['model']) ? mysqli_real_escape_string($link, $_POST['model']) : '';
    $dealership_id = isset($_POST['dealership_id']) ? intval($_POST['dealership_id']) : 0;
    $body_type = isset($_POST['body_type']) ? mysqli_real_escape_string($link, $_POST['body_type']) : '';
    $color = isset($_POST['color']) ? mysqli_real_escape_string($link, $_POST['color']) : '';
    $year = isset($_POST['year']) ? intval($_POST['year']) : 0;
    $type_engine = isset($_POST['type_engine']) ? mysqli_real_escape_string($link, $_POST['type_engine']) : '';
    $transmission = isset($_POST['transmission']) ? mysqli_real_escape_string($link, $_POST['transmission']) : '';
    $vin_code = isset($_POST['vin_code']) ? mysqli_real_escape_string($link, $_POST['vin_code']) : '';

    // Додайте більше полів за необхідності

    // Перевіряємо, чи обидва значення були успішно отримані
    if ($manufacturer !== '' && $model !== '') {
        // Перевіряємо, чи існує дилерський центр з вказаним ID
        $check_dealership_query = "SELECT id FROM dealership WHERE id = $dealership_id";
        $check_dealership_result = mysqli_query($link, $check_dealership_query);

        if ($check_dealership_result && mysqli_num_rows($check_dealership_result) > 0) {
            // Використовуємо підготовлені заяви для уникнення SQL-ін'єкцій
            $sql = "INSERT INTO car (manufacturer, model, dealership_id, body_type, color, year, type_engine, transmission, vin_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($link, $sql);

            if ($stmt) {
                // Прив'язуємо значення до параметрів
                mysqli_stmt_bind_param($stmt, "ssissssss", $manufacturer, $model, $dealership_id, $body_type, $color, $year, $type_engine, $transmission, $vin_code);

                // Виконуємо підготовлену заяву
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo "Автомобіль успішно додано!";
                } else {
                    echo "Помилка: " . mysqli_error($link);
                }

                // Закриваємо підготовлену заяву
                mysqli_stmt_close($stmt);
            } else {
                echo "Помилка: Неможливо виконати підготовлену заяву.";
            }
        } else {
            echo "Помилка: Дилерський центр з ID $dealership_id не існує.";
        }
    } else {
        echo "Помилка: Некоректні дані отримані з форми.";
    }
}
?>
