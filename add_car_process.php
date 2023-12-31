<?php include "constants.php" ?>

<?php
// Обробка даних форми та вставка в базу даних
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $manufacturer = mysqli_real_escape_string($link, $_POST['manufacturer']);
    $model = mysqli_real_escape_string($link, $_POST['model']);
    
    // Додайте більше полів за необхідності

    $sql = "INSERT INTO car (manufacturer, model) VALUES (?, ?)";
    
    // Використання параметрів для безпечної вставки даних
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $manufacturer, $model);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Автомобіль успішно додано!";
    } else {
        echo "Помилка: " . mysqli_error($link);
    }

    mysqli_stmt_close($stmt); // Закриття підготовленого запиту
}
?>
