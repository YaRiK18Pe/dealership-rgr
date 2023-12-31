<?php
include "constants.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = $_POST['customer_id'];
    $car_id = $_POST['car_id'];
    $price = $_POST['price'];
    $date_buy = $_POST['date_buy'];
    $address_buy = $_POST['address_buy'];
    $employees_id = $_POST['employees_id'];

    $query = "INSERT INTO `order` (customer_check_id, car_id, price, date_buy, address_buy, employees_id) 
              VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "iissss", $customer_id, $car_id, $price, $date_buy, $address_buy, $employees_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Замовлення успішно додано до бази даних.";
    } else {
        echo "Помилка: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>
