<?php
include "constants.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $manufacturer = $_POST["manufacturer"];
    $model = $_POST["model"];
    $body_type = $_POST["body_type"];
    $color = $_POST["color"];
    $year = $_POST["year"];
    $type_engine = $_POST["type_engine"];
    $transmission = $_POST["transmission"];
    $vin_code = $_POST["vin_code"];

    $query = "UPDATE car SET manufacturer='$manufacturer', model='$model', body_type='$body_type', color='$color', year=$year, type_engine='$type_engine', transmission='$transmission', vin_code='$vin_code' WHERE id=$id";

    if (mysqli_query($link, $query)) {
        echo "Дані про автомобіль оновлені успішно";
    } else {
        echo "Помилка при оновленні даних про автомобіль: " . mysqli_error($link);
    }
}
?>
