<!-- delete_car_process.php -->
<?php
include "constants.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carId = $_POST['id'];

    // Захист від SQL-ін'єкцій - використовуйте підготовлені запити
    $deleteQuery = "DELETE FROM car WHERE id = ?";
    $stmt = mysqli_prepare($link, $deleteQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $carId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "Автомобіль успішно видалено.";
        } else {
            echo "Помилка: " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Помилка при підготовці запиту: " . mysqli_error($link);
    }
} else {
    echo "Невірний метод запиту.";
}
?>
