<?php include "constants.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    // Отримання решти даних з форми редагування

    $update_query = "UPDATE car SET
        manufacturer = '$manufacturer',
        model = '$model',
        body_type = '$body_type',
        color = '$color',
        year = '$year',
        type_engine = '$type_engine',
        transmission = '$transmission',
        vin_code = '$vin_code'
        WHERE id = $id";

    if (mysqli_query($link, $update_query)) {
        echo "Зміни успішно збережено.";
    } else {
        echo "Помилка при редагуванні: " . mysqli_error($link);
    }
} else {
    echo "Некоректний метод запиту.";
}
?>
